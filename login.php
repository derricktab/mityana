<?php include("header.php"); ?>

<?php
$success = "";

if(isset($_POST["login"])){
    $username = htmlentities($_POST["username"], ENT_QUOTES, "UTF-8");
    $password = htmlentities($_POST["password"], ENT_QUOTES, "UTF-8");

    // CHECKING IF THE USER IS A STUDENT
    $result = mysqli_query($con, "SELECT * FROM students WHERE username='$username'") or die("SOMETHING WENT WRONG");

    $students = mysqli_num_rows($result);

    if($students >=1){
        while($row = mysqli_fetch_array($result)){
            $db_password = $row["password"];
            $user_verified = password_verify($password, $db_password);
            $student_lname = $row["last_name"];
            $student_fname = $row["first_name"];
            $class = $row["class"];

            if($user_verified){
                echo "STUDENT LOGIN SUCCESFULL";

                $_SESSION['student'] = "true";
                $_SESSION['student_username'] = $username;
                $_SESSION['class'] = $class;
                header("location: students/index.php"); 
                $success = "true";          
            }else{
                $success = "false";
            }
        }

    }
    else{
        // CHECKING IF THE USER IS A TEACHER
        $result1 = mysqli_query($con, "SELECT * FROM teachers WHERE username='$username'");
        $staff = mysqli_num_rows($result1);
        if($staff >=1){
            while($row1 = mysqli_fetch_array($result1)){
                $staff_password = $row1["password"];
                $full_name = $row1["full_name"];

                $staff_verified = password_verify($password, $staff_password);
                
                if($staff_verified){
                    $_SESSION["teacher"] = "true";
                    $_SESSION["teacher_username"] = $username;
                    header("location: teachers/"); 
                    $success = "true";
                }else{
                    $success = "false";
                }
            }

        }else{

            // CHECKING IF THE USER IS AN ADMIN
            $result2 = mysqli_query($con, "SELECT * FROM admin WHERE username='$username'");
            $admin = mysqli_num_rows($result2);
            if($admin >=1){
                while($row2 = mysqli_fetch_array($result2)){
                    $admin_password = $row2["password"];
                    $admin_verified = password_verify($password, $admin_password);
                    if($admin_verified){
                        $_SESSION["admin"] = "true";
                        $_SESSION["admin_username"] = $username;
                        header("location: admin/index.php");
                        $success = "true";            
                    }else{
                        $success= "false";
                    }
                }
    
            }else{
                $success = "false";
                
            }
            if(!$result1){
                $success = "false";
            }    

        }
        if(!$result1){
            $success = "false";
        }
    }



}


?>


<title>Login</title>

 <!-- DISPLAYING THE SUCCESS MESSAGE -->
<?php if($success == "true") { ?>
<div class="container c-alert">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>SUCCESS!</strong> &nbsp; LOGIN SUCCESFULL.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
</div>

<!-- ERROR MESSAGE -->
<?php } elseif($success == "false") { ?>
    <div class="container c-alert">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>ERROR!</strong> &nbsp; Invalid Login Credentials
    <?php echo mysqli_error($con); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
</div>
<?php } ?>

<div class="login-wrapper mx-auto">
   
    <form action="login.php" method="POST">
    <div class="row">

    <!-- LEFT SIDE -->
        <div class="col-md-6 left  my-auto text-white">
            <h3 class="mb-5">LOGIN</h3>
    <!-- USERNAME -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
        </div>

    <!-- PASSWORD -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-key"></i>
                    </div>
                </div>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
        </div>  
        
        <!-- SUBMIT BUTTON -->
        <div class="form-group">
            <input type="submit" value="SUBMIT" class="form-control btn btn-warning" name="login">
        </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-6 height right">
            <div class="container">
                <img src="assets/logo1.png" alt="Logo">
            </div>
        </div>
    </div>



    </form>
</div>


<script>
    $("#login").removeClass("btn-outline-danger");
    $("#login").addClass("btn-danger");
</script>

<?php include("footer.php"); ?>
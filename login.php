<?php include("header.php"); ?>

<?php
if(isset($_POST["login"])){
    $username = htmlentities($_POST["username"], ENT_QUOTES, "UTF-8");
    $password = htmlentities($_POST["password"], ENT_QUOTES, "UTF-8");

    // checking if student exists in the students table.
    $result = mysqli_query($con, "SELECT * FROM students WHERE username='$username'") or die("SOMETHING WENT WRONG");

    $students = mysqli_num_rows($result);

    if($students >=1){
        while($row = mysqli_fetch_array($result)){
            $db_password = $row["password"];
            $user_verified = password_verify($password, $db_password);

            if($user_verified){
                echo "STUDENT LOGIN SUCCESFULL";
                header("location: registration.php");            
            }else{
                echo "INCORRECT USERNAME AND PASSWORD COMBINATION";
            }
        }

    }
    else{
        echo "NO STUDENT FOUND";
        // Checking in the staff table.
        $result1 = mysqli_query($con, "SELECT * FROM staff WHERE username='$username'");
        $staff = mysqli_num_rows($result1);
        if($staff >=1){
            while($row1 = mysqli_fetch_array($result1)){
                $staff_password = $row1["password"];
                $staff_verified = password_verify($password, $staff_password);
                if($staff_verified){
                    echo "STAFF LOGIN SUCCESFULL";
                    header("location: registration.php");            
                }else{
                    echo "INCRORRECT USERNAME AND PASSWORD COMBINATION";
                }
            }

        }else{
            echo "INCORRECT USERNAME AND PASSWORD COMBINATION";
        }
        if(!$result1){
            echo "SOMETHING WENT WRONG IN THE STAFF TABLE.";
        }
    }



}


?>


<title>Login</title>


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
<?php include("footer.php"); ?>
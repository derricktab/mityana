<?php include("header.php"); ?>

<?php
if(isset($_POST["login"])){
    $username = htmlentities($_POST["username"], ENT_QUOTES, "UTF-8");
    $password = htmlentities($_POST["password"], ENT_QUOTES, "UTF-8");

    // checking if student exists in the students table.
    $result = mysqli_query($con, "SELECT * FROM students WHERE username='$username' AND password='$password'");

    $students = mysqli_num_rows($result);

    if($students >=1){
        echo "STUDENT LOGIN SUCCESFULL";
        header("location: registration.php");
    }

    if(!$result){

        // Checking in the staff table.
        $result1 = mysqli_query($con, "SELECT * FROM staff WHERE username='$username' AND password='$password'");
        $staff = mysqli_num_rows($result1);
        if($stuff >=1){
            echo "STAFF LOGIN SUCCESFULL";
            header("location: registration.php");
        }
        if($result1)
    }



}


?>


<title>Login</title>


<div class="login-wrapper mx-auto">
    <form action="login.php" method="POST">
    <div class="row">

    <!-- LEFT SIDE -->
        <div class="col-md-6 left my-auto text-white">
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
            <input type="submit" value="SUBMIT" class="form-control btn btn-warning" name="submit">
        </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-6 right">
            <div class="container">
                <img src="assets/logo1.png" alt="Logo">
            </div>
        </div>
    </div>



    </form>
</div>
<?php include("footer.php"); ?>
<?php include("header.php"); ?>

<?php
if(isset($_POST["add_staff"])){

    $fullname = htmlentities($_POST["fname"], ENT_QUOTES, "UTF-8");
    $email = htmlentities($_POST["email"], ENT_QUOTES, "UTF-8");
    $address = htmlentities($_POST["address"], ENT_QUOTES, "UTF-8");
    $phone = htmlentities($_POST["phone"], ENT_QUOTES, "UTF-8");
    $username = htmlentities($_POST["username"], ENT_QUOTES, "UTF-8");
    $password = htmlentities($_POST["password"], ENT_QUOTES, "UTF-8");
    $confirm_password = htmlentities($_POST["confirm_password"], ENT_QUOTES, "UTF-8");
    

    // Checking if the entered passwords match
    if($password == $confirm_password){

    // Hashing the password 
    $password = password_hash($password, PASSWORD_DEFAULT);

    // inserting the values into the database
    $result = mysqli_query($con, "INSERT INTO staff(full_name, email, phonenumber, address, username, password) VALUES('$fullname', '$email', '$phone', '$address', '$username', '$password')") or die("Somethign went wrong".mysqli_error($con));

    if($result){
        echo "added staff member succesfully";
    }


    }else{
        echo "PASSWORDS DO NOT MATCH";
    }

}


?>


<title>ADD STAFF MEMBER</title>


<div class="login-wrapper mx-auto">
    <form action="add_staff.php" method="POST">
    <div class="row">

    <!-- LEFT SIDE -->
        <div class="col-md-6 left my-auto text-white">
            <h3 class="mb-5">ADD STAFF MEMBER</h3>
            
    <!-- FULL NAME -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
                <input type="text" class="form-control" name="fname" placeholder="FULL NAME">
            </div>
        </div>

        <!-- EMAIL -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-envelope"></i>
                    </div>
                </div>
                <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
        </div>

    <!-- PHONE NUMBER -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
                <input type="text" class="form-control" name="phone" placeholder="Phone Number">
            </div>
        </div>

    <!-- ADDRESS -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-location"></i>
                    </div>
                </div>
                <input type="text" class="form-control" name="address" placeholder="Address">
            </div>
        </div>

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

    <!-- CONFIRM PASSWORD -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-key"></i>
                    </div>
                </div>
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
            </div>
        </div>  
        
        <!-- SUBMIT BUTTON -->
        <div class="form-group">
            <input type="submit" value="SUBMIT" class="form-control btn btn-warning" name="add_staff">
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
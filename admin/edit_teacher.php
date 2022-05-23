<?php include("header.php") ?>

<?php 
$success = "";
$name = "";
$email = "";
$phonenumber = "";
$address = "";
$salary = "";
$username = "";

if(isset($_GET["id"])){
    $id = htmlentities($_GET["id"], ENT_QUOTES, "UTF-8");

    $result = mysqli_query($con, "SELECT * FROM teachers WHERE id='$id'");
    $row = mysqli_fetch_array($result);

    $name = $row["full_name"];
    $email = $row["email"];
    $phonenumber = $row["phonenumber"];
    $address = $row["address"];
    $salary = $row["salary"];
    $username = $row["username"];
}


if(isset($_POST["edit_teacher"])){

    $name = htmlentities($_POST["name"], ENT_QUOTES, "UTF-8");
    $email = htmlentities($_POST["email"], ENT_QUOTES, "UTF-8");
    $phonenumber = htmlentities($_POST["phonenumber"], ENT_QUOTES, "UTF-8");
    $address = htmlentities($_POST["address"], ENT_QUOTES, "UTF-8");
    $salary = htmlentities($_POST["salary"], ENT_QUOTES, "UTF-8");
    $username = htmlentities($_POST["username"], ENT_QUOTES, "UTF-8");


    $password = password_hash($username, PASSWORD_DEFAULT);


    $result = mysqli_query($con, "UPDATE teachers SET full_name='$name', email='$email', phonenumber='$phonenumber', address='$address', salary='$salary', username='$username', password='$password' ");

    if($result){
        $success = "true";
    }else{
        $success = "false";
    }
}

?>

<div class="form-wrapper mx-auto my-5">
    <h1 class="font-weight-bold text-center text-white">Update Teacher Details</h1>

    <!-- DISPLAYING THE SUCCESS MESSAGE -->
    <?php if($success == "true") { ?>
    <div class="container a-alert">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> &nbsp; Teacher Added Succesfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    </div>

    <!-- ERROR MESSAGE -->
    <?php } elseif($success == "false") { ?>
        <div class="container a-alert">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR!</strong> &nbsp; Something Went Wrong.........Please Try Again Later
        <?php echo mysqli_error($con); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    </div>
    <?php } ?>

    <form action="edit_teacher.php" method="POST" class="mt-4">


        <!-- Teacher Name -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
                <input type="text" name="name" class="form-control" placeholder="Full Name" value="<?php echo $name ?> " required>
            </div>
        </div>

        <!-- Teacher Email -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-envelope"></i>
                    </div>
                </div>
                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email ?> " required>
            </div>
        </div>

        <!-- Teacher Phone Number -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
                <input type="tel" name="phonenumber" class="form-control" placeholder="Phone Number" value="<?php echo $phonenumber ?> " required>
            </div>
        </div>

        <!-- Teacher ADDRESS -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-map-marker"></i>
                    </div>
                </div>
                <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $address ?> " required>
            </div>
        </div>

        <!-- Teacher SALARY -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-credit-card"></i>
                    </div>
                </div>
                <input type="number" name="salary" class="form-control" placeholder="Salary" value="<?php echo $salary; ?>" required>
            </div>
        </div>

        <!-- Teacher USERNAME -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
                <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username ?> " required>
            </div>
        </div>

        <!-- SUBMIT BUTTON -->
        <div class="form-group">
            <input type="submit" value="SUBMIT" class="btn btn-warning submit form-control" name="add_teacher">
        </div>
    </form>
    
    <a href="teachers.php" class="text-white">Back To Teachers</a>

</div>





<?php include("footer.php") ?>
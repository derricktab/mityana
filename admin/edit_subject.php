<?php include("header.php") ?>

<?php 

$success = "";
$id = "";
$subject_name = "";
$code = "";

if(isset($_POST["edit"])){

    $id = $_POST["id"];
    $result = mysqli_query($con, "SELECT * FROM subjects WHERE id='$id'") or die(mysqli_error($con));

    $row = mysqli_fetch_array($result);
    $subject_name = $row["name"];
    $code = $row["code"];
}


if(isset($_POST["submit"])){
    
    $id = htmlentities($_POST["id"], ENT_QUOTES, "UTF-8");
    $subject_name = htmlentities($_POST["name"], ENT_QUOTES, "UTF-8");
    $code = htmlentities($_POST["code"], ENT_QUOTES, "UTF-8");

    $result = mysqli_query($con, "UPDATE subjects SET name='$subject_name', code='$code' WHERE id='$id'");

    if($result){
        $success = "true";
    }else{
        $success = "false";
    }
}

?>

<div class="form-wrapper mx-auto my-5">
    <h1 class="font-weight-bold text-center text-white">EDIT SUBJECT</h1>

    <!-- DISPLAYING THE SUCCESS MESSAGE -->
    <?php if($success == "true") { ?>
    <div class="container a-alert">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> &nbsp; Subject Updated Succesfully.
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

    <form action="edit_subject.php" method="POST" class="mt-4">

        <input type="hidden" name="id" value="<?php echo $id ?>">
        <!-- Subject Name -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-building"></i>
                    </div>
                </div>
                <input type="text" name="name" class="form-control" placeholder="Subject Name" value="<?php echo $subject_name ?>" required>
            </div>
        </div>

        <!-- Subject Code -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                </div>
                <input type="text" name="code" class="form-control" placeholder="Subject Code" value="<?php echo $code ?>" required>
            </div>
        </div>

        <!-- SUBMIT BUTTON -->
        <div class="form-group">
            <input type="submit" value="SUBMIT" class="btn btn-warning submit form-control" name="submit">
        </div>
    </form>

    <a href="subjects.php" class="text-white">Back To Subjects</a>
</div>





<?php include("footer.php") ?>
<?php include("header.php") ?>

<?php 
$success = "";

if(isset($_POST["submit"])){
    $subject_name = htmlentities($_POST["name"], ENT_QUOTES, "UTF-8");
    $code = htmlentities($_POST["code"], ENT_QUOTES, "UTF-8");

    $result = mysqli_query($con, "INSERT INTO subjects(name, code) VALUES('$subject_name', '$code')");

    if($result){
        $success = "true";
    }else{
        $success = "false";
    }
}

?>

<div class="form-wrapper mx-auto my-5">
    <h1 class="font-weight-bold text-center text-white">Add Subject</h1>

    <!-- DISPLAYING THE SUCCESS MESSAGE -->
    <?php if($success == "true") { ?>
    <div class="container a-alert">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> &nbsp; Subject Added Succesfully.
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

    <form action="add_subject.php" method="POST" class="mt-4">


        <!-- Subject Name -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-building"></i>
                    </div>
                </div>
                <input type="text" name="name" class="form-control" placeholder="Subject Name" required>
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
                <input type="text" name="code" class="form-control" placeholder="Subject Code" required>
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
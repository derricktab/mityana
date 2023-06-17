<?php include("header.php") ?>

<?php 

$success = "";
$id = "";
$subject_name = "";
$code = "";
$teacher_username = "";
$teacher_name = "";
$class = "";
$subject = "";

if(isset($_GET["tid"])){

    $id = $_GET["tid"];
    $result = mysqli_query($con, "SELECT * FROM teachers WHERE id='$id'") or die(mysqli_error($con));

    $row = mysqli_fetch_array($result);
    $teacher_name = $row["full_name"];
    $teacher_username = $row["username"];
}

    echo $teacher_username;

if(isset($_POST["submit"])){
    
    $teacher_username = htmlentities($_POST["teacher_username"], ENT_QUOTES, "UTF-8");
    $class = htmlentities($_POST["class"], ENT_QUOTES, "UTF-8");
    $subject = htmlentities($_POST["subject"], ENT_QUOTES, "UTF-8");
    echo $subject;
    echo $teacher_username;

    $result = mysqli_query($con, "INSERT INTO teacher_subject(teacher, class, subject) VALUES('$teacher_username', '$class', '$subject') ");

    if($result){
        $success = "true";
    }else{
        $success = "false";
    }
}

?>

<div class="form-wrapper mx-auto my-5">
    <h1 class="font-weight-bold text-center text-white">ASSIGN TEACHER SUBJECT</h1>

    <!-- DISPLAYING THE SUCCESS MESSAGE -->
    <?php if($success == "true") { ?>
    <div class="container a-alert">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> &nbsp; Teacher Assigned Subject Succesfully.
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

    <form action="teachers_subjects.php" method="POST" class="mt-4">

        <!-- Teacher Name -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-building"></i>
                    </div>
                </div>
                <input type="text" name="teacher_name" class="form-control" placeholder="Subject Name" value="<?php echo $teacher_name ?>">
            </div>
        </div>

        <input type="hidden" name="teacher_username" value="<?php echo $teacher_username ?>">

        <!-- Class -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                </div>
                <select name="class" class="form-control">
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    <option value="S4">S4</option>
                    <option value="S5">S5</option>
                    <option value="S6">S6</option>
                </select>
            </div>
        </div>

  
        <!-- SUBJECTS -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                </div>
                <select name="subject" class="form-control">
                    <!-- FETCHING SUBJECTS FROM THE DATABASE -->
                    <?php 
                    $result = mysqli_query($con, "SELECT * FROM subjects");

                    if($result){
                        while($row = mysqli_fetch_array($result)){
                            $subject_name = $row["name"];
                    ?>
                    <option value="<?php echo $subject_name ?>"><?php echo $subject_name ?> </option>
                    <?php }} ?>
                </select>
            </div>
        </div>

        <!-- SUBMIT BUTTON -->
        <div class="form-group">
            <input type="submit" value="SUBMIT" class="btn btn-warning submit form-control" name="submit">
        </div>
    </form>

    <a href="teachers.php" class="text-white">Back To Teachers</a>
</div>





<?php include("footer.php") ?>
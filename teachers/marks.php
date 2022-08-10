<?php include("header.php") ?>

<?php 
 
$success = "";

if(isset($_POST["submit"])){
    $student_id = htmlentities($_POST["student_id"], ENT_QUOTES, "UTF-8");
    $subject = htmlentities($_POST["subject"], ENT_QUOTES, "UTF-8");
    $year = htmlentities($_POST["year"], ENT_QUOTES, "UTF-8");
    $term = htmlentities($_POST["term"], ENT_QUOTES, "UTF-8");
    $teacher = htmlentities($_POST["teacher"], ENT_QUOTES, "UTF-8");
    $bot = htmlentities($_POST["bot"], ENT_QUOTES, "UTF-8");
    $mid = htmlentities($_POST["mid"], ENT_QUOTES, "UTF-8");
    $end = htmlentities($_POST["end"], ENT_QUOTES, "UTF-8");

    $result = mysqli_query($con, "INSERT INTO marks_old(student, teacher, subject, bot, mid, end, term, year) VALUES('$student_id', '$teacher', '$subject', '$bot', '$mid', '$end', '$term', '$year')") or die(mysqli_error($con));

    if($result){
        $success = true;
    }else{
        $success = false;
    }

}


?>

<div class="row mx-5">
    <form action="marks.php" method="post">

    <?php if($success == "true"){ ?>
    <div class="container a-alert">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> &nbsp; Students Marks Set Succesfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    </div>
    <?php }else if($success == "false"){ ?>
    <div class="container a-alert">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR!</strong> &nbsp; Something went wrong.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    </div>
    <?php } ?>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <th>STUDENT</th>
                <th>BOT</th>
                <th>MID</th>
                <th>END</th>
            </thead>
            <?php
            $result = mysqli_query($con, "SELECT * FROM students WHERE CLASS = 'S2'");
            while ($row = mysqli_fetch_array($result)) {
            ?>
            <input type="hidden" name="student_id" value=<?php echo $row['student_id'] ?> >
            <input type="hidden" name="subject" value="LUGANDA">
            <input type="hidden" name="year" value=<?php echo $current_year ?> >
            <input type="hidden" name="term" value=<?php echo $current_term ?> >
            <input type="hidden" name="teacher" value=<?php echo $teacher_username ?> >
                <tr>
                    <td><?php echo $row["first_name"] . " " . $row["last_name"] ?></td>
                    <td><input type="number" name="bot" min="0" max="100"></td>
                    <td><input type="number" name="mid" min="0" max="100"></td>
                    <td><input type="number" name="end" min="0" max="100"></td>
                </tr>
            <?php } ?>
        </table>
        <button type="submit" name="submit" class="btn btn-primary float-right px-4">SAVE</button>
    </form>


</div>




<?php include("footer.php") ?>
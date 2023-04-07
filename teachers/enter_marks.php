<?php include("header.php") ?>

<script>
    $("#marks").addClass("active-tab");
</script>


<?php

$success = "";
$subject = "";


if (isset($_GET["s"])) {
    $subject = htmlentities($_GET["s"], ENT_QUOTES, "UTF-8");
}

if (isset($_POST["submit"])) {
    $student_id = htmlentities($_POST["student_id"], ENT_QUOTES, "UTF-8");
    $subject = htmlentities($_POST["subject"], ENT_QUOTES, "UTF-8");
    $year = htmlentities($_POST["year"], ENT_QUOTES, "UTF-8");
    $term = htmlentities($_POST["term"], ENT_QUOTES, "UTF-8");
    $teacher = htmlentities($_POST["teacher"], ENT_QUOTES, "UTF-8");
    $bot = htmlentities($_POST["bot"], ENT_QUOTES, "UTF-8");
    $mid = htmlentities($_POST["mid"], ENT_QUOTES, "UTF-8");
    $end = htmlentities($_POST["end"], ENT_QUOTES, "UTF-8");

    $result = mysqli_query($con, "INSERT INTO marks_old(student, teacher, subject, bot, mid, end, term, year) VALUES('$student_id', '$teacher', '$subject', '$bot', '$mid', '$end', '$term', '$year')") or die(mysqli_error($con));

    if ($result) {
        $success = true;
    } else {
        $success = false;
    }
}


?>
<!-- BREAD CRUMB-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Student Marks</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active">Marks</li>
        </ol>
    </div>
</div>

<!-- GETTING STUDENTS WHO OFFER THAT SUBJECT -->
<?php
$result = mysqli_query($con, "SELECT * FROM subject_offered WHERE subject='$subject'");
$n_subjects = mysqli_num_rows($result);
if ($n_subjects > 0) { ?>


    <div class="row mx-5">
        <form action="enter_marks.php" method="post" class="mx-auto mt-3">

            <?php if ($success == "true") { ?>
                <div class="container a-alert">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>SUCCESS!</strong> &nbsp; Students Marks Set Succesfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php } else if ($success == "false") { ?>
                <div class="container a-alert">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR!</strong> &nbsp; Something went wrong.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php } ?>

            <div class="container mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <?php echo "<b>SUBJECT:</b> " . $subject ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo "<b>YEAR: </b>" . $current_year ?>
                    </div>
                    <div class="col-md-4">
                        <?php echo "<b>TERM: </b>" . $current_term ?>
                    </div>
                </div>
            </div>

            <table class="table table-bordered">
                <thead class="thead-light ">
                    <th>STUDENT</th>
                    <th>BOT</th>
                    <th>MID</th>
                    <th>END</th>
                </thead>

                <?php while ($row = mysqli_fetch_array($result)) {

                    $student_id = $row["student"];
                    $result2 = mysqli_query($con, "SELECT * FROM students WHERE student_id = '$student_id'") or die(mysqli_error($con));
                    $student = mysqli_fetch_array($result2);
                ?>


                    <input type="hidden" name="student_id" value=<?php echo $student_id ?>>
                    <input type="hidden" name="subject" value=<?php echo $subject ?>>
                    <input type="hidden" name="year" value=<?php echo $current_year ?>>
                    <input type="hidden" name="term" value=<?php echo $current_term ?>>
                    <input type="hidden" name="teacher" value=<?php echo $teacher_username ?>>
                    <tr>
                        <td style="min-width: 300px;"><?php echo $student["first_name"] . " " . $student["last_name"] ?></td>
                        <td style="min-width: 150px;"><input type="number" name="bot" min="0" max="100" class="form-control"></td>
                        <td style="min-width: 150px;"><input type="number" name="mid" min="0" max="100" class="form-control"></td>
                        <td style="min-width: 150px;"><input type="number" name="end" min="0" max="100" class="form-control"></td>
                    </tr>
                <?php } ?>

z
            </table>
            <button type="submit" name="submit" class="btn btn-primary float-right px-4">SAVE</button>
        </form>


    </div>

<?php } else { ?>
    <div class="container a-alert">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>SORRY!</strong> &nbsp; There are no students offering this subject.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <a href="./marks.php"><button class="btn btn-primary mx-auto d-flex">BACK TO SUBJECTS</button></a>
<?php } ?>




<?php for ($i = 0; $i <= 8; $i++) { ?>
    <br>
<?php } ?>

<?php include("footer.php") ?>
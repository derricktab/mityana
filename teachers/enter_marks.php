<?php include("header.php") ?>

<script>
    $("#marks").addClass("active-tab");
</script>


<?php

$success = "";
$subject = "";
$aio1 = "";
$aio2 = "";
$aio3 = "";
$aio4 = "";
$aio5 = "";
$aio6 = "";
$current_term = "";
$current_year = "";
$n_subjects = 0;
$student_result = "";


// GETTING THE CURRENT TERM
$term_result = mysqli_query($con, "SELECT * FROM current_year");
while (
    $row = mysqli_fetch_array($term_result)
) {
    $current_term = $row["current_term"];
    $current_year = $row["current_year"];
}

// GETTING THE STUDENT MARKS FROM THE DATABASE
$result = mysqli_query($con, "SELECT * FROM marks WHERE year='$current_year' AND term='$current_term'") or die(mysqli_error($con));

while ($row = mysqli_fetch_array($result)) {
    $aoi1 = $row["aoi1"];
    $aoi2 = $row["aoi2"];
    $aoi3 = $row["aoi3"];
    $aoi4 = $row["aoi4"];
    $aoi5 = $row["aoi5"];
}


// 
if (isset($_GET["s"])) {
    $subject = htmlentities($_GET["s"], ENT_QUOTES, "UTF-8");

    $student_result = mysqli_query($con, "SELECT * FROM subject_offered WHERE subject='$subject'");
    $n_subjects = mysqli_num_rows($student_result);

}

// SUBMITTING THE MARKS
if (isset($_POST["submit"])) {

    $subject = htmlentities($_POST["subject"], ENT_QUOTES, "UTF-8");
    $year = htmlentities($_POST["year"], ENT_QUOTES, "UTF-8");
    $term = htmlentities($_POST["term"], ENT_QUOTES, "UTF-8");
    $teacher = htmlentities($_POST["teacher"], ENT_QUOTES, "UTF-8");

    $student_result = mysqli_query($con, "SELECT * FROM subject_offered WHERE subject='$subject'");
    $n_subjects = mysqli_num_rows($student_result);

    // Loop through the student IDs and insert marks for each student
    for ($i = 0; $i < $n_subjects; $i++) {

        $student_id = htmlentities($_POST["student_id_$i"], ENT_QUOTES, "UTF-8");
        $aoi1 = htmlentities($_POST["aoi1_$i"], ENT_QUOTES, "UTF-8");
        $aoi2 = htmlentities($_POST["aoi2_$i"], ENT_QUOTES, "UTF-8");
        $aoi3 = htmlentities($_POST["aoi3_$i"], ENT_QUOTES, "UTF-8");
        $aoi4 = htmlentities($_POST["aoi4_$i"], ENT_QUOTES, "UTF-8");
        $aoi5 = htmlentities($_POST["aoi5_$i"], ENT_QUOTES, "UTF-8");

        // Check if the record exists
        $checkQuery = mysqli_query($con, "SELECT * FROM marks WHERE student = '$student_id' AND teacher = '$teacher' AND subject = '$subject' AND term = '$term' AND year = '$year'");


        if (mysqli_num_rows($checkQuery) > 0) {
            // Record exists, perform an update
            $result = mysqli_query($con, "UPDATE marks SET aoi1 = '$aoi1', aoi2 = '$aoi2', aoi3 = '$aoi3', aoi4 = '$aoi4', aoi5 = '$aoi5' WHERE student = '$student_id' AND teacher = '$teacher' AND subject = '$subject' AND term = '$term' AND year = '$year'");


            if (!$result) {
                echo "ERROR: " . mysqli_error($con);
                $success = "false";
                break;
            }
        } else {
            // Record does not exist, perform an insert
            $insertQuery = mysqli_query($con, "INSERT INTO marks (student, teacher, subject, aoi1, aoi2, aoi3, aoi4, aoi5, term, year) VALUES ('$student_id', '$teacher', '$subject', '$aoi1', '$aoi2', '$aoi3', '$aoi4', '$aoi5', '$term', '$year')");


            if (!$insertQuery) {
                echo "ERROR: " . mysqli_error($con);
                $success = "false";
                break;
            }
        }

    }


    // CHECK QUERY RESULTS
    if ($result) {
        $success = "true";
    } else {
        $success = "false";
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

                            <div class=" table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-light ">
                                    <th  scope="col">STUDENT</th>
                                    <th scope="col">AOI 1</th>
                                    <th scope="col">AOI 2</th>
                                    <th scope="col">AOI 3</th>
                                    <th scope="col">AOI 4</th>
                                    <th scope="col">AOI 5</th>
                                </thead>

                                <?php
                                $index = 0;
                                while ($row = mysqli_fetch_array($student_result)) {

                                    $student_id = $row["student"];
                                    $result2 = mysqli_query($con, "SELECT * FROM students WHERE student_id = '$student_id'") or die(mysqli_error($con));
                                    $student = mysqli_fetch_array($result2);

                                    // GETTING THE STUDENT'S MARKS
                                    $marks_result = mysqli_query($con, "SELECT * FROM marks WHERE student = '$student_id' AND teacher = '$teacher_username' AND subject = '$subject' AND term = '$current_term' AND year = '$current_year'") or die(mysqli_error($con));

                                    // GETTING THE MARKS ARRAY
                                    $marks_array = mysqli_fetch_array($marks_result);
                                    ?>

                                                        <input type="hidden" name= <?php echo "student_id_$index" ?> value=<?php echo $student_id ?>>
                                                        <input type="hidden" name="subject" value=<?php echo $subject ?>>
                                                        <input type="hidden" name="year" value=<?php echo $current_year ?>>
                                                        <input type="hidden" name="term" value=<?php echo $current_term ?>>
                                                        <input type="hidden" name="teacher" value=<?php echo $teacher_username ?>>

                                                        <tr>
                                                            <td style="min-width: 300px;"><?php echo $student["first_name"] . " " . $student["last_name"] ?></td>
                                                            <td style="min-width: 150px;"><input type="number" name= <?php echo "aoi1_$index" ?>  min="0" max="100" class="form-control" value=<?php echo $marks_array["aoi1"] ?> /></td>
                                                            <td style="min-width: 150px;"><input type="number" name=<?php echo "aoi2_$index" ?> min="0" max="100" class="form-control"  value=<?php echo $marks_array["aoi2"]?>  /></td>
                                                            <td style="min-width: 150px;"><input type="number" name=<?php echo "aoi3_$index" ?> min="0" max="100" class="form-control" value=<?php echo $marks_array["aoi3"] ?>  /></td>
                                                            <td style="min-width: 150px;"><input type="number" name=<?php echo "aoi4_$index" ?> min="0" max="100" class="form-control"  value=<?php echo $marks_array["aoi4"] ?> /></td>
                                                            <td style="min-width: 150px;"><input type="number" name=<?php echo "aoi5_$index" ?> min="0" max="100" class="form-control" value=<?php echo $marks_array["aoi5"] ?>  /></td>
                                                        </tr>

                                                                            <?php
                                                                            $index += 1;
                                } ?>


                                </table>
                                </div>

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
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
        <!-- <form action="enter_marks.php" method="post" class="mx-auto mt-3"> -->

            

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
            <div style="overflow-x: auto">
            <table style="overflow-x: true" class="table table-bordered">
                <thead class="thead-light ">
                    <th>ID</th>
                    <th>STUDENT</th>
                    <th>B.O.T</th>
                    <th>MID</th>
                    <th>E.O.T</th>
                    <th>COMPETENCY</th>
                    <th>SKILLS</th>
                    <th>REMARKS</th>
                    <th>DESCRIPTOR</th>
                    <!-- <th>ACTION</th> -->
                </thead>

                <?php while ($row = mysqli_fetch_array($result)) {

                    $student_id = $row["student"];
                    $result2 = mysqli_query($con, "SELECT * FROM students WHERE student_id = '$student_id'") or die(mysqli_error($con));
                    $student = mysqli_fetch_array($result2);
                    $student_name = $row["first_name"] . $row["last_name"];
                    $class = $row['class'];

                    
                ?>


                    <input type="hidden" name="student_id" value=<?php echo $student_id ?>>
                    <input type="hidden" name="subject" value=<?php echo $subject ?>>
                    <input type="hidden" name="year" value=<?php echo $current_year ?>>
                    <input type="hidden" name="term" value=<?php echo $current_term ?>>
                    <input type="hidden" name="teacher" value=<?php echo $teacher_username ?>>
                    <tr>
                        <td style="min-width: 30px;"><?php echo $student_id;?></td>
                        <td style="min-width: 150px;"><?php echo $student["first_name"] . " " . $student["last_name"] ?></td>
                        <td style="min-width: 10px;">
                        <?php
                            $bot_query = "SELECT bot FROM marks_old WHERE student = '$student_id' AND subject = '$subject'";
                            $bot_result = mysqli_query($con, $bot_query);
                            $bot_value = mysqli_fetch_assoc($bot_result)["bot"];
                            echo $bot_value;
                        ?>
                        </td>
                        <td style="min-width: 10px;">
                        <?php
                            $mid_query = "SELECT mid FROM marks_old WHERE student = '$student_id' AND subject = '$subject'";
                            $mid_result = mysqli_query($con, $mid_query);
                            $mid_value = mysqli_fetch_assoc($mid_result)["mid"];
                            echo $mid_value;
                        ?>
                        </td>
                        <td style="min-width: 10px;">
                        <?php
                            $end_query = "SELECT end FROM marks_old WHERE student = '$student_id' AND subject = '$subject'";
                            $end_result = mysqli_query($con, $end_query);
                            $end_value = mysqli_fetch_assoc($end_result)["end"];
                            echo $end_value;
                        ?>
                        </td>
                        <td style="min-width: 100px; overflow-x: auto; font-size:12px;">
                        <?php
                            $end_query = "SELECT competency FROM marks_old WHERE student = '$student_id' AND subject = '$subject'";
                            $end_result = mysqli_query($con, $end_query);
                            $end_value = mysqli_fetch_assoc($end_result)["competency"];
                            echo $end_value;
                        ?>
                        </td>
                        <td style="min-width: 100px; font-size:12px;">
                        <?php
                            $end_query = "SELECT skills FROM marks_old WHERE student = '$student_id' AND subject = '$subject'";
                            $end_result = mysqli_query($con, $end_query);
                            $end_value = mysqli_fetch_assoc($end_result)["skills"];
                            echo $end_value;
                        ?>
                        </td>
                        <td style="font-size:12px; min-width: 100px; overflow-x: auto; font-size:12px;">
                        <?php
                            $end_query = "SELECT remarks FROM marks_old WHERE student = '$student_id' AND subject = '$subject'";
                            $end_result = mysqli_query($con, $end_query);
                            $end_value = mysqli_fetch_assoc($end_result)["remarks"];
                            echo $end_value;
                        ?>
                        </td>
                        <td style="min-width: 100px;">
                        <?php
                            $end_query = "SELECT descriptor FROM marks_old WHERE student = '$student_id' AND subject = '$subject'";
                            $end_result = mysqli_query($con, $end_query);
                            $end_value = mysqli_fetch_assoc($end_result)["descriptor"];
                            echo $end_value;
                        ?>
                        </td>

                        <td style="display:none">
                            <?php

                                $checker = "SELECT * FROM marks_old WHERE student = '$student_id' AND subject = '$subject' ";
                                $result4 = mysqli_query($con, $checker);
                            ?>
                                <?php if($result4->num_rows > 0){ ?>
                                    <a href="<?php echo '?action=edit_marks&id='.$student_id.'&s='.$subject.'&studentid='.$student_id.'' ?>" class="btn btn-danger">
                                        <i class="fa fa-info"></i> &nbsp;Edit Marks
                                    </a>
                                <?php }else{ ?>
                                    <a href="<?php echo '?action=enter_marks&id='.$student_id.'&s='.$subject.'&studentid='.$student_id.'' ?>" class="btn btn-primary">
                                        Enter Marks
                                    </a>
                                <?php } ?>

                            
                            
                        </td>
                    </tr>
                <?php } ?>


            </table>
            </div>
            
            <!-- <button type="submit" name="submit" class="btn btn-primary float-right px-4">SAVE</button> -->
        <!-- </form> -->


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

    <div class="justify-content-center" >
    <center>
    <a href="marks.php"><button class="btn btn-primary mx-auto d-inline">BACK TO SUBJECTS</button></a> OR
    <a href="subjects.php"><button class="btn btn-danger mx-auto d-inline">ENROLL STUDENTS</button></a>
    </center>
    </div>
<?php } ?>




<?php for ($i = 0; $i <= 8; $i++) { ?>
    <br>
<?php } ?>

<!-- Handle actions -->
<?php
    if($_GET){
        $id = $_GET['id'];
        $action = $_GET['action'];

        if($action=='enter_marks'){
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>Are you sure?</h2>
                        <a class="close" href="enter_marks.php">&times;</a>
                        <div class="content">
                            You want to <b ="text-warning">enter</b> marks for student ID ('.substr($id,0,40).') ?
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="enter_student_mark.php?id='.$id.'&s='.$subject.'" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Yes&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="enter_marks.php?s=ENGLISH" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>

                        </div>
                    </center>
            </div>
            </div>
            ';
        }elseif($action=='edit_marks'){
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>Are you sure?</h2>
                        <a class="close" href="enter_marks.php">&times;</a>
                        <div class="content">
                            You want to <b ="text-warning">edit</b> marks for student ID ('.substr($id,0,40).') ?
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="edit_student_mark.php?id='.$id.'&s='.$subject.'" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Yes&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="enter_marks.php?s=ENGLISH" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>

                        </div>
                    </center>
            </div>
            </div>
            ';
        }
    }
?>

<?php include("footer.php") ?>
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
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Student Report Cards</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active">Student Reports</li>
        </ol>
    </div>
</div>

<!-- GETTING STUDENTS  -->
<?php
$result = mysqli_query($con, "SELECT * FROM students");
$n_students = mysqli_num_rows($result);
if ($n_students > 0) { ?>


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
                    <th>STUDENT NAME</th>
                    <th>CLASS</th>
                    <th>STREAM</th>
                    <th>COMBINATION</th>
                    <th>ACTION</th>
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
                        <td style="min-width: 50px;"><?php echo $row["student_id"] ;?></td>
                        <td style="min-width: 300px;"><?php echo $row["first_name"] . " " . $row["last_name"] ?></td>
                        <td style="min-width: 100px;">
                        <?php echo $row["class"] ?>
                        </td>
                        <td style="min-width: 100px;">
                        <?php
                            echo $row["stream"] 
                        ?>
                        </td>
                        <td style="min-width: 100px;">
                        <?php
                            echo $row["combination"]
                        ?>
                        </td>
                        <td>
                            <?php

                                $checker = "SELECT * FROM marks_old WHERE student = '$student_id' AND subject = '$subject' ";
                                $result4 = mysqli_query($con, $checker);

                                $student_id = $row["student_id"];
                                $student_name = $row["first_name"] . " " . $row["last_name"];
                            ?>
                                
                                    <a href="<?php echo 'report_card.php?id='.$student_id.'&name='.$student_name.'' ?>" class="btn btn-primary">
                                        View Report
                                    </a>

                            
                            
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

    <a href="enter_marks.php?s=ENGLISH"><button class="btn btn-primary mx-auto d-flex">BACK TO SUBJECTS</button></a>
<?php } ?>




<?php for ($i = 0; $i <= 8; $i++) { ?>
    <br>
<?php } ?>

<!-- Handle actions -->
<?php
    if($_GET){
        $id = $_GET['id'];
        $action = $_GET['action'];

        if($action=='view_report.php'){
            // header("Location: report")
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
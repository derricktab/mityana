<?php include("header.php");
error_reporting(E_ALL);
ini_set('display_errors', 1)
?>

<script>
    $("#marks").addClass("active-tab");
</script>


<?php

$success = "";
$subject = "";


if ($_GET) {
    // $subject = htmlentities($_GET["s"], ENT_QUOTES, "UTF-8");
    $subject = $_GET['subject'];
    $class = $_GET['class'];

}

// echo $subject;


?>


<!-- BREAD CRUMB-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Enroll Students in <span style="color:red" ><?php echo $subject ?></span></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active">Enroll Students</li>
        </ol>
    </div>
</div>

<!-- GETTING STUDENTS  -->
<?php

$result = mysqli_query($con, "SELECT * FROM students WHERE class = '$class' ");

 $n_students = mysqli_num_rows($result);
 ?>


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
                    <th>STATUS</th>
                    <th>ACTION</th>
                </thead>

                <?php while ($row = mysqli_fetch_array($result)) {

                    $student_id = $row["student_id"];
                    $result2 = mysqli_query($con, "SELECT s.*, so.* FROM students s INNER JOIN subject_offered so ON (s.student_id = so.student) WHERE s.class='$student_id' ") or die(mysqli_error($con));
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
                        <!-- <td> -->
                            <?php

                                $checker = "SELECT so.*
                                FROM subject_offered so
                                INNER JOIN students s ON so.student = s.student_id
                                WHERE s.class = 'S1'
                                AND so.student = '$student_id'
                                AND so.subject = '$subject'";
                                $result4 = mysqli_query($con, $checker);

                                $student_id = $row["student_id"];
                                $student_name = $row["first_name"] . " " . $row["last_name"];

                                $n = mysqli_num_rows($result4);

                                if($n > 0){ ?>

                                    <td class="text-success">
                                        Enrolled
                                    </td>

                                    <td>
                                    <a class="btn btn-danger"  href="<?php echo 'enroll.php?action=unenroll&id='.$student_id.'&name='.$student_name.'' ?>" class="btn btn-primary">
                                        Unenroll
                                    </a>
                                    </td>
                                   

                                    <?php }else{ ?>
                                        <td class="text-warning">
                                            Unenrolled
                                        </td>

                                        <td>
                                        <a href="<?php echo 'enroll.php?action=enroll-2&id='.$student_id.'&name='.$student_name.'&subject='.$subject.'' ?>" class="btn btn-primary">
                                        Enroll
                                    </a>
                                        </td>
                                
                                    

                                    <?php } ?>

                            
                            
                        <!-- </td> -->
                    </tr>
                <?php } ?>


            </table>
            </div>
            
            <!-- <button type="submit" name="submit" class="btn btn-primary float-right px-4">SAVE</button> -->
        <!-- </form> -->


    </div>

    



<?php for ($i = 0; $i <= 8; $i++) { ?>
    <br>
<?php } ?>

<!-- Handle actions -->
<?php
    if($_GET){
        // $id = $_GET['id'];
        $action = $_GET['action'];
        $id = $_GET['id'];
        $name = $_GET['name'];
        $subject = $_GET['subject'];

        if($action=='enroll-2'){
            echo 'op
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>Are you sure?</h2>
                        <a class="close" href="subjects.php">&times;</a>
                        <div class="content">
                        User
                        i have developed a system from vs code on myh machine. now, i want to create a repository on github and start pushing changes in thecode directly from my vs code. help me with git  You want to <b ="text-warning">enroll</b> student ('.substr($name,0,40).') - ID : ('.substr($id, 0, 40).') ?
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="enroll-student.php?id='.$id.'&name='.$name.'&s='.$subject.'" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Yes&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="subjects.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>

                        </div>
                    </center>
            </div>
            </div>
            ';
        }elseif($action=='unenroll'){
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>Are you sure?</h2>
                        <a class="close" href="subjects.php">&times;</a>
                        <div class="content">
                            You want to <b ="text-warning">unenroll</b> student ('.substr($name,0,40).') - ID : ('.substr($id, 0, 40).') ?
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="unenroll-student.php?id='.$id.'&name='.$name.'&s='.$subject.'" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Yes&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="subjects.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>

                        </div>
                    </center>
            </div>
            </div>
            ';
        }
    }
?>

<?php include("footer.php") ?>
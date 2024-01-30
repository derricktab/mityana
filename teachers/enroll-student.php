<?php
include('header.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_GET){
    $id = $_GET['id'];
    $name = $_GET['name'];
    $subject = $_GET['s'];




    $sql = "INSERT INTO subject_offered(student, subject)VALUES('$id', '$subject')";

    

    $ex = mysqli_query($con, $sql);

    if($ex){ error_reporting(E_ALL); ini_set('display_errors', 1); ?>
        <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2 class="text-success" >Success</h2>
                        <a class="close" href="subjects.php">&times;</a>
                        <div class="content">
                            Student ('<?php echo substr($name,0,40) ?>') - ID : ('<?php echo substr($id, 0, 40) ?>') has been enrolled successfully
                            
                        </div>
                        <!-- <div style="display: flex;justify-content: center;">
                        <a href="enroll-student.php?id='.$id.'&name='.$name.'&s='.$subject.'" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Yes&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="subjects.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>

                        </div> -->
                    </center>
            </div>
            </div>
    <?php }else{ ?>
        <div id="popup1" class="overlay">
        <div class="popup">
        <center>
            <h2 class="text-danger" >Error</h2>
            <a class="close" href="subjects.php">&times;</a>
            <div class="content">
                Student ('<?php echo substr($name,0,40) ?>') - ID : ('<?php echo substr($id, 0, 40) ?>') enrollment unsuccessful
                
            </div>
            <!-- <div style="display: flex;justify-content: center;">
            <a href="enroll-student.php?id='.$id.'&name='.$name.'&s='.$subject.'" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Yes&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
            <a href="subjects.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>

            </div> -->
        </center>
</div>
</div>

  <?php  }
}

?>
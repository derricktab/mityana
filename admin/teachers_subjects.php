<?php include "header.php" ?>
<?php 
if(isset($_GET["tid"])){
    $teacher_id = htmlentities($_GET["tid"], ENT_QUOTES, "UTF-8");
    echo $teacher_id;

    $result = mysqli_query($con, "SELECT * FROM teachers WHERE id='$teacher_id'");
}

?>

<div class="container">
    <div class="form">
        <h2 class="text-center mt-5 mb-2 pb-2">ASSIGN SUBJECTS TO TEACHERS.</h2>
        <div class="form-group">
           <select name="teacher" id=""></select>   
        </div>
    </div>
</div>


  
<!-- MAKING THE TAB ACTIVE -->
<script>
    $("#teachers_subjects").addClass("active");
</script>
<?php include "footer.php" ?>
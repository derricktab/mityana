<?php include("header.php") ?>

<script>
    $("#marks").addClass("active-tab");
</script>

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


<div class="container">
    <div class="row">
        <h5 class="center">SELECT SUBJECT</h5>
    </div>
    <?php

    $result = mysqli_query($con, "SELECT * FROM teacher_subject");
    while ($row = mysqli_fetch_array($result)) {
        $subject = $row["subject"];
        $class = $row["class"];
        $teacher = $row["teacher"];

    ?>
    <a style="display:inline-flex; justify-content:space-between; min-width:30%; text-align:left;  margin: 5px 0" href="view_marks.php?s=<?php echo $subject?>" class="btn btn-info"><?php echo $subject." - ".$class . "<span style='min-width:50%' class='btn btn-secondary btn-sm'> - Tr " . strtoupper($teacher) . "</span>"  ?> </a>
<!-- <br> -->
    <?php } ?>


</div>



<?php for($i=0; $i<=10; $i++){ ?> 
<br>
<?php } ?>

<?php include("footer.php") ?>
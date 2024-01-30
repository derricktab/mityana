<?php 

include("header.php");

$id = $_GET['id'];

$st_details = "SELECT * FROM students WHERE student_id ='$id'";
$rest = mysqli_query($con, $st_details);

$row = mysqli_fetch_assoc($rest);

$class = $row['class'];

if($class == "S1" or $class == "S2"){
  // echo "1, 2 " . $class;
  include("new_curriculum_olevel_report.php");
}
elseif($class == "S3" || $class=="S4"){
  // echo "3,4 " . $class;
  include("olevel_report.php");
}
elseif($class == "S5" || $class=="S6"){
  // echo "5 " . $class;
  include("alevel_report.php");
}

include("footer.php");


?>
<?php 

include("header.php");

if($_GET){
  $id = $_GET['id'];
  $class = $_GET['class'];
}else{
  echo "Not get methd";
}

// echo $class;

// if($class == "'S1'"){
//   echo "S1";
// }else{
//   echo "Other";
// }


// $st_details = "SELECT * FROM students WHERE student_id ='$id'";
// $rest = mysqli_query($con, $st_details);

// $row = mysqli_fetch_assoc($rest);

// $class = $row['class'];

// echo $class ;

if($class == "S1" or $class == "S2" or $class == "S3"){
  // echo "1, 2 " . $class;
  include("new_curriculum_olevel_report.php");
}
elseif($class=="S4"){
  // echo "3,4 " . $class;
  include("olevel_report.php");
}
elseif($class == "S5" || $class=="S6"){
  // echo "5 " . $class;
  include("alevel_report.php");
}else{
  echo "Error while generating report card";
}

include("footer.php");


?>
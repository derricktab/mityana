<?php
include("../dbcon.php");
session_start();

$firstname = "";
$lastname = "";
$student_id = "";
$class = "";
$dob = "";
$gender = "";
$nationality = "";
$student_username = "";
$student_image = "";
$password = "";

if(isset($_SESSION["student_username"]) && $_SESSION["student"] == "true"){

  $student_username = $_SESSION["student_username"];

  $result = mysqli_query($con, "SELECT * FROM students WHERE username='$student_username'") or die(mysqli_error($con));
  $row = mysqli_fetch_array($result);

  $firstname = $row["first_name"];
  $lastname = $row["last_name"];
  $student_id = $row["student_id"];
  $class = $row["class"];
  $dob = $row["dob"];
  $gender = $row["gender"];
  $nationality = $row["nationality"];
  $stream = $row["stream"];
  $student_image = $row["image"];
  $home_district = $row["home_district"];
  $date_admitted = $row["date_admitted"];
  $religion = $row["religion"];
  $parent_no = $row["parent"];
  $password = $row["password"];

  // PARENT DETAILS
  $result = mysqli_query($con, "SELECT * FROM parents WHERE parent_no='$parent_no'");
  $row = mysqli_fetch_array($result);

  $parent_name = $row["name"];
  $parent_phone = $row["phone"];
  $parent_email = $row["email"];
  $parent_occupation = $row["occupation"];



}else{

  header("location: ../login.php");

}
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="../assets/logo1.png" rel="icon">
  <title>Student Dashboard - Mityana Standard SS</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/student.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>

</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand align-items-center justify-content-center" href="index.php">
        <div class="student-pic rounded">
          <img src="../admin/<?php echo $student_image ?>">
        </div>
        <!-- DISPLAYING STUDENT NAME -->
        <div class="mx-3 mt-3 std-name font-weight-bold"><?php echo $firstname." ".$lastname ?> </div>
        <!-- DISPLAYING STUDENT ID -->
        <div class="mx-3 mt-1 std-id"><?php echo $student_id ?> </div>
      </a>
      <hr class="sidebar-divider my-0">

      <!-- DASHBOARD
      <li class="nav-item" id="dashboard">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt active"></i>
          <span>Dashboard</span></a>
      </li> -->

      <!-- <hr class="sidebar-divider"> -->
      <div class="sidebar-heading mt-5">
        STUDENT
      </div>

      <!-- PROFILE -->
      <li class="nav-item" id="profile">
        <a class="nav-link collapsed" href="profile.php" 
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-user-md"></i>
          <span>Profile</span>
        </a>

      </li>

      <!-- SUBJECTS -->
      <li class="nav-item" id="subjects">
        <a class="nav-link collapsed" href="subjects.php" 
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-book"></i>
          <span>Subjects Offered</span>
        </a>

      </li>

      <!-- SUBJECTS -->
      <li class="nav-item" id="subjects">
        <a class="nav-link collapsed" href="subjects.php" 
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-book"></i>
          <span>All Subjects</span>
        </a>

      </li>

      <!-- REPORT CARD -->
      <li class="nav-item" id="report_card">
        <a class="nav-link collapsed" href="report_card.php" 
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-address-card"></i>
          <span>Report Card</span>
        </a>

      </li>
     
      <!-- EXAM RESULTS -->
      <li class="nav-item" id="results">
        <a class="nav-link collapsed" href="results.php" 
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Exam Results</span>
        </a>
      </li>


      <li class="nav-item" id="id_card">
        <a class="nav-link" href="student_id.php">
          <i class="fa fa-id-badge"></i>
          <span>ID Card</span>
        </a>
      </li>

      <li class="nav-item" id="change_pw">
        <a class="nav-link" href="change_pw.php">
          <i class="fa fa-key"></i>
          <span>Change Password</span>
        </a>
      </li>

      
      <li class="nav-item">
      <a class="nav-link" href="#" data-toggle="modal"  data-target="#logoutModal" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-power-off fa-fw logout-icon"></i>
        <span>Logout</span>
      </a>
      </li>

   
    </ul>
    <!-- Sidebar -->


    
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-1">
            <i class="fa fa-bars"></i>
          </button>
          <a href="../index.php" class="text-white">
            <i class="fa fa-home"></i>
</a>
          <h5 class="mx-auto my-auto text-white font-weight-bold mityana-text">MITYANA STANDARD SECONDARY SCHOOL - KAGAVU</h5>
        </nav>
        <!-- Topbar -->


    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to logout?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
            <a href="logout.php" class="btn btn-primary">Logout</a>
          </div>
        </div>
      </div>
    </div>
<?php
include("../dbcon.php");
session_start();


if(!isset($_SESSION["admin_username"])){
    header("location: ../401.php");
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
  <title>Admin Dashboard - Mityana Standard SS</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/admin.min.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <!-- <script src="js/html2canvas.js"></script> -->
  <link href="css/style.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js">
</script><script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="../assets/logo1.png">
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item" id="dashboard">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Students
      </div>

      <!-- ADMISSIONS -->
      <li class="nav-item" id="admissions">
        <a class="nav-link collapsed" href="admissions.php" 
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Admissions</span>
        </a>

      </li>
     
      <!-- Subjects -->
      <li class="nav-item" id="subjects">
        <a class="nav-link collapsed" href="subjects.php" 
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-fw fa-book"></i>
          <span>Subjects</span>
        </a>
     
      <!-- STUDENTS -->
      <li class="nav-item" id="students">
        <a class="nav-link collapsed" href="students.php" 
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-fw fa-users"></i>
          <span>Students</span>
        </a>

      </li>

      <!-- STREAMS -->
      <li class="nav-item" id="streams">
        <a class="nav-link collapsed" href="streams.php">
          <i class="fa fa-table fa-fw"></i>
          <span>Streams</span>
        </a>
      </li>

      <!-- CLASSES -->
      <li class="nav-item" id="classes">
        <a class="nav-link collapsed" href="classes.php">
          <i class="fa fa-table fa-fw"></i>
          <span>Classes</span>
        </a>
      </li>

      <!-- Report Cards -->
      <li class="nav-item" id="report_cards">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reportCollapse" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Report Cards</span>
        </a>
        <div id="reportCollapse" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">O-LEVEL</h6>
            <a class="collapse-item" href="report_card.php">S1</a>
            <a class="collapse-item" href="report_card.php">S2</a>
            <a class="collapse-item" href="report_card.php">S3</a>
            <a class="collapse-item" href="report_card.php">S4</a>
          </div>

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">A-LEVEL</h6>
            <a class="collapse-item" href="report_card.php">S5</a>
            <a class="collapse-item" href="report_card.php">S6</a>
          </div>
        </div>

      </li>

      <!-- Exam results -->
      <li class="nav-item" id="exam_results">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#resultsCollapse" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fa fa-fw fa-server"></i>
          <span>Exam Results</span>
        </a>
        <div id="resultsCollapse" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">O-LEVEL</h6>
            <a class="collapse-item" href="#">S1</a>
            <a class="collapse-item" href="#">S2</a>
            <a class="collapse-item" href="#">S3</a>
            <a class="collapse-item" href="#">S4</a>
          </div>

          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">A-LEVEL</h6>
            <a class="collapse-item" href="#">S5</a>
            <a class="collapse-item" href="#">S6</a>
          </div>
        </div>

      </li>
      

      <!-- STUDENT ID CARDS -->
      <li class="nav-item" id="id_cards">
        <a class="nav-link" href="student_id.php">
          <i class="fa fa-fw fa-id-card"></i>
          <span>Student ID Cards</span>
        </a>
      </li>

      <!-- PARENTS-->
      <li class="nav-item" id="parents">
        <a class="nav-link" href="parents.php">
          <i class="fas fa-fw fa-male"></i>
          <span>Parents</span>
        </a>
      </li>


      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        STAFF
      </div>
   
      <!-- TEACHERS -->
      <li class="nav-item" id="teachers">
        <a class="nav-link" href="teachers.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Teachers</span>
        </a>
      </li>
  
      <hr class="sidebar-divider">
    </ul>
    <!-- Sidebar -->


    
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- home button -->
          <a href="../index.php" class="text-white">          
            <i class="fa fa-home"></i>
          </a>
          <h4 class="text-white mx-auto font-weight-bold my-auto mityana-title">MITYANA STANDARD SS - KAGAVU</h4>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?php echo $_SESSION["admin_username"]; ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
        
                <div class="dropdown-divider"></div>
            
              </div>
            </li>

            <li class="nav-item dropdown no-arrow">
                
              <a class="nav-link dropdown-toggle" href="#" data-toggle="modal"  data-target="#logoutModal"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-power-off fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            
          </ul>
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
<?php


error_reporting(E_ALL);
        ini_set('display_errors', 1);
        session_start();
include("../dbcon.php");



if (!isset($_SESSION["admin_username"])) {
  header("location: ../401.php");
}

if($_GET){
  $id = $_GET['id'];
  $class = $_GET['class'];
}else{
  echo "Not get methd";
}



// require './vendor/autoload.php'; // Include Composer autoloader

// $autoloadPath = __DIR__ . '/vendor/autoload.php';

// if (file_exists($autoloadPath)) {
    // require_once $autoloadPath;
    require_once __DIR__ . '/vendor/autoload.php';

// } else {
    // die('Composer autoloader not found. Run "composer install" to install dependencies.');
// }


// use Mpdf\Mpdf;
// use Mpdf\Options;

use Dompdf\Dompdf;
use Dompdf\Options;




// Initialize Dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);

// $mpdf = new Mpdf();

$dompdf = new Dompdf($options);

// require_once __DIR__ . '/vendor/autoload.php';




// HTML content for the table
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/logo1.png" rel="icon">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/admin.min.css" rel="stylesheet">
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/html2canvas.js"></script>
<link href="css/style.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>

.report-card{
  border-radius: 20px !important;
  border-left: 5px solid rgba(111, 9, 9, 0.859);
  border-right: 5px solid rgba(111, 9, 9, 0.859);

}

.report-card-header{
  background: rgba(111, 9, 9, 0.859) ;
  border-top-left-radius: 20px !important;
  border-top-right-radius: 20px !important;
}

.report-card-footer{
  background: rgba(111, 9, 9, 0.859) ;
  border-bottom-left-radius: 20px !important;
  border-bottom-right-radius: 20px !important;
}

.logo img{
  margin: 10px;
  width: 100px;
}

.s-name{
  font-size: 30px !important;
  font-weight: bold;
}

.s-address{
  font-size: 20px !important;
  font-weight: bold;
}

.s-contact{
  font-size: 18px !important;
}

.divide{
  background-color: rgb(216, 216, 32);
  height: 5px;
  width: 100%;
  border-radius: 10px;
}

.s-photo{
  height: 150px !important;
  border-radius: 10px;
}

.h-text{
  font-size: 20px;
}

.t-report{
  font-weight: bold;
  color: black;
}

a:hover{
  text-decoration: none !important;
}

.navbar-nav .active{
  background-color: rgba(111, 9, 9, 0.859) !important;
  border-radius: 5px;
  border-top: 2px solid white;
  border-bottom: 2px solid white;
}

.navbar-nav .active .nav-link:hover{
  background-color: rgba(111, 9, 9, 0.859) !important;
  border-radius: 5px;
}

.navbar-nav .active span, .navbar-nav .active .nav-link i{
  color: white;
}
.sidebar-light .nav-item.active .nav-link i{
  color: white;
}

.mityana-title{
  font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
}

.remarks{
  font-size: 20px;
  margin-top: 60px;
  text-align: left;
}

.scale{
  color: rgb(216, 216, 32);
}

.sidebar-light .nav-item .nav-link:hover{
  background-color: transparent !important;
}

.add-button{
  background-color: rgba(111, 9, 9, 0.859) !important;
  width: 20% !important;
  position: absolute;
  right: 15px;
  top: 50px;
  z-index: 5 !important;
}

.add-button:hover{
  background-color: rgba(73, 5, 5, 0.859) !important;
}

.add-btn-color{
  background-color: rgba(111, 9, 9, 0.859) !important;
  color: white !important;
}

.form-wrapper{
  background-color: rgb(96, 25, 21);
  width: 700px;
  border-radius: 20px;
  padding: 30px;
  margin-top: 130px !important;
  margin-bottom: 130px !important;
  border: 3px solid rgba(111, 9, 9, 0.859) ;
}






</style>
</head>

<body>
<div class="card report-card text-center mt-5 mb-5" id="report_card">
  <div class="card-header report-card-header text-light">
    
  <div class="row">
    <!-- logo -->
    <div class="col-md-2 logo">
      <img src="../assets/logo1.png" alt="School Logo">
    </div>

    <!-- School Details -->
    <div class="col-md-9">
      <div class="row">
        <p class="mx-auto s-name pt-3">MITYANA STANDARD SECONDARY SCHOOL KAGAVU</p>
      </div>
      <div class="row">
        <p class="mx-auto s-address">Address: Plot 333,Kagavu Road. 3KM Off Mityana Road. P.O.BOX 41 Mityana</p>
      </div>
      <div class="row s-contact">
       <p class="mx-auto"><b>Email:</b> info@mityanastandard.ac.ug  |  <b>Tel:</b> 0772852858 / 0753818803 / 0704882951</p> 
      </div>
    </div>

    <hr class="divide mb-0 pb-0">
  </div>

  </div>
  <div class="card-body">';

  
    $student_id = $_GET['id'];
    $class = $_GET['class'];

      $result = mysqli_query($con, "SELECT * FROM marks_old WHERE student='$student_id'");

      $student_details = mysqli_query($con, "SELECT * FROM students WHERE student_id = '$student_id' and class='$class'");
      $row = mysqli_fetch_assoc($student_details);
      $name = $row['first_name'] . " " . $row['last_name'];
      $gender = $row['gender'];
      $st_class = $row['class'];
      $stream = $row['stream'];
      
      
    

    
    
  $html .= '<div class="row mt-4">
    <!-- student image -->
    <div class="col-md-3">';
      if($gender == 'Male') {
      $html .= '<img src="./img/boy.png" class="s-photo">';

      }elseif($gender == 'Female'){ 
        $html .= '<img src="./img/girl.png" class="s-photo">';
      }
    $html .= '</div>

    
    <!-- COL 1 -->
    <div class="col-md-4">
      <div class="row">
        <p class="h-text"><b>Student Name:</b>'; echo $name; $html .= '</p>
      </div>
      <div class="row">
        <p class="h-text"><b>Gender:</b>'; echo $gender; $html .= ' </p>
      </div>
      <div class="row">
        <p class="h-text"><b>Class:</b>'; echo $st_class; $html .= ' </p>
      </div>
      <div class="row">
        <p class="h-text"><b>Stream:</b>';echo $stream ; $html .= '</p>
      </div>
      <div class="row">
        <p class="h-text"><b>Year:</b> '; echo "2023"; $html .= '</p>
      </div>
      <div class="row">
        <p class="h-text"><b>Overall Archievement:</b> '; echo "MODERATE"; $html .='</p>
      </div>
      </div>

    <!-- COL 2 -->
    <div class="col-md-5">
      <div class="row">
        <p class="h-text"><b>Student Number:</b> '; echo $student_id; $html .= '</p>
      </div>
      <div class="table">
        <table class=" table-bordered" >
          <thead>
          <tr>
            <th ><b>Attendance</b> </th>
            <th colspan="3" >Month</th>
            <th >Total</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td></td>
            <td>Jan</td>
            <td>Feb</td>
            <td>Mar</td>
            <td></td>
          </tr>
          <tr>
            <td>Days present</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
          <td>Days absent</td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          </tbody>
        </table>
      </div>
      </div>

  </div>

  <div class="row">
    <h1 class="mx-auto mt-5 mb-5 t-report">O-LEVEL PROGRESS REPORT TERM II</h1>
  </div>

  <div class="table-responsive">
  <table class="table table-bordered report-table">

<thead class="thead-light">
  <tr>
    <!-- <th>CODE</th> -->
    <th>SUBJECT</th>
    <th>COMPETENCY</th>
    <th>SCORE</th>
    <th>DESCRIPTOR</th>
    <th>GENERIC SKILLS</th>
    <th>GENERAL REMARKS</th>
    <th>TEACHER</th>
    <th>SIGNATURE</th>
  </tr>
</thead>

<tbody>';
while($row = mysqli_fetch_array($result)){;
  $html .= '<tr>
    <td>' . $row["subject"] . '</td>
    <td>' . $row["bot"] . '</td>
    <td>' . $row["mid"] . '</td>
    <td>' . $row["end"] . '</td>
    <td>' . (($row["bot"] + $row["mid"] + $row["end"]) / 3) . '</td>
    <td>' . "35" . '</td>
    <td>' . "Fairly Good" . '</td>
    <td>' . "K.D" . '</td>
</tr>';

 } ;

  $html .= '<tr class="font-weight-bold text-dark">
    <td colspan="7" class="text-right">TOTAL: </td>
    <td>24</td>
    <!-- <td colspan="1"></td> -->
  </tr>
  
</tbody>

</table>
  </div>

  <div class="row mx-2">
    <div class="col-md-5">
      <p class="remarks">Class Teachers Remarks ................................................................................................................................................................................................................................................................................................................................................................................................</p>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-5">
      <p class="remarks">Head Teachers Remarks ................................................................................................................................................................................................................................................................................................................................................................................................</p>
    </div>
  </div>
  </div>



  <div class="card-footer report-card-footer text-light">
    <div class="table-responsive">
      <h5 class="mx-auto font-weight-bold my-3 scale">GRADING SCALE</h5>
      <table class="table table-bordered text-white">
        <thead class="thead-light">
          <tr>
            <th>Identifier</th>
            <th>Score Range</th>
            <th>Descriptor</th>
       
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>1</td>
            <td>2.5 - 3.0</td>
            <td class="text-left"><b class="text-success">Outstanding:</b> Most or all Learning Objectives achieved for overall achievement</td>
          </tr>

          <tr>
            <td>2</td>
            <td>1.5 - 2.49</td>
            <td class="text-left"><b class="text-warning"> Moderate: </b>Many Learning Objectives achieved, enough for overall achievement</td>
          </tr>
          <tr>
            <td>3</td>
            <td>0.9 - 1.49</td>
            <td class="text-left"><b class="text-info">Basic: </b>Few Learning Objectives achieved, but not sufficient for overall achievement</td>
          </tr>
        </tbody>
      </table>
    </div>
    <p class="mt-4">This Report Card Is Not Valid Without A Valid Stamp</p>
  </div>
</div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

';
// Close the HTML content
$html .= '</tbody></table></div></body></html>';

// Load HTML content into Dompdf
$dompdf->loadHtml($html);

// Set paper size (optional)
$dompdf->setPaper('A4', 'portrait');

// Render PDF (first pass to get total pages)
$dompdf->render();

// Output to browser (force download)
$dompdf->stream($id . '.' . $class . 'report-card.pdf', array('Attachment' => 1));

// $mpdf->WriteHTML($html);
// $mpdf->SetPageSize('A4', 'portrait');
// $mpdf->Output($id . '.' . $class . 'report-card.pdf', 'D');



?>

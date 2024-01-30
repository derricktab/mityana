<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<div class="container-fluid mr-5 ">
<h1 class="text-center">NEW CURRICULUM O-LEVEL REPORT CARD</h1>

<!-- REPORT CARD -->
<div class="card report-card text-center mt-5 mb-5" id="report_card">
  <div class="card-header report-card-header text-light">
    
  <div class="row">
    <!-- logo -->
    <div class="col-md-2 logo">
      <img src="../assets/logo1.png" alt="School Logo">
    </div>

    <!-- School Details -->
    <div id="details" class="col-md-9">
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
  <div class="card-body">

  <?php
    $student_id = $_GET['id'];
    $class = $_GET['class'];

      $result = mysqli_query($con, "SELECT * FROM marks_old WHERE student='$student_id'");

      $student_details = mysqli_query($con, "SELECT * FROM students WHERE student_id = '$student_id' and class='$class'");
      $row = mysqli_fetch_assoc($student_details);
      $name = $row['first_name'] . " " . $row['last_name'];
      $gender = $row['gender'];
      $st_class = $row['class'];
      $stream = $row['stream'];
      
      
    ?>

    
    
  <div class="row mt-4">
    <!-- student image -->
    <!-- <div class="col-md-3">
      <?php if($gender == 'Male') { ?>
      <img src="./img/boy.png" class="s-photo">

      <?php }elseif($gender == 'Female'){ ?>
        <img src="./img/girl.png" class="s-photo">
      <?php } ?>
    </div> -->

    
    <!-- COL 1 -->
    <div class="col-md-6">
      <div class="row">
        <p class="h-text"><b>Student Name:</b> <?php echo $name ?></p>
      </div>
      <div class="row">
        <p class="h-text"><b>Gender:</b> <?php echo $gender ?> </p>
      </div>
      <div class="row">
        <p class="h-text"><b>Class:</b> <?php echo $st_class ?> </p>
      </div>
      <div class="row">
        <p class="h-text"><b>Stream:</b> <?php echo $stream ?> </p>
      </div>
      <div class="row">
        <p class="h-text"><b>Year:</b> <?php echo "2023" ?> </p>
      </div>
      <div class="row">
        <p class="h-text"><b>Overall Archievement:</b> <?php echo "MODERATE" ?> </p>
      </div>
      </div>

    <!-- COL 2 -->
    <div class="col-md-6">
      <div class="row">
        <p class="h-text"><b>Student Number:</b> <?php echo $student_id ?> </p>
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

<tbody>
<?php while($row = mysqli_fetch_array($result)){  ?>
  <tr>
    <td><?php echo $row["subject"] ?> </td>
    <td><?php echo $row["competency"] ?> </td>
    <td><?php echo ($row["bot"] + $row["mid"] + $row["end"])/3 ?> </td>
    <td><?php echo $row["descriptor"] ?> </td>
    <td><?php echo $row['skills'] ?> </td>
    <td><?php echo $row['remarks'] ?> </td>
    <td><?php echo $row['teacher'] ?> </td>
    
  </tr>
<?php } ?>

  <tr class="font-weight-bold text-dark">
    <td colspan="7" class="text-right">TOTAL POINTS: </td>
    <td></td>
    <!-- <td colspan="1"></td> -->
  </tr>
  
</tbody>

</table>
  </div>

  <div class="row mx-2">
    <div class="col-md-5">
      <p class="remarks">Class Teacher's Remarks ................................................................................................................................................................................................................................................................................................................................................................................................</p>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-5">
      <p class="remarks">Head Teacher's Remarks ................................................................................................................................................................................................................................................................................................................................................................................................</p>
    </div>
  </div>
  </div>



  <div class="card-footer report-card-footer text-light">
    <div class="table-responsive">
      <h5 class="mx-auto font-weight-bold my-3 scale">GRADING SCALE</h5>
      <table  class="table table-bordered text-green">
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

<button onclick="printSection('report_card')" class="btn btn-success mt-2 mb-5" >PRINT REPORT</button>
<!-- <button onclick="getPDF()" >print</button> -->
</div>

<!-- MAKING THE TAB ACTIVE -->
<script>
    $("#report_card").addClass("active-tab");

    

    // function printSection(el){
    //     var getFullContent = document.body.innerHTML;
    //     var printsection = document.getElementById(el).innerHTML;
    //     document.body.innerHTML = printsection;
    //     window.print();
    //     document.body.innerHTML = getFullContent;
    // }

    // <script>
    function printSection(el) {
        var printsection = document.getElementById(el).innerHTML;
        document.body.innerHTML = printsection;
        window.print();
        document.body.innerHTML = getFullContent;
    }


  // function getPDF () {
  //       return html2canvas($('#report_card'), {
  //           background: "#000",
  //           onrendered: function(canvas) {
  //               var myImage = canvas.toDataURL("image/jpeg,1.0");
  //               // Adjust width and height
  //               // var imgWidth =  (canvas.width * 60) / 240;
  //               // var imgHeight = (canvas.height * 70) / 240;
  //               // jspdf changes
  //               var pdf = new jsPDF('p', 'mm', 'a4');
  //               pdf.addImage(myImage, 'png', 20, 9); // 2: 19
  //               pdf.save(`StudentReportCard ${$('.pdf-title').text()}.pdf`);
  //           }
  //       });
  //   }


</script>


<?php include("header.php") ?>

<div class="container-fluid mr-5 ">
<h1>REPORT CARD</h1>

<!-- REPORT CARD -->
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
  <div class="card-body">
    
  <div class="row mt-4">
    <!-- student image -->
    <div class="col-md-3">
      <img src="../assets/placeholder.jpg" alt="Placeholder" class="s-photo">
    </div>

    <?php
      $result = mysqli_query($con, "SELECT * FROM marks_old WHERE student='20220001'");

    ?>
    <!-- COL 1 -->
    <div class="col-md-4">
      <div class="row">
        <p class="h-text"><b>Student Name:</b> Derrick Zziwa</p>
      </div>
      <div class="row">
        <p class="h-text"><b>Gender:</b> Male</p>
      </div>
      <div class="row">
        <p class="h-text"><b>Class:</b> S4</p>
      </div>
      <div class="row">
        <p class="h-text"><b>Stream:</b> West</p>
      </div>
      </div>

    <!-- COL 2 -->
    <div class="col-md-5">
      <div class="row">
        <p class="h-text"><b>Student Number:</b> 20220001</p>
      </div>
      <div class="row">
        <p class="h-text"><b>Year:</b> 2022</p>
      </div>
      <div class="row">
        <p class="h-text"><b>Term:</b> II</p>
      </div>
      <div class="row">
        <p class="h-text"><b>Agg. In Best 8:</b> 18</p>
      </div>
      <div class="row">
        <p class="h-text"><b>Division:</b> 1</p>
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
          <th>BOT(%)</th>
          <th>MID(%)</th>
          <th>END(%)</th>
          <th>AV(%)</th>
          <th>AGG.</th>
          <th>REMARK</th>
          <th>Initials</th>
        </tr>
      </thead>

      <tbody>
    <?php while($row = mysqli_fetch_array($result)){  ?>
        <tr>
          <td><?php echo $row["subject"] ?> </td>
          <td><?php echo $row["bot"] ?> </td>
          <td><?php echo $row["mid"] ?> </td>
          <td><?php echo $row["end"] ?> </td>
          <td><?php echo "68" ?> </td>
          <td><?php echo "35" ?> </td>
          <td><?php echo "Fairly Good" ?> </td>
          <td><?php echo "K.D" ?> </td>
          
        </tr>
<?php } ?>

        <tr class="font-weight-bold text-dark">
          <td colspan="6" class="text-right">TOTAL: </td>
          <td>24</td>
          <td colspan="2"></td>
        </tr>
        
      </tbody>

    </table>
  </div>

  <div class="row mx-2">
    <div class="col-md-5">
      <p class="remarks">Class Teacher's Remarks ................................................................................................................................................................................................................................................................................................................................................................................................</p>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-5">
      <p class="remarks">Head Teacher's Remarks ................................................................................................................................................................................................................................................................................................................................................................................................</p>
    </div>
  </div>
  </div>



  <div class="card-footer report-card-footer text-light">
    <div class="table-responsive">
      <h5 class="mx-auto font-weight-bold my-3 scale">GRADING SCALE</h5>
      <table class="table table-bordered text-white">
        <thead>
          <tr>
            <th>D1</th>
            <th>D2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
            <th>C6</th>
            <th>P7</th>
            <th>P8</th>
            <th>F9</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>80-100</td>
            <td>75-79</td>
            <td>65-74</td>
            <td>60-64</td>
            <td>55-59</td>
            <td>50-54</td>
            <td>45-49</td>
            <td>40-44</td>
            <td>0-39</td>
          </tr>
        </tbody>
      </table>
    </div>
    <p class="mt-3">This Report Card Is Not Valid Without A Valid Stamp</p>
  </div>
</div>

<button onclick="printSection('report_card')" class="btn btn-success mt-2 mb-5" >PRINT REPORT</button>

</div>

<!-- MAKING THE TAB ACTIVE -->
<script>
    $("#report_cards").addClass("active");

    function printSection(el){
        var getFullContent = document.body.innerHTML;
        var printsection = document.getElementById(el).innerHTML;
        document.body.innerHTML = printsection;
        window.print();
        document.body.innerHTML = getFullContent;
    }

  function getPDF () {
        return html2canvas($('#report_card'), {
            background: "#ffffff",
            onrendered: function(canvas) {
                var myImage = canvas.toDataURL("image/jpeg,1.0");
                // Adjust width and height
                // var imgWidth =  (canvas.width * 60) / 240;
                // var imgHeight = (canvas.height * 70) / 240;
                // jspdf changes
                var pdf = new jsPDF('p', 'mm', 'a4');
                pdf.addImage(myImage, 'png', 20, 9); // 2: 19
                pdf.save(`Budgeting ${$('.pdf-title').text()}.pdf`);
            }
        });
    }


</script>

<?php include("footer.php") ?>
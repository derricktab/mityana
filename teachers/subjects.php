<?php include("header.php") ?>

<script>
    $("#subjects").addClass("active-tab");
</script>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 font-weight-bold">My Subjects</h1>

    


    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active">Subjects</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row"> 
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        
       
      <!-- TABLE FOR SUBJECTS OFFERED BY STUDENT -->
        <div class="table-responsive p-3">
          <!-- Filter Form -->
    <form method="GET" action="">
      <div class="style='display:flex' ">
        <label for="filterClass">Filter by Class:</label>
        <select class="form-control" id="filterClass" name="filterClass">
          <option value="">All Classes</option>
          <!-- Add options for classes dynamically if needed -->
          <option value="S1">S.1</option>
          <option value="S2">S.2</option>
          <option value="S3">S.3</option>
          <option value="S4">S.4</option>
          <option value="S5">S.5</option>
          <option value="S6">S.6</option>
          <!-- Add more options as needed -->
        </select>
        <button type="submit" class="btn btn-primary">Filter</button>
      </div>
      
    </form>
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>ID</th>
                <th>Class</th>
                <th>Subject Name</th>
                <th>Subject Code</th>
                <th>No Of Enrolled Students</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php 

$result = mysqli_query($con, "SELECT * FROM teacher_subject WHERE teacher='$teacher_username'");


              if($_GET){
                $action = $_GET['action'];
                $subject = $_GET['subject'];

                // Check if a class filter has been set
                $classFilter = isset($_GET['filterClass']) ? $_GET['filterClass'] : '';

                // Fetch data based on the class filter
                if ($classFilter !== '') {
                  $result = mysqli_query($con, "SELECT * FROM teacher_subject WHERE teacher='$teacher_username' AND class='$classFilter'");
                } else {
                  $result = mysqli_query($con, "SELECT * FROM teacher_subject WHERE teacher='$teacher_username'");
                }
              }

              
              while($row = mysqli_fetch_array($result)){
                $subject = $row["subject"];

                $result1 = mysqli_query($con, "SELECT * FROM subject_offered WHERE subject = '$subject'");

                $no_of_students = mysqli_num_rows($result1);
              ?>
              <tr>
                <td> <?php echo $row["id"] ?> </td>
                <td> <?php echo $class = $row['class']; $row["class"] ?> </td>
                <td> <?php echo $row["subject"] ?> </td>
                <?php
                $code = mysqli_query($con, "SELECT * FROM subjects WHERE name = '$subject'"); 
                $row1 = mysqli_fetch_array($code);
                $subject_code = $row1["code"]
                ?>
                <td><?php echo $subject_code; ?></td>
                <td> <?php echo $no_of_students ?> </td>
                <td>
                <a href="enroll.php?action=enroll&subject=<?php echo $subject ?>&class=<?php echo $row["class"] ?>&code=<?php echo $subject_code ?>  " class="btn btn-danger h5 font-weight-bold" >Manage enrollment</a>
                <?php if($no_of_students > 0){ ?>
                <a href="<?php  echo "?action=view_students&subject=$subject&code=$subject_code " ?>" class="btn btn-primary h5 font-weight-bold" >View Students</a>
                <?php } ?>
                </td>

              </tr>
              <?php } ?>

            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
  <!--Row-->

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
          <a href="login.html" class="btn btn-primary">Logout</a>
        </div>
      </div>
    </div>
  </div>

</div>
<!---Container Fluid-->
</div>

        

<?php

if($_GET){
  $action = $_GET['action'];
  $subject = $_GET['subject'];
  if($action == 'enroll'){
    echo "Enroll";
  }elseif($action == 'unenroll'){
    echo "Unenroll";
  }elseif($action== 'view_students'){
    $result1 = mysqli_query($con, "SELECT * FROM subject_offered WHERE subject = '$subject'");

    $id = $row['id'];
    $studentid = $row['student'];

    $result3 = mysqli_query($con, "SELECT * FROM students WHERE student_id = '$id'");
        $row2 = mysqli_fetch_array($result3);
    
    echo '
    <div class="table-responsive p-3">
    <h3>Students enrolled in '.$subject.'</h3>
    <table style="" class="table" ">
    <thead class="thead-light">
      <tr>
        <th>ID</th>
        <th>Sudent ID</th>
        <th>Sudent ID</th>
        <th>Class</th>
        <th>Stream</th>
        <th>Subject</th>
      </tr>
    </thead>

    <tbody>
    ';

      $result2 = mysqli_query($con, "SELECT * FROM subject_offered WHERE subject = '$subject'");
      $result3 = mysqli_query($con, "SELECT * FROM subject_offered WHERE subject = '$subject'");

      
      while($row = mysqli_fetch_array($result2)){
        $subject = $row["subject"];
        $id = $row["student"];

        $result3 = mysqli_query($con, "SELECT * FROM students WHERE student_id = '$id'");
        $row2 = mysqli_fetch_array($result3);

        $name = $row2['first_name'] . " " . $row2['last_name'];


      echo '
      <tr>
        <td> '.$row["id"].' </td>
        <td> '.$row["student"].'  </td>
        <td> '.$name.'  </td>
        <td> '.$row2['class'].'  </td>
        <td> '.$row2['stream'].'  </td>
        <td> '.$row["subject"].'  </td>
        
      </tr>
      ';

       } 

    echo '
    </tbody>

    </table>
    </div>
    ';
    
    
  }else{
    echo "Unknown action";
  }
}

?>


<?php include("footer.php") ?>


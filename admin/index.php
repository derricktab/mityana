
<!-- Including the header -->
<?php include("header.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
 ?>

  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </div>
<?php
$result = mysqli_query($con, "SELECT * FROM students");
$n_students = mysqli_num_rows($result);


?>
    <div class="row mb-3">
      <!-- Total Numbr Of Students-->
      <div class="col-xl-3 col-md-6 mb-4">
        <a href="students.php">
          <div class="card h-100">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">Total Number Of Students</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $n_students ?></div>
                  <div class="mt-2 mb-0 text-muted text-xs">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span>Since last month</span>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-user fa-2x text-primary"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <?php
      $result = mysqli_query($con, "SELECT * FROM teachers");
      $n_staff = mysqli_num_rows($result);
      ?>
      <!-- Total Number Of Teachers -->
      <div class="col-xl-3 col-md-6 mb-4">
        <a href="teachers.php">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Number Of Teachers</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $n_staff ?> </div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                  <span>Since last years</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </div>
        </a>
      </div>

      <?php
      $result = mysqli_query($con, "SELECT * FROM subjects");
      $n_subjects = mysqli_num_rows($result);
      ?>

      <!-- Number of subjects offered -->
      <div class="col-xl-3 col-md-6 mb-4">
        <a href="subjects.php">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">TOTAL NUMBER OF SUBJECTS</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $n_subjects ?> </div>
                <div class="mt-2 mb-0 text-muted text-xs">
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-info"></i>
              </div>
            </div>
          </div>
        </div>
        </a>
      </div>

      <?php
        $result = mysqli_query($con, "SELECT * FROM admissions");
        $n_admissions = mysqli_num_rows($result);
      ?>
      <!-- Pending Admission Requests -->
      <div class="col-xl-3 col-md-6 mb-4">
        <a href="admissions.php">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Pending Admission Requests</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $n_admissions ?></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                  <span>Since yesterday</span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-list-ol fa-2x text-warning"></i>
              </div>
            </div>
          </div>
        </div>
        </a>
      </div>

      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Student Admissions</h6>
            <!-- <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div> -->
          </div>
          <div class="card-body">
            <div class="chart-area">
              <canvas id="myAreaChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <?php
      
      // number of s1 students
      $result = mysqli_query($con, "SELECT * FROM students WHERE class='S1'");
      $n_s1 = mysqli_num_rows($result);

      // number of S2 students
      $result = mysqli_query($con, "SELECT * FROM students WHERE class='S2'");
      $n_s2 = mysqli_num_rows($result);

      // number of S3 students
      $result = mysqli_query($con, "SELECT * FROM students WHERE class='S3'");
      $n_s3 = mysqli_num_rows($result);

      // number of s4 students
      $result = mysqli_query($con, "SELECT * FROM students WHERE class='S4'");
      $n_s4 = mysqli_num_rows($result);

      // number of s5 students
      $result = mysqli_query($con, "SELECT * FROM students WHERE class='S5'");
      $n_s5 = mysqli_num_rows($result);

      // number of s6 students
      $result = mysqli_query($con, "SELECT * FROM students WHERE class='S6'");
      $n_s6 = mysqli_num_rows($result);


      ?>
      <!-- STUDENTS PER CLASS -->
      <div class="col-xl-4 col-lg-5">
        <div class="card mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">No Of Students Per Class</h6>
          </div>
          <div class="card-body">
            <!-- S1 -->
            <div class="mb-3">
              <div class="small text-gray-500">
                S1
                <div class="small float-right"><b> <?php echo $n_s1 ?> </b></div>
              </div>
              <div class="progress" style="height: 12px;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="80"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <!-- S2 -->
            <div class="mb-3">
              <div class="small text-gray-500">S2
                <div class="small float-right"><b> <?php echo $n_s2 ?> </b></div>
              </div>
              <div class="progress" style="height: 12px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <!-- S3 -->
            <div class="mb-3">
              <div class="small text-gray-500">S3
                <div class="small float-right"><b> <?php echo $n_s3 ?> </b></div>
              </div>
              <div class="progress" style="height: 12px;">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 55%" aria-valuenow="55"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <!-- S4 -->
            <div class="mb-3">
              <div class="small text-gray-500">S4
                <div class="small float-right"><b> <?php echo $n_s4 ?> </b></div>
              </div>
              <div class="progress" style="height: 12px;">
                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <!-- S5 -->
            <div class="mb-3">
              <div class="small text-gray-500">S5
                <div class="small float-right"><b> <?php echo $n_s5 ?> </b></div>
              </div>
              <div class="progress" style="height: 12px;">
                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <!-- S6 -->
            <div class="mb-3">
              <div class="small text-gray-500">S6
                <div class="small float-right"><b> <?php echo $n_s6 ?> </b></div>
              </div>
              <div class="progress" style="height: 12px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
          <div class="card-footer text-center">
            <a class="m-0 small text-primary card-link" href="students.php">View More <i
                class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </div>
   
    </div>
    <!--Row-->



  </div>
  <!---Container Fluid-->
</div>

<!-- MAKING THE TAB ACTIVE -->
<script>
    $("#dashboard").addClass("active");
</script>

<?php include("footer.php") ?>
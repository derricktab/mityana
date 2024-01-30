<?php include("header.php") ?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$success = "";
$query = "";

if(isset($_GET["class"])){
  $class = htmlentities($_GET["class"], ENT_QUOTES, "UTF-8");
  $class = 'S' . $class;

  $query = "SELECT * FROM students WHERE promotion_status IN(2,3,4,5,6)";

}else{
  $query = "SELECT * FROM students WHERE promotion_status IN(2,3,4,5,6)";
}

?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Promoted Students</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active">Promoted Students</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row"> 
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Promoted Students</h6>
        </div>
            <!-- DISPLAYING THE SUCCESS MESSAGE -->
        <?php if($success == "true") { ?>
        <div class="container a-alert">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>SUCCESS!</strong> &nbsp; Student Promoted Successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>

        <!-- ERROR MESSAGE -->
        <?php } elseif($success == "false") { ?>
            <div class="container a-alert">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>ERROR!</strong> &nbsp; Something Went Wrong.........Please Try Again Later
            <?php echo mysqli_error($con); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>
        <?php } ?>


        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>Student ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Class</th>
                <th>Status</th>
                <!-- <th>Action</th> -->
              </tr>
            </thead>

            <tbody>
              <?php 

              $result = mysqli_query($con, $query);
              while($row = mysqli_fetch_array($result)){
              ?>
              <tr>
                <td> <?php echo $row["student_id"] ?> </td>
                <td> <?php echo $row["first_name"] ?> </td>
                <td> <?php echo $row["last_name"] ?> </td>
                <td> <?php echo $row["class"] ?> </td>
                <td>
<?php

$promotion_status = $row['promotion_status'];

if($promotion_status == '0'){
    echo 'Not Promoted';
}elseif($promotion_status == 2){
    echo 'Promoted to S2';
}elseif($promotion_status == 3){
  echo 'Promoted to S3';
}elseif($promotion_status == 4){
  echo 'Promoted to S4';
}elseif($promotion_status == 5){
  echo 'Promoted to S5';
}elseif($promotion_status == 6){
  echo 'Promoted to S6';
}else{
    echo 'NULL';
}

?>

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

<!-- Footer -->
<footer class="sticky-footer bg-white">
<div class="container my-auto">
  <div class="copyright text-center my-auto">
    <span>Copyright &copy; <script> document.write(new Date().getFullYear()); </script> - Mityana Standard SS Kagavu. All Rights Reserved
    </span>
  </div>
</div>
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<?php

if($_GET){
    $action = $_GET['action'];
    $id = $_GET['id'];
    $current_class = $_GET['class'];

    if($action == 'promote'){
        $current_class = + 1;
        $current_class = 'S' . $current_class;

        $sql = "UPDATE students SET class = '$current_class', promotion_status = 1 WHERE student_id = '$id' ";
        $execute = mysqli_query($con, $sql);

        if($execute){
            $success = 'true';
        }else{
            $success = 'false';
        }
        
    }
}else{
    echo "Not get method";
}

?>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/ruang-admin.min.js"></script>
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script>
$(document).ready(function () {
$('#dataTable').DataTable(); // ID From dataTable 
$('#dataTableHover').DataTable(); // ID From dataTable with Hover
});
</script>

<script>
    $("#students").addClass("active-tab");
</script>

</body>

</html>
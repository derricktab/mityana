<?php include("header.php") ?>

<?php
$success = "";
$query = "";
$class = "";

$class = $_GET['class'];

$query = "SELECT * FROM students WHERE class='$class'";

if($_GET){
    $class = $_GET['class'];
    $class = "S".$class;

    $query = "SELECT * FROM students WHERE class = '$class'";
}else{
    $query = "SELECT * FROM students";
}


?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 text-uppercase"><?php echo $class ?> Students Report Cards</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active">Students</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row"> 
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Date Admitted</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php 

              $sql = "SELECT * FROM students";
              $result = mysqli_query($con, $query);
              while($row = mysqli_fetch_array($result)){
              ?>
              <tr>
                <td> <?php echo $row["student_id"] ?> </td>
                <td> <?php echo $row["first_name"] . " " . $row["last_name"] ?> </td>
                <td> <?php echo $row["gender"] ?> </td>
                <td> <?php echo $row["date_admitted"] ?> </td>
                <?php $s_id = $row['student_id']; ?>
                <td>
                  <a href="<?php echo "report_card.php?class=$class&id=$s_id " ?>" class="btn btn-info"><i class="fa fa-info"></i>&nbsp View</a>
                  
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

    // if($_GET){
    //     $action = $_GET['action'];
    //     $class = $_GET['class'];

    //     if($action == 'view'){
    //         header('Location: report_card.php');
    //     }

    // }
?>


<!-- MAKING THE TAB ACTIVE -->
<script>
    $("#students").addClass("active");
</script>

<?php include("footer.php") ?>

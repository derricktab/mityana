<?php include("header.php") ?>

<?php
$success = "";
$query = "";


?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Parents</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active">Parents</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row"> 
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
  

        <a href="add_parent.php" class="btn btn-primary add-button">ADD PARENT</a>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>Parent Number</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Occupation</th>       
                <th>Action</th>       
              </tr>
            </thead>

            <tbody>
              <?php 

              $query = "SELECT * FROM parents";
              $result = mysqli_query($con, $query);
              while($row = mysqli_fetch_array($result)){
              ?>
              <tr>
                <td> <?php echo $row["parent_no"] ?> </td>
                <td> <?php echo $row["name"] ?> </td>
                <td> <?php echo $row["phone"] ?> </td>
                <td> <?php echo $row["email"] ?> </td>
                <td> <?php echo $row["occupation"] ?> </td>
                
                <td>
                  <button class="btn btn-warning">Update</button>
                  <button class="btn btn-danger">Delete</button>
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


<script>
    // $("#parents").removeClass("btn-outline-danger");
    $("#parents").addClass("active");
</script>

<?php include("footer.php") ?>
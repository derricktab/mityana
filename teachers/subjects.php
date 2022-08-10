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
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>ID</th>
                <th>Subject Name</th>
                <th>No Of Students</th>
              </tr>
            </thead>

            <tbody>
              <?php 

              $result = mysqli_query($con, "SELECT * FROM teacher_subject WHERE teacher='$teacher_username'");
              while($row = mysqli_fetch_array($result)){
                $subject = $row["subject"];

                $result1 = mysqli_query($con, "SELECT * FROM subject_offered WHERE subject = '$subject'");

                $no_of_students = mysqli_num_rows($result1);
              ?>
              <tr>
                <td> <?php echo $row["id"] ?> </td>
                <td> <?php echo $row["subject"] ?> </td>
                <td> <?php echo $no_of_students ?> </td>

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



<?php include("footer.php") ?>


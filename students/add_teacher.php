<?php include("header.php") ?>


<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Admissions</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active">Admissions</li>
    </ol>
  </div>

  <!-- Row -->
  <div class="row"> 
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Admissions</h6>
        </div>
            <!-- DISPLAYING THE SUCCESS MESSAGE -->
        <?php if($success == "true") { ?>
        <div class="container a-alert">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>SUCCESS!</strong> &nbsp; Admission Approved Successfully.
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

            <!-- REJECTION MESSAGE -->
            <?php if($rejected == "true") { ?>
        <div class="container a-alert">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>REJECTED!</strong> &nbsp; Admission Application has been rejected.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>
        <?php } ?>

        <div class="form">
            <form action="add_teacher.php" method="post">
                <input type="text">
            </form>
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
<?php include("footer.php") ?>
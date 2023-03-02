<?php include("header.php") ?>

<?php
$deleted = "";
$query = "";


?>

<?php
// DELETE A PARENT
if (isset($_POST["delete"])) {

  $parent_no = htmlentities($_POST["parent_no"], ENT_QUOTES, "UTF-8");

  // DELETING THE SUBJECT FROM DATABASE
  $deleted = mysqli_query($con, "DELETE FROM parents WHERE parent_no='$parent_no'") or die(mysqli_error($con));

  if ($deleted) {
    $deleted = "true";
  } else {
    echo (mysqli_error($con));
  }


}

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
 <!-- DISPLAYING THE SUCCESS MESSAGE -->
 <?php if($deleted == "true") { ?>
    <div class="container a-alert">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> &nbsp; Parent Deleted Succesfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    </div>
    <?php } ?>

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
              while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                  <td>
                    <?php echo $row["parent_no"] ?>
                  </td>
                  <td>
                    <?php echo $row["name"] ?>
                  </td>
                  <td>
                    <?php echo $row["phone"] ?>
                  </td>
                  <td>
                    <?php echo $row["email"] ?>
                  </td>
                  <td>
                    <?php echo $row["occupation"] ?>
                  </td>

                  <td>
                    <button class="btn btn-warning">Update</button>
                    <a href="#deleteModal" class="open-modal my-1" data-toggle="modal"
                      data-target="#deleteModal" data-id="<?php echo $row['parent_no'] ?>">
                      <button class="btn btn-danger">Delete</button>

                    </a>
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


  <!-- CONFIRM DELETE MODAL -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabelLogout">Warning!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to Delete?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
          <form action="parents.php" method="post">
            <input name="parent_no" type="hidden" id="parent_no" value="">
            <button class="btn btn-danger" type="submit" name="delete">Delete</button>

          </form>
        </div>
      </div>
    </div>
  </div>

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

<script>
    $(document).on("click", ".open-modal", function () {
     var parent_no = $(this).data('id');
     $("#parent_no").val( parent_no );
    });

</script>

<?php include("footer.php") ?>
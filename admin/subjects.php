<?php include("header.php") ?>
<?php

$deleted = "";
$subject_id = "";

// DELETE SUBJECT
if(isset($_POST["delete"])){

  $id = htmlentities($_POST["id"], ENT_QUOTES, "UTF-8");
  echo $id;

  // DELETING THE SUBJECT FROM DATABASE
   $deleted = mysqli_query($con, "DELETE FROM subjects WHERE id='$id'") or die(mysqli_error($con));

   if($deleted){
     $deleted = "true";
   }

 
}

?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Subjects</h1>
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
    
            <!-- DISPLAYING THE SUCCESS MESSAGE IF DELETED -->
        <?php if($deleted == "true") { ?>
        <div class="container a-alert">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>DELETED!</strong> &nbsp; Subject Has been Deleted Successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>

        <!-- ERROR MESSAGE -->
        <?php } ?>


        <a href="add_subject.php" class="btn btn-primary add-button">ADD SUBJECT</a>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>ID</th>
                <th>Subject Name</th>
                <th>Code</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php 

              $result = mysqli_query($con, "SELECT * FROM subjects");
              while($row = mysqli_fetch_array($result)){
                $subject_id = $row["id"];
              ?>
              <tr>
                <td> <?php echo $row["id"] ?> </td>
                <td> <?php echo $row["name"] ?> </td>
                <td> <?php echo $row["code"] ?> </td>

                <!-- approved button -->
                <td> 
                  <div class="row">
                    <!-- EDIT -->
                    <div class="col-md-3 col-6">
                      <form action="edit_subject.php" method="post">
                        <input name="id" type="hidden" value="<?php echo $row["id"] ?>">
                        <button class="btn btn-warning" type="submit" name="edit">Edit</button>

                      </form>

                    </div>

                    <!-- DELETE -->
                    <div class="col-md-3 col-6 ml-0 pl-0">
                        <button class="btn btn-danger open-modal" data-toggle="modal"  data-target="#deleteModal" data-id="<?php echo $row['id'] ?>" >Delete</button>


                        
                    </div>

                  </div>

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
          <form action="subjects.php" method="post">
            <input name="id" type="hidden" id="subject_id" value="">
            <button class="btn btn-danger" type="submit" name="delete">Delete</button>

          </form>
        </div>
      </div>
    </div>
  </div>
  

</div>
<!---Container Fluid-->
</div>

<!-- MAKING THE TAB ACTIVE -->
<script>
    $("#subjects").addClass("active");

    $(document).on("click", ".open-modal", function () {
     var myId = $(this).data('id');
     $("#subject_id").val( myId );
});
</script>

<?php include("footer.php") ?>


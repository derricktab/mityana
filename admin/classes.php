<?php include("header.php") ?>
<?php

$deleted = "";
$class_id = "";

// DELETE SUBJECT
if(isset($_POST["delete"])){

  $id = htmlentities($_POST["id"], ENT_QUOTES, "UTF-8");
  echo $id;

  // DELETING THE CLASS FROM DATABASE
   $deleted = mysqli_query($con, "DELETE FROM class_and_stream WHERE id='$id'") or die(mysqli_error($con));

   if($deleted){
     $deleted = "true";
   }
}

?>
<!-- BRAEDCRUMB-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">CLASSES AND STREAMS</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active">CLASSES</li>
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
            <strong>DELETED!</strong> &nbsp; Class Has been Deleted Successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        </div>

        <!-- ERROR MESSAGE -->
        <?php } ?>

        
        <!-- ADD CLASS BUTTON -->
        <a href="add_class.php" class="btn btn-primary add-button">ADD STREAM TO A CLASS</a>

        <!-- TABLE -->
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>ID</th>
                <th>CLASS</th>
                <th>STREAM</th>
                <th>ACTIONS</th>
              </tr>
            </thead>

            <tbody>
              <?php 

              $result = mysqli_query($con, "SELECT * FROM class_and_stream");
              while($row = mysqli_fetch_array($result)){
                $class_id = $row["id"];
                $class_name = $row["class"];
                $stream = $row["stream"];
              ?>
              <tr>
                <td> <?php echo $class_id ?> </td>
                <td> <?php echo $class_name ?> </td>
                <td> <?php echo $stream ?> </td>

                <td> 
                  <div class="row">
                    <!-- DELETE -->
                    <div class="col-md-3 col-6 ml-0 pl-0">
                        <button class="btn btn-danger open-modal" data-toggle="modal"  data-target="#deleteModal" data-id="<?php echo $class_id ?>" >Delete</button>


                        
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
          <p>Are you sure you want to Delete this Class?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
          <form action="classes.php" method="post">
            <input name="id" type="hidden" id="class_id" value="">
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
    $("#classes").addClass("active");

    $(document).on("click", ".open-modal", function () {
     var myId = $(this).data('id');
     $("#class_id").val( myId );
});
</script>

<?php include("footer.php") ?>


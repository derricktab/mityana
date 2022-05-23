<?php include("header.php") ?>

<?php
// DELETE TEACHER
if(isset($_POST["delete"])){

    $id = htmlentities($_POST["id"], ENT_QUOTES, "UTF-8");
    echo $id;
  
    // DELETING THE SUBJECT FROM DATABASE
     $deleted = mysqli_query($con, "DELETE FROM teachers WHERE id='$id'") or die(mysqli_error($con));
  
     if($deleted){
       $deleted = "true";
     }
  
   
  }
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4 m-4">
    <h1 class="h3 mb-0 text-gray-800">Teachers</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active">Teachers</li>
    </ol>
  </div>


<!-- Teachers Tables -->
<div class="card ">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ml-auto">
        <a href="add_teacher.php" class="btn btn-info text-dark add-btn-color"><b>ADD TEACHER</b></a>
</div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
            <th>Staff ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Salary</th>
            <th>Username</th>
            <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php 
        $result = mysqli_query($con, "SELECT * FROM teachers");
        ?>
        <?php while($row=mysqli_fetch_array($result)){ ?>
            <tr>
            <td><?php echo $row["id"] ?> </td>
            <td><?php echo $row["full_name"] ?> </td>
            <td><?php echo $row["email"] ?> </td>
            <td><?php echo $row["phonenumber"] ?> </td>
            <td><?php echo $row["address"] ?> </td>
            <td><?php echo number_format($row["salary"]) ?> </td>
            <td><?php echo $row["username"] ?> </td> 
            <td>
                <a href="edit_teacher.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-primary">Update</a>
                <a href="#deleteModal" class="btn btn-sm btn-danger open-modal" data-toggle="modal"  data-target="#deleteModal" data-id="<?php echo $row['id'] ?>">Delete</a>
        
        </td>
            </tr>

        <?php } ?>

        </tbody>
        </table>
    </div>
    <div class="card-footer"></div>
    </div>


            
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
          <form action="teachers.php" method="post">
            <input name="id" type="hidden" id="teacher_id" value="">
            <button class="btn btn-danger" type="submit" name="delete">Delete</button>

          </form>
        </div>
      </div>
    </div>
  </div>
  
<!-- MAKING THE TAB ACTIVE -->
<script>
    $("#teachers").addClass("active");

    $(document).on("click", ".open-modal", function () {
     var myId = $(this).data('id');
     $("#teacher_id").val( myId );
    });

</script>

<?php include("footer.php") ?>
<?php include("header.php") ?>

<?php
// DELETE TEACHER
if (isset($_POST["delete"])) {

  $username = htmlentities($_POST["username"], ENT_QUOTES, "UTF-8");
  $subject = htmlentities($_POST["subject"], ENT_QUOTES, "UTF-8");

  // DELETING THE SUBJECT FROM DATABASE
  $deleted = mysqli_query($con, "DELETE FROM teacher_subject WHERE teacher = '$username' AND subject = '$subject'") or die(mysqli_error($con));

  if ($deleted) {
    $deleted = "true";
  }

}

?>


<div class="d-sm-flex align-items-center justify-content-between mb-4 m-4">
    <h1 class="h3 mb-0 text-gray-800">Teachers And Their Subjects</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active">Teachers and Their Subjects</li>
    </ol>
  </div>


<!-- Teachers Tables -->
<div class="card ">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ml-auto">
        <!-- <a href="add_teacher.php" class="btn btn-info text-dark add-btn-color"><b>ADD TEACHER</b></a> -->
</div>
    <div class="table-responsive px-3">
        <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
            <th>Staff ID</th>
            <th>Full Name</th>
            <th>Class</th>
            <th>Subject</th>
            <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php
        $result = mysqli_query($con, "SELECT * FROM teacher_subject") or die("Error: " . mysqli_error($con));

        while ($row = mysqli_fetch_assoc($result)) {

          $username = $row['teacher'];

          // Query the teachers table for the details of the teacher
          $teacherQuery = "SELECT * FROM teachers WHERE username = '$username'";
          $teacherResult = mysqli_query($con, $teacherQuery) or die("Error: " . mysqli_error($con));

          if ($teacherRow = mysqli_fetch_assoc($teacherResult)) {
            // Access the details of the teacher
            $teacherName = $teacherRow['full_name'];
            $teacherEmail = $teacherRow['email'];
            $teacherSubject = $row['subject'];
            $teacherId = $teacherRow['id'];
            $teacherClass = $row['class'];

            ?>
                        <tr>
                        <td><?php echo $teacherId ?> </td>
                        <td><?php echo $teacherName ?> </td>
                        <td><?php echo $teacherClass ?> </td>
                        <td><?php echo $teacherSubject ?> </td>

                        <td>
                            <!-- <a href="teachers_subjects.php?id=<?php echo $row['teacher'] ?>" class="btn btn-sm btn-primary my-1">Update</a>
                -->
                            <a href="#deleteModal" class="btn btn-sm btn-danger open-modal my-1" data-toggle="modal"  data-target="#deleteModal" data-username="<?php echo $row['teacher'] ?>" data-subject="<?php echo $row['subject'] ?>">Delete</a>
                        </td>
                        </tr>
              <?php }
        }
        ?>

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
          <p>Are you sure you want to Delete This Subject?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>


          <form action="teachers_and_subjects.php" method="post">
            <input name="username" type="hidden" id="username_teacher" value="">
            <input name="subject" type="hidden" id="subject_teacher" value="">
            <button class="btn btn-danger" type="submit" name="delete">Delete</button>
          </form>

        </div>
      </div>
    </div>
  </div>
  
<!-- MAKING THE TAB ACTIVE -->
<script>
    $("#teachers_and_subjects").addClass("active");

    $(document).on("click", ".open-modal", function () {

      // USERNAME
     var username = $(this).data('username');
     $("#username_teacher").val( username );

    //  SUBJECT
     var subject = $(this).data('subject');
     $("#subject_teacher").val( subject );
    });

</script>

<?php include("footer.php") ?>
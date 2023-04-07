<?php include("header.php") ?>
<?php

$success = "";
$rejected = "";


if (isset($_POST["approved"])) {


  try {

    // mysqli_begin_transaction($con);
    // mysqli_autocommit($con, false);

    // receiving data from 
    $id = htmlentities($_POST["id"], ENT_QUOTES, "UTF-8");
    $stream = htmlentities($_POST["stream"], ENT_QUOTES, "UTF-8");

    // SCRIPT FOR UPLOADING THE STUDENT IMAGE
    $target_dir = "uploads/";


    //Check if the directory already exists
    if (!is_dir($target_dir)) {
      //Create our directory if it does not exist
      mkdir($target_dir);
    }


    $target_file = $target_dir . basename($_FILES["student_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["student_image"]["tmp_name"]);
    if ($check !== false) {
      $uploadOk = 1;
    } else {
      $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["student_image"]["size"] > 500000) {
      $uploadOk = 0;
    }

    // Allow certain file formats
    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif"
    ) {
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["student_image"]["tmp_name"], $target_file)) {
      } else {
        mysqli_error($con);
      }
    } // ! FINISHED FILE UPPLOAD ! //


    // getting the student data from the admissions table.
    $admissions = mysqli_query($con, "SELECT * FROM admissions WHERE id='$id'") or die(mysqli_error($con));

    $admission_details = mysqli_fetch_array($admissions);

    // initializing student number and parent number
    $student_no = "";
    $parent_no = "";

    $first_name = $admission_details["first_name"];
    $last_name = $admission_details["last_name"];
    $class = $admission_details["class"];
    $combination = $admission_details["combination"];
    $dob = $admission_details["dob"];
    $gender = $admission_details["gender"];
    $nationality = $admission_details["nationality"];
    $home_district = $admission_details["home_district"];
    $home_address = $admission_details["home_address"];
    $religion = $admission_details["religion"];
    $parent_name = $admission_details["parent_name"];
    $parent_phone = $admission_details["parent_phone"];
    $parent_email = $admission_details["parent_email"];
    $parent_occupation = $admission_details["parent_occupation"];


    // PARENTS //

    // CHECKING IF THERE ARE SOME PARENTS IN THE DATABASE
    $chk_parents = mysqli_query($con, "SELECT * FROM parents ORDER BY parent_no DESC LIMIT 2") or die(mysqli_error($con));
    $num_parents = mysqli_num_rows($chk_parents);

    // CALCULATIING PARENT NUMBER
    if ($num_parents < 1) {
      $parent_no = date("Y") . "0001";
    } else {
      $row4 = mysqli_fetch_array($chk_parents);
      $fetched_pno = $row4["parent_no"];
      $parent_no = $fetched_pno + 1;
    }

    // ADDING THE PARENT TO THE DATABASE
    $add_parent = mysqli_query($con, "INSERT INTO parents(parent_no, name, phone, email, occupation) VALUES('$parent_no', '$parent_name', '$parent_phone', '$parent_email', '$parent_occupation')") or die(mysqli_error($con));

    // CHECKING IF THE PARENT WAS ADDED SUCCESFULLY
    if (!$add_parent) {
      echo mysqli_error($con);
      mysqli_rollback($con);
      $success = "false";
    }

    // STUDENTS //

    // CHECKING IF THERE ARE SOME STUDENTS IN THE DATABASE
    $sdnum = mysqli_query($con, "SELECT * FROM students ORDER BY student_id DESC LIMIT 2") or die(mysqli_error($con));

    $n_students = mysqli_num_rows($sdnum);

    // CALCULATING STUDENT NUMBER
    if ($n_students < 1) {
      $student_no = date("Y") . "0001";
    } else {
      $row3 = mysqli_fetch_array($sdnum);
      $fetched_sno = $row3["student_id"];
      $student_no = $fetched_sno + 1;
    }

    $username = $student_no;
    $password = password_hash($student_no, PASSWORD_DEFAULT);

    // ADDING THE STUDENT TO THE DATABASE
    $add_student = mysqli_query($con, "INSERT INTO students(student_id, first_name, last_name, image, class, stream, combination, dob, gender, nationality, home_district, home_address, religion, parent, date_admitted, username, password) VALUES('$student_no', '$first_name', '$last_name', '$target_file', '$class', '$stream', '$combination', '$dob', '$gender', '$nationality', '$home_district', '$home_address', '$religion', '$parent_no', NOW(), '$username', '$password')") or die("MINE: " . mysqli_error($con));

    // CHECKING IF THE STUDENT WAS INSERTED INTO THE DATABASE
    if ($add_student) {

      // DELETING THAT ROW FROM ADMISSIONS TABLE
      $deleted = mysqli_query($con, "DELETE FROM admissions WHERE id='$id'") or die(mysqli_error($con));

      if (!$deleted) {
        mysqli_rollback($con);
      }

      // ASSIGNING STUDENTS SUBJECTS.
      if ($class == 'S1' || $class == 'S2' || $class == 'S3' || $class == 'S4') {
        $result = mysqli_query($con, "INSERT INTO subject_offered(student, subject) VALUES('$student_no', 'ENGLISH'),
      ('$student_no', 'MATHEMATICS'),
      ('$student_no', 'CHEMISTRY'),
      ('$student_no', 'BIOLOGY'),
      ('$student_no', 'PHYSICS'),
      ('$student_no', 'HISTORY'),
      ('$student_no', 'GEOGRAPHY') ") or die(mysqli_errno($con));

        // IF STUDENT IS IN ALEVEL
      } elseif ($class == 'S5' || $class == 'S6') {
        $result = mysqli_query($con, "INSERT INTO subject_offered(student, subject) VALUES('$student_no', 'GP')") or die(mysqli_error($con));
      }

      $success = "true";
    } else {
      echo mysqli_error($con);
      mysqli_rollback($con);
      $success = false;
    }
  } catch (Exception $e) {
    mysqli_rollback($con);
    $success = "false";
  }
}


if (isset($_POST["reject"])) {
  $id = htmlentities($_POST["id"], ENT_QUOTES, "UTF-8");

  // DELETING THAT ROW FROM ADMISSIONS TABLE
  $deleted = mysqli_query($con, "DELETE FROM admissions WHERE id='$id'") or die(mysqli_error($con));

  if (!$deleted) {
    mysqli_rollback($con);
  }

  $rejected = "true";
}

?>
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


        <!-- DISPLAYING THE SUCCESS MESSAGE -->
        <?php if ($success == "true") { ?>
          <div class="container a-alert">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>SUCCESS!</strong> &nbsp; Admission Approved Successfully.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>

          <!-- ERROR MESSAGE -->
        <?php } elseif ($success == "false") { ?>
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
        <?php if ($rejected == "true") { ?>
          <div class="container a-alert">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>REJECTED!</strong> &nbsp; Admission Application has been rejected.
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
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Class</th>
                <th>Combination</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Nationality</th>
                <th>Home District</th>
                <th>Home Address</th>
                <th>Religion</th>
                <th>Parent Name</th>
                <th>Parent Occupation</th>
                <th>Parent Phone</th>
                <th>Parent Email</th>
                <th>Date Received</th>
                <th>Recommendation</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php

              $result = mysqli_query($con, "SELECT * FROM admissions");
              while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                  <td>
                    <?php echo $row["id"] ?>
                  </td>
                  <td>
                    <?php echo $row["first_name"] ?>
                  </td>
                  <td>
                    <?php echo $row["last_name"] ?>
                  </td>
                  <td>
                    <?php echo $row["class"] ?>
                  </td>
                  <td>
                    <?php echo $row["combination"] ?>
                  </td>
                  <td>
                    <?php echo $row["dob"] ?>
                  </td>
                  <td>
                    <?php echo $row["gender"] ?>
                  </td>
                  <td>
                    <?php echo $row["nationality"] ?>
                  </td>
                  <td>
                    <?php echo $row["home_district"] ?>
                  </td>
                  <td>
                    <?php echo $row["home_address"] ?>
                  </td>
                  <td>
                    <?php echo $row["religion"] ?>
                  </td>
                  <td>
                    <?php echo $row["parent_name"] ?>
                  </td>
                  <td>
                    <?php echo $row["parent_phone"] ?>
                  </td>
                  <td>
                    <?php echo $row["parent_email"] ?>
                  </td>
                  <td>
                    <?php echo $row["parent_occupation"] ?>
                  </td>
                  <td>
                    <?php echo $row["date_received"] ?>
                  </td>
                  <td class="text-center">
                    <a href="../uploads/<?php echo $row["recommendation"] ?>"><img src="../assets/images/doc.png" alt="recommendation" height="50" >
                    </a>
                  </td>
                  <!-- approved button -->
                  <td>
                    <div class="row">
                      <!-- approve -->
                      <div class="col-md-6 col-6">
                        <form action="assign_stream.php" method="post">
                          <input name="id" type="hidden" value="<?php echo $row["id"] ?>">
                          <button class="btn btn-success" type="submit" name="approve">Approve</button>

                        </form>
                        </a>
                      </div>

                      <!-- REJECT -->
                      <div class="col-md-6 col-6 ml-3 mt-2">
                        <form action="admissions.php" method="post">
                          <input name="id" type="hidden" value="<?php echo $row["id"] ?>">
                          <button class="btn btn-danger" type="submit" name="reject">Reject</button>

                        </form>
                        </a>
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

<!-- MAKING THE TAB ACTIVE -->
<script>
  $("#admissions").addClass("active");
</script>


<?php include("footer.php") ?>
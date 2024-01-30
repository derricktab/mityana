<?php
include("../dbcon.php");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Check for uploaded file
  if (isset($_FILES['profile_picture']) && !empty($_FILES['profile_picture']['tmp_name'])) {

    // Get file information
    $file_name = $_FILES['profile_picture']['name'];
    $file_size = $_FILES['profile_picture']['size'];
    $file_tmp_name = $_FILES['profile_picture']['tmp_name'];
    $file_error = $_FILES['profile_picture']['error'];

    // Validate file
    if ($file_error === 0) {

      // Allowed file extensions
      $allowed_extensions = ['jpg', 'jpeg', 'png'];
      $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

      if (in_array($file_extension, $allowed_extensions)) {

        // Maximum file size in bytes
        $max_file_size = 1048576; // 1 MB

        if ($file_size <= $max_file_size) {

          // Generate unique filename
          $new_filename = uniqid() . '.' . $file_extension;

          // Upload file to designated directory
          $upload_dir = 'uploads/';
          $upload_path = $upload_dir . $new_filename;

          if (move_uploaded_file($file_tmp_name, $upload_path)) {

            // Update user profile picture reference in database or storage location
            // (Change this part based on your actual data storage and update mechanisms)

            $id = $_SESSION['teacher_id'];
            $sql = "UPDATE teachers SET profile_pic = '$new_filename' WHERE id = '$id' ";

            $query = mysqli_query($con, $sql);


            // Update image displayed on the page (optional)
            // echo "<script>document.getElementById('student-pic').src = '$upload_path';</script>";

            // Success message
            echo "?>
            
            <script>alert('Profile picture updated successfully!');

            window.location.href = 'http://127.0.0.1/mityana-standard-ss/teachers/';

            </script>

            <?php ";
            // window.lo

          } else {
            echo "Error uploading file!";
          }

        } else {
          echo "File size too large!";
        }

      } else {
        echo "Invalid file type!";
      }

    } else {
      echo "File upload error!";
    }

  } else {
    echo "Please choose a file to upload!";
  }

}

?>

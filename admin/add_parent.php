<?php include("header.php") ?>

<?php 
$success = "";

if(isset($_POST["add_parent"])){

    $parent_name = htmlentities($_POST["parent_name"], ENT_QUOTES, "UTF-8");
    $parent_email = htmlentities($_POST["parent_email"], ENT_QUOTES, "UTF-8");
    $parent_phone = htmlentities($_POST["parent_phone"], ENT_QUOTES, "UTF-8");
    $parent_occupation = htmlentities($_POST["parent_occupation"], ENT_QUOTES, "UTF-8");


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
    }else{
        $success = "true";
    }

}

?>

<div class="form-wrapper mx-auto my-5">
    <h1 class="font-weight-bold text-center text-white">Add Parent</h1>

    <!-- DISPLAYING THE SUCCESS MESSAGE -->
    <?php if($success == "true") { ?>
    <div class="container a-alert">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> &nbsp; Parent Added Succesfully.
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

    <form action="add_parent.php" method="POST" class="mt-4">


        <!-- Parent Name -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
                <input type="text" name="parent_name" class="form-control" placeholder="Full Name" required>
            </div>
        </div>

        <!-- Parent Email -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-envelope"></i>
                    </div>
                </div>
                <input type="email" name="parent_email" class="form-control" placeholder="Email" required>
            </div>
        </div>

        <!-- Parent Phone Number -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
                <input type="tel" name="parent_phone" class="form-control" placeholder="Phone Number" required>
            </div>
        </div>

            
        <!-- Parent Occupation -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-work"></i>
                    </div>
                </div>
                <input type="text" name="parent_occupation" class="form-control" placeholder="Occupation" required>
            </div>
        </div>

        <!-- SUBMIT BUTTON -->
        <div class="form-group">
            <input type="submit" value="submit" class="btn btn-warning submit form-control" name="add_parent">
        </div>
    </form>
    
    <a href="parents.php" class="text-white">Back To Parents</a>

</div>





<?php include("footer.php") ?>
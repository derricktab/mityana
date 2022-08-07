<?php include("header.php") ?>


<?php

$id;

if (isset($_POST["approve"])) {
    $id = htmlentities($_POST["id"], ENT_QUOTES, "UTF-8");

}

?>


<div class="form-wrapper mx-auto my-5">
    <h1 class="font-weight-bold text-center text-white">FINALIZING APPROVAL</h1>

    <!-- DISPLAYING THE SUCCESS MESSAGE -->
    <?php if ($success == "true") { ?>
        <div class="container a-alert">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>SUCCESS!</strong> &nbsp; Stream Updated Succesfully.
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

    <form action="admissions.php" method="POST" class="mt-4" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $id ?>">

        <!-- STUDENT IMAGE -->
        <div class="form-group">
            <label for="student image" class="text-white">Select Student Image</label>
            <input type="file" name="student_image" class="form-control">
        </div>

        <!-- Student Stream -->
        <label class="text-white">Assign The Student A Stream</label>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-building"></i>
                    </div>
                </div>
                <select name="stream" class="form-control">
                    <option>Select Stream</option>
                    <?php
                    $result = mysqli_query($con, "SELECT * FROM streams");
                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) {
                            $stream = $row["stream"];
                    ?>
                            <option value="<?php echo $stream ?>"><?php echo $stream ?></option>
                    <?php }
                    } ?>

                </select>
            </div>
        </div>


        <!-- SUBMIT BUTTON -->
        <div class="form-group">
            <input type="submit" value="SUBMIT" class="btn btn-warning submit form-control" name="approved">
        </div>
    </form>

</div>





<?php include("footer.php") ?>
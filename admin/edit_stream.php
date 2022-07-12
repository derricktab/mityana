<?php include("header.php") ?>

<?php 

$success = "";
$id = "";
$stream = "";

if(isset($_POST["edit"])){

    $id = $_POST["id"];

    $result = mysqli_query($con, "SELECT * FROM streams WHERE id='$id'") or die(mysqli_error($con));

    $row = mysqli_fetch_array($result);
    $stream = $row["stream"];
}


if(isset($_POST["submit"])){
    
    $id = htmlentities($_POST["id"], ENT_QUOTES, "UTF-8");
    $stream = htmlentities($_POST["stream"], ENT_QUOTES, "UTF-8");

    $result = mysqli_query($con, "UPDATE streams SET stream='$stream' WHERE id='$id'");

    if($result){
        $success = "true";
    }else{
        $success = "false";
    }
}

?>

<div class="form-wrapper mx-auto my-5">
    <h1 class="font-weight-bold text-center text-white">EDIT STREAM</h1>

    <!-- DISPLAYING THE SUCCESS MESSAGE -->
    <?php if($success == "true") { ?>
    <div class="container a-alert">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> &nbsp; Stream Updated Succesfully.
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

    <form action="edit_stream.php" method="POST" class="mt-4">

        <input type="hidden" name="id" value="<?php echo $id ?>">
        <!-- Subject Name -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-building"></i>
                    </div>
                </div>
                <input type="text" name="stream" class="form-control" placeholder="Stream Name" value="<?php echo $stream ?>" required>
            </div>
        </div>


        <!-- SUBMIT BUTTON -->
        <div class="form-group">
            <input type="submit" value="SUBMIT" class="btn btn-warning submit form-control" name="submit">
        </div>
    </form>

    <a href="streams.php" class="text-white">Back To Streams</a>
</div>





<?php include("footer.php") ?>
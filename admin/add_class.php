<?php include("header.php") ?>

<?php 
$success = "";

if(isset($_POST["submit"])){

    $class = htmlentities($_POST["class"], ENT_QUOTES, "UTF-8");
    $stream = htmlentities($_POST["stream"], ENT_QUOTES, "UTF-8");

    $result = mysqli_query($con, "INSERT INTO class_and_stream(class, stream) VALUES('$class', '$stream')");

    if($result){
        $success = "true";
    }else{
        $success = "false";
    }
}

?>

<div class="form-wrapper mx-auto my-5">
    <h1 class="font-weight-bold text-center text-white">Add Class</h1>

    <!-- DISPLAYING THE SUCCESS MESSAGE -->
    <?php if($success == "true") { ?>
    <div class="container a-alert">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> &nbsp; Class Added Succesfully.
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

    <form action="add_class.php" method="POST" class="mt-4">


        <!-- CLASS -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-building"></i>
                    </div>
                </div>
                <select name="class" class="form-control">
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    <option value="S4">S4</option>
                    <option value="S5">S5</option>
                    <option value="S6">S6</option>
                </select>
            </div>
        </div>

        <!-- Stream Name -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-building"></i>
                    </div>
                </div>
                <select name="stream" class="form-control" required>
                <!-- FETCHING THE STREAMS FROM DATABASE -->
                    <?php 
                    $result = mysqli_query($con, "SELECT * FROM streams");
                    if($result){
                        while($row=mysqli_fetch_array($result)){
                            $stream = $row["stream"];
                    ?>
                    <option value="<?php echo $stream ?>"><?php echo $stream ?></option>
                    <?php }} ?>
                </select>
            </div>
        </div>

        <!-- SUBMIT BUTTON -->
        <div class="form-group">
            <input type="submit" value="SUBMIT" class="btn btn-warning submit form-control" name="submit">
        </div>
    </form>
    
    <!-- back to classes -->
    <a href="classes.php" class="text-white">Back To Classes</a>

</div>





<?php include("footer.php") ?>
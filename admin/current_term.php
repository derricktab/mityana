<?php include("header.php") ?>

<?php 
error_reporting(E_ALL);
ini_set('display_erros', 1);
$success = "";

if(isset($_POST["submit"])){

    $current_year = htmlentities($_POST["year"], ENT_QUOTES, "UTF-8");
    $current_term = htmlentities($_POST["term"], ENT_QUOTES, "UTF-8");

    $result = mysqli_query($con, "INSERT INTO current_year(current_year, current_term) VALUES('$current_year', '$current_term')");

    if($result){
        $success = "true";
    }else{
        $success = "false";
    }
}

?>

<div class="form-wrapper mx-auto my-5">
    <h1 class="font-weight-bold text-center text-white">CURRENT YEAR AND TERM</h1>

    <!-- DISPLAYING THE SUCCESS MESSAGE -->
    <?php if($success == "true") { ?>
    <div class="container a-alert">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> &nbsp; Current Term Updated Succesfully
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

    <form action="current_term.php" method="POST" class="mt-4">


        <!-- Current Year -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-building"></i>
                    </div>
                </div>
                <input type="text" name="year" class="form-control" placeholder="Current year" value=<?php echo date("Y") ?> required>
            </div>
        </div>

        <!-- Current Term-->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                </div>
                <select name="term" class="form-control">
                    <option disabled selected>-- Select Term --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
        </div>

        <!-- SUBMIT BUTTON -->
        <div class="form-group">
            <input type="submit" value="SUBMIT" class="btn btn-warning submit form-control" name="submit">
        </div>
    </form>
    
    <!-- <a href="subjects.php" class="text-white">Back To Subjects</a> -->

</div>





<?php include("footer.php") ?>
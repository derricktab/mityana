<?php include("header.php"); ?>

<?php

$success = "";

if (isset($_POST["submit"])) {

    $first_name = htmlentities($_POST["fname"], ENT_QUOTES, "UTF-8");
    $last_name = htmlentities($_POST["lname"], ENT_QUOTES, "UTF-8");
    $class = htmlentities($_POST["class"], ENT_QUOTES, "UTF-8");
    $dob = htmlentities($_POST["dob"], ENT_QUOTES, "UTF-8");
    $gender = htmlentities($_POST["gender"], ENT_QUOTES, "UTF-8");
    $nationality = htmlentities($_POST["nationality"], ENT_QUOTES, "UTF-8");
    $home_district = htmlentities($_POST["home_district"], ENT_QUOTES, "UTF-8");
    $home_address = htmlentities($_POST["home_address"], ENT_QUOTES, "UTF-8");
    $religion = htmlentities($_POST["religion"], ENT_QUOTES, "UTF-8");
    $parent_name = htmlentities($_POST["p_name"], ENT_QUOTES, "UTF-8");
    $parent_phone = htmlentities($_POST["p_phone"], ENT_QUOTES, "UTF-8");
    $parent_email = htmlentities($_POST["p_email"], ENT_QUOTES, "UTF-8");
    $parent_occupation = htmlentities($_POST["p_occupation"], ENT_QUOTES, "UTF-8");
    $pschool = htmlentities($_POST["pschool"], ENT_QUOTES, "UTF-8");
    $pgrade = htmlentities($_POST["pgrade"], ENT_QUOTES, "UTF-8");

    $result = mysqli_query($con, "INSERT INTO admissions(first_name, last_name,	class,	pschool, pgrade, dob, gender, nationality, home_district, home_address, religion, parent_name, parent_phone, parent_occupation, parent_email, date_received) VALUES('$first_name', '$last_name', '$class', '$pschool', '$pgrade', '$dob', '$gender', '$nationality', '$home_district', '$home_address', '$religion', '$parent_name', '$parent_phone', '$parent_occupation', '$parent_email', NOW())") or die(mysqli_error($con));

    if ($result) {
        $success = "true";
    } else {
        $success = "false";
    }
}


?>

<title>Admissions</title>


<style>
    body {
        background: url("assets/bg.jpeg");
        background-size: cover;
        background-position: center;
        background-repeat: none;
        background-attachment: fixed;
    }
</style>


<div class="form-wrapper">
    <h1 class="font-weight-bold text-center student-reg">JOIN MITYANA STANDARD SS - KAGAVU</h1>

    <!-- DISPLAYING THE SUCCESS MESSAGE -->
    <?php if ($success == "true") { ?>
        <div class="container a-alert">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>SUCCESS!</strong> &nbsp; Admission Request Sent, We Shall Contact You Once Your Admission Has Been Approved.
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

    <form action="admissions.php" method="POST" id="admission">

        <div class="form-group mt-5">
            <div class="form-row">

                <!-- FIRST NAME -->
                <div class="col-md-6 mt-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="First Name" name="fname" required>
                    </div>
                </div>

                <!-- LAST NAME -->
                <div class="col-md-6 mt-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="Last Name" name="lname" required>
                    </div>
                </div>
            </div>

        </div>

        <!-- CLASS -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                </div>
                <select name="class" class="custom-select" id="class" required>
                    <option value="" disabled selected hidden>Class</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    <option value="S4">S4</option>
                    <option value="S5">S5</option>
                    <option value="S6">S6</option>
                </select>
            </div>
        </div>


        <!-- STUDENT COMBINATION / SUBJECTS -->
        <div class="form-group">
            <div class="input-group" id="combination">

            </div>
        </div>

        <!-- PREVIOUS SCHOOL -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-building"></i>
                    </div>
                </div>
                <input type="text" name="pschool" class="form-control" placeholder="Previous School" required>
            </div>
        </div>

        <!-- PREVIOUS GRADE -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                </div>
                <input type="text" name="pgrade" class="form-control" placeholder="Previous Grade ex(31 Aggregates/16 Points)" required>
            </div>
        </div>


        <!-- GENDER -->
        <div class="form-group">
            <label><b>GENDER: </b> </label>
            <div class="form-check form-check-inline">
                <input type="radio" name="gender" class="form-check-input radio" value="Male" required />
                <label class="form-check-label pl-2">Male</label>
            </div>

            <div class="form-check form-check-inline">
                <input type="radio" name="gender" class="form-check-input radio" value="Female" required />
                <label class="form-check-label pl-2">Female</label>
            </div>
        </div>

        <!-- DATE OF BIRTH -->
        <div class="form-group">
            <input id="datepicker" class="form-control mr-0" placeholder="Date Of Birth" name="dob" required />
        </div>

        <!-- NATIONALITY -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-flag"></i>
                    </div>
                </div>
                <input type="text" name="nationality" id="nationality" class="form-control" placeholder="Nationality" required>
            </div>
        </div>

        <!-- HOME DISTRICT -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-igloo"></i>
                    </div>
                </div>
                <input type="text" name="home_district" class="form-control" placeholder="Home District" required>
            </div>
        </div>

        <!-- HOME ADDRESS -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-map-marker-alt"></i>
                    </div>
                </div>
                <input type="text" name="home_address" class="form-control" placeholder="Home Address" required>
            </div>
        </div>

        <!-- RELIGION -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-pray"></i>
                    </div>
                </div>
                <input type="text" name="religion" class="form-control" placeholder="Religion" required>
            </div>
        </div>



        <!-- PARENT NAME -->
        <div class="form-group">
            <div class="input-group name">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-signature"></i>
                    </div>
                </div>
                <input type="text" class="form-control" placeholder="Parent/Guardian's Name" name="p_name" required>
            </div>
        </div>

        <!-- PARENT OCCUPATION -->
        <div class="form-group">
            <div class="input-group occupation">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-briefcase"></i>
                    </div>
                </div>
                <input type="text" class="form-control" placeholder="Parent/Guardian's Occupation" name="p_occupation" required>
            </div>
        </div>

        <!-- PARENT PHONE NUMBER -->
        <div class="form-group">
            <div class="input-group phone_number">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
                <input type="text" class="form-control" placeholder="Parent/Guardian's Phone Number" name="p_phone" required>
            </div>
        </div>

        <!-- PARENT EMAIL -->
        <div class="form-group">
            <div class="input-group phone_number">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-envelope"></i>
                    </div>
                </div>
                <input type="email" class="form-control" placeholder="Parent/Guardian's Email" name="p_email" required>
            </div>
        </div>

        <!-- SUBMIT BUTTON -->
        <div class="form-group">
            <input type="submit" value="SUBMIT" class="btn btn-info submit form-control" name="submit">
        </div>
    </form>
</div>


<script>
    $("#admissions").removeClass("btn-outline-warning");
    $("#admissions").addClass("btn-warning");


    // Checking which class was selected
    $("#admission").on("change", function() {
        $("#combination").empty();
        var myclass = this.class.value;

        if (myclass == "S5" | myclass == "S6") {
            console.log("A LEVEL STUDENT");
            $("#combination").append('<div class="input-group-prepend">                    <div class="input-group-text">                    <i class="fas fa-book"></i>                    </div>                </div>                <input type="text" name="combination" class="form-control" placeholder="Combination eg. PEM/ICT, HEG/SUB-MATH" required>');

        }
    });
</script>

<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>


<?php include("footer.php"); ?>
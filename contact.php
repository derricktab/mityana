<?php
include("dbcon.php");

$success = "";

if (isset($_POST["submit"])) {

    $firstname = htmlentities($_POST["fname"], ENT_QUOTES, "UTF-8");
    $lastname = htmlentities($_POST["lname"], ENT_QUOTES, "UTF-8");
    $email = htmlentities($_POST["email"], ENT_QUOTES, "UTF-8");
    $phonenumber = htmlentities($_POST["phone"], ENT_QUOTES, "UTF-8");
    $message = htmlentities($_POST["message"], ENT_QUOTES, "UTF-8");

    $result = mysqli_query($con, "INSERT INTO contact(firstname, lastname, email, phonenumber, message) VALUES('$firstname', '$lastname', '$email', '$phonenumber', '$message')");

    if ($result) {
        $success = "true";
    } else {
        $success = "false";
    }
}


?>

<?php include("header.php"); ?>
<title>Contact</title>


<div class="container mt-5 pt-5 ">
    <h1 class="text-center text-dark font-weight-bold">CONTACT US</h1>
</div>

<!-- DISPLAYING THE SUCCESS MESSAGE -->
<?php if ($success == "true") { ?>
    <div class="container c-alert">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>SUCCESS!</strong> &nbsp; Your Message Has been sent successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <!-- ERROR MESSAGE -->
<?php } elseif ($success == "false") { ?>
    <div class="container c-alert">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>ERROR!</strong> &nbsp; Failed to send message, please try again later.
            <?php echo mysqli_error($con); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
<?php } ?>


<div class="container mt-5 mb-5 form-handler">
    <div class="row h-100">

        <div class="col-md-6 contact-side-bg pr-0">

        </div>

        <div class="col-md-6 mb-5 ">
            <h3 class="mt-5 mb-3 text-center text-light font-weight-bold">SEND US A MESSAGE</h3>
            <form action="contact.php" method="POST">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">First Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <input type="text" name="fname" class="form-control" placeholder="Enter Your First Name" required>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">Last Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <input type="text" name="lname" class="form-control" placeholder="Enter Your Last Name" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Phone Number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-phone"></i>
                            </div>
                        </div>
                        <input type="tel" name="phone" class="form-control" placeholder="Enter Your Phone Number" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Message</label>
                    <textarea name="message" class="form-control" rows="8" placeholder="Enter Your Message Here" style="resize: none" required></textarea>
                </div>

                <input type="submit" name="submit" value="Send Message" class="btn btn-danger form-control btn-hover">

            </form>
        </div>
    </div>
</div>

<div class="details">
    <div class="row w-100">
        <div class="col-md-4">
            <div class="cards mx-auto">
                <i class="fa fa-map-marker-alt"></i>
                <h5 class="d-flex justify-content-center mt-3 font-weight-bold text-warning">ADDRESS</h5>
                <p class="d-flex justify-content-center">Plot 333,Kagavu Road. 3KM Off Mityana Road.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="cards mx-auto">
                <i class="fa fa-phone"></i>
                <h5 class="d-flex justify-content-center mt-3 font-weight-bold text-warning">PHONE</h5>
                <p class="d-flex justify-content-center">0772852858 / 0753818803</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="cards mx-auto">
                <i class="fa fa-envelope"></i>
                <h5 class="d-flex justify-content-center mt-3 font-weight-bold text-warning">EMAIL</h5>
                <p class="d-flex justify-content-center">info@mityanastandard.com</p>
            </div>
        </div>

    </div>
    <br><br><br>
    <br><br><br>
    <h5 class="text-center l-s">OUR</h5>
    <h2 class="text-center l-h">CONTACT OFFICES</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="cards mx-auto">
                <h5 class="d-flex justify-content-center mt-3 font-weight-bold text-warning">KAMPALA</h5>
                <p class="d-flex justify-content-center">Mukwano Arcade: Baby’s View Choice Shop 0702924978 </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="cards mx-auto">
                <h5 class="d-flex justify-content-center mt-3 font-weight-bold text-warning">KANSANGA</h5>
                <p class="d-flex text-center">Mafuta’s Shop Nabutiti Road </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="cards mx-auto">
                <h5 class="d-flex justify-content-center mt-3 font-weight-bold text-warning">MITYANA</h5>
                <p class="d-flex text-center">New Mityana Bookshop / Picfare, Opossite Centenary Bank</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="cards mx-auto">
                <h5 class="d-flex justify-content-center mt-3 font-weight-bold text-warning">MUBENDE</h5>
                <p class="d-flex text-center">KASANA BOOKSHOP (0781566275)</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="cards mx-auto">
                <h5 class="d-flex justify-content-center mt-3 font-weight-bold text-warning">BUKUYA</h5>
                <p class="d-flex justify-content-center">MAAMA SANYU’S SHOP</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="cards mx-auto">
                <h5 class="d-flex justify-content-center mt-3 font-weight-bold text-warning">LIRA & APAC</h5>
                <p class="d-flex justify-content-center">Adimo Ambrose Joseph <br>  +256772478182  <br> +256780193775</p>
            </div>
        </div>
    </div>

</div>

<!-- GOOGLE MAP OF THE SCHOOL -->
<section class="map mx-auto mt-5">
    <h5 class="text-center l-s">MAP</h5>
    <h2 class="text-center l-h">LOCATION</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2497.165086072314!2d32.150290649208294!3d0.3780660108040779!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177d10735ac39349%3A0x865f203cab5200e4!2sMityana%20Standard%20Secondary%20School!5e1!3m2!1sen!2sug!4v1657514199773!5m2!1sen!2sug" width="600" height="450" style="border:0;" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<script>
    $("#contact").addClass("active");
</script>

<?php include("footer.php"); ?>
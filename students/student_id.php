<?php include("header.php") ?>
<?php 

$date = new DateTime($date_admitted);

$expiry_date = date_add($date, date_interval_create_from_date_string("4 years"));

// echo $date.'<br';
$expiry_date = $expiry_date->format('d-M-Y');

?>


<div class="container-fluid">
    <div class="mx-auto id-card">
       <div class="row">
           <!-- ID LEFT -->
           <div class="col-md-4 col-4">
               <!-- SCHOOL LOGO -->
               <img src="../assets/logo1.png" alt="ID SCHOOL LOGO" class="id-logo">

               <!-- STUDENT PIC -->
               <img src="img/std.jpg" alt="ID SCHOOL LOGO" class="std-img">

           </div>

           <!-- ID RIGHT -->
           <div class="col-md-8 col-8 id-right">
            <div class="position-relative">
                <h5 class="sch-title">MITYANA STANDARD SS - KAGAVU</h5>
                <p class="text-center">P.O.BOX 41 Mityana</p>
                <p class="std-id-text"> STUDENT ID </p>
                
                <div class="row mt-4">
                    <!-- left col -->
                    <div class="col-md-6 col-6">
                    <p><b>STUDENT ID: </b> <?php echo $student_id ?> </p>
                    <p> <b>NAME: </b> <?php echo $firstname." ".$lastname ?> </p>
                    <p class=""><b>CLASS: </b> <?php echo $class ?> </p>

                    </div>

                    <!-- right col -->
                    <div class="col-md-6 col-6">
                    <p class=""><b>STREAM: </b> <?php echo $stream ?> </p>                        
                    <p><b>DOB: </b> <?php echo $dob ?> </p>
                    <p> <b>Valid Till: </b> <?php echo $expiry_date?> </p>
                    </div>

                    <img src="../assets/barcode.png" alt="" class="barcode">

                </div>

            </div>
           </div>
       </div>
    </div>
</div>

<script>
    $("#id_card").addClass("active-tab");
    console.log("ABOVE EXECUTED");
</script>

<?php include("footer.php") ?>
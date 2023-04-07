<?php include("header.php") ?>

<div class="container-fluid main-container">
    <div class="row mx-auto mt-5">

        <div class="col-md-5 col-6 text-right">
            <h2 class="sname font-weight-bold text-primary"><?php echo $firstname." ".$lastname ?> </h2>
            <h5><b>Class: </b> <?php echo $class ?> </h5>
            <h5><b>Stream: </b> <?php echo $stream ?> </h5>
            <h5><b>Gender: </b> <?php echo $gender ?> </h5>
            <h5><b>Student Number: </b> <?php echo $student_id ?> </h5>
        </div>

        <div class="col-md-7 col-6">
            <img src="../admin/<?php echo $student_image ?>" alt="Image" class="right-image" />
        </div>
    </div>

    <div class="row">

        <!-- ADDITIONAL STUDENT DETAILS -->
        <div class="table-responsive mx-auto px-5 py-3 mt-5">

        <h5 class="font-weight-bold text-primary">Additional Student Details</h5>
        <table class="table mx-auto">
            <thead>
                <tr>
                    <th>Date Of Birth</th>
                    <th>Nationality</th>
                    <th>Home District</th>
                    <th>Religion</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $dob ?> </td>
                    <td><?php echo $nationality ?> </td>
                    <td><?php echo $home_district ?> </td>
                    <td><?php echo $religion ?> </td>
                </tr>
            </tbody>
        </table>
        </div>

        <!-- PARENT DETAILS -->
        <div class="table-responsive mx-auto px-5 mt-3">
        <h5 class="font-weight-bold text-primary">Parent Details</h5>
       <table class="table mx-auto">
            <thead>
                <tr>
                    <th>Parent Name: </th>
                    <th>Phone Number: </th>
                    <th>Email: </th>
                    <th>Occupation</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $parent_name ?> </td>
                    <td><?php echo $parent_phone ?> </td>
                    <td><?php echo $parent_email ?> </td>
                    <td><?php echo $parent_occupation ?> </td>
                </tr>
            </tbody>
        </table>
        </div>
 
    </div>

</div>


<script>
    $("#profile").addClass("active-tab");
</script>

<?php include("footer.php") ?>
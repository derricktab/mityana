<?php include("header.php") ?>

<div class="container-fluid m-5">

    <div class="row mt-5">
        <div class="col-md-4">
            <h5 class="font-weight-bold text-primary mb-4">Subjects Taught</h5>
            <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <?php

                    $result = mysqli_query($con, "SELECT * FROM teacher_subject WHERE teacher='$teacher_username'");
                    while ($row = mysqli_fetch_array($result)) {
                        $subject = $row["subject"];
                        $class = $row["class"];

                        $result1 = mysqli_query($con, "SELECT * FROM subject_offered WHERE subject = '$subject'");

                        $no_of_students = mysqli_num_rows($result1);
                    ?>
                    <li class="list-group-item"><?php echo $subject." - ".$class ?> </li>

                    <?php } ?>

                </ul>
            </div>
        </div>

    </div>

    <div class="row">

        <!-- PERSONAL DETAILS -->
        <div class="table-responsive mx-auto py-3 mt-5">

            <h5 class="font-weight-bold text-primary">Teacher Details</h5>
            <table class="table mx-auto">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $fullname ?> </td>
                        <td><?php echo $email ?> </td>
                        <td><?php echo $phonenumber ?> </td>
                        <td><?php echo $address ?> </td>
                        <td><?php echo number_format($salary)  ?> </td>
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
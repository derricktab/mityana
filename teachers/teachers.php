<?php include("header.php") ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4 m-4">
    <h1 class="h3 mb-0 text-gray-800">Teachers</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active">Teachers</li>
    </ol>
  </div>


<!-- Teachers Tables -->
<div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    </div>
    <a href="add_teacher.php" class="btn btn-info text-dark"><b>ADD TEACHER</b></a>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
            <th>Staff ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Salary</th>
            <th>Username</th>
            <th>Password</th>
            <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php 
        $result = mysqli_query($con, "SELECT * FROM teachers");
        ?>
        <?php while($row=mysqli_fetch_array($result)){ ?>
            <tr>
            <td><?php echo $row["id"] ?> </td>
            <td><?php echo $row["full_name"] ?> </td>
            <td><?php echo $row["email"] ?> </td>
            <td><?php echo $row["phonenumber"] ?> </td>
            <td><?php echo $row["address"] ?> </td>
            <td><?php echo $row["salary"] ?> </td>
            <td><?php echo $row["username"] ?> </td>
            <td><?php echo $row["password"] ?> </td>
            <td>
                <a href="#" cl
                ass="btn btn-sm btn-primary">Update</a>
                <a href="#" class="btn btn-sm btn-danger mt-2">Delete</a>
        
        </td>
            </tr>

        <?php } ?>

        </tbody>
        </table>
    </div>
    <div class="card-footer"></div>
    </div>


<?php include("footer.php") ?>
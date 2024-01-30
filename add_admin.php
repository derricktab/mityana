<?php 

include("dbcon.php");

$username = "admin";
$password = "admin";
$password = password_hash($password, PASSWORD_DEFAULT);

$result = mysqli_query($con, "INSERT INTO admin(username, password) VALUES('$username', '$password')");

if($result){
    echo "ADMIN ADDED SUCCESFULLY";
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
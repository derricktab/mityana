<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../dbcon.php');

$sql = "SELECT * FROM current_year ORDER BY id DESC LIMIT 1";

$excute = mysqli_query($con, $sql);

$row = mysqli_fetch_array($excute);

$year = $row['current_year'];
$term = $row['current_term'];

echo "Year " . $year . " Term : " . $term;
?>
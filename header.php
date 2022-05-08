<?php include("dbcon.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Mityana Standard SS - Kagavu</title> -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="gijgo/gijgo.js"></script>
    <link rel="shortcut icon" href="assets/logo1.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">

    <link href="gijgo/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<body>

<!-- TOP BAR -->
<div class="row topbar p-2">
    <div class="col-md-6">
        <i class="fa fa-envelope"></i>
        <a href="mailto:info@mityanastandard.com">info@mityanastandard.com</a>
        &nbsp; &nbsp; &nbsp;
        <i class="fa fa-phone"></i>
        <a href="tel:+256754893983">+256754893983</a>
    </div>

    <div class="col-md-6">

    <span class="icons">
        <a href="#"><i class="fab fa-facebook facebook"></i></a>
        <a href="#"><i class="fab fa-twitter twitter"></i></a>
        <a href="#"><i class="fab fa-whatsapp whatsapp"></i></a>
        <a href="#"><i class="fab fa-linkedin linkedin"></i></a>
        <a href="#"><i class="fab fa-instagram instagram"></i></a>
    </span>
        <!-- <form action="search.php" class="form-inline" method="post">
            <input type="text" class="form-control">
            <button type="submit" class="btn btn-outline-primary">Search</button>
        </form> -->
    </div>
</div>


<!-- NAVIGATION BAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">

<a href="#"><img src="assets/logo1.png" width="50" class="navbar-brand d-lg-none"></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto items">

      <li class="nav-item mx-2" id="home">
        <a class="nav-link" href="index.php">Home</a>
      </li>

      <li class="nav-item mx-2" id="about">
        <a class="nav-link" href="about.php">About</a>
      </li>

      <li class="nav-item mx-2" id="gallery">
        <a class="nav-link" href="gallery.php">Gallery</a>
      </li>

      <li class="nav-item d-none d-lg-block mx-5"></li>
    <!-- LOGO -->
      <a href="#"><img src="assets/logo1.png" width="80" class="logo d-none d-lg-block mx-5"></a>

      <li class="nav-item mx-2" id="activities">
        <a class="nav-link" href="activities.php">Activities</a>
      </li>

      <li class="nav-item mx-2" id="contact">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>

    </ul>

    <!-- BUTTONS -->
    <ul class="navbar-nav buttons">
 
    <li class="nav-item mx-2">
        <a href="login.php" class="text-white">  
            <button class="btn btn-outline-danger" id="register">LOGIN </button></a>
      </li>

      <li class="nav-item mx-2">
      <a href="admissions.php" class="text-white">
          <button class="btn btn-outline-warning" id="admissions">ADMISSIONS</button>
      </a>
      </li>
    </ul>

  </div>
</nav>

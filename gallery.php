<?php include("header.php"); ?>

<title>Gallery</title>
<style>
  .gallery{
  position: relative !important;
  /* height:100%;
  width:100%; */
}


.clipped-border img{
  width: 300px;
  height: 300px;
}

.clipped-border{
  -webkit-clip-path: polygon(50% 0%, 95% 25%, 95% 75%, 50% 100%, 5% 75%, 5% 25%);
   clip-path: polygon(50% 0%, 95% 25%, 95% 75%, 50% 100%, 5% 75%, 5% 25%);
   background:linear-gradient(grey,lightgrey);
   max-height:300px;
   max-width:300px;
   /* height: 300px;
   width: 300px; */
   transition:transform 0.2s;
   position:absolute;
   cursor:pointer;
}



.clipped-border:nth-child(2){
  top:235px;
  left:140px;
}

.clipped-border:nth-child(3){
  top:0;
  left:280px;
}

.clipped-border:nth-child(4){
  top:235px;
  left:420px;
}

.clipped-border:nth-child(5){
  top:0;
  left:560px;
}

.clipped-border:nth-child(6){
  top:235px;
  left:700px;
} 

.clipped-border:nth-child(7){
  top:0;
  left:840px;
} 

.clipped-border:nth-child(8){
  top:470px;
  left:0;
} 

.clipped-border:nth-child(9){
  top:470px;
  left:280px;
} 

.clipped-border:nth-child(10){
  top:470px;
  left:560px;
} 

.clipped-border:nth-child(11){
  top:470px;
  left:840px;
} 



#clipped {
-webkit-clip-path: polygon(50% 0%, 95% 25%, 95% 75%, 50% 100%, 5% 75%, 5% 25%);
clip-path: polygon(50% 0%, 95% 25%, 95% 75%, 50% 100%, 5% 75%, 5% 25%);
}

.clipped-border:hover{
  transform:scale(1.2);
  transition:transform 0.2s;
  z-index:10;
}


@media screen and (max-width:500px){
  .clipped-border{
    width:100px;
    height:100px;
  }
  
  .clipped-border:nth-child(2){
    top:0;
    left:100px;
  }
  
  .clipped-border:nth-child(3){
    left:200px;
  }
  
  .clipped-border:nth-child(4){
    top:82px;
    left:50px;
  }
  
  .clipped-border:nth-child(5){
    top:82px;
    left:150px;
  }
}

</style>
<!-- Header -->
<div class="gallery" id="myHeader">
  <h1 class="mt-5 font-weight-bold">GALLERY</h1>
  <p>Our Activities and Facilities.</p>

</div>

<div class="container">
<div class = "gallery">
  <!-- IMAMGE 1 -->
  <div class="clipped-border shadow">
    <img src="assets/bg6.jpg" id="clipped">
  </div>

  <!-- IMAGE 2 -->
  <div class="clipped-border">
    <img src="assets/activities.jpg" id="clipped">
  </div>

  <!-- IMAGE 3 -->
  <div class="clipped-border">
    <img src="assets/bg3.jpeg" id="clipped">
  </div>

  <!-- IMAGE 4 -->
    <div class="clipped-border">
    <img src="assets/slab1.jpeg" id="clipped">
  </div>

  <!-- IMAGE 5 -->
    <div class="clipped-border">
    <img src="assets/student_lab.jpeg" id="clipped">
  </div>

  <!-- IMAGE 6 -->
    <div class="clipped-border">
    <img src="assets/bg.jpeg" id="clipped">
  </div>

  <!-- IMAGE 7 -->
    <div class="clipped-border">
    <img src="assets/cactivities1.jpg" id="clipped">
  </div>

  <!-- IMAGE 8 -->
    <div class="clipped-border">
    <img src="assets/generator.jpeg" id="clipped">
  </div>

  <!-- IMAGE 9 -->
    <div class="clipped-border">
    <img src="assets/s_lab2.jpeg" id="clipped">
  </div>

  <!-- IMAGE 10 -->
    <div class="clipped-border">
    <img src="assets/s.jpeg" id="clipped">
  </div>

  <!-- IMAGE 11 -->
    <div class="clipped-border">
    <img src="assets/tns.jpeg" id="clipped">
  </div>

</div>
</div>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>



<!-- Making the gallery tab active -->
<script>
    $("#gallery").addClass("active");
</script>

<?php include("footer.php"); ?>
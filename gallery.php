<?php include("header.php"); ?>

<title>Gallery</title>

<!-- Header -->
<div class="gallery" id="myHeader">
  <h1 class="mt-5">GALLERY</h1>
  <p>Our Activities and Facilities.</p>

</div>

<!-- Photo Grid -->
<div class="container g-c">
<div class="row"> 
  <div class="col-md-4 col-6">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">

  </div>
  <div class="col-md-4 col-6">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">
 
  </div>  
  <div class="col-md-4 col-6">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">
    <img src="assets\WhatsApp Image 2022-04-12 at 8.36.27 AM (1).jpeg" style="width:100%">

  </div>

 
</div>
</div>


<script>
// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// Full-width images
function one() {
    for (i = 0; i < elements.length; i++) {
    elements[i].style.msFlex = "100%";  // IE10
    elements[i].style.flex = "100%";
  }
}

// Two images side by side
function two() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.msFlex = "50%";  // IE10
    elements[i].style.flex = "50%";
  }
}

// Four images side by side
function four() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.msFlex = "25%";  // IE10
    elements[i].style.flex = "25%";
  }
}

// Add active class to the current button (highlight it)
var header = document.getElementById("myHeader");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>



<!-- Making the gallery tab active -->
<script>
    $("#gallery").addClass("active");
</script>

<?php include("footer.php"); ?>
<?php include("header.php"); ?>

<title>Gallery</title>
<style>
  .staggered-grid {
    column-count: 3;
    column-gap: 1rem;
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .staggered-grid li {
    margin-bottom: 1rem;
    break-inside: avoid-column;
  }

  .staggered-grid li img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.2);
    transition: all 0.2s ease-out;
  }

  .staggered-grid li img:hover {
    transform: scale(1.05);
    box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.3);
  }

  @media (max-width: 768px) {
    .staggered-grid {
      column-count: 2;
    }
  }

  @media (max-width: 576px) {
    .staggered-grid {
      column-count: 1;
    }
  }
</style>

<div class="container">
  <div class="gallery" id="myHeader">
    <h1 class="mt-5 font-weight-bold">GALLERY</h1>
    <p>Our Activities and Facilities.</p>

  </div>
  <ul class="staggered-grid">
    <li><img src="assets/new_pics/lab.jpeg" alt="image"></li>
    <li><img src="assets/new_pics/experiments.jpeg" alt="image"></li>
    <li><img src="assets/bg3.jpeg" alt="image"></li>
    <li><img src="assets/slab1.jpeg" alt="image"></li>
    <li><img src="assets/student_lab.jpeg" alt="image"></li>
    <li><img src="assets/bg.jpeg" alt="image"></li>
    <li><img src="assets/new_pics/student.jpeg" alt="image"></li>
    <li><img src="assets/generator.jpeg" alt="image"></li>
    <li><img src="assets/s_lab2.jpeg" alt="image"></li>
    <li><img src="assets/s.jpeg" alt="image"></li>
    <li><img src="assets/tns.jpeg" alt="image"></li>
    <li><img src="assets/new_pics/compound.jpeg" alt="image"></li>
    <li><img src="assets/new_pics/round.jpeg" alt="image"></li>
    <li><img src="assets/images/tap.jpg" alt="image"></li>
  </ul>
</div>



<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<!-- Making the gallery tab active -->
<script>
  $("#gallery").addClass("active");
</script>

<?php include("footer.php"); ?>
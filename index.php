<?php include("header.php"); ?>
<title>Mityana Standard SS - Kagavu</title>
<style>
  .caption {
    position: absolute;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.5);
    padding-bottom: 80px;
    border-top-left-radius: 50px;
    border-top-right-radius: 50px;
  }

  .carousel-item {
    width: 100% !important;
    height: 650px;
  }

  .carousel-item img {
    width: 100% !important;
    background-size: cover !important;
  }

  .carousel-inner {
    width: 100% !important;
  }

  .upcoming-events {
    padding-top: 40px;
    padding-bottom: 40px;
    width: 100% !important;
    background-position: center center;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover !important;
    position: relative;
    color: white;
    background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('assets/WhatsApp Image 2022-04-12 at 8.35.41 AM.jpeg');
  }

  .events-contents {
    color: white;
    background-color: rgba(0, 0, 0, 0.7);
    padding-top: 10px;
    padding-bottom: 100px;
    padding-left: 20px;
    padding-right: 20px;
  }

  .event{
    background-color: white;
    margin-right: 10px;
    margin-top: 10px;
    border-radius: 15px;
    padding-top: 20px;
    padding-bottom: 20px;
    box-shadow: 1px 5px 20px 1px #888888;

  }

  .event-month{
    font-size: 30px;
    color: grey;
    text-align: center;
  }

  .event-day{
    font-weight: bold;
    font-size: 28px;
    text-align: center;
  }

  .event-title{
    font-weight: bold;
    font-size: 20px;
  }

  .event-image{
    border-radius: 20px;
    width: 100%;
    height: 180px;
  }


  @media(max-width: 480px) {

    .carousel-item img {
      width: 100% !important;
      background-size: contain !important;
      height: 60% !important;
    }

    .carousel-inner {
      height: 400px !important;
    }

    .caption {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background-color: rgba(0, 0, 0, 0.5);
      padding-bottom: 300px;
      border-top-left-radius: 30px;
      border-top-right-radius: 30px;
    }
  }
</style>
<!-- CAROUSEL -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">

  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/new_pics/hm.jpeg" alt="" srcset="">
      <div class="carousel-caption caption">
        <h2>2023 ADMISSIONS OPEN FOR TERM 2</h2><br>
        <button class="btn btn-success"><a href="admissions.php"> APPLY NOW</a></button>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets\bg3.jpeg" alt="" srcset="">

      <!-- <div class="carousel-caption caption">
        <h3>Image 2</h3>
        <p>Image 2 description</p>
      </div> -->
    </div>
    <div class="carousel-item">
      <img src="assets\new_pics\WhatsApp Image 2022-10-31 at 12.46.00 AM (1).jpeg" alt="" srcset="">

      <div class="carousel-caption caption">
        <h3>Peaceful Environment</h3>
        <p>Very Peaceful Environment that gives out students peace of mind.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets\new_pics\computer.jpeg" alt="" srcset="">

      <div class="carousel-caption caption">
        <h3>Well Equiped Computer Lab</h3>
        <!-- <p>Very Peaceful Environment that gives out students peace of mind.</p> -->
      </div>
    </div>

    <div class="carousel-item">
      <img src="assets\new_pics\st_kizito.jpeg" alt="" srcset="">
    </div>


  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- !END CAROUSEL -->


<!-- HOMEPAGE BODY -->


<!-- welcome note -->
<div class="row w-row">
  <!-- welcome image -->
  <div class="col-md-6 w-image">
    <img src="assets/welcome.jpeg" alt="WELCOME IMAGE TO MITYANA STANDARD" class="d-flex mx-auto">
  </div>

  <div class="col-md-6 w-text">
    <h2 class="text-center my-3 font-weight-bold into-title">WELCOME NOTE &nbsp; <i class="fas fa-marker"></i></h2>
    <p class="pt-3 intro-text">The school was founded in 1997 to provide quality education to both national and international students based on the ugandan curriculum of education ,
      the school was an effort of three great men who combined resources to start a once small secondary school which has transformed overtime to become a great
      institution of learning in the heart of Mityana district .the school offers general academic subjects and vocational, 20 in number, and a wide range
      of sports activities. The school admits students of all faiths.
      It provides secular education which is in line with the Uganda national goals and objectives-of education . </p>
  </div>

</div>



<section class="values m-5 d-flex">
  <div class="row">

    <!-- VISION -->
    <div class="col-md-3 col-sm-6">
      <div class="card shadow mt-4" style="border: 1px solid orange;">
        <i class="fab fa-dribbble d-flex mx-auto" style="background-color: orange"></i>
        <div class="card-body text-center">
          <h5 class="font-weight-bold v-h pb-1">SCHOOL VISION</h5>
          <p>To Anchor Mityana Standard S.S. as a Center Of Academic Excellence in Uganda</p>
        </div>
      </div>
    </div>

    <!-- MISSION -->
    <div class="col-sm-6 col-md-3">
      <div class="card shadow mt-4" style="border: 1px solid maroon;">
        <i class="fa fa-bullseye d-flex mx-auto text-white" style="background-color: maroon"></i>
        <div class="card-body text-center">
          <h5 class="font-weight-bold v-h pb-1">SCHOOL MISSION</h5>
          <p>To Provide Quality Education, Practical Skills & Moral Guidance For A Better Future.</p>
        </div>
      </div>
    </div>

    <!-- CORE VALUES -->
    <div class="col-sm-6 col-md-3">
      <div class="card shadow mt-4" style="border: 1px solid green;">
        <div class="card-head">
          <i class="fa fa-tachometer d-flex mx-auto text-white" style="background-color: green"></i>
        </div>

        <div class="card-body">
          <h5 class="font-weight-bold v-h pb-1 text-center">CORE VALUES</h5>
          <ul>
            <li>Team Work </li>
            <li>Integrity</li>
            <li>Discipline </li>
            <li>Moral Uprightness </li>
            <li>Self Reliance</li>
            <li>God Loving</li>
          </ul>

        </div>
      </div>
    </div>

    <!-- MOTO -->
    <div class="col-sm-6 col-md-3">
      <div class="card shadow mt-4" style="border: 1px solid blue;">
        <div class="card-head">
          <i class="fa fa-fire d-flex mx-auto text-white" style="background-color: blue"></i>
        </div>

        <div class="card-body text-center">
          <h5 class="font-weight-bold v-h pb-1">MOTO</h5>
          <p style="font-size: 20px;">"Education For Development"</p>
        </div>
      </div>
    </div>


  </div>

</section>
<!-- DEPARTMENTS -->
<section class="departments">
  <h5 class="text-center d-small">OUR</h5>
  <h2 class="text-center d-head ">DEPARTMENTS</h2>

  <div class="row mx-5 my-4">

    <div class="col-md-3 d-img img-academics mx-auto">
      <div class="wrap my-auto">
        <h3>Academics</h3>
        <p class="text-white p-5">Mityana Standard SS Kagavu is a co-educational day and boarding secondary school. It has both O and A Levels. <br> <b>Center Number:</b> U1418
        </p>
      </div>
    </div>

    <div class="col-md-3 d-img img-facilities mx-auto">
      <div class="wrap my-auto">
        <h3>Facilities</h3>
        <p class="text-white p-5">Students enjoy our state-of-the-art facilities to meet the needs, beautiful and comfortable learning environment.

        </p>
      </div>
    </div>

    <div class="col-md-3 d-img img-activities mx-auto">
      <div class="wrap my-auto">
        <h3>Co-Curricular Activities</h3>
        <p class="text-white p-5">Talent is a God given gift. We help our students to nurture the talent.
        </p>
      </div>
    </div>

  </div>
</section>


<!-- UPCOMING EVENTS -->
<section class="events">
  <div class="upcoming-events">
    <div class="events-content">
      <h5 class="text-center d-small">OUR</h5>
      <h2 class="text-center d-head ">UPCOMING EVENTS</h2>
    </div>

  </div>


  <div class="row my-4 events-body">

  <!-- EVENT 1 -->
    <div class="col-md-6">
      <div class="row event">
        <div class="col-md-2">
          <!-- <p class="event-month">FEB</p>
          <P class="event-day">10</P> -->
        </div>
        <div class="col-md-6">
          <p class="event-title">MDD COMPETITION!</p>
          <p class="event-description">Fuel your creativity at MDD Competition, where innovation meets design excellence. Unleash your potential and be recognized!</p>
        </div>
        <div class="col-md-4">
          <img src="https://th.bing.com/th/id/OIG.hZAngt8DCf8WgFp.iBQ.?pid=ImgGn" class="event-image" alt="Event Image">
        </div>
      </div>
    </div>

    <!-- EVENT 2 -->
    <div class="col-md-6">
      <div class="row event">
        <div class="col-md-2">
          <p class="event-month">JUN</p>
          <P class="event-day">26</P>
        </div>
        <div class="col-md-6">
          <p class="event-title">VISITATION DAY</p>
          <p class="event-description">Gates will be opened by 9AM and will close at 6PM</p>
        </div>
        <div class="col-md-4">
          <img src="assets/images/visitation.png" class="event-image" alt="Event Image">
        </div>
      </div>
    </div>
   

  </div>
</section>

<div class="container d-flex mt-5">
  <a href="admissions.php" class="btn btn-outline-success apply-btn mx-auto shadow">APPLY NOW</a>

</div>

<script>
  $("#home").addClass("active");
</script>

<?php include("footer.php"); ?>

<style>
/* Make the image fully responsive */
.carousel-inner img {
    width: 100%;
    height: 500px;
}
.box {
    height: 200px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php require("guesttop.php"); ?>
<div class="container mt-3 mb-3">
  <div id="demo" class="carousel slide" data-ride="carousel">
    
    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    
    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active"><img src="2.jpg">
		  <div class="carousel-caption"><h4><p class="text-danger">There is a hope of life to someone in your blood donation.</h4></p></div>	
	</div>
      <div class="carousel-item"><img src="11.png"  ></div>
      <div class="carousel-item"><img src="15.png" ></div>
    </div>
    
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev"><span class="carousel-control-prev-icon"></span></a><a class="carousel-control-next" href="#demo" data-slide="next"><span class="carousel-control-next-icon"></span></a></div>
</div>
<div class="container-fluid row mb-3">
  <div class="col-md-4 ">
    <div class="bg-danger box  p-4 d-flex justify-content-center align-items-center flex-column">
      <h4 class="mb-4 text-light">Donation</h4>
      <div style="display: inline-flex"><i class="fas fa-hand-holding-heart text-light fa-3x mt-2 mr-3"></i>
        <p class=" text-light">We are grateful for Our Real Hero and hope for them alway success who helps
          Donate to Blood Bank Today</p>
      </div>
		<a href="Registration.php" class="btn btn-secondary" role="button">Donate Us</a>
    </div>
  </div>
  <div class="col-md-4 ">
    <div class="bg-danger box  p-4 d-flex justify-content-center align-items-center flex-column">
      <h4 class="mb-4 text-light">Volunteer</h4>
      <div style="display: inline-flex"><i class="fas fa-user text-light fa-3x mt-2 mr-3"></i>
        <p class="text-light"> You will become a vital part of the biggest Blood Donation organization Blood bank today in the world
          </p>
      </div>
		 <a href="Registration.php" class="btn btn-secondary" role="button">Join Now</a>
    </div>
  </div>
  <div class="col-md-4 ">
    <div class="bg-danger box  p-4 d-flex justify-content-center align-items-center flex-column">
      <h4 class="mb-4 text-light">Donation</h4>
      <div style="display: inline-flex"><i class="fas fa-hand-holding-heart text-light fa-3x mt-2 mr-3"></i>
        <p class="text-light">We are grateful for Our Real Hero and hope for them alway success who helps
          Donate to Blood Bank Today</p>
      </div>
		<a href="Registration.php" class="btn btn-secondary" role="button">Donate Us</a>
    </div>
  </div>
</div>
<?php require("guestbottom.php"); ?>

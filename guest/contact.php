<style>
.bg-img {
    /* The image used */
    background-image: url("2.jpg");
    /* Control the height of the image */
    min-height: 380px;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}
</style>
<?php require ('guesttop.php');?>
<div class="container pr-4">
  <div class="bg-img">
	  <div class="row">
	  <div class="col-md-6"></div>
	  <div class="col-md-6 p-3 ">
    <form action="/action_page.php" >
      
      <div class="form-group">
		  <h1>Contact Us</h1>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" class="form-control" name="email" required>
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" class="form-control" name="psw" required>
      <label for="psw"><b>Subject</b></label>
      <input type="text" class="form-control"  placeholder="Enter subject" name="sub">
      <br>
      <textarea class="form-control" placeholder="Enter message" rows="5" ></textarea>
      <button type="submit" class="btn btn-success"  class="form-control">
      Submit
      </button>
    </form>
		</div>
	  </div>
		  
  </div>
</div>
</div>
<!-- <form  action="/action_page.php">
    <div class="form-group">
		<div class="row">
      <div class="col-md-12">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
			</div></div>
			<div class="row">
        <div class="col-md-12">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
			</div></div>
    </div>
    
    <div class="form-group">        
      <div class=" col-sm-8">
        <input type="text" class="form-control"  placeholder="Enter subject" name="sub">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-8">
      <textarea class="form-control" placeholder="Enter message" rows="5" ></textarea>
        
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-10">
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </div>
  </form>
</div>-->

<?php require ('guestbottom.php');?>
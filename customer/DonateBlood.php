<?php
		  $capital=array('Andhra Pradesh'=>"Hydrabad",'Assam'=>"Dispur",'Bihar'=>"Patna",'Gujarat'=>"Gandhinagar",'Rajasthan'=>"Jaipur",'Punjab'=>"Chandigarh",'Tamil Nadu'=>"Chennai",'Maharashtra'=>"Mumbai",'Madhya Pradesh'=>"Bhopal",'Himachal Pradesh	'=>"Shimla",'West Bengal'=>"Kolkatta",'Uttar Pradesh'=>"Lucknow");
		  ?>
<!DOCTYPE html>
<html>
<head>
    <title> Donate Blood  </title>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
	@media screen and (min-width: 992px) {
		.max-width-55{
			max-width: 55%;
		}
	}
	</style>
</head>

<body>
<?php require ('top.php'); $u=$_SESSION['name'];?>
    <div class="container max-width-55" >
        <form method="post"  >
		   <h3 class="mt-4 text-secondary"> Donor Information  </h3><hr width="100%" >
			<div class="form-group">
                <div class="row">
                    <div class="col-md-4">
	  				  <label for="date"> Birth Day : </label>
						<select name="day" class="form-control" id="sel1" required>
							<option selected disabled>---Select Day---</option>
                        <?php
							for ($x = 1; $x <= 31; $x++) {
  								echo "<option> $x </option>";
                              }
                         ?>
						</select>
                    </div>
						<div class="col-md-4">
		  				<label for="month"> Month : </label>
						<select  class="form-control" name=month id="sel1" required>
							<option selected disabled>---Select Month---</option>
                        <?php
							for ($x = 1; $x <= 12; $x++) {
  								echo "<option> $x </option>";
                              }
                         ?>
							</select>
                    </div>
      	              <div class="col-md-4">
						<label for="year"> Year : </label>
                        <select  class="form-control" name=year id="sel1" required>
							<option selected disabled>---Select Year---</option>
                        <?php
							for ($x = 1950; $x <= 2020; $x++) {
  								echo "<option> $x </option>";
                              }
                         ?>
						</select>
                    </div>
					
                </div>
            </div>
            <div class="form-group">
				<div class="row">
					
					<div class="col-md-4">
                		<label for="bgroup"> Blood Group : </label>
                		<select class="form-control" name="bg" id="sel1" required>
                    		<option> A- </option>
                    		<option> A+ </option>
                    		<option> B- </option>
                    		<option> B+ </option>
							<option> O- </option>
							<option> O+ </option>
							<option> AB+ </option>
							<option> AB- </option>
                		</select>
					</div>
					<div class="col-md-4">
                		<label for="city"> Gender : </label>
                		<select class="form-control" name="gender" required>
                    		<option> Male </option>
                    		<option> Female </option>
                    		<option> Other </option>
						</select>
					</div>
					<div class="col-md-4">
						<label for="units"> Units :</label>
                        <input type="number" class="form-control" id="unit" placeholder="Units in ml" name="unit">
                    </div>
					
           		</div>
				<div class="form-group"><br>
					<div class="row">
						<div class="col-md-12">
						<input type="file" name="profile">
					</div></div></div>
				<div class="row">
				<div class="col-md-12">
					<br><label for="msg"> Dieases if Any : </label>
						<textarea name="die" class="form-control" rows="2" ></textarea>
				  </div></div>
			</div>
			<h3 class="mt-4 text-secondary ">  Contact Information </h3><hr width="100%" >
		  <div class="form-group">
				<div class="row">
					<div class="col-md-4">
                		<label for="city"> State : </label>
               		  <select class="form-control" id="sel1" required name="state">
						<option selected disabled>---Select State---</option>
						<?php
							foreach($capital as $s=>$c):
								echo "<option value='$s'>$s</option>";
							endforeach;
						?>
       				  </select>
				  </div>
					<div class="col-md-4">
                		<label for="city"> City : </label>
               		  <select class="form-control" id="sel1" required name="city">
						<option selected disabled>---Select City---</option>
						<?php
							foreach($capital as $s=>$c):
								echo "<option value='$c'>$c</option>";
							endforeach;
						?>
        				</select>
					</div>
					<div class="col-md-4">
						<label for="pincode"> Pincode : </label>
						<input name="pin" type="text" required  class="form-control" id="sel1" placeholder="Enter Pincode" maxlength="6" >
					</div>
		    </div>
		  </div>
            <div class="form-group text-right">
              <button type="submit" value="Submit" class="btn btn-danger " name="donate"> Donate Blood </button>
          </div>
            
        </form>
    </div>
    <?php require ('bottom.php');?>
</body>
</html>
<?php
	if(isset($_REQUEST['donate']))
	{
		$day=$_REQUEST['day'];
		$month=$_REQUEST['month'];
		$year=$_REQUEST['year'];
		$bg=$_REQUEST['bg'];
		$gender=$_REQUEST['gender'];
		$unit=$_REQUEST['unit'];
		$die=$_REQUEST['die'];
		$state=$_REQUEST['state'];
		$city=$_REQUEST['city'];
		$pin=$_REQUEST['pin'];
		$fname=$_FILES['profile']['name'];
		$floc=$_FILES['profile']['tmp_name'];
		$dob=$year."-".$month."-".$day;
		include('connect.php');
		move_uploaded_file($floc,"profile/".$fname);
		$q="select * from tbl_user where name ='$u'";
		$res=mysqli_query($con,$q)or die("Query Failed");
		$r=mysqli_fetch_array($res);
		$q1="insert into tbl_donar values(null,'$r[1]','$r[2]','$bg','$r[9]','$gender','$dob','$state','$city','$pin','$die','$r[6]','$fname','Pending','$unit')";
		$res1=mysqli_query($con,$q1) or die("Query Failed");
		if($res1)
		{
			echo "<script>alert('Your Donation Request is Sended..')</script>";
		}
	}
?>
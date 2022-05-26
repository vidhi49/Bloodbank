<?php
		  $capital=array('Andhra Pradesh'=>"Hydrabad",'Assam'=>"Dispur",'Bihar'=>"Patna",'Gujarat'=>"Gandhinagar",'Rajasthan'=>"Jaipur",'Punjab'=>"Chandigarh",'Tamil Nadu'=>"Chennai",'Maharashtra'=>"Mumbai",'Madhya Pradesh'=>"Bhopal",'Himachal Pradesh	'=>"Shimla",'West Bengal'=>"Kolkatta",'Uttar Pradesh'=>"Lucknow");
		  
		  $btype=array("A-","A+","AB-","AB+","B-","B+","O-","O+");
		  $gender=array("Male","Female","Others");
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
<?php require ('admintop.php');?>

<?php
	require('connect.php');
	if(isset($_REQUEST['did']))
	{
		$did=$_REQUEST['did'];
		$q="select * From tbl_donar where ID='$did'";
		$res=mysqli_query($con,$q) or die("Query Failed");
		$r=mysqli_fetch_array($res);
	}
?>

<div>
    <div class="container max-width-55" >
        <form method="post" >
		   <h3 class="mt-4 text-secondary"> Donor Information  </h3><hr width="100%" >
			<div class="form-group">
                <div class="row">
                    <div class="col-md-4">
						<label for="name"> Name:  </label>
	  				  <input type="text" class="form-control" placeholder="Full name" name="name" value='<?php echo $r[1];?>' required>
                    </div>
					<div class="col-md-4">
						<label for="email"> Email: </label>
		  				<input type="email" class="form-control" placeholder="abc@gmail.com" value='<?php echo $r[2];?>' name="email" required>
                    </div>
      	              <div class="col-md-4">
						<img src="">
                    </div>
                </div>
            </div>
            <div class="form-group">
				<div class="row">
					
					<div class="col-md-4">
                		<label for="bgroup"> Blood Group : </label>
                		<select class="form-control" name="bg" required>
                    		<?php
								foreach($btype as $t):
										echo "<option ";
										if($t==$r[3]){
											echo 'selected';}
											echo" >$t</option>";
								endforeach;
							?>
                		</select>
					</div>
					<div class="col-md-4">
                		<label for="city"> Gender : </label>
                		<select class="form-control" name="gen" required>
                    		<?php
							foreach($gender as $g):
								echo "<option ";
										if($g==$r[5]){
											echo 'selected';}
											echo" >$g</option>";
							endforeach;
						?>
						</select>
					</div>
					<div class="col-md-4">
						<label for="units"> Birth Date :</label>
                        <input type="date" class="form-control" value='<?php echo $r[6];?>' name="dob">
                   
						</div>
           		</div>
				<div class="row">
				<div class="col-md-12">
					<br><label for="msg"> Dieases if Any : </label>
						<textarea name="die" class="form-control" rows="2" ><?php echo $r[10];?></textarea>
				  </div></div>
			</div>
			<h3 class="mt-4 text-secondary ">  Contact Information </h3><hr width="100%" >
		  <div class="form-group">
				<div class="row">
				<div class="col-md-4">
				  <label for="mno"> Mobile No :</label>
                <input name="mobile" class="form-control" value='<?php echo $r[4];?>' type="tel" maxlength="10"
                    placeholder="Enter Mobile Number" required>
					</div>
					<div class="col-md-4">
                		<label for="city"> State : </label>
               		  <select class="form-control" required name="state">
						<option selected disabled>---Select State---</option>
						<?php
							foreach($capital as $s=>$c):
								echo "<option ";
										if($s==$r[7]){
											echo 'selected';}
											echo" >$s</option>";
							endforeach;
						?>
       				  </select>
				  </div>
				  
					<div class="col-md-4">
                		<label for="city"> City : </label>
               		  <select class="form-control" required name="city">
						<option selected disabled>---Select City---</option>
						<?php
							foreach($capital as $s=>$c):
								
										echo "<option ";
										if($c==$r[8]){
											echo 'selected';}
											echo" >$c</option>";
							endforeach;
						?>
        				</select>
					</div>
					<div class="col-md-4">
						<label for="pincode"> Pincode : </label>
						<input name="pin" type="text" value='<?php echo $r[9];?>' required  class="form-control" id="sel1" placeholder="Enter Pincode" maxlength="6" >
					</div>
		    </div>
		  </div>
            <div class="form-group text-right">
              <button type="submit" value="Submit" class="btn btn-primary " name="update"> Update Donar </button>
          </div>
            
        </form>
    </div></div>
    <?php require ('adminbottom.php');?>
</body>

</html>

<?php
	if(isset($_REQUEST['update']))
	{
		$name=$_REQUEST['name'];
		$eid=$_REQUEST['email'];
		$bg=$_REQUEST['bg'];
		$gen=$_REQUEST['gen'];
		$pin=$_REQUEST['pin'];
		$dob=$_REQUEST['dob'];
		$cno=$_REQUEST['mobile'];
		$die=$_REQUEST['die'];
		$state=$_REQUEST['state'];
		$city=$_REQUEST['city'];		
		$q="update tbl_donar set name='$name',email='$eid',bgroup='$bg',contact='$cno',gender='$gen',dob='$dob',state='$state',city='$city',pincode='$pin',diease='$die' where ID=$did";
		if(mysqli_query($con,$q))
		{
			
			header("location:Donar.php");
		}
		else
		{
			exit("Query Failed".mysqli_error($con));
		}
			
		
	}
	
?>
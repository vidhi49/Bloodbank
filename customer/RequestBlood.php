<?php
		  $capital=array('Andhra Pradesh'=>"Hydrabad",'Assam'=>"Dispur",'Bihar'=>"Patna",'Gujarat'=>"Gandhinagar",'Rajasthan'=>"Jaipur",'Punjab'=>"Chandigarh",'Tamil Nadu'=>"Chennai",'Maharashtra'=>"Mumbai",'Madhya Pradesh'=>"Bhopal",'Himachal Pradesh	'=>"Shimla",'West Bengal'=>"Kolkatta",'Uttar Pradesh'=>"Lucknow");
		  ?>
<!DOCTYPE html>
<html>
<head>
    <title> Request Blood  </title>
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
<?php require ('top.php'); $u=$_SESSION['name']; ?>
<div class="container max-width-55" >
	<h3 Style="font-weight: 700; color: #BAC3CB;"> Request for Blood </h3>
        <form method="post" action="#" >
		  <h3 class="mt-4 text-secondary">  Patient Details  </h3><hr min-width="100%" >
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
						<label for="patient name"> Patient Name :</label>
                        <input type="text" class="form-control" id="pname" placeholder="Patient Name" name="pname" required>
                    </div>
                    <div class="col-md-4">
						<label for="doctor name"> Doctor Name :</label>
                        <input type="text" class="form-control" id="dname" placeholder="Doctor Name" name="dname" required>
                    </div>
                    <div class="col-md-4">
                        <label for="bgroup"> Blood Group : </label>
                		<select class="form-control" name="bg" required>
							<option disabled selected>---Blood Group---</option>
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
                </div>
            </div>
            <div class="form-group">
				<div class="row">
					<div class="col-md-4">
                		<label for="city"> State : </label>
               		  <select class="form-control" name="state" required name="state">
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
               		  <select class="form-control" name="city" required name="city">
						<option selected disabled>---Select City---</option>
						<?php
							foreach($capital as $s=>$c):
								echo "<option value='$c'>$c</option>";
							endforeach;
						?>
       				  </select>
					</div>
					<div class="col-md-4">
						<label for="units"> Units :</label>
                        <input type="number" class="form-control" id="unit" placeholder="Units in ml" name="unit">
                    </div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<br><label for="hname"> Hospital Name OR Address : </label>
						<textarea name="hname" class="form-control" rows="1" id="hname" placeholder="Enter Hospital Name OR Address" required></textarea>
					</div>
			  </div>
		  </div>
            <hr min-width="100%" >
          <h3 class="mt-4 text-secondary">  Contact Details  </h3><hr min-width="100%" >
			<div class="form-group">
                <div class="row">
                    
                    <div class="col-md-6">
						<label for="mno"> Mobile No :</label>
                		<input name="mobile" class="form-control" id="mobile" type="tel" maxlength="10"
                    placeholder="Mobile Number" required>
                    </div>
                    <div class="col-md-6">
                        <label for="date"> Date When Need : </label>
                		<input type="date" name="ndate" class="form-control" Placeholder="Date When Need" required>
                    </div>
                </div>
            </div>
			<div class="form-group">
                <div class="row">
                    <div class="col-md-4">
						<label for="priority"> Priority :</label>
                        <select name="priority"  required class="form-control" >
							<option selected disabled>---Priority Type---</option>
							<option> Normal </option>
							<option> Early </option>
						</select>
                    </div>
                    <div class="col-md-8">
                        <label for="email"> Email : </label>
              			<input name="email" type="email" required class="form-control" id="eml" placeholder="ABC12@gmail.com" autocomplete="off" >
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
					<br><label for="msg"> Reason : </label>
						<textarea name="res" class="form-control" rows="2" id="msg"></textarea>
				  </div>
				</div>
            </div>
			<div class="form-group text-right">
              <button type="submit" value="Submit" class="btn btn-danger rounded-lg " name="send"> Send Request </button>
          </div>
        </form>
    </div>
	<?php require ('bottom.php');?>
</body>
</html>
<?php
	if(isset($_REQUEST['send']))
	{
		$pname=$_REQUEST['pname'];
		$dname=$_REQUEST['dname'];
		$bg=$_REQUEST['bg'];
		$hname=$_REQUEST['hname'];
		$unit=$_REQUEST['unit'];
		$res=$_REQUEST['res'];
		$state=$_REQUEST['state'];
		$city=$_REQUEST['city'];
		$mobile=$_REQUEST['mobile'];
		$ndate=$_REQUEST['ndate'];
		$priority=$_REQUEST['priority'];
		$email=$_REQUEST['email'];
		require('connect.php');
$q="insert into tbl_request values(null,'$pname','$dname','$bg','$state','$city','$hname','$mobile','$ndate','$priority','$email','$res','$unit','Pending')";
		if(mysqli_query($con,$q))
		{
			echo "<script>alert('Your Blood Request id sended...')</script>";
		}
	}
?>
	
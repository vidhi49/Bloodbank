<!DOCTYPE html>
<html>
<head>
    <title> Register </title>
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
<?php require ('guesttop.php');?>
<div  class="justify-center" >
    <div class="container max-width-55" >
		 <center><h3 class="m-4 text-danger">Register Here </h3><hr width="100%" ></center>
        <form method="post" >
			 <div class="form-group">
              <label> Enter Your Name :</label>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="mname" placeholder="Middle Name" name="mname" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" required>
                    </div>
                </div>
            </div>
			<div class="form-group">
				<div class="row">
					
					<div class="col-md-4">
                		<label for="bgroup"> Blood Group : </label>
                		<select class="form-control" name="bg" required>
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
						<label for="units"> Birth Date :</label>
                        <input type="date" class="form-control" name="dob">
                    </div>
           		</div>
            <div class="form-group">
                <label for="mno"> Mobile No :</label>
                <input name="mobile" class="form-control" id="mobile" type="tel" maxlength="10"
                    placeholder="Enter Mobile Number" required>
            </div>
            
          <div class="form-group">
            <label for="email"> Email : </label>
              <input name="email" type="email"  class="form-control" id="eml" placeholder="ABC12@gmail.com" autocomplete="off" required >
            </div>
            <div class="form-group">
                <label for="password"> Create Password :</label>
                <input type="password" name="pwd" autocomplete="new-password" placeholder="Enter Password (Minimum Length 8)" id="password" class="form-control" required>
            </div>
			<div class="form-group">
                <label for="cpassword"> Confirm Password :</label>
                <input type="password" name="cpwd" autocomplete="new-password" placeholder="Enter Password (Minimum Length 8)" id="password" class="form-control" required>
            </div>
            <div class="form-group ">
			<div class="row">
					
					<div class="col-md-4">
                		<label for="cpassword"> Select Your Profile:</label>
                		<input type="file" name="profile">						    
					</div>
					<div class="col-md-4">
                		
					</div>
					<div class="col-md-4 text-right">
						 <button type="submit" value="Submit" class="btn btn-danger " name="register"> Register </button>
				 <p class="Large fw-bold mt-2 pt-1 ">Already Registered? <a href="Login.php"
                class="link-danger"> &nbsp; Sign In</a></p>
                    </div>
           		</div>
             
          </div>
		</form>
	</div></div>
	<?php require ('guestbottom.php');?>
</body>
</html>
<?php
	if(isset($_REQUEST['register']))
	{
		
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$mname=$_POST['mname'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$bg=$_POST['bg'];
		$dob=$_POST['dob'];
		$gender=$_POST['gender'];
		$pwd=$_POST['pwd'];
		$cpwd=$_POST['cpwd'];
		$f=$_FILES['profile']['name'];
		$floc=$_FILES['profile']['tmp_name'];
		$name=$fname." ".$mname." ".$lname;
		echo "$f $floc";
		include('connect.php');
		$q="insert into tbl_user values(null,'$name','$email','$bg','$gender','$dob','$f','$pwd','$cpwd','$mobile','Customer')";
		
		if(mysqli_query($con,$q))
		{
			move_uploaded_file($floc,"profile/".$f);
			move_uploaded_file($floc,"profile/".$f);
			//header('location:Login.php');
		}
		else
		{
			die("<center><h1>Query Failed".mysqli_error($con)."</h1></center>");
		}
	}
?>
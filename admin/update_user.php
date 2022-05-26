<?php
		  $btype=array("A-","A+","AB-","AB+","B-","B+","O-","O+");
		  $gender=array("Male","Female","Others");
		  ?>
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
<?php require ('admintop.php');?>

<?php
	require('connect.php');
	if(isset($_REQUEST['did']))
	{
		$did=$_REQUEST['did'];
		$q="select * From tbl_user where ID='$did'";
		$res=mysqli_query($con,$q) or die("Query Failed");
		$r=mysqli_fetch_array($res);
	}
?>

<div   >
    <div class="container max-width-55" >
		 <h2 class="m-3 text-secondary">User Infomation </h2><hr width="100%" >
        <form method="post" action="#" >
			 <div class="form-group">
                <label for="mno"> Name :</label>
                <input name="name" class="form-control"  type="text" value='<?php echo $r[1];?>'
                    placeholder="Enter Name" required>
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
										if($g==$r[4]){
											echo 'selected';}
											echo" >$g</option>";
							endforeach;
						?>
						</select>
					</div>
					<div class="col-md-4">
						<label for="units"> Birth Date :</label>
                        <input type="date" class="form-control" name="dob" value='<?php echo $r[5];?>'>
                    </div>
           		</div>
            <div class="form-group">
                <label for="mno"> Mobile No :</label>
                <input name="mobile" class="form-control" id="mobile" type="tel" value='<?php echo $r[9];?>' maxlength="10"
                    placeholder="Enter Mobile Number" required>
            </div>
            
          <div class="form-group">
            <label for="email"> Email : </label>
              <input name="email" type="email"  class="form-control" id="eml" value='<?php echo $r[2];?>' placeholder="ABC12@gmail.com" autocomplete="off" required >
            </div>
            
            <div class="form-group ">
						 <button type="submit" value="Submit" class="btn btn-primary " name="update"> Update </button>
           		</div>
             
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
		$dob=$_REQUEST['dob'];
		$cno=$_REQUEST['mobile'];
				
		$q="update tbl_user set name='$name',email='$eid',bgroup='$bg',cno='$cno',gender='$gen',dob='$dob' where ID=$did";
		if(mysqli_query($con,$q))
		{
			
			header("location:total_user.php");
		}
		else
		{
			exit("Query Failed".mysqli_error($con));
		}
			
		
	}
	
?>
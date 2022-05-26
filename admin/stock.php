<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
<script src="js/jquery-3.4.1.min"></script> 


<?php require ('admintop.php');?>
<?php
		  $btype=array("A-","A+","AB-","AB+","B-","B+","O-","O+");
		  ?>
 <div>
<div class="container mt-5">
 <h1>Add Blood Units Here</h1>
  <form method="post" >
    <div class="row">
      <div class="col-md-6">
        <select name="type"class="form-control">
			<option selected disabled>--Select Blood Type--</option>
			<?php
				foreach($btype as $t):
					echo "<option value='$t'>$t</option>";
				endforeach;
			?>
        </select>
      </div>
      <div class="col-md-6">
        <input type="number" class="form-control" placeholder="Enter Units(in ml)" name="units">
      </div>
    </div>
    <button type="submit" class="btn btn-success mt-3" name="add">Add Units</button>
  </form>
</div>
<br>


<?php
	if(isset($_REQUEST['add']))
	{
		$type=$_REQUEST['type'];
		$unit=$_REQUEST['units'];
		require('connect.php');
		$q="select * from tbl_bloodstock where type='$type'";
		$res=mysqli_query($con,$q) or die("Query Failed");
		$r=mysqli_fetch_array($res);
		$u=$r[1]+$unit;
		
	$q1="update tbl_bloodstock set units='$u' where type='$type'" ;
	$res=mysqli_query($con,$q1) or die("Query Failed");
	
	}

?>

 <?php require ('stock-file.php');?>
<br>
</div>
<?php require ('adminbottom.php');?>
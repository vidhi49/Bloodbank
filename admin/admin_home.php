<!--<!DOCTYPE html>
<html>
<head>
    <title> Admin Home </title>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>-->
<?php
require('connect.php');
$p1="select count(pID) from tbl_request";
$res=mysqli_query($con,$p1) or die("query failed");
$r=mysqli_fetch_array($res);
$p2="select count(pID) from tbl_request where status='Pending'";
$res2=mysqli_query($con,$p2) or die("query failed");
$r2=mysqli_fetch_array($res2);
$p3="select count(ID) from tbl_donar";
$res3=mysqli_query($con,$p3) or die("query failed");
$r3=mysqli_fetch_array($res3);


require ('admintop.php');?>
<div class="container">
	<div class="card-columns">
		<div class="card  bg-danger m-3 p-5 text-center">
			<div class="card-body text-center text-light">
				<h5> Total Request</h5>
				<p><font size=30px><b><?php echo $r[0];?></b></font><p>
			</div>
		</div>
		<div class="card  bg-danger m-3 p-5 text-center">
			<div class="card-body text-center text-light">
				<h5> Total Donor </h5>
				<p><font size=30px><b><?php echo $r3[0];?></b></font><p>
			</div>
		</div>
		<div class="card  bg-danger m-3 p-5 text-center">
			<div class="card-body text-center text-light">
				<h5> Pending Request</h5>
				<p><font size=30px><b><?php echo $r2[0];?></b></font><p>
				
			</div>
		</div>
	</div>
	<?php 
	require('connect.php');
	$q="select * from tbl_donar order by ID desc limit 5";
	$res=mysqli_query($con,$q) or die("Query Failed");
	$nor=mysqli_num_rows($res);
	if($nor>0)
	{
		?>
		 <div >
		<div class="container">
			<h2 class="text-secondary">Resent Donars</h2>
			<table class="table table-hover">
			<thead>
			<tr>
			<th>ID</th>
        <th>Name</th>
        <th>Email</th>
		<th>Type</th>
        <th>Contact</th>
        <th>Gender</th>
		<th>DOB</th>
		<th>Units</th>
        <th>Dieases</th>
        <th>Status</th>
		
      </tr>
    </thead>
    <tbody>
	<?php
		
		while($r=mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo "<td>$r[0]</td>";
			echo "<td>$r[1]</td>";
			
			echo "<td>$r[2]</td>";
			echo "<td>$r[3]</td>";
			echo "<td>$r[4]</td>";
			echo "<td>$r[5]</td>";
			echo "<td>$r[6]</td>";
			echo "<td>$r[13]</td>";
			echo "<td>$r[10]</td>";
			echo "<td><font color=green><b>$r[12]</b></font></td>";
			
			
			
		}
		echo "</tr>";
	}echo "</table>";
	require('connect.php');
	$q="select * from tbl_request order by pID desc limit 5 ";
	$res=mysqli_query($con,$q) or die("Query Failed");
	$nor=mysqli_num_rows($res);
	if($nor>0)
	{
		?>
		<div >
		<div class="container">
			<h2 class="text-secondary">Recent Blood Request</h2> 
			<table class="table table-hover">
			<thead>
			<tr>
			<th>ID</th>
        <th>FullName</th>
        <th>Email</th>
		<th>BloodGroup</th>
        <th>Contact</th>
        <th>Reason</th>
		<th>Units</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
	<?php
		
		while($r=mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo "<td>$r[0]</td>";
			echo "<td>$r[1]</td>";
			echo "<td>$r[10]</td>";
			echo "<td>$r[3]</td>";
			echo "<td>$r[7]</td>";
			echo "<td>$r[11]</td>";
			echo "<td>$r[12]</td>";
			echo "<td><font color=green>$r[13]</font></td>";
			if($r[13]=="Approved")
			{
				$btn="warning";
				$msg="$r[12] Unit is deducted";
			}
			elseif($r[13]=="Rejected")
			{
				$btn="danger";
				$msg="0 Unit is deducted";
			}
			else{
				$btn="primary";
			$msg="Pending";}
			echo "<td>";
			echo "<input type='submit' value='$msg' class='btn btn-$btn rounded-lg'> &nbsp;";
			echo "</td>";
			
			
		}
		echo "</tr>";
	}else
	{
		echo "<center><h1>No Request is Found</h1></center>";
	}
?>
    </tbody>
  </table>

	
</div></div></div></div></div>
			<?php require ('adminbottom.php');?>


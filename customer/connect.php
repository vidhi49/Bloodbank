<?php
	$con=mysqli_connect("localhost","root","") or die("couldnt connect to server");
	mysqli_select_db($con,"db_bloodbank") or die("database not found");
?>
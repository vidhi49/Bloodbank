<?php
	if(isset($_REQUEST['did']))
	{
		require("connect.php");
		$did=$_REQUEST['did'];
		$q="Delete From tbl_user where dno='$did'";
		if(mysqli_query($con,$q))
		{
			header("location:total_user.php");
		}
		else
		{
			die("Query Failed".mysqli_error($con));
		}
	}
?>
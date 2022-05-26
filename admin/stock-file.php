<?php
	require('connect.php');
	$q="select * from tbl_bloodstock";
	$res=mysqli_query($con,$q) or die("Query Failed");
	$nor=mysqli_num_rows($res) or die("Query Failed");
	if($nor>0)
	{
		echo "<div class='container'><div class='row' >";
		while($r=mysqli_fetch_array($res))
		{
			echo "<div class='col-md-3 p-3  text-light' >
					<div class='p-3' style='background-color:#cf000f;border-radius:10px;height:100px;'>
						<font size=5px >$r[0]</font>
						<p><font size=2px >$r[1] Units( in ml )</font></p>
					</div>
			</div>";
			
		}
		echo "</div></div>";
	}else
	{
		die("No rows found");
	}
?>
<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="js/jquery-3.4.1.min"></script> 
	
</script>
<?php require ('top.php'); 
	require('connect.php');
	$u=$_SESSION['name'];
	$q="select * from tbl_request where name='$u'";
	$res=mysqli_query($con,$q) or die("Query Failed");
	$nor=mysqli_num_rows($res);
	if($nor>0)
	{
		?>
		<div >
		<div class="container">
			<h2>Request History</h2><hr>  <br>    
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
			echo "<td><font color=green><b>$r[13]<b></font></td>";
			
			
		}
		echo "</tr>";
	}else
	{
		echo "<center><h1>No Request is Made</h1></center>";
	}
?>
    </tbody>
  </table>
</div>

</div>
<?php require ('bottom.php');?>
<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="js/jquery-3.4.1.min"></script> 
	
</script>
<?php require ('admintop.php');
	require('connect.php');
	$q="select * from tbl_user";
	$res=mysqli_query($con,$q) or die("Query Failed");
	$nor=mysqli_num_rows($res);
	if($nor>0)
	{
		?>
		 <div >
		<div class="container"><br>    
			<h2>Users</h2><hr> 
			<table class="table table-hover">
			<thead>
			<tr>
			<th>ID</th>
        <th>Name</th>
		<th>Profile</th>
        <th>Email</th>
		<th>Type</th>
        <th>Contact</th>
        <th>Gender</th>
		<th>DOB</th>
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
			echo "<td>$r[6]</td>";
			echo "<td>$r[2]</td>";
			echo "<td>$r[3]</td>";
			echo "<td>$r[9]</td>";
			echo "<td>$r[4]</td>";
			echo "<td>$r[5]</td>";
			
			echo "<td><a style='color:orange' href='update_user.php?did=$r[0]'>Edit</a> | 
			<a style='color:orange' href='delete_user.php?did=$r[0]'>Delete</a>";
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
</div>

</div>
<?php require ('adminbottom.php');?>
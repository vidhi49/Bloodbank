<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="js/jquery-3.4.1.min"></script> 
	<?php require ('admintop.php');?>
	<div style="height=500">
	<?php
		if(isset($_REQUEST['approved']))
		{
			$status="Approved";
			$id=$_REQUEST['id'];
			require('connect.php');			
			$q1="select * from tbl_request where pid='$id'"	;		
			$res1=mysqli_query($con,$q1) or die("Query Failed");
			$r=mysqli_fetch_array($res1);
			$q2="select units from tbl_bloodstock where type='$r[3]'";
			$res2=mysqli_query($con,$q2) or die("Query Failed");
			$r1=mysqli_fetch_array($res2);
			if($r1[0] >= $r[12])
			{
				$q="update tbl_request set status='$status' where pid='$id'";
				$res=mysqli_query($con,$q) or die("Query Failed");
				$units=$r1[0]- $r[12];
				$q3="update tbl_bloodstock set units='$units' where type='$r[3]'";
				$res3=mysqli_query($con,$q3) or die("Query Failed");
				
			}
			else
			{
				$message="Not Having Enought Stock of $r[3]. We have only $r1[0] units. ";
				
			}
			
		}
		if(isset($_REQUEST['rejected']))
		{
			$status="Rejected";
			$id=$_REQUEST['id'];
			require('connect.php');
			$q="update tbl_request set status='$status' where pid='$id'";
			$res=mysqli_query($con,$q) or die("Query Failed");
		}
	?>
	
      <?php
	require('connect.php');
	$q="select * from tbl_request where status='Pending'";
	$res=mysqli_query($con,$q) or die("Query Failed");
	$nor=mysqli_num_rows($res);
	if($nor>0)
	{
		?>
		<div class="container">
			<h2>Request Report</h2><hr>  <?php if(isset($message)) echo "<center><h3>$message</h3></center>";?>  <br>    
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
			echo "<td><form method='post'><input type='hidden' name='id' value='$r[0]'>";
			echo "<input type='submit' name='approved' value='Approved' class='btn btn-warning rounded-lg'> &nbsp;";
		echo "<input type='submit' value='Rejected' name='rejected' class='btn btn-danger rounded-lg'></form></td>";
			
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
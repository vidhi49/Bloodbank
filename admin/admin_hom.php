<!--<!DOCTYPE html>
<html>
<head>
    <title> Admin Home </title>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>-->
	
<?php require ("./admintop.php");?>
<div class="container">
	<div class="card-columns">
		<div class="card  bg-danger m-3 p-5 text-center">
			<div class="card-body text-center text-light">
				<h5> Total Request</h5>
			</div>
		</div>
		<div class="card  bg-danger m-3 p-5 text-center">
			<div class="card-body text-center text-light">
				<h5> Total Donor </h5>
			</div>
		</div>
		<div class="card  bg-danger m-3 p-5 text-center">
			<div class="card-body text-center text-light">
				<h5> Pending Request</h5>
			</div>
		</div>
	</div>
	
</div>

<?php require ('./adminbottom.php');?>

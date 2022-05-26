<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title> Top </title>
	<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>

#circle {
    background: white;
    border-radius: 50%;
    width: 50px;
    height: 50px;
	display:inline-block;
	text-align:center;
	padding:10px;
	font-size: 20px;
	font-weight: 20%;
}


	li
	{
		padding: 3px;
	}
	</style>
<body>
 <nav class="navbar navbar-expand-md bg-danger pt-3 pb-2" >
    <div class="container " >
        <a class="navbar-brand text-light" >
          <h4>Blood Bank </h4>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                     <a class="nav-link text-light" href="customer_Home.php"> Home </a> 
                </li>
                 <li class="nav-item">
                    <a class="nav-link text-light" href="DonateBlood.php"> Donate Blood </a>
                </li> 
				<li class="nav-item">
                    <a class="nav-link text-light" href="DonationHistory.php"> Donation History  </a>
                </li> 
				<li class="nav-item">
                    <a class="nav-link text-light" href="RequestBlood.php"> Request   </a>
                </li> 
				<li class="nav-item">
                    <a class="nav-link text-light" href="RequestHistroy.php"> Request History  </a>
                </li> 
				<li class="nav-item">
                    <a class="nav-link text-light" href="logout.php.php"> Logout   </a>
                </li> 
				<div id='circle'>
				<?php echo substr($_SESSION['name'],0,1); ?>	
                    
                </div> 
            </ul>
        </div>
    </div>
  </nav>
</body>
</html>
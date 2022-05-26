<?php
	session_start();
	session_destroy();
	header('location:../guest/guest_home.php');
?>
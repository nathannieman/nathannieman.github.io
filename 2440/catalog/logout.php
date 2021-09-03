<?php
	session_start();
	include('includes/functions.php');
	session_destroy();
	eatCookie('name');
	header('location: .');
?>
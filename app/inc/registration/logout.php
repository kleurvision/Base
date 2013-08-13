<?php
	//Start logout session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['MEMBER_ID']);
	unset($_SESSION['FNAME']);
	unset($_SESSION['LNAME']);
	unset($_SESSION['EMAIL']);
	unset($_SESSION['LEVEL']);
	
	//Page Setup
	$pageTitle = 'Place My Booth | Logout';
	$pageSlug = 'Logout'; 

	require_once('../framework/header.php'); 
?>

<h1>Logout </h1>
<p align="center">&nbsp;</p>
<h2 align="center" class="err">You have been logged out.</h2>
<p align="center">Click here to <a href="/">Login</a></p>

<? require_once('framework/footer.php');?>
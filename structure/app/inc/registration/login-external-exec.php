<?php
	//Include database connection details
	require_once('../god.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = $db;
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	/*function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}*/
	
	/*//Sanitize the POST values
	$email = clean($_POST['email']);
	$password = clean($_POST['password']);
	*/
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	//Input Validations
	if($email == '') {
		$errmsg_arr[] = 'email ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the email form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: email-form.php");
		exit();
	}
	
	//Create query
	$result = $db->query("SELECT * FROM retailers WHERE email='$email'");
	//Check whether the query was successful or not
	if($result) {
		if($result == 1) {
			//email Successful
			//session_regenerate_id();
			$member = $db->get_row("SELECT * FROM retailers WHERE email='$email'");
			$_SESSION['MEMBER_ID'] = $member->id;
			$_SESSION['FNAME'] = $member->fname;
			$_SESSION['LNAME'] = $member->lname;
			$_SESSION['EMAIL'] = $member->email;
			$_SESSION['LEVEL'] = $member->level;
			session_write_close();
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit();
		}else {
			//email failed
			// header("location: email-failed.php");
			exit();
		}
	}else {
		die("Query failed");
	}
	

?>
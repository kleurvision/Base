<? require('../../../bootstrap-light.php');

if(isset($_POST)){

$form = $_POST['form'];
	foreach($_POST as $key => $var){
		if($key == 'email' && $var == ''){
			$error[$key] = 'Please enter your '.$key;
		}
		if($key == 'phone' && $var == ''){
			$error[$key] = 'Please enter your '.$key;
		}
		if($key == 'name' && $var == ''){
			$error[$key] = 'Please enter your '.$key;
		}
		
		$items[] = $key.': '.$var;
	}
	
	if($error){
		$_SESSION['error'] = $errors;
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	} else {
		$to = "concierge@kleurvision.com";
		$subject = "ClickityClank - Website Submission";
		
		$body = 'Message from the Clickity Clank website machine'."\r\n"."\r\n";
		foreach($items as $item){
			$body .= $item."\r\n";
		}
		$body .= "\r\n".date('Y-m-d')."\r\n";
		
		if (getenv('HTTP_X_FORWARDED_FOR')) {
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		} else {
		    $ip = getenv('REMOTE_ADDR');
		}
    
		$body .= $ip;
		$send = send_mail($to, $subject, $body , $report = false);	
		 
		$_SESSION['success'] = 'Thank you for hitting up Clickity Clank. Your message was transmitted through a series of tubes to the robots that handle all queries';
		header("location:".$_SERVER['HTTP_REFERER']);
		exit;
	}

	
	/* if($form == 'quote'){
	
		unset($_SESSION['error']);
		unset($_SESSION['success']);
		
		$name 		= $_POST['name'];
		$email 		= $_POST['email'];
		$urgency 	= $_POST['urgency'];
		$desc		= $_POST['description'];
		$type 		= $_POST['Type'];

		if($name == ''){
			$errors[] = 'Please enter a name';
		}
		
		if($email == ''){
			$errors[] = 'Please enter an email address';
		}
		
		if($desc == ''){
			$errors[] = 'Please let us know what you\'re looking for';
		}
		 
		
		if($errors){
			$_SESSION['error'] = $errors;
			header("location:".$_SERVER['HTTP_REFERER']);
			exit;
		} else {

			$to = "concierge@kleurvision.com";
			$subject = "ClickityClank - " . $type . " Quote Submission";
			$body = "Name:" . $name . "\r\n" .
		 		"Type:" . $type . "\r\n" .
		 		"Email:" . $email . "\r\n" .
		 		"Urgency:" . $urgency . "\r\n" .
		 		"Description: \r\n" . $desc . "\r\n";
			$send = send_mail($to, $subject, $body , $report = false);	
			 
			$_SESSION['success'] = 'Thank you for hitting up Clickity Clank. Your message was transmitted through a series of tubes to the robots that handle all queries';
			 header("location:".$_SERVER['HTTP_REFERER']);
			 exit;
		}
		
	} */

} else {
	$_SESSION['error'] = 'You have to fill the form out before you can submit it. Kindergarten stuff.';
	header("location:".$_SERVER['HTTP_REFERER']);
	exit;
}

?>
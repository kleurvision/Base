<? require('../../../bootstrap-light.php');
	
	$form = $_POST['form'];
	if($form == 'contact'){
				
		$name 	= $_POST['name'];
		$email 	= $_POST['email'];
		$phone 	= $_POST['phone'];
		$desc	= $_POST['description'];
		
		if($name == ''){
			$errors[] = 'Please enter a name';
		}
		
		if($email == ''){
			$errors[] = 'Please enter an email address';
		}
		
		if($phone == ''){
			$errors[] = 'Please enter a phone number';
		}
		
		if($errors){
			$_SESSION['error'] = $errors;
			// header("location:".$_SERVER['PHP_SELF']);
			echo $_SERVER['PHP_SELF'];
			exit;
		} else {

			 $to = "concierge@kleurvision.com";
			 $subject = "ClickityClank - Contact Form";
			 $body = "Name:" . $name . "\r\n" .
			 	"Phone:" . $phone . "\r\n" .
			 	"Email:" . $email . "\r\n" .
			 	"Description: \r\n" . $desc . "\r\n";
			 $send = send_mail($to, $subject, $body , $report = false);	
			 
			 $_SESSION['success'] = 'Thank you for hitting up Clickity Clank. Your message was transmitted through a series of tubes to the robots that handle all queries';
			 header("location:".$_SERVER['HTTP_REFERER']);
			 exit;
		}
	}

?>
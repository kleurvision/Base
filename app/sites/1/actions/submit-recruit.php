<? require('../../../bootstrap-light.php');

	$form = $_POST['form'];
	
	if($form == 'recruit'){
		$name 	= $_POST['name'];
		$email 	= $_POST['email'];
		$role 	= $_POST['role'];
		$desc	= $_POST['description'];

		 $to = "concierge@kleurvision.com";
		 $subject = "ClickityClank -  Recruitment Submission";
		 $body = "Name:" . $name . "\r\n" .
		 	"Role:" . $role . "\r\n" .
		 	"Description: \r\n" . $desc . "\r\n";
		 $headers = "From: ".$email."\r\n" .
		     "X-Mailer: php";
		 if (mail($to, $subject, $body, $headers)) {
			 header('Location:'. URL);
		  } else {
		   echo("<p>Message delivery failed...</p>");
		  }
		
	}

?>
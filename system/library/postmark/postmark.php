<? // Setup mail using Postmark API and shell command


// Main Function
function send_mail($to = 'concierge@kleurvision.com', $subject = 'Test', $messageText = 'Test' , $report = true){
	
	// PostMark Config 
	$postmark_key	= 'ddd37e51-1843-404a-b359-91bdeecd808a';
	$sender_email	= 'info@kleurvision.com';
	$inbound_email	= '387caf90bfc3fcf0bb622781b2603490@inbound.postmarkapp.com';

	$mail = shell_exec('
			curl -X POST "http://api.postmarkapp.com/email/batch" \
			-H "Accept: application/json" \
			-H "Content-Type: application/json" \
			-H "X-Postmark-Server-Token:'.$postmark_key.'" \
			-v \
			-d "[{
					From: 		\''.$sender_email.'\',
					To: 		\''.$to.'\',
					Subject: 	\''.$subject.'\',
					TextBody: 	\''.$messageText.'\'
				}]"
		');
	
	// Decode mail response
	if($report == true){
		if($mail){
			$msg = json_decode($mail);
			
			if ($msg[0]->Message == 'OK'){
				
				$message['email_success'] = 'Email successfully sent';
			
			} else {
				$message['error_code'] = $msg[0]->ErrorCode;
				$message['error_message'] = $msg[0]->Message;
			
			};
			
			echo '<ul>';
			foreach($message as $response){
				echo '<li>'.$response.'</li>';
			}
			echo '</ul>';
		} else {
			echo 'MailFail';
		}
	}

}

?>
<? /* Define general QR code vars 
	Uses:
	QRcode Perl CGI & PHP script ver.0.50i
	Copyright (c)2000-2009, Y.Swetake
	All Rights Reserved.
*/
class Qr {

	function __construct($username = '') {
       // Define QR code path
       $qr_path	= '/'.APP.'/library/qr/php/qr_img.php';
       $this->qr = $qr_path;
       $this->username = $username;
    }

	// Create a new QR code with user input data and size
	function get_new_qr($data = '', $size = ''){
		$qr		= $this->qr.'?d='.$data.'&s='.$size;
		echo '<img src="'.URL.$qr.'" alt="" />';
	}
	
	// Create a QR code for a user
	function get_qr($user = '', $size = '', $url = false){
		
		// Check for user input
		if($user == ''){
			echo 'No user';
		} else {
			$data 	= URL.'/qrid/'.$user;		
			$qr		= URL.$this->qr.'?d='.$data.'&s='.$size;
			
			echo '<div class="qr">';
			
			// Output QR code
			echo '<img class="qr_img" src="'.$qr.'" alt="" />';
			
			// Add visible URL if set to 'true'
			if($url == true){
				echo '<span class="qr_url">'.$qr.'</span>';
			};
			
			echo '</div>';
		};
	}
	
	// Create a QR code for a user
	function get_user_qr($username = '', $size = '', $url = false){
		
		// Check for user input
		if($username == ''){
			$username = $this->username;
			if($username == ''){
				echo 'No user';
			} else {
				$data 	= URL.'/user/'.$username;		
				$qr		= URL.$this->qr.'?d='.$data.'&s='.$size;
			
				echo '<div class="qr">';
			
				// Output QR code
				echo '<img class="qr_img" src="'.$qr.'" alt="" />';
				
				// Add visible URL if set to 'true'
				if($url == true){
					echo '<span class="qr_url">'.$qr.'</span>';
				};
			
				echo '</div>';
			};
		}
	}
	
	// Generate Unique QR
	function qr_generator($qty = 1){
		$username = $this->username;
		if($username == ''){
			echo 'You must be logged in to access the QR generator';
		} else{
			$user_id = $db->get_var("SELECT id FROM app_users WHERE username = '$username'");
			$i = 0;
			while($i <= $qty){
				$qr_pin = substr(base64_encode(mt_rand()), 0, 15);
				global $db;
				$qr_unique = $db->get_var("SELECT qrid FROM app_qrid WHERE qrid = '$qr_pin'");
				if($qr_unique == ''){
					$qrid_set[$i] = $qr_pin;
					$i++;
				} else {
					continue;
				}
			};
			foreach($qrid_set as $qrid){
				$db->get_resluts("INSERT INTO app_qrid (user_id, qrid) VALUES ('$user_id', '$qrid')");
			}
		};
	} 

}
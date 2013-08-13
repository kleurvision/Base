<? /* Login Submission
------------------------------
** Here we go */

// Check login
if($_POST['login_form_submit']){
	
	$email		= $_POST['login_user'];
	$password	= md5($_POST['login_password']);

	global $db;
	$user_id = $db->get_var("SELECT id FROM app_users WHERE email = '$email' && password = '$password'");
	
	if($login){
		return $user_id;
	} else {
		echo 'Error';
	}
}

?>
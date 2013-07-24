<?
include 'app_classes.php';

// Load the primary 	
	$user = new User($_POST['email'], $_POST['password']);
	
	if ($user_id = $userService->login()) {
	    echo 'Logged it as user id: '.$user_id;
	    $userData = $userService->getUser();
	    
	    echo 'success';
	    
	} else {
	    echo 'fail';
	}
?>
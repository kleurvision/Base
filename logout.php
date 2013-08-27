<? // Logout script
include('bootstrap-light.php');
error_reporting(E_ALL);
ini_set('display_errors', '1');

if($_SESSION['SESSION_ID']){

	// Unset User
	$_SESSION['user'] = '';
	
	// Check session ID
	$user_session = $_SESSION['SESSION_ID'];
	
	// Logout Time
	$date_off = date('ymdHis');
	
	// Update session DB
	$unset_user_session = $db->query("UPDATE app_user_sessions SET session_time_off = '$date_off' WHERE user_session = '$user_session'");
	
	// Clear all sessions
	session_destroy();

};

// Redirect to Site Root
header("location:".URL);

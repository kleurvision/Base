<? // Logout script
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

$_SESSION['user'] = '';

session_destroy();

header("location:../");
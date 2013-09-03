<? 
/* Webninja User API */
/* Version 0.1 */
/* September 03, 2013 */

error_reporting(E_ALL);
ini_set('display_errors', '1');

// Require Bootstrap Administration File
require('../bootstrap-admin.php');

// Check for AUTH (to follow)
// Create OAUTH system integration, or hash access keys at bare minimum

$users = get_users_api();
$users_api = json_encode($users);
echo $users_api;
<? /* Bolt it on
------------------------------
** ClientCare bootstrap file
------------------------------
** Here we go */

error_reporting(E_ALL);
ini_set('display_errors', '1');

// Initiate session
session_start();

// Define PATH as this file's directory
define( 'PATH', '/' );

// Define ROOT to the HTDOCS
define( 'ROOT', $_SERVER['DOCUMENT_ROOT'] . '/' );

// Define stucture APP path
define( 'APP', ROOT.'app' );

// Define stucture LIBRARY path
define( 'SYSTEM', ROOT.'system' );

// Define stucture LIBRARY path
define( 'LIBRARY', SYSTEM.'/library' );

// Define stucture ADMIN path
define( 'ADMIN', APP.'/admin' );


// Load in the functions
require_once(SYSTEM . '/system_functions.php' );

// Load in the functions admin functions
require_once(ADMIN . '/functions/functions.php' );
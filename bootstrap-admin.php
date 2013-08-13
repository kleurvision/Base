<? /* Bolt it on
------------------------------
** ClientCare bootstrap file
------------------------------
** Here we go */

// Initiate session
session_start();

// Define PATH as this file's directory
define( 'PATH', dirname(__FILE__) . '/' );

// Define stucture APP path
define( 'APP', 'app' );

// Define stucture LIBRARY path
define( 'SYSTEM', 'system' );

// Define stucture LIBRARY path
define( 'LIBRARY', SYSTEM.'/library' );

// Define stucture ADMIN path
define( 'ADMIN', APP.'/admin' );
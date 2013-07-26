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
define( 'APP', 'structure/app' );

// Define stucture LIBRARY path
define( 'LIBRARY', 'resources/library' );

// Define stucture THEME path
define( 'THEME', 'structure/theme' );

// Define stucture ADMIN path
define( 'ADMIN', 'structure/admin' );


// Define the config file
if (file_exists(dirname(PATH).'/config/config.php')) {

	/** The config file resides one level above the main directory */
	require_once(dirname(PATH).'/config/config.php');
};


// URL -  Edit root URL
$app_url = $db->get_var("SELECT app_url FROM app_options");

// Define parent URL
define( 'URL', $app_url);

// Load in the classes
require_once(APP . '/app_classes.php' );

// Setup the page class
$page 			= new Page($db);

// Check to see if there is a page asssociated to the URL
if(isset($_GET['pagename'])){
	$pagemap 		= $page->page_map($_GET['pagename']);
} else {
	
}

// Setup the user class
$user = new User($db);
$user->login_submit();

// Load in the functions
require_once(APP . '/app_functions.php' );

// Load in the helpers
require_once(APP . '/app_helpers.php' );
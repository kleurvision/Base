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

// Define the config file
if (file_exists(dirname(ROOT).'/config/config.php')) {

	/** The config file resides one level above the main directory */
	require_once(dirname(ROOT).'/config/config.php');
} else {

	echo 'Config not found at '.ROOT.'/config/config.php<br/>';
};


// URL -  Edit root URL
$site_url = 'http://'.$_SERVER['HTTP_HOST'].'/';

// Sitename
if(isset($_GET['site'])){
	$siteslug = $_GET['site'];
}

// Define parent URL
define( 'URL', $site_url);


/* Check to see if the site is being previewed or if looking
through the domain */
if(isset($siteslug)){

	// When looking through preview
	$site = $db->get_row("SELECT * FROM app_sites WHERE site_slug = '$siteslug'");
	$preview = true;
	
	// Define parent preview nav path
	define( 'NAV', URL.'preview/'.$siteslug.'/');

	
} else {

	// When loading site domain
	$site = $db->get_row("SELECT * FROM app_sites WHERE site_url = '$site_url'");
	$preview = false;
	
	// Define parent nav path
	define( 'NAV', URL);
}
	
if(isset($site)){
	
	// Define SITE ID
	define('SITE_ID', $site->id);

	// Set site theme
	$theme 	= $site->site_theme;
	
	if($theme != ''){
		
		// If theme is set...
		define( 'THEME', APP.'/themes/'.$theme);
	
	} else {
		
		// Use setup them
		define( 'THEME', APP.'/themes/setup' );	
	}
	
	// Define the Site folder
	define('SITE', APP.'/sites/'.SITE_ID);
	
	// echo SITE;
	
} else {

	echo 'No site';

}

// Load in the classes
require_once(SYSTEM . '/system_classes.php' );

// Load in the admin classes
// require_once(ADMIN . '/classes/class_loader.php' );


// Setup the user class
$user = new User($db);
$user->login_submit();

// Load in the functions
require_once(SYSTEM . '/system_functions.php' );

// Load in the functions admin functions
require_once(ADMIN . '/functions/functions.php' );
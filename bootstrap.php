<? /* Bolt it on
------------------------------
** Webninja bootstrap file
** July 2013
** Tada
------------------------------
** Here we go */

// Initiate session
session_start();

// Define stucture APP path
define( 'APP', 'structure/app' );

// Define stucture LIBRARY path
define( 'LIBRARY', 'resources/library' );


// Define stucture ADMIN path
define( 'ADMIN', 'structure/admin' );


// Define the config file
if (file_exists(PATH . 'config.php')) {

	/** The config file resides in main directory */
	require_once(PATH . 'config.php');

} elseif (file_exists(dirname(PATH).'/config.php')) {

	/** The config file resides one level above the main directory */
	require_once(dirname(PATH).'/config.php');

};

// URL -  Edit root URL
$app_url = 'http://'.$_SERVER['HTTP_HOST'].'/';

// Define stucture THEME path
$theme = $db->get_var("SELECT app_theme FROM app_options WHERE app_url = '$app_url'");

if(isset($theme)){
	define( 'THEME', 'structure/themes/'.$theme);
} else {
	define( 'THEME', 'structure/themes/default' );	
}

// Define parent URL
define( 'URL', $app_url);

// Load in the classes
require_once(APP . '/app_classes.php' );

// Setup the page class
$page 			= new Page($db);

// Check to see if there is a page asssociated to the URL
if(isset($_GET['pagename'])){
	$pagemap = $page->page_map($_GET['pagename']);
} else {
	$pagemap = $page->page_map('home-page');
}

// Setup the user class
$user = new User($db);
$user->login_submit();

// Load in the functions
require_once(APP . '/app_functions.php' );

// Load in the helpers
require_once(APP . '/app_helpers.php' );

// Kickstart the views/theme delivery
// Check to see if there is a page asssociated to the URL
if(isset($_GET['pagename'])){
	$pagemap 		= $page->page_map($_GET['pagename']);
	
	if($pagemap == '404'){
		require_once(THEME . '/404.php');
	
	} else if ($pagemap->pagename == 'home-page') {
	
		header('location:'.URL);
	
	} else {
	
		// If page exists, determine what template to load
		if($pagemap->pagetemplate == ''){
		
			// Load the default page template if no template is listed in the database
			require_once(THEME . '/page.php');
		} elseif($pagemap->pagetemplate == 'user'){
		
			// Check to see if the page is a user page
			$username = $page->get_profile();
			
			// If the username exists in the database
			if(isset($username->username)){
			
				// Load the global user template
				require_once(THEME . '/user-profile.php');	
			} elseif ($username == 'undefined'){
				
				// If no username is defined, load user landing page
				 require_once(THEME . '/page-'.$pagemap->pagetemplate.'.php');
			} else {
			
				// If username doesn't exist, load 404 page
				require_once(THEME . '/404.php');
			}
		
		} elseif($pagemap->pagetemplate == 'login'){
			
			// Load the default page template if no template is listed in the database
			require_once(THEME . '/login.php');	
		} else {
			
			// If there is a unique template, load the custom template
			// Custom templates are saved in the theme folder as page-templatename.php
			require_once(THEME . '/page-'.$pagemap->pagetemplate.'.php');
		}
	}

} else {
	// Is homepage
	require_once(THEME . '/index.php');

}
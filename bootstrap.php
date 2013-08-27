<? /* Bolt it on
------------------------------
** Webninja bootstrap file
** July 2013
------------------------------
** Here we go */

// Initiate session
session_start();

// Define stucture APP path
define( 'APP', 'app' );

// Define stucture LIBRARY path
define( 'SYSTEM', 'system' );

// Define stucture LIBRARY path
define( 'LIBRARY', SYSTEM.'/library' );

// Define stucture ADMIN path
define( 'ADMIN', APP.'/admin/' );


// Define the config file
if (file_exists(dirname(PATH).'/config/config.php')) {

	/** The config file resides one level above the main directory */
	require_once(dirname(PATH).'/config/config.php');
};

// URL -  Edit root URL
$site_url = 'http://'.$_SERVER['HTTP_HOST'].'/';

// Sitename
if(isset($_GET['site'])){
	$sitename = $_GET['site'];
}

// Define parent URL
define( 'URL', $site_url);

if(isset($sitename)){

	// When looking through preview
	$site = $db->get_row("SELECT * FROM app_sites WHERE site_name = '$sitename'");
	$preview = true;
	
} else {

	// When loading URL
	$site = $db->get_row("SELECT * FROM app_sites WHERE site_url = '$site_url'");
	$preview = false;
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

// Setup the page class
$page = new Page($db);

// Load the appropriate pages to run the Webninja platform 
// a) Check to see if there is a page asssociated to the URL...
if(isset($_GET['pagename'])){
	
	// b) Check for admin url and get us outta here as long as it's not a preview and its the Webninja platform 
	if($preview == false || SITE_ID == '1'){
	
		// Variables in place of /admin/ - admin, dashboard, manager
		if($_GET['pagename'] == 'admin' || $_GET['pagename'] == 'dashboard' || $_GET['pagename'] == 'manager' ){
			header('location: /admin/');
			exit;
		};
	};
		
	$pagemap = $page->page_map($_GET['pagename']);
	
} else {
	// a) Else define the homepage
	$pagemap = $page->page_map('home-page');
}

// Setup the user class
$user = new User($db);
$user->login_submit();

// Load in the functions
require_once(SYSTEM . '/system_functions.php' );

// Kickstart the views/theme delivery
// Check to see if there is a page asssociated to the URL
if(isset($_GET['pagename'])){
	$pagemap = $page->page_map($_GET['pagename']);
	
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

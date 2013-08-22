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
define( 'ADMIN', APP.'/admin' );


// Define the config file
if (file_exists(dirname(PATH).'/config/config.php')) {

	/** The config file resides one level above the main directory */
	require_once(dirname(PATH).'/config/config.php');
};

// URL -  Edit root URL
$app_url = 'http://'.$_SERVER['HTTP_HOST'].'/';

// Define parent URL
define( 'URL', $app_url);

/* // Check to see if there is a site asssociated to the URL
if(isset($_GET['site'])){	
	
	$site = $db->get_results("SELECT * FROM app_options WHERE site_name = '".$_GET['site']."'");

	// Define site path
	if(isset($site->id)){
		define( 'SITE', dirname(PATH).'/sites/'.$site->id);
	};

};
*/

// Define SITE stucture and THEME path
$site 	= $db->get_row("SELECT * FROM app_options WHERE app_url = '$app_url'");
	
	if(isset($site)){
		define('SITE_ID', $site->id);
		
		// Set site theme
		$theme 	= $site->app_theme;
		
		if(isset($theme)){
			define( 'THEME', APP.'/themes/'.$theme);
		} else {
			define( 'THEME', APP.'/themes/blank' );	
		}
		
	} else {
	
		echo 'No site';
	
	}

// Load in the classes
require_once(SYSTEM . '/system_classes.php' );

// Setup the page class
$page = new Page($db);

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
require_once(SYSTEM . '/system_functions.php' );

// Load in the helpers
require_once(SYSTEM . '/system_helpers.php' );

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

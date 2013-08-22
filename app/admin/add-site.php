<? /* Add URL to VHOSTS File */

error_reporting(E_ALL);
ini_set('display_errors', '1');

// Load the primary 
require('bootstrap-admin.php');

// Load in the functions
// require_once(dirname(ROOT) . '/config/update_vhosts_function.php' );

// Temporarily load admin functions from within admin folder
require('functions/functions.php');

// Update VHOSTS File
if(isset($_POST['new_site_url'])){
	
	// Set the new site URL 
	$newhostdir = 'http://'.$_POST['new_site_url'].'/';
	
	// Lookup the URL in the app_options database to confirm registration
	global $db;
	$check_site = $db->get_var("SELECT count(*) FROM app_options WHERE app_url = '$newhostdir'");
	
	// If the site does not exist...
	if($check_site == 0){
		
		// Add new site to app_options DB
		$add_site = $db->query("INSERT INTO app_options (app_url) VALUES ('$newhostdir')");
		
		// Get new site ID
		$site_id = mysql_insert_id();
		
		// If new site is registered without issue, create the databases
		if($add_site){
			
			// Add pages table
			$db->query("CREATE TABLE site_".$site_id."_pages (id INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, pagename VARCHAR(50) DEFAULT NULL, pagetitle VARCHAR(100) DEFAULT NULL, pagecontent LONGTEXT, pageauthor INTEGER(11) DEFAULT NULL, pagemeta_title VARCHAR(100) NOT NULL, pagemeta_desc VARCHAR(255) DEFAULT NULL, pagemeta_keywords VARCHAR(255) DEFAULT NULL, pagetemplate VARCHAR(100) DEFAULT NULL, pageparent INTEGER(11) DEFAULT NULL, pagedate INTEGER(11) DEFAULT NULL, pagepriority INTEGER(11) DEFAULT NULL, pagechangefreq VARCHAR(100) DEFAULT NULL); ");			
			// Add settings table
			$db->query("CREATE TABLE site_".$site_id."_settings (id INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, navigation LONGTEXT);");
			
			// Add hero table
			$db->query("CREATE TABLE site_".$site_id."_hero (id INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, herotitle LONGTEXT, herocontent LONGTEXT, heroimg LONGTEXT);"); 
			
			// If the tables are created without issue, fire the VHOST update...
			update_vhosts($_POST['new_site_url']);
		}
			
	} else {
	
		echo 'Site already registered in system';
	
	}	
	
} else { ?>

<form action="" method="post">
	<input type="text" name="new_site_url" placeholder="URL" />
	<input type="submit" value="Enter URL"/>
</form>

<? }
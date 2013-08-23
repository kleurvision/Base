<?
$pagetitle = "Add Site";
include "header.php";

 /* Add URL to VHOSTS File */

// Load the primary 
require('bootstrap-admin.php');

// Load in the functions
// require_once(dirname(ROOT) . '/config/update_vhosts_function.php' );

// Update VHOSTS File
if(isset($_POST['new_site_url']) && isset($_POST['new_site_name'])){
	
	// Set the new site name (sanitize special characters and make lowercase
	$site_name = strtolower($_POST['new_site_name']);
	$sitename = str_replace(' ', '_', $site_name);
	
	// Set the new site URL 
	$newhostdir = 'http://'.$_POST['new_site_url'].'/';
	
	// Set the activation date
	$sitedate = date('Y-m-d');
	
	// Lookup the URL in the app_options database to confirm registration
	global $db;
	$check_site = $db->get_var("SELECT count(*) FROM app_sites WHERE site_url = '$newhostdir' OR site_name = '$sitename'");
	
	// If the site does not exist...
	if($check_site == 0){
		
		// Add new site to app_options DB
		$add_site = $db->query("INSERT INTO app_sites (site_url, site_name, activation_date) VALUES ('$newhostdir', '$sitename', '$sitedate')");
		
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
			
			// Make Directory
			make_site_dir($site_id);
			
			// If the tables are created without issue, fire the VHOST update and redirect to admin panel
			update_vhosts($_POST['new_site_url']);
			
		} else {
			
			echo 'Could not add site to database';
			
		}
			
	} else {
	
		echo 'Site already registered in system';
	
	}	
	
} else { ?>

<form action="" method="post">
	<input type="text" name="new_site_name" placeholder="Name (no special characters)" />
	<input type="text" name="new_site_url" placeholder="URL (no http://)" />
	<input type="submit" value="Enter URL"/>
</form>

<? }

include 'footer.php';
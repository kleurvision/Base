<?
$pagetitle = "Add Site";


 /* Add URL to VHOSTS File */

// Load the primary 
//require('bootstrap-admin.php');

// Load in the functions
// require_once(dirname(ROOT) . '/config/update_vhosts_function.php' );

// Update VHOSTS File
if(isset($_POST['new_site_url']) && isset($_POST['new_site_name'])){
	
	// Load the primary 
	require('bootstrap-admin.php');

	// Set the new site name (sanitize special characters and make lowercase
	$site_name = strtolower($_POST['new_site_name']);
	$sitename = str_replace(' ', '_', $site_name);
	
	// Set the new site URL 
	$newhostdir = 'http://'.$_POST['new_site_url'].'/';
	
	// Set the activation date
	$sitedate = date('Y-m-d');

	// Set Site Status
	$sitestatus = 1;
	
	// Lookup the URL in the app_options database to confirm registration
	global $db;
	$check_site = $db->get_var("SELECT count(*) FROM app_sites WHERE site_url = '$newhostdir' OR site_name = '$sitename'");
	
	// If the site does not exist...
	if($check_site == 0){
		
		// Add new site to app_options DB
		$add_site = $db->query("INSERT INTO app_sites (site_url, site_name, site_status, activation_date) VALUES ('$newhostdir', '$sitename', '$sitestatus', '$sitedate')");
		
		// Get the new auto-incremented site ID from the database
		$site_id = mysql_insert_id();
		
		// If new site is registered without issue, create the database tables required to load in the new website
		if($add_site){
						
			// Add pages table
			$table_pages 	= add_pages_table($site_id);			
			
			// Add settings table
			$table_settings = add_settings_table($site_id);
			
			// Add hero table
			$table_hero 	= add_hero_table($site_id); 
			
			
			// Table checks
			if($table_pages == false){
				$table_check['pages'] = 'error adding pages table';
			}
			
			if($table_settings == false){
				$table_check['settings'] = 'error adding settings table';
			}
			
			if($table_hero == false){
				$table_check['hero'] = 'error adding hero table';
			}
			
			// If there are any errors writting the tables, let the administrators know where the issue is
			if($table_check != ''){
				foreach($table_check as $key => $value){
					echo '<span>Error: '.$value.'</span><br/>';
				};
				
			} else {
			
				// If there are no errors adding the site...
				// Make a site directory in the "app/sites" folder
				make_site_dir($site_id);
				
				// Fire the VHOST update to register the domain name to the server and redirect to "admin/sites" panel
				$update_v = update_vhosts($_POST['new_site_url']);
				
				if($update_v != ''){
					
					// If update to DB was successful, redirect to the site page with a success message and hash code
					header('location: '.URL.'admin/sites?msg='.urlencode('Site successfully added').'&type=success&hash='.$update_v);
					exit;
				}
			
			}
			
		} else {
			
			echo 'Could not add site to database';
			
		}
			
	} else {
	
		// If update to DB was successful, redirect to the site page with a success message and hash code
		header('location: '.URL.'admin/sites?msg='.urlencode('Site already registered in system').'&type=err');
		exit;	
	}	
	
} else { 

include "header.php";	
?>

<div class="row" id="content">
	<div class="col-12"> 
		<form class="admin_form" id="add_site_form" action="" method="post">
			<fieldset id="user_information">
				<h4>User Information</h4>
				<div class="row">
					<div class="col-12">
						<input id="existing_user_email" class="form-control input-block-level" type="text" name="new_site_name" placeholder="User Email" />
					</div>
				</div>
			</fieldset>
			<fieldset id="site_information">
				<h4>New Site Information</h4>
				<div class="row">
					<div class="col-12">
						<input class="form-control" type="text" name="new_site_name" placeholder="Name (no special characters)" />
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<input class="form-control" type="text" name="new_site_url" placeholder="URL (no http://)" />
					</div>
				</div>
				
				<input class="btn btn-primary form-control" type="submit" value="Add New Site"/>
			</fieldset>
		</form>
	</div>
</div>

<? }

include 'footer.php';
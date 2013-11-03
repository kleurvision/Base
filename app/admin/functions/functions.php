<? /* Admin Functions */

/* Admin Auth
Author: Patrick Lyver
Owner: Webninja
V: 1.0
Y: 2013
*/



//////////////////////////////////////////////////////////////////////////////
// Admin Functions
//////////////////////////////////////////////////////////////////////////////

function is_admin($level = '10'){
	// Grab role from sessions
	if(isset($_SESSION['ROLE'])) {
		$role = $_SESSION['ROLE'];
	} else {
		header('location: / ');
		exit;
	}
	
	// If not admin, beat it...
	if($role < $level){
		header('location: / ');
		exit;
	}
}

/* Update VHOSTS Function 
Author: Patrick Lyver
Owner: Webninja
V: 1.0
Y: 2013
*/

function update_vhosts($newhostdir){
	
	/* Configuration - Path to VHOSTS file on live system */
	// $vh_location = '/Applications/MAMP/conf/apache/extra/httpd-vhosts.conf';
	//$vh_location = '/etc/apache2/sites-enabled';
	$vh_location = ''.APP.'/vhosts';
	
	/* Write the VHOSTS update */
	$vh_content	= "
	#
	#Domain Definition for ".$newhostdir."
	#
	
	<VirtualHost *:80>
	
		DocumentRoot ".ROOT."
		ServerName ".$newhostdir."
			
	</VirtualHost>
	
	#
	#End Domain Definition for ".$newhostdir."
	#
	"; 
		
	/* Open, Lock, and Write to the VHOSTS file */
	$fp = fopen($vh_location.'/'.$newhostdir, 'c');
	

	if (flock($fp, LOCK_EX)) {  	// acquire an exclusive lock
	    // ftruncate($fp, 0);      	// truncate file
	    fwrite($fp, $vh_content);	// write the content
	    fflush($fp);            	// flush output before releasing the lock
	    flock($fp, LOCK_UN);    	// release the lock
	} else {
	    echo "Couldn't get the lock!";
	    exit;
	}
	
	fclose($fp);
	
	$url_encode = md5($newhostdir);
	
	/* Redirect on complete */
	
	return($url_encode);	
}

// Make necessary directory for new site and copy in files
function make_site_dir($site_id){
	// Desired folder structure
	$path_to_site = ''.APP.'/sites/'.$site_id;
	$user_name = 'ftpuser';
	// To create the nested structure, the $recursive parameter 
	// to mkdir() must be specified.
	$check = mkdir($path_to_site);
	chmod($path_to_site, 0777);
	chown($path_to_site, $user_name);
	
	// Create config file
	/*$site_index_master 	= ''.APP.'/themes/setup/index.php';
	$new_site_index		= $path_to_site.'/index.php';
	
	if (!copy($site_index_master, $new_site_index)) {
	    echo "failed to copy $site_index_master...\n";
	}*/
}

// Edit a Sites Settings
/*function edit_site(){
		global $db;
		$id = mysql_real_escape_string($_GET['id']);
		$sites = $db->get_results("SELECT id FROM app_sites WHERE id='$id'");
		$site = mysql_query($sites);

	  	if (($site) >0) {?>

	  	<?php } else { 
	  		echo "No Site with the id ".$site." found";
	  	}
}*/

// Display a system message 
function show_message(){
	if (!empty($_SESSION['message'])) {
	    echo $_SESSION['message'];
	    unset($_SESSION['message']);
	}
}

function get_admin_nav(){
	global $db;
	$sitecount = $db->get_var("SELECT count(*) FROM app_sites WHERE site_status = '1'");
	
	global $user;
	if(isset($user)){	
		if($user->get_role() == 'user'){ ?>
				<li><a href="/admin"><i class="icon-home"></i>Dashboard</a></li>
				<li><a href=""><i class="icon-question-sign"></i>Support</a></li>
				<!-- <li><a href=""><i class="icon-download"></i>App Store</a></li>-->
		<? } elseif ($user->get_role() == 'super'){ ?>
				<li><a href="/admin"><i class="icon-home"></i>Dashboard</a></li>
				<li><a href="https://webninja1.zendesk.com/hc/en-us"><i class="icon-question-sign"></i>Support</a></li>
				<!-- <li><a href=""><i class="icon-download"></i>App Store</a></li> -->
				<!--<li><a href="site-queue"><i class="icon-tasks"></i>Site Queue</a></li>-->
				<li>
					<a href="sites"><i class="icon-list"></i>Sites
					<?php if ($sitecount != 0) {  echo '<span class="btn btn-xs btn-danger pull-right">'.$sitecount.'</span>'; } else {} ?>
					</a>
				</li>
				<li><a href="users"><i class="icon-group"></i>Users</a></li>
				<li><a href="partners"><i class="icon-link"></i>Partners</a></li>

		<? }
	}
}

function add_pages_table($site_id){
	global $db;
	$pages = $db->query("CREATE TABLE site_".$site_id."_pages (id INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, pagename VARCHAR(50) DEFAULT NULL, pagetitle VARCHAR(100) DEFAULT NULL, pagecontent LONGTEXT, pageauthor INTEGER(11) DEFAULT NULL, pagemeta_title VARCHAR(100) NOT NULL, pagemeta_desc VARCHAR(255) DEFAULT NULL, pagemeta_keywords VARCHAR(255) DEFAULT NULL, pagetemplate VARCHAR(100) DEFAULT NULL, pageparent INTEGER(11) DEFAULT NULL, pagedate INTEGER(11) DEFAULT NULL, pagepriority INTEGER(11) DEFAULT NULL, pagechangefreq VARCHAR(100) DEFAULT NULL); ");

	return true;
}

function add_settings_table($site_id){
	global $db;
	$settings = $db->query("CREATE TABLE site_".$site_id."_settings (id INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, navigation LONGTEXT);");
	
	return true;
}

function add_hero_table($site_id){
	global $db;
	$hero = $db->query("CREATE TABLE site_".$site_id."_hero (id INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, herotitle LONGTEXT, herocontent LONGTEXT, heroaction LONGTEXT, heroimg LONGTEXT);");
	
	return true;
}




//////////////////////////////////////////////////////////////////////////////
// Sites
//////////////////////////////////////////////////////////////////////////////



// Edit the settings of an individual site
function edit_site($site_id){
	global $db;
	$sites = $db->get_results("SELECT * FROM app_sites WHERE id = '$site_id'");
	if(isset($sites)){ 
		$site = $db->get_row("SELECT id, site_url, site_slug, site_name, site_status, site_theme FROM app_sites WHERE id = '$site_id'");
		$themes = $db->get_results("SELECT theme_name FROM app_themes");
		$statuses = $db->get_results("SELECT id, status_name FROM app_sites_status");

		if(isset($_POST['siteName']) && isset($_POST['siteSlug'])){

			$site_slug = strtolower($_POST['siteSlug']);
			$siteslug = str_replace(' ', '_', $site_slug);
			
			$siteUrl = $_POST['siteUrl'];
			$siteslug = $_POST['siteSlug'];
			$siteName = $_POST['siteName'];
			$siteStatus = $_POST['siteStatus'];
			$siteTheme = $_POST['siteTheme'];

			$editSettings = $db->query("UPDATE app_sites SET 
										site_url = '$siteUrl', 
										site_slug = '$siteslug', 
										site_name = '$siteName',
										site_status = '$siteStatus',
										site_theme = '$siteTheme' 
									WHERE id = '$site_id'");

			if($editSettings) {
				$_SESSION['message'] = '<div class="alert alert-success">Settings Saved<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a></div>';
			}
		 	else {
				$_SESSION['message'] = '<div class="alert alert-danger">Please fill in the required fileds<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a></div>';
			}
		}

		?>
			<div class="row" id="content">
				<div class="col-12">
					<?php show_message(); ?>
					<h3><?= $site->site_name; ?> Settings </h3>
					<br/>
					<form role="form" action="" method="post">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>Site Name</label>
										<input class="form-control" type="text" name="siteName" value="<?= $site->site_name; ?>"/>
									</div>
									<div class="form-group">
										<label>Site Slug</label>
										<input class="form-control" type="text" name="siteSlug" value="<?= $site->site_slug; ?>"/>
									</div>
									<div class="form-group">
										<label>Site URL</label>
										<input class="form-control" type="text" name="siteUrl" value="<?= $site->site_url; ?>"/>
									</div>
									<div class="form-group">
										<label>Site Theme</label>
										<select class="form-control" name="siteTheme">
											<?php foreach ($themes as $theme) {
												$set_siteTheme = $theme->theme_name;
												$set_curTheme = $site->site_theme;
												?>
												<option value='<?= $theme->theme_name; ?>' <?php if($set_siteTheme == $set_curTheme){ echo('selected'); } ?> > <?= $theme->theme_name ?></option>
											<? }?>
										</select>
									</div>
									<div class="form-group">
										<label>Site Status</label>
										<select class="form-control" name="siteStatus">
											<?php foreach ($statuses as $status) {
												$set_siteStatus = $site->site_status;
												$set_siteId = $status->id;
												?>
												<option value='<?= $status->id; ?>' <?php if($set_siteStatus == $set_siteId){ echo('selected'); } ?> > <?= $status->status_name; ?></option>
											<? }?>
										</select>
									</div>
									<input class="btn btn-primary form-control" type="submit" value="Save"/>
								</div>
							</div>
					</form>
				</div>
			</div>

	<?php } else { 
		$_SESSION['message'] = '<div class="alert alert-danger"> No site with that ID found <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a></div>';
		header('location: /app/admin/sites');
	 }
}


// Get Site Status 
function get_site_status($status){
	global $db;
	$status = $db->get_var("SELECT status_name FROM app_sites_status WHERE id = '$status'");
	echo $status;
}

// Super admin / ninja site table
function get_all_sites(){
	global $db;
	$sites = $db->get_results("SELECT id, site_url, site_slug, site_name, site_status, site_theme FROM app_sites");
?>

<section id="list">
	<header>
		<div class="row">
			<div class="col-1">
				<strong>ID</strong>
			</div>
			<div class="col-2">
				<strong>Status</strong>
			</div>
			<div class="col-3">
				<strong>Site Title</strong>
			</div>
			<div class="col-5">
				<strong>URL</strong>
			</div>
		</div>
	</header>

			<? foreach ($sites as $site) { 
				?>
					<div class="row">
						<div class="col-1">
							<?= $site->id; ?>
						</div>
						<div class="col-2">
							<div class="btn-group">
								<?php 
								if ($site->site_status == '1') { echo '<button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown">New</button>'; }
								elseif ($site->site_status == '2') { echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">Live</button>'; }
								elseif ($site->site_status == '3') { echo '<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Inactive</button>'; }
								elseif ($site->site_status == '4') { echo '<button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">Approvals</button>'; }
								?>
								<ul class="dropdown-menu">
									<li><a href="#">New</a></li>
									<li><a href="#">Approvals</a></li>
									<li><a href="#">Activeate</a></li>
									<li><a href="#">Offline</a></li>
								</ul>
							</div>
						</div>
						<div class="col-3">
							<?= $site->site_name; ?>
						</div>
						<div class="col-4">
							<span><small><strong>Active: </strong><?= $site->site_url;?></small></span></br>
							<span><small><strong>Preview: </strong><?= URL ?>preview/<?= $site->site_slug; ?></small></span>
						</div>
						<div class="col-2 pull-right">
							<ul class="list-inline pull-right">
								<li><a href="<?= URL ?>app/admin/edit-site?id=<?= $site->id; ?>" class="btn btn-default btn-sm" data-toggle="tooltip" title="Settings"><i class="icon-gear"></i></a></li>
								<?php 
								if ($site->site_status == '1' || '2' ) { ?>
									<li><a href="<?= URL ?>preview/<?= $site->site_slug; ?>" class="btn btn-primary btn-sm" href="" data-toggle="tooltip" title="Edit"><i class="icon-pencil"></i></a></li>
								<? } elseif ($site->site_status == '3') { ?>
									<li><a href="<?= $site->site_url;?>" class="btn btn-primary btn-sm" href="" data-toggle="tooltip" title="Edit"><i class="icon-pencil"></i></a></li>
								<? } ?>
							</ul>
						</div>
					</div>
					<hr/>					
			<? } ?>	
</section>
<? } 


// Get site info
function get_site_info($site_id){
	global $db;
	$sites = $db->get_results("SELECT * FROM app_sites WHERE id = '$site_id'");
	if(isset($sites)){
		return $sites;
	}
}

// Get sites and list as table
function get_sites(){
	global $db;
	$sites = $db->get_results("SELECT id, site_url, site_slug, site_name, site_status FROM app_sites");
	
?>
<table class="table sites-table">
		<thead>
			<tr>
				<th>Site URL</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<? foreach ($sites as $site) { ?>
				<tr>
					<td><a href="<?= $site->site_url;?>"><?= $site->site_url;?></a></td>
					<td><? get_site_status($site->site_status); ?></td>
					<td>						
						<ul class="list-inline pull-right">
							<li><a href="" class="btn btn-default btn-sm" data-toggle="tooltip" title="Delete" ><i class="icon-remove"></i></a></li>
							<?php 
							if ($site->site_status == '1') { ?>
								<li><a href="<? APP ?>/preview/<?= $site->site_slug; ?>" class="btn btn-primary btn-sm" href="">Preview</a></li>
							<? } else { ?>
								<li><a href="<?= $site->site_url;?>" class="btn btn-default btn-sm" data-toggle="tooltip" title="Edit"><i class="icon-pencil"></i></a></li>
								<li><a class="btn btn-primary btn-sm" href="">Approve</a></li>
							<? } ?>					
						</ul>
					</td>
				</tr>
			<? } ?>
									
		</tbody>
	</table>
<? } 


//////////////////////////////////////////////////////////////////////////////
// Users
//////////////////////////////////////////////////////////////////////////////


// Registration form
function add_user(){

	// Call in Partners List for dropdown
	global $db;
	$partners = $db->get_results("SELECT businessname FROM app_partners");

	// Check registraiont POST submission
	if(isset($_POST['reg_form_submit'])){
					
		$role = 1;
		$email		= stripslashes($_POST['reg_user']);
		//$bio		= stripslashes($_POST['bio']);
		//$addr1		= stripslashes($_POST['addr1']);
		//$addr2		= stripslashes($_POST['addr2']);
		//$phone		= stripslashes($_POST['phone']);
		//$postal		= stripslashes($_POST['postal']);
		//$city		= stripslashes($_POST['city']);
		//$province	= stripslashes($_POST['province']);
		//$country	= stripslashes($_POST['country']);
		$fname		= stripslashes($_POST['fname']);
		$lname		= stripslashes($_POST['lname']);
		$partner	= stripslashes($_POST['partner_id']);
		//$mobile		= stripslashes($_POST['mobile']);
		


		if($email == ''){
			$err_msg['no_email'] = 'Please enter an email address';
		} else {			
			if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
				$err_msg['invalid_email'] = 'Please enter a valid email address';
			}
		}
		
		$check_email = $db->get_var("SELECT id FROM app_users WHERE email = '$email'");
		
		if($check_email != ''){
			$err_msg['email_exists'] = 'An account has already been registered with that email address';
		}
		
		// Compare and encrypt the password - replace MD5 encryption
		// Use Salted and Hashed password algorythms
		// For Trevor
		
		if(stripslashes($_POST['reg_password']) == stripslashes($_POST['reg_password_confirm'])){
			$password	= md5($_POST['reg_password']);
		} else {
			$err_msg['password_match'] = 'Passwords do not match';
		}
		
		if($err_msg){
			
			foreach($err_msg as $error){ ?>
				    <div class="alert">
					    <button type="button" class="close" data-dismiss="alert">&times;</button>
					    <?=$error;?>
					</div>
			<? }
			
		} else {

			$create_user = $db->query("INSERT INTO app_users (email, password, role, bio, addr1, addr2, postal, city, province, country, mobile, fname, lname, partner_id ) VALUES ('$email', '$password', '$role', '$bio', '$addr1', '$addr2', '$postal', '$city', '$province', '$country', '$mobile', '$fname', '$lname', '$partner')");
			
			if($create_user){ ?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					User successfully added
				</div>
			<? } else { ?>
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					Database error
				</div>
			<? };
		}

	} 
	
	?>
	
		<form class="admin_form" role="form" id="registration_form" action="" method="post">
			<fieldset id="essential_information">
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label>First Name</label>
							<input class="form-control" type="text" name="fname" >
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input class="form-control" type="text" name="lname">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input class="form-control" type="text" name="reg_user">
						</div>
						<div class="form-group">
							<label>Customer of:</label>
							<select class="form-control" name="siteTheme">
								<?php foreach ($partners as $partner) {
									?>
									<option value='<?= $partner->businessname; ?>'> <?= $partner->businessname; ?></option>
									<? }?>
							</select>
						</div>
						<div class="form-group">
							<label>Password:</label>
							<input class="form-control" type="password" name="reg_password" >
						</div>
						<div class="form-group">
							<label>Confirm Password:</label>
							<input class="form-control" type="password" name="reg_password_confirm">
						</div>
						<div class="form-group">
							<!-- Submit -->
							<input class="btn btn-primary form-control" type="submit" name="reg_form_submit" value="Add User"/>
						</div>
					</div>
				</div>
			</fieldset>
			<br/>
			<!-- 
			<fieldset id="additional_information">
				<h4>Contact Information</h4>
				<div class="row">
					<div class="col-6">
						<input class="form-control" type="text" name="phone" placeholder="Phone">
					</div>
					<div class="col-6">
						<input class="form-control" type="text" name="mobile" placeholder="Mobile">
					</div>
				</div>
				<div class="row">
					<div class="col-9">
						<input class="form-control" type="text" name="addr1" placeholder="Street Address">
					</div>
					<div class="col-3">
						<input class="form-control" type="text" name="addr2" placeholder="Suite/Apt/Unit">
					</div>
				</div>			
				<div class="row">
					<div class="col-3">
						<input class="form-control" type="text" name="city" placeholder="City">
					</div>
					<div class="col-3">
						<input class="form-control" type="text" name="province" placeholder="Province">
					</div>
					<div class="col-3">
						<input class="form-control" type="text" name="country" placeholder="Country">
					</div>
					<div class="col-3">
						<input class="form-control" type="text" name="postal" placeholder="Postal Code">
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<textarea class="form-control" rows="6" type="text" name="bio" placeholder="Notes"></textarea>
					</div>
				</div>
				-->
		</form> 
	
	<?
}

// Edit User
function edit_user($user_id){

	// Call in Partners List for dropdown
	global $db;
	$partners = $db->get_results("SELECT businessname FROM app_partners");

	// Check registraiont POST submission
	if(isset($_POST['reg_form_submit'])){
					
		$role = 1;
		$email		= stripslashes($_POST['reg_user']);
		//$bio		= stripslashes($_POST['bio']);
		//$addr1		= stripslashes($_POST['addr1']);
		//$addr2		= stripslashes($_POST['addr2']);
		//$phone		= stripslashes($_POST['phone']);
		//$postal		= stripslashes($_POST['postal']);
		//$city		= stripslashes($_POST['city']);
		//$province	= stripslashes($_POST['province']);
		//$country	= stripslashes($_POST['country']);
		$fname		= stripslashes($_POST['fname']);
		$lname		= stripslashes($_POST['lname']);
		$partner	= stripslashes($_POST['partner_id']);
		//$mobile		= stripslashes($_POST['mobile']);
		


		if($email == ''){
			$err_msg['no_email'] = 'Please enter an email address';
		} else {			
			if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
				$err_msg['invalid_email'] = 'Please enter a valid email address';
			}
		}
		
		$check_email = $db->get_var("SELECT id FROM app_users WHERE email = '$email'");
		
		if($check_email != ''){
			$err_msg['email_exists'] = 'An account has already been registered with that email address';
		}
		
		// Compare and encrypt the password - replace MD5 encryption
		// Use Salted and Hashed password algorythms
		// For Trevor
		
		if(stripslashes($_POST['reg_password']) == stripslashes($_POST['reg_password_confirm'])){
			$password	= md5($_POST['reg_password']);
		} else {
			$err_msg['password_match'] = 'Passwords do not match';
		}
		
		if($err_msg){
			
			foreach($err_msg as $error){ ?>
				    <div class="alert">
					    <button type="button" class="close" data-dismiss="alert">&times;</button>
					    <?=$error;?>
					</div>
			<? }
			
		} else {

			$create_user = $db->query("INSERT INTO app_users (email, password, role, bio, addr1, addr2, postal, city, province, country, mobile, fname, lname, partner_id ) VALUES ('$email', '$password', '$role', '$bio', '$addr1', '$addr2', '$postal', '$city', '$province', '$country', '$mobile', '$fname', '$lname', '$partner')");
			
			if($create_user){ ?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					User successfully added
				</div>
			<? } else { ?>
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					Database error
				</div>
			<? };
		}

	} 
	
	?>
	
		<form class="admin_form" role="form" id="registration_form" action="" method="post">
			<fieldset id="essential_information">
				<div class="row">
					<div class="col-6">
						<input class="form-control" type="text" name="fname" placeholder="First Name">
					</div>
					
					<div class="col-6">
						<input class="form-control" type="text" name="lname" placeholder="Last Name">
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<input class="form-control" type="text" name="reg_user" placeholder="Email">
					</div>
					<div class="col-6">
						<select class="form-control" name="siteTheme">
							<?php foreach ($partners as $partner) {
								?>
								<option value='<?= $partner->businessname; ?>'> <?= $partner->businessname; ?></option>
							<? }?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<input class="form-control" type="password" name="reg_password" placeholder="Password">
					</div>
					<div class="col-6">
						<input class="form-control" type="password" name="reg_password_confirm" placeholder="Confirm Password">
					</div>
				</div>
			</fieldset>
			<br/>
			<!-- 
			<fieldset id="additional_information">
				<h4>Contact Information</h4>
				<div class="row">
					<div class="col-6">
						<input class="form-control" type="text" name="phone" placeholder="Phone">
					</div>
					<div class="col-6">
						<input class="form-control" type="text" name="mobile" placeholder="Mobile">
					</div>
				</div>
				<div class="row">
					<div class="col-9">
						<input class="form-control" type="text" name="addr1" placeholder="Street Address">
					</div>
					<div class="col-3">
						<input class="form-control" type="text" name="addr2" placeholder="Suite/Apt/Unit">
					</div>
				</div>			
				<div class="row">
					<div class="col-3">
						<input class="form-control" type="text" name="city" placeholder="City">
					</div>
					<div class="col-3">
						<input class="form-control" type="text" name="province" placeholder="Province">
					</div>
					<div class="col-3">
						<input class="form-control" type="text" name="country" placeholder="Country">
					</div>
					<div class="col-3">
						<input class="form-control" type="text" name="postal" placeholder="Postal Code">
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<textarea class="form-control" rows="6" type="text" name="bio" placeholder="Notes"></textarea>
					</div>
				</div>
				-->
				<!-- Submit -->
				<div clas-"form-group">
					<input class="btn btn-primary form-control" type="submit" name="reg_form_submit" value="Create Account"/>
				</div>
			</fieldset>
		</form> 
	
	<?
}



// Get user logged in details
// Check for login variables



// Get the ID of the partner who onboarded user
function get_user_partner_styles(){
	global $db;

	if(isset($_SESSION['USER'])){
		$current_session = $_SESSION['USER'];
		$user_id = $db->get_row("SELECT * FROM app_users WHERE id = '".$current_session."'");
	}
	$user_partner = $db->get_var("SELECT id FROM app_partners WHERE id = '".$user_id->partner_id."'");

	if (file_exists(APP .'/partners/'. $user_partner .'/style.css')){
		$parter_styles = '<link href="/app/partners/'.$user_partner.'/style.css" rel="stylesheet">';
	} else {
		$parter_styles = '';
	}
	echo $parter_styles;
}

// Get the ID of the partner who onboarded user
function get_user_partner_logo(){
	global $db;
	if(isset($_SESSION['USER'])){
		$current_session = $_SESSION['USER'];
		$user_id = $db->get_row("SELECT * FROM app_users WHERE id = '".$current_session."'");
	}
	$user_partner = $db->get_var("SELECT id FROM app_partners WHERE id = '".$user_id->partner_id."'");

	if (file_exists(APP .'/partners/'. $user_partner .'/logo.png')){
		$parter_logo = '<img src="/app/partners/'. $user_partner .'/logo.png">';
	} else {
		$parter_logo = NULL;
	}
	return $parter_logo;
}

function get_user_partner_name(){
	global $db;
	if(isset($_SESSION['USER'])){
		$current_session = $_SESSION['USER'];
		$user_id = $db->get_row("SELECT * FROM app_users WHERE id = '".$current_session."'");
	}
	$partner_name = $db->get_var("SELECT businessname FROM app_partners WHERE id = '".$user_id->partner_id."'");
	return $partner_name;
}


// Get User Role 
function get_user_role($level){
	global $db;
	$role 	= $db->get_var("SELECT name FROM app_roles WHERE permissions = '$level'");
	echo $role;
}

// Get global users and list as table

function get_users(){
	global $db;
	$users 	= $db->get_results("SELECT id, fname, lname, email, role FROM app_users");

?>
<table class="table sites-table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Role</th>
			<th>Email</th>
		</tr>
	</thead>
	<tbody>
		<? foreach ($users as $user) { ?>
			<tr>
				<td><a href="#"><?= $user->fname . ' ' . $user->lname;?></a></td>
				<td><? get_user_role($user->role); ?></td>
				<td><a href="#"><?= $user->email;?></a></td>
				<td>
					<ul class="list-inline pull-right">
						<li><a class="btn btn-default btn-sm" href="">Edit</a></li>
					</ul>
				</td>
			</tr>
		<? } ?>
	</tbody>
</table>
<? } 


function get_users_api(){
	global $db;
	$users 	= $db->get_results("SELECT id, fname, lname, email, role FROM app_users");
	return $users;
}


//////////////////////////////////////////////////////////////////////////////
// Partners
//////////////////////////////////////////////////////////////////////////////

// Make necessary directory for new parters files
function make_partner_dir($partner_id){
	// Desired folder structure
	$path_to_folder = ''.APP.'/partners/'.$partner_id;
	$user_name = 'ftpuser';
	// To create the nested structure, the $recursive parameter 
	// to mkdir() must be specified.
	$check = mkdir($path_to_folder);
	chmod($path_to_folder, 0777);
	chown($path_to_folder, $user_name);
	
	// Create config file
	/*$site_index_master 	= ''.APP.'/themes/setup/index.php';
	$new_site_index		= $path_to_site.'/index.php';
	
	if (!copy($site_index_master, $new_site_index)) {
	    echo "failed to copy $site_index_master...\n";
	}*/
}


function add_partner(){

	// Check registraiont POST submission
	if(isset($_POST['add_partner_form_submit'])){
					
		$email		= stripslashes($_POST['reg_email']);
		$businessname		= stripslashes($_POST['reg_businessname']);
		$err_msg = '';

		if($email == ''){
			$err_msg['no_email'] = 'Please enter an email address';
		} else {			
			if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
				$err_msg['invalid_email'] = 'Please enter a valid email address';
			}
		}
		global $db;
		$check_email = $db->get_var("SELECT id FROM app_partners WHERE email = '$email'");
		
		if($check_email != ''){
			$err_msg['email_exists'] = 'An account has already been registered with that email address';
		}
		
		// Compare and encrypt the password - replace MD5 encryption
		// Use Salted and Hashed password algorythms
		// For Trevor
		
		if(stripslashes($_POST['reg_password']) == stripslashes($_POST['reg_password_confirm'])){
			$password	= md5($_POST['reg_password']);
		} else {
			$err_msg['password_match'] = 'Passwords do not match';
		}
		
		if($err_msg){
			
			foreach($err_msg as $error){ ?>
				    <div class="alert">
					    <button type="button" class="close" data-dismiss="alert">&times;</button>
					    <?= $error;?>
					</div>
			<? }
			
		} else {
			// If no errors add partner to database
			$create_partner = $db->query("INSERT INTO app_partners (email, password, businessname ) VALUES ('$email','$password','$businessname')");
			
			// Get the new auto-incremented partner ID from the database
			$partner_id = mysql_insert_id();

			// Setup Partners assets folder
			make_partner_dir($partner_id);

			if($create_partner){ ?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					Partner successfully added
				</div>
			<? } else { ?>
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					Database error
				</div>
			<? };
		}

	} 
	
	?>
		<form class="admin_form" role="form" id="registration_form" action="" method="post">
			<fieldset id="essential_information">
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label>Business Name</label>
							<input class="form-control" type="text" name="reg_businessname" >
						</div>
						<div class="form-group">
							<label>Email</label>
							<input class="form-control" type="text" name="reg_email" >
						</div>
						<div class="form-group">
							<label>Password</label>
							<input class="form-control" type="password" name="reg_password" >
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<input class="form-control" type="password" name="reg_password_confirm" >
						</div>
						<!-- Submit -->
						<div clas-"form-group">
							<input class="btn btn-primary form-control" type="submit" name="add_partner_form_submit" value="Add Partner"/>
						</div>
					</div>
				</div>
			</fieldset>
		</form> 
	
	<?
}

// Get all partners
function get_all_partners(){
	global $db;
	$partners = $db->get_results("SELECT id, businessname, email FROM app_partners");


?>

<section id="list">
	<header>
		<div class="row">
			<div class="col-1">
				<strong>ID</strong>
			</div>
			<div class="col-3">
				<strong>Name</strong>
			</div>
			<div class="col-4">
				<strong>Email</strong>
			</div>
			<div class="col-1">
				<strong>Customers</strong>
			</div>
		</div>
	</header>

			<? foreach ($partners as $partner) { 
				?>
					<div class="row">
						<div class="col-1">
							<?= $partner->id; ?>
						</div>
						<div class="col-3">
							<?= $partner->businessname; ?>
						</div>
						<div class="col-4">
							<?= $partner->email; ?>
						</div>
						<div class="col-1">
							<?php 
							$partner_customers = $db->get_var("SELECT COUNT(partner_id) FROM app_users WHERE partner_id = ". $partner->id .""); 
							echo $partner_customers;
							?>
						</div>
						<div class="col-2 pull-right">
							<ul class="list-inline pull-right">
								<li><a href="<?= URL ?>app/admin/edit-partner?id=<?= $partner->id; ?>" class="btn btn-default btn-sm" >Edit</a></li>
							</ul>
						</div>
					</div>
					<hr/>					
			<? } ?>	
</section>
<? } 



<? /* Admin Functions */

/* Admin Auth
Author: Patrick Lyver
Owner: Webninja
V: 1.0
Y: 2013
*/


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
	
	// To create the nested structure, the $recursive parameter 
	// to mkdir() must be specified.
	$check = mkdir($path_to_site, 0700);
	
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

// Display a system message - useful for showing error and success messages
function show_message(){
	if (!empty($_SESSION['message'])) {
	    echo $_SESSION['message'];
	    unset($_SESSION['message']);
	}
}

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
		} else {
			$_SESSION['message'] = '<div class="alert alert-danger">Please fill in the required fileds<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a></div>';
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
											<option>Select New Theme</option>
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
												<option value='<?= $status->status_name; ?>' <?php if($set_siteStatus == $set_siteId){ echo('selected'); } ?> > <?= $status->status_name; ?></option>
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
								elseif ($site->site_status == '2') { echo '<button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown">Approvals</button>'; }
								elseif ($site->site_status == '3') { echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">Active</button>'; }
								elseif ($site->site_status == '4') { echo '<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Put Offline</button>'; }
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

function get_sidebar(){

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
	$hero = $db->query("CREATE TABLE site_".$site_id."_hero (id INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, herotitle LONGTEXT, herocontent LONGTEXT, heroimg LONGTEXT);");
	
	return true;
}

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
	$vh_location = ''.ROOT.'/vhosts';
	
	/* Write the VHOSTS update */
	$vh_content	= "
	#
	#Domain Definition for ".$newhostdir."
	#
	
	<VirtualHost *:80>
	
		DocumentRoot /var/www/webninja.me/htdocs
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
	header("location:".URL."/admin/?msg=success&url=".$url_encode);
	exit;
	
}

// Make necessary directory for new site and copy in files
function make_site_dir($site_id){
	// Desired folder structure
	$path_to_site = ''.APP.'/sites/'.$site_id;
	
	// To create the nested structure, the $recursive parameter 
	// to mkdir() must be specified.
	$check = mkdir($path_to_site, 0700);
	
	// Create config file
	$site_index_master 	= ''.APP.'/themes/setup/index.php';
	$new_site_index		= $path_to_site.'index.php';
	
	if (!copy($site_index_master, $new_site_index)) {
	    echo "failed to copy $site_index_master...\n";
	}
}

// Get Site Status 
function get_site_status($status){
	global $db;
	$status = $db->get_var("SELECT name FROM app_sites_status WHERE status = '$status'");
	echo $status;
}

// Super admin / ninja site table
function get_all_sites(){
	global $db;
	$sites = $db->get_results("SELECT id, site_url, site_name, site_status, site_theme FROM app_sites");
?>

	<table class="table sites-table">
		<thead>
			<tr>
				<th>Status</th>
				<th>URL</th>
				<th>Customer</th>
			</tr>
		</thead>
		<tbody>
			<? foreach ($sites as $site) { 
				?>
				<tr>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-default">
								<?php 
								if ($site->site_status == '1') { echo "New Site"; }
								elseif ($site->site_status == '2') { echo "Approval Phase"; }
								elseif ($site->site_status == '3') { echo "Active Site"; }
								?>
							</button>
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">New Site</a></li>
								<li><a href="#">Approval Phase</a></li>
								<li><a href="#">Active Site</a></li>
							</ul>
						</div>
					</td>					
					<td><a href="<?= $site->site_url;?>"><?= $site->site_url;?></a></td>
					<td><a href="">Tommy Hammer</a></td>
					<td>
						<ul class="list-inline pull-right">
							<li><button class="btn btn-default btn-sm more-info" data-toggle="tooltip" title="More"><i class="icon-caret-down"></i></button></li>
							<li><a class="btn btn-default btn-sm" href="" data-toggle="tooltip" title="Edit"><i class="icon-pencil"></i></a></li>
								<?php 
								if ($site->site_status == '1') { ?>
									<li><a class="btn btn-primary btn-sm" href="">Setup</a></li>
								<? }  ?>
						</ul>
					</td>
				</tr>															
			<? } ?>	
		</tbody>
	</table>
<? } 

// Get sites and list as table
function get_sites(){
	global $db;
	$sites = $db->get_results("SELECT id, site_url, site_name, site_status FROM app_sites");
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
								<li><a class="btn btn-primary btn-sm" href="">Preview</a></li>
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


function get_sidebar(){

}


function get_admin_nav(){
	global $db;
	$sitecount = $db->get_var("SELECT count(*) FROM app_sites WHERE site_status = '1'");
	
	global $user;
	if(isset($user)){	
		if($user->get_role() == 'user'){ ?>
				<li><a href=""><i class="icon-home"></i>Dashboard</a></li>
				<li><a href=""><i class="icon-question-sign"></i>Support</a></li>
				<!-- <li><a href=""><i class="icon-download"></i>App Store</a></li>-->
		<? } elseif ($user->get_role() == 'super'){ ?>
				<li><a href=""><i class="icon-home"></i>Dashboard</a></li>
				<li><a href=""><i class="icon-question-sign"></i>Support</a></li>
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

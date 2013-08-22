<? /* Update VHOSTS Function 
Author: Patrick Lyver
Owner: Webninja
V: 1.0
Y: 2013
*/

function update_vhosts($newhostdir){

/* Configuration - Path to VHOSTS file on live system */
// $vh_location = '/Applications/MAMP/conf/apache/extra/httpd-vhosts.conf';
//$vh_location = '/etc/apache2/sites-enabled';
$vh_location = '/var/www/webninja.me/vhosts';

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
}

fclose($fp);

$url_encode = md5($newhostdir);

/* Redirect on complete */
header("location:".URL."/app/admin?msg=success&url=".$url_encode);
exit;

}

// Make necessary directory for new site and copy in files
function make_site_dir($site_id){

	// Desired folder structure
	$path_to_site = '/var/www/webninja.me/htdocs/sites/'.$site_id;
	
	// To create the nested structure, the $recursive parameter 
	// to mkdir() must be specified.
	$check = mkdir($path_to_site, 0700);
	
	// Create config file
	$site_index_master 	= '/var/www/webninja.me/htdocs/themes/setup/index.php';
	$new_site_index		= $path_to_site.'index.php';
	
	if (!copy($site_index_master, $new_site_index)) {
	    echo "failed to copy $site_index_master...\n";
	}
}

// Super admin / ninja site table
function get_all_sites(){
	global $db;
	$sites = $db->get_results("SELECT id, site_url, site_name, site_theme FROM app_sites");
?>

	<table class="table sites-table">
		<thead>
			<tr>
				<th>ID</th>
				<th>URL</th>
				<th>Customer</th>
				<th>Theme</th>
			</tr>
		</thead>
		<tbody>
			<? foreach ($sites as $site) { ?>
				<tr>
					<td><?= $site->id;?></td>
					<td><a href="<?= $site->site_url;?>"><?= $site->site_url;?></a></td>
					<td>Tommy Hammer</td>
					<td><?= $site->site_theme;?></td>							
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

// Get sites and list as table
function get_sites(){
	global $db;
	$sites = $db->get_results("SELECT id, site_url, site_name FROM app_sites");
?>
<table class="table sites-table">
		<thead>
			<tr>
				<th>#</th>
				<th>Site Name</th>
				<th>Site URL</th>
			</tr>
		</thead>
		<tbody>
			<? foreach ($sites as $site) { ?>
				<tr>
					<td><?= $site->id;?></td>
					<td><?= $site->site_name;?></td>
					<td><a href="<?= $site->site_url;?>"><?= $site->site_url;?></a></td>
					<td>						
						<ul class="list-inline pull-right">
							<li><a href="" class="btn btn-default btn-sm" data-toggle="tooltip" title="Delete" ><i class="icon-remove"></i></a></li>
							<li><a href="<?= $site->app_url;?>" class="btn btn-default btn-sm" data-toggle="tooltip" title="Edit"><i class="icon-pencil"></i></a></li>
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
	global $user;
	if(isset($user)){	
		if($user->get_role() == 'user'){ ?>

			<ul class="list-unstyled" id="main-nav">
				<li><a href=""><i class="icon-home"></i>Dashboard</a></li>
				<li><a href=""><i class="icon-question-sign"></i>Support</a></li>
				<li><a href=""><i class="icon-download"></i>App Store</a></li>
			</ul>

		<? } elseif ($user->get_role() == 'super'){ ?>

			<ul class="list-unstyled" id="main-nav">
				<li><a href="<?= URL.'app/admin';?>"><i class="icon-home"></i>Dashboard</a></li>
				<li><a href=""><i class="icon-question-sign"></i>Support</a></li>
				<li><a href=""><i class="icon-download"></i>App Store</a></li>
			</ul>

			<ul class="list-unstyled" id="main-nav">
				<li><a href="site-queue"><i class="icon-tasks"></i>Site Queue</a></li>
				<li><a href="sites"><i class="icon-list"></i>Sites</a></li>
				<li><a href="users"><i class="icon-group"></i>Users</a></li>
			</ul>
		<? }
	}
}


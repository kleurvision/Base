<? /* Update VHOSTS Function 
Author: Patrick Lyver
Owner: Webninja
V: 1.0
Y: 2013
*/

function update_vhosts($newhostdir){

/* Configuration - Path to VHOSTS file on live system */
$vh_location = '/Applications/MAMP/conf/apache/extra/httpd-vhosts.conf';

/* Write the VHOSTS update */
$vh_content	= "
#
#Domain Definition for ".$newhostdir."
#

<VirtualHost *:80>

	DocumentRoot /Volumes/MacintoshHD/Sites/webninja/htdocs
	ServerName ".$newhostdir."
		
</VirtualHost>

#
#End Domain Definition for ".$newhostdir."
#
"; 
	
/* Open, Lock, and Write to the VHOSTS file */
$fp = fopen($vh_location, 'a');

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

// Super admin / ninja site table

function get_all_sites(){
	global $db;
	$sites = $db->get_results("SELECT id, app_url, site_name, app_theme FROM app_options");
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
					<td><a href="<?= $site->app_url;?>"><?= $site->app_url;?></a></td>
					<td>Tommy Hammer</td>
					<td><?= $site->app_theme;?></td>							
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
	$sites = $db->get_results("SELECT id, app_url, site_name FROM app_options");
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
					<td><a href="<?= $site->app_url;?>"><?= $site->app_url;?></a></td>
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


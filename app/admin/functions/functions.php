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
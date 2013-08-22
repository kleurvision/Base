<? 
$newhostdir = 'TESTICLES';

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

echo $vh_content;
echo '<br/>---- TO ----<br/>';
echo $vh_location;


$url_encode = md5($newhostdir);

/* Redirect on complete */
// header("location:/app/admin?msg=success&url=".$url_encode);
// exit;
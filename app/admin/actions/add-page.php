<? require('../bootstrap-admin.php');
	
	$title 		= $_POST['page-title'];
	$site_id	= $_POST['site_id'];
	$content 	= $db->escape($_POST['page-content']);
	$pageName 	= to_permalink($title);
	
	$createPage = $db->query("INSERT INTO site_".$site_id."_pages (pagename, pagetitle, pagecontent) VALUES ('$pageName','$title','$content')");	
	if($createPage) {
		 header('Location:'.URL.$pageName);
	}
?>
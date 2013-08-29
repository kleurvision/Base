<? require('../bootstrap-admin.php');
	
	$title 		= $_POST['page-title'];
	$site_id	= $_POST['site_id'];
	$content 	= $db->escape($_POST['page-content']);
	$pageName 	= to_permalink($title);
	
	$createPage = $db->query("INSERT INTO site_".$site_id."_pages (pagename, pagetitle, pagecontent) VALUES ('$pageName','$title','$content')");	
	$site_slug = $db->get_var("SELECT site_name FROM app_sites WHERE id = ".$site_id."");

	if($createPage) {
		 header('Location:'.URL.'preview/'.$site_slug.'/'.$pageName);
	}

?>
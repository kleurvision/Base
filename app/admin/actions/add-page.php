<? require('../bootstrap-admin.php');
	
	$title 				= $_POST['page-title'];
	$site_id			= $_POST['site_id'];
	$content 			= $db->escape($_POST['page-content']);
	$pageName 			= to_permalink($title);
	$pageslug			= to_permalink($_POST['edit-pagename']);
	$pagemeta_title 	= $_POST['edit-meta-title'];
	//$pageauthor		= $_POST['edit-author'];
	$pagemeta_desc		= $db->escape($_POST['edit-meta-desc']);
	$pagekeywords		= $_POST['edit-keywords'];
	$template			= $_POST['template'];
	$redirect			= $_POST['redirect'];
	
	$site_info = get_site_info($site_id);

	$createPage = $db->query("INSERT INTO site_".$site_id."_pages (pagename, pagetitle, pagecontent, pagemeta_title, pagemeta_desc, pagemeta_keywords, pagetemplate ) 
		VALUES ('$pageName','$title','$content','$pagemeta_title','$pagemeta_desc','$pagekeywords','$template')");	
	
	if($createPage) {
		header('Location:'.$redirect.$pageName);
	}
	
?>
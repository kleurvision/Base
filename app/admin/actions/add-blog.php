<? require('../bootstrap-admin.php');
	
	$title	 			= $_POST['page-title'];
	$site_id			= $_POST['site_id'];
	$content 			= $db->escape($_POST['page-content']);
	$category			= $_POST['category'];
	$postName 			= to_permalink($title);
	$pageslug			= to_permalink($_POST['edit-pagename']);
	$pagemeta_title 	= $_POST['edit-meta-title'];
	//$pageauthor		= $_POST['edit-author'];
	$pagemeta_desc		= $db->escape($_POST['edit-meta-desc']);
	$pagekeywords		= $_POST['edit-keywords'];
	$redirect			= $_POST['redirect'];
	
	$site_info = get_site_info($site_id);


	// Blog table does not exist, make it
	$createPostTable = $db->query("CREATE TABLE IF NOT EXISTS site_".$site_id."_posts (id INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, postname LONGTEXT, posttitle LONGTEXT, postcontent LONGTEXT, postcategory LONGTEXT, pagemeta_title LONGTEXT, pagemeta_desc LONGTEXT, pagemeta_keywords LONGTEXT )");
		
	// Blog table exists, add the entry			
	$blogEntry = $db->query("INSERT INTO site_".$site_id."_posts (postname, posttitle, postcontent, postcategory, pagemeta_title, pagemeta_desc, pagemeta_keywords) 
	VALUES ('$postName','$title','$content','$category','$pagemeta_title','$pagemeta_desc','$pagekeywords')");	
	
	
	if($blogEntry) {
		header('Location:'.$redirect.$pageName);
		exit;
	} else {
		$error['no_blog'] = 'An error has occurred processing your blog';
	}
	
		
?>
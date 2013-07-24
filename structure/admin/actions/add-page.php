<? require('../../../bootstrap-light.php');
	
	$title = $_POST['page-title'];
	$content = $db->escape($_POST['page-content']);
	$pageName = to_permalink($title);
	
	$createPage = $db->query("INSERT INTO app_pages (pagename, pagetitle, pagecontent) VALUES ('$pageName','$title','$content')");
	
	if($createPage) {
		 header('Location:'.URL.'/'.$pageName);
	}
?>
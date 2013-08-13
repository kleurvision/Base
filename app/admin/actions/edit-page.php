<? require('../../../bootstrap-light.php');
	
	$pageID 		= $_POST['pageID'];
	$pageslug		= to_permalink($_POST['edit-pagename']);
	$pagetitle 		= $_POST['edit-title'];
	$pagemeta_title = $_POST['edit-meta-title'];
	$pageContent 	= $db->escape($_POST['edit-content']);
	$pageauthor		= $_POST['edit-author'];
	$pagemeta_desc	= $db->escape($_POST['edit-meta-desc']);
	$pagekeywords	= $_POST['edit-keywords'];
	$template		= $_POST['template'];
	if($template == 'default'){ $template = NULL; };
	

	
	$editPage = $db->query("UPDATE app_pages SET 
								pagename = '$pageslug', 
								pagetitle = '$pagetitle', 
								pagecontent = '$pageContent',
								pageauthor = '$pageauthor',
								pagemeta_title = '$pagemeta_title',
								pagemeta_desc = '$pagemeta_desc',
								pagemeta_keywords = '$pagekeywords',
								pagetemplate =	'$template'
							WHERE id = $pageID");
	

	if($editPage) {
		 header('Location:'.URL.'/'.$pageslug);
	}
?>
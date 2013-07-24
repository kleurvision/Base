<? require('../../../bootstrap-light.php');
	
	$order = $_POST['nav-order'];
	$orderArray = json_decode(str_replace ('\"','"', $order), true);
	
	if($orderArray){
		foreach($orderArray as $page){
			$pageParent = $page['id'];
			$child_pages = $page['children'];
			if($child_pages){
				foreach($child_pages as $child){
					$childUrls = $db->query("UPDATE app_pages SET pageparent = '$pageParent' WHERE id = ".$child['id']);
				}
			} else {
				$db->query("UPDATE app_pages SET pageparent = NULL WHERE id = $pageParent");
			}
		}
	}
	

	/*$prefix = '';
	$i = 0;
	foreach ($order as $navItem)
	{
	    $pageID = $db->get_var("SELECT id FROM app_pages WHERE pagetitle = '$navItem'");
	    $navArray[$i++] = $pageID;
	}
	
	$nav = serialize($navArray); */
	if($order){
		$createNav = $db->query("INSERT INTO app_nav (navigation) VALUES ('$order')");
	}
	
	if($createNav) {
		 header('Location:'.URL);
	}

?>
<? require('../bootstrap-admin.php');
		
	$order 			= $_POST['nav-order'];
	$nav_ID 		= $_POST['nav_id']; // USED TO CHECK DB FOR UPDATE OR INSERT
	$site_id		= $_POST['site_id'];
	$orderArray 	= json_decode(str_replace ('\"','"', $order), true);
	$redirect		= $_POST['redirect'];
	
	if($orderArray){
		foreach($orderArray as $page){
			$pageParent = $page['id'];
			
			if(isset($page['children'])){
				$child_pages = $page['children'];

				foreach($child_pages as $child){
					$childUrls = $db->query("UPDATE site_".$site_id."_pages SET pageparent = '$pageParent' WHERE id = ".$child['id']);
				}
			} else {
				$db->query("UPDATE site_".$site_id."_pages SET pageparent = NULL WHERE id = $pageParent");
			}
		}
	}
	
	// INSERT INTO SITE OPTIONS FOR NAVIGATION STRUCTURE	
	if($order){
		$createNav = $db->query("INSERT INTO site_".$site_id."_settings (id, navigation) VALUES ('$nav_ID','$order') ON DUPLICATE KEY UPDATE navigation='$order'");
	}
	
	if($createNav) {
		 header('Location:'.$redirect);
	}

?>
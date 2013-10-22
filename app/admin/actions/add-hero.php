<? require('../bootstrap-admin.php');

	$title 		= $_POST['hero-title'];
	$site_id	= $_POST['site_id'];
	$redirect	= $_POST['redirect'];
	$action		= $_POST['hero-action'];
	$content 	= $db->escape($_POST['hero-content']);
	
	// Set upload path to uploads folder (site ID specific)
	$uploaddir 	= APP.'/sites/'.$site_id.'/uploads/';
	
	if(is_dir($uploaddir)){
		// Directory exists
	} else {
		mkdir($uploaddir , 0777);
		// Directory created
	}
	
	
	$filename  	= basename($_FILES['hero-file']['name']);
	$extension 	= pathinfo($filename, PATHINFO_EXTENSION);
	$newName    = date('YmdHis').'.'.$extension;
	$uploadfile = $uploaddir . $newName;
	
	$moveFile = move_uploaded_file($_FILES['hero-file']['tmp_name'], $uploadfile);
	
	if($moveFile){
		
		// Check for heroaction
		$check_action	= $db->get_col("SELECT heroaction FROM site_".$site_id."_hero");
		if(!$check_action){
			$db->query("ALTER TABLE site_".$site_id."_hero ADD COLUMN heroaction LONGTEXT");
		}
		$createHero = $db->query("INSERT INTO site_".$site_id."_hero (herotitle, herocontent, heroaction, heroimg) VALUES ('$title','$content', '$action', '$newName')");
	} else {
		
		echo 'Not moved';
	}
	
	if($createHero) {
		 header('Location:'.$redirect);
	} else {
		
		echo 'Not added';
	}
?>
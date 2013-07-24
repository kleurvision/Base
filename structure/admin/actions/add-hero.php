<? require('../../../bootstrap-light.php');
	$title = $_POST['hero-title'];
	$content = $db->escape($_POST['hero-content']);
	$uploaddir = PATH.THEME.'/images/heros/';
	$filename  = basename($_FILES['hero-file']['name']);
	$extension = pathinfo($filename, PATHINFO_EXTENSION);
	$newName       = date('YmdHis').'.'.$extension;
	$uploadfile = $uploaddir . $newName;
	
	$moveFile = move_uploaded_file($_FILES['hero-file']['tmp_name'], $uploadfile);
	
	if($moveFile){
		$createHero = $db->query("INSERT INTO app_hero (herotitle, herocontent, heroimg) VALUES ('$title','$content','$newName')");
	}
	
	if($createHero) {
		 header('Location:'.URL);
	}
?>
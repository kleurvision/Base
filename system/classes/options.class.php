<? /* Define general site options */
class Options{
	
	// Load basic app options
	function app_options($site = '1'){
		global $db;
		$app_options = $db->get_row("SELECT * FROM app_options WHERE id = '$site'");
		return $app_options;
	}
	
	function app_layout(){
		$app_layout = $app_options->layout;
		return $app_layout;
	}
	
}
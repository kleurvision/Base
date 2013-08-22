<? /* Define general page vars */
class Page {

	function __construct($db){
		$this->db = $db;
	}

	function page_map($pagename = false){  
		if($pagename){  
			$pageload = $this->db->get_row("SELECT * FROM site_".SITE_ID."_pages WHERE pagename = '$pagename'");
			if($pageload){
				return $pageload;
			} else {
				$pageload = '404';
				return $pageload;
			};
			 
		};
	}
	
	function page_info($pageID){
		$pageInfo = $this->db->get_row("SELECT * FROM site_".SITE_ID."_pages WHERE id= '$pageID'");
		if($pageInfo){
			return $pageInfo;
		}
	}
	
	// Check to see is URL is looking for a user page and load it
	function get_profile(){
		// Check to make sure it's the user page
		if($_GET['pagename'] == 'user'){
			// Pull the username
			if(isset($_GET['user'])){
				$username 		= $_GET['user'];
				$user_profile 	= $this->db->get_row("SELECT * FROM app_users WHERE username = '$username'");
				if($user_profile){
					return $user_profile;
				}
			} else {
				return 'undefined';
			}
		}
	}
	
	// Load page meta data and title to header 
	function load_metadata($pagename = ''){
		
		if($pagename != ''){
			$metaData = $this->db->get_row("SELECT pagetitle, pagemeta_title, pagemeta_desc, pagemeta_keywords FROM site_".SITE_ID."_pages WHERE pagename = '$pagename'");
		} else {
			$metaData = $this->db->get_row("SELECT * FROM app_sites WHERE id = 1");
		}
		
		if(isset($metaData->pagemeta_title)){
			$title = $metaData->pagemeta_title;
		} else {
			// $title = $metaData->pagetitle;
			$title = '';
		}
		echo "<title>". $title . "</title>\n";

		if(isset($metaData->pagemeta_desc)){
			$desc =$metaData->pagemeta_desc;
			echo "<meta name='description' content='".$desc."'/>\n";
		}

		if(isset($metaData->pagemeta_keywords)){ 
			$keys = $metaData->pagemeta_keywords;
			echo "<meta name='keywords' content='".$keys."' />\n";
		}
	}
	
	// Load template header
	function get_header($modifier = ''){
		if ($modifier==''){
			include(THEME.'/header.php');
		} else {
			include(THEME.'/header-'.$modifier.'.php');
		};
	}
	
	// Load template footer
	function get_footer($modifier = ''){
		if ($modifier==''){
			include(THEME.'/footer.php');
		} else {
			include(THEME.'/footer-'.$modifier.'.php');
		};
	}
	
	// Load template sidebar
	function get_sidebar($modifier = ''){
		if ($modifier==''){
			include(THEME.'/sidebar.php');
		} else {
			include(THEME.'/sidebar-'.$modifier.'.php');
		};
	}
 
 
 function page_array(){  
			$pagesArray = $this->db->get_results("SELECT id, pagetitle FROM site_".SITE_ID."_pages WHERE pageparent IS NULL");
			if($pagesArray){
				return  $pagesArray;
			}
		}
		
 function breadcrumbs($pagename){
 	$breadcrumb  = $this->page_map($pagename);
 	$parentID = $breadcrumb->pageparent;
 	if(isset($parentID)){
	 	$parent = $this->db->get_results("SELECT pagetitle, pagename FROM site_".SITE_ID."_pages WHERE id = $parentID");
 	};
 	echo '<ul class="breadcrumb">'. "\r\n";
    echo '<li><a href="'.URL.'">Home</a> <span class="divider">//</span></li>'."\r\n";
    
    // Add the parent page
    if(isset($parent)){
	    echo '<li><a href="'.URL.'/'.$parent[0]->pagename.'">'.$parent[0]->pagetitle.'</a> <span class="divider">//</span></li>'."\r\n";
    }
    
    echo '<li class="active">'.$breadcrumb->pagetitle.'</li>';
    
    echo '</ul>';
 	
 }
}
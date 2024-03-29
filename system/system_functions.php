<? /* App functions
------------------------------
** ClientCare app function file
------------------------------
** Here we go */

// Lock and Key
function lock_page($directory){
	$access 		= $_SERVER['SCRIPT_URL'];
	$skeletonkey 	= strpos($access, $directory.'/');
	if (($skeletonkey == true) && (!$x)) {
		header("Location:/");
	}
}

// Determine the homepage
function is_homepage(){	
	
	// Check database for app URL
	if(!isset($_GET['pagename'])){
		return true;
	} else {
		return false;
	}
}

// Application head hook for mandatory head loads
function app_head(){
	
	global $user;
	if(isset($user)){	
		if($user->get_role() == 'super' || $user->get_owner() == true){
			// Load in Hud CSS
			echo '<link href="'.URL.'app/admin/assets/css/font-awesome.min.css'.'" rel="stylesheet">'. "\r\n";			
			echo '<link href="'.URL.'app/admin/assets/css/file_input.css'.'" rel="stylesheet">'. "\r\n";			
			echo '<link href="'.URL.'app/admin/assets/css/hud.css'.'" rel="stylesheet">'. "\r\n";
		} elseif ($user->get_role() == 'user' && $user->get_owner() == true){
			// Load in Hud CSS
			echo '<link href="'.URL.'app/admin/assets/css/font-awesome.min.css'.'" rel="stylesheet">'. "\r\n";			
			echo '<link href="'.URL.'app/admin/assets/css/file_input.css'.'" rel="stylesheet">'. "\r\n";			
			echo '<link href="'.URL.'app/admin/assets/css/hud.css'.'" rel="stylesheet">'. "\r\n";
		}
	}
	
	if(isset($_SESSION['error'])){
		echo '<div class="alert alert-block alert-error">';
		echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
		echo '<h4>Form Error - some fields are mandatory</h4>';
		if (is_array($_SESSION['error'])){
			foreach($_SESSION['error'] as $err_msg){
				echo '<p class="error">'.$err_msg.'</p>';
			}
		} else {
			echo '<p class="error">'.$_SESSION['error'].'</p>';
		}
		$_SESSION['error'] = '';
		unset($_SESSION['error']);
		echo '</div>';
	} 
	
	if(isset($_SESSION['success'])){
		echo '<div class="alert alert-block alert-success">';
		echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
		echo '<h4>Great Success!</h4>';		
		echo '<p class="error">'.$_SESSION['success'].'</p>';
		$_SESSION['success'] = '';
		unset($_SESSION['success']);
		echo '</div>';
	}
	

	// Check for Site config file or load Parent Theme Config File
	if (file_exists(SITE.'/config.php')){
		include (SITE.'/config.php');
	} elseif (file_exists(THEME.'/config.php')){
		include (THEME.'/config.php');
	}

	// Check for site style Override
	if (file_exists(SITE.'/screen.css')){
		echo '<link href="'.URL.SITE.'/screen.css" rel="stylesheet">';
	}

}

// Last ditch attempt to load in footer items
function app_foot(){
	
	global $user;
	if(isset($user)){	
		if($user->get_role() == 'super' || $user->get_owner() == true){
			// Load in Hud Scripts
			echo '<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>' . "\r\n";
			echo '<script src="'.URL.'app/admin/assets/js/jquery.nestable.js"></script>'. "\r\n";
			echo '<script src="'.URL.'app/admin/assets/js/bootstrap.modals.min.js"></script>'. "\r\n";
			echo '<script src="'.URL.'app/admin/assets/js/bootstrap.tooltips.min.js"></script>'. "\r\n";
			echo '<script src="'.URL.'system/library/ckeditor/ckeditor.js"></script>'. "\r\n";	
			echo '<script src="'.URL.'app/admin/assets/js/hud.js"></script>'. "\r\n";
		} elseif ($user->get_role() == 'user' && $user->get_owner() == true){
			// Load in Hud Scripts
			echo '<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>' . "\r\n";
			echo '<script src="'.URL.'app/admin/assets/js/jquery.nestable.js"></script>'. "\r\n";
			echo '<script src="'.URL.'app/admin/assets/js/bootstrap.modals.min.js"></script>'. "\r\n";
			echo '<script src="'.URL.'app/admin/assets/js/bootstrap.tooltips.min.js"></script>'. "\r\n";
			echo '<script src="'.URL.'system/library/ckeditor/ckeditor.js"></script>'. "\r\n";
			echo '<script src="'.URL.'app/admin/assets/js/hud.js"></script>'. "\r\n";
		}
	}

}

// Top level navigation
function app_nav($class = '', $div = '', $collapse = 'true', $startCap = '', $endCap = '', $home = 'true', $parentLinks = 'false'){

	if($class != ''){
		$class = $class.'-nav';
	}
	if($div != ''){
		$div = $div.'-nav';
	}
	global $db;
	//$pages = $db->get_results("SELECT id, pageparent, pagename, pagetitle FROM app_pages");
	$navs = $db->get_results("SELECT id, navigation FROM site_".SITE_ID."_settings");
	if($navs){
	
		$navs = json_decode($navs[0]->navigation, true);
		echo '<ul id="'.$div.'" class="nav navbar-nav '.$class.'">';
		if($startCap == 1){
			echo '<li class="startCap"></li>';
		}
		if($home == 'true'){
			echo '<li class="homeLink"><a href="'.NAV.'">Home</a></li>';
		}
		foreach($navs as $nav){
			
			$page = $db->get_row("SELECT id, pageparent, pagename, pagetitle FROM site_".SITE_ID."_pages WHERE id =". $nav['id']);
			// Check to see if the page has children
			if(isset($nav['children'])){
				$child_pages = $nav['children'];
			} else {
				$child_pages = '';
			}
			
			if($child_pages){
				echo '<li class="dropdown">';
			} else {
				echo '<li>';
			}
			
			if($page->pageparent == ''){
				if($child_pages && $parentLinks == 'true'){
					echo'<a href="'.NAV.$page->pagename.'">'.$page->pagetitle.'</a>';
				} else if($child_pages && $parentLinks == 'false'){
					echo'<a class="dropdown-toggle" data-toggle="dropdown" href="'.NAV.$page->pagename.'">'.$page->pagetitle.'</a>';
				} else {
					echo'<a href="'.NAV.$page->pagename.'">'.$page->pagetitle.'</a>';
				}
			};
			
			if($child_pages){
				echo '<ul class="dropdown-menu">';
				foreach($child_pages as $child){
					$childUrls = $db->get_row("SELECT pagename, pagetitle FROM site_".SITE_ID."_pages WHERE id = ".$child['id']);

					echo '<li class="nav-child"><a href="'.NAV.$childUrls->pagename.'">'.$childUrls->pagetitle.'</a></li>';
				}
				echo '</ul>';
			}
			
			echo '</li>';
		}
		
		if($endCap == 1){
			echo '<li class="endCap"></li>';
		}
		echo '</ul>';
	}
}

// Get the partner name of the currently logged in user
// This function is called into the hud
function get_partner_name(){
	global $db;
	if(isset($_SESSION['USER'])){
		$current_session = $_SESSION['USER'];
		$user_id = $db->get_row("SELECT * FROM app_users WHERE id = '".$current_session."'");
	}
	$partner_name = $db->get_var("SELECT businessname FROM app_partners WHERE id = '".$user_id->partner_id."'");
	return $partner_name;
}


// Create modal boxes
function app_modal($modifier='default'){ ?>
	<div id="<?=$modifier;?>Modal" class="hud-modal fade">
		<div class="hud-modal-dialog">
			<div class="hud-modal-content">
				<? // Check for modal modifier
				if($modifier == 'default'){
		    		include (THEME.'/modal.php');
		    	} else {
			    	include (THEME.'/modal-'.$modifier.'.php');
		    	} ?>
    		</div>
		</div>
	</div>
<? }

// Create admin boxes
function admin_modal($modifier='default'){ ?>
	<div id="<?=$modifier;?>ModalAdmin" class="hud-modal fade <?= $modifier;?>">
			<div class="hud-modal-content">		
				<? // Check for modal modifier
				if($modifier == 'default'){
		    		include (ADMIN.'/modals/modal.php');
		    	} else {
			    	include (ADMIN.'/modals/modal-'.$modifier.'.php');
		    	} ?>
	</div>
<? }


// Edit user profile
function get_profile(){
	
	if(isset($_SESSION['USER'])){
		
		$id = $_SESSION['USER'];
		global $db;
		$user = $db->get_row("SELECT * FROM app_users WHERE id = '".$id."'");
		
		echo '<form type="post">';
		foreach($user as $name => $value){
			echo '<input name="'.$name.'" type="text" placeholder="'.$name.'" value="'.$value.'"/>';
			
		}
		echo '<input type="sumbit" class="btn" name="update_profile" value="Update"/>';
		echo '</form>';
	
	} else {
		// No Profile
	}
}


// Set resource directory
function resource_path($type){
	if($type==''){
		$resource_path = URL.'resources';
	} else {
		$resource_path = URL.'resources/'.$type;
	}
	return $resource_path;
}

function get_resource_path($type){
	if($type==''){
		$resource_path = URL.'resources';
	} else {
		$resource_path = URL.'resources/'.$type;
	}
	echo $resource_path;
}

// Set resource directory
function theme_path($type){
	if($type==''){
		$theme_path = URL.''.THEME;
	} else {
		$theme_path = URL.''.THEME.'/'.$type;
	}
	return $theme_path;
}

function get_theme_path($type){
	if($type==''){
		$theme_path = URL.''.THEME;
	} else {
		$theme_path = URL.''.THEME.'/'.$type;
	}
	echo $theme_path;
}

// Set resource directory
function site_path($type){
	if($type==''){
		$theme_path = URL.''.SITE;
	} else {
		$theme_path = URL.''.SITE.'/'.$type;
	}
	return $theme_path;
}

function get_site_path($type){
	if($type==''){
		$theme_path = URL.''.SITE;
	} else {
		$theme_path = URL.''.SITE.'/'.$type;
	}
	echo $theme_path;
}


// Load page info
function site_info($option = ''){
		global $db;
		$default = $db->get_row("SELECT * FROM app_sites WHERE id = ".SITE_ID."");
		if(isset($option)){
			if($option == 'title'){
				echo $default->site_name;
			} else {
				echo $default->site_name;
			}
		}
}




// Basic database query - get all the data
function app_table_dump(){
	global $db;
	$db->select('kleurvis_analytics');
		foreach($db->get_col("SHOW TABLES", 0) as $data_table){
			$db->debug();
			$db->get_results("DESC $data_table");
		}
	$db->debug();
}

function app_options(){
	global $db;
	$app_url = URL;
	$opts = $db->get_row("SELECT * FROM app_sites WHERE app_url = '$app_url'");
	if($opts){
		return $opts;
	} else {
		echo 'Site does not exist';
	}
}

function db_query($args){
	
	print_r($args);
	/* $args
	'type' => page | post
	'posts_per_page' => *n*
	'order' => ASC | DESC
	'id' => *n*
	'title' => *slug*
	*/
	
	global $db;
	if($args->posts_per_page > 1 && $args->type == 'post'){
		$query = $db->get_results("SELECT * FROM app_posts");

	} elseif($args->posts_per_page == 1 && $args->type == 'post'){
		$query = $db->get_row("SELECT * FROM app_posts");

	} elseif($args['type'] == 'page'){
		// Define page name from URL
		$pagename = $_GET['pagename'];
		$query = $db->get_row("SELECT * FROM site_".SITE_ID."_pages WHERE pagename = '$pagename'");
	}
	return $query; 
}

// Load template navigation
function get_nav($modifier = ''){
	if ($modifier==''){
		include(THEME.'/nav.php');
	} else {
		include(THEME.'/nav-'.$modifier.'.php');
	};
}

// Check for unique qrid
function unique_qrid(){
	
}


// Generate unique qrid
function generate_qrid(){

    $capital_letters = range("A", "Z");
    $lowcase_letters = range("a", "z");
    $numbers         = range(0, 9);

    $all = array_merge($capital_letters, $lowcase_letters, $numbers);
    $count = count($all);    
    $id    = "";

    for($i = 0; $i < 16; $i++)
    {
        $key = rand(0, $count);
        $id .= $all[$key];
    }

    if(!unique_qrid($id))
    {
        return generateID();
    }
    return $id;
}

// PDF to JPEG
function pdf_to_jpeg($filename){
	$path_to_pdf = '/home/kleurvis/public_html/_clientcare/_v2/structure/theme/images/'; // Path to PDF folder
	$pdf_name = $filename; // PDF file name
	$pdf = $path_to_pdf.$pdf_name; // Assemble PDF file
	$quality=90; // Quality
	$res='72x72'; // Resolution
	$exportName="pdf_export_" . time();
	$exportPath=realpath(dirname(__FILE__))."/$exportName/fullres/%03d.jpg";
	
	// Create the folders			   
	mkdir(realpath(dirname(__FILE__))."/$exportName"); // Sets export directory parent
	mkdir(realpath(dirname(__FILE__))."/$exportName/fullres"); // Sets export directory
				   
	// Create the JPEG			   
	set_time_limit(900);
	exec("'gs' '-dNOPAUSE' '-sDEVICE=jpeg' '-dUseCIEColor' '-dTextAlphaBits=4' '-dGraphicsAlphaBits=4' '-o$exportPath' '-r$res' '-dJPEGQ=$quality' '$pdf'", $output);
				   
	for($i=0;$i<count($output);$i++)
	echo($output[$i] .'<br/>');
}


  function list_child_pages($parentID){
	  global $db;
	  $childPages = $db->get_results("SELECT * FROM app_pages WHERE pageparent = $parentID ");
	  return $childPages;
  }


/**
     * Series of Uploader functions based on the Upload Class and particular requirements for each invokation
     * $args argument list include
     * 'class'			= class modifier
     * 'title'			= legend title
     * 'desc'			= description line
     * 'submit'			= submit button value
     * 'placeholder'	= input field placeholder value
     * 'folder'			= folder path for saving images
     * Requires javascript file loaded in the footer - app.js
     * Function file_input(); runs on change of fake input
*/

// Upload Image - Simple

function upload_image($args = ''){ ?>
	<fieldset class="uploader_image <?=$args['class'];?>">
        <legend>
        	<? if(isset($args['title'])){ echo $args['title']; } else { echo 'Image Upload'; };?>
        </legend>
        <p>
        	<? if(isset($args['desc'])){
        			echo $args['desc'];
        		} else {
        			echo 'Pick up an image to upload, and press "upload"';
        		};?>
        </p>
        <form name="form2" enctype="multipart/form-data" method="post" action="<?= APP.'/library/upload/upload.php';?>" />
        	<div class="file_input_wrapper">
            <input class="file_input" type="file" name="my_field" value="" onchange="file_input();" />
            <div class="file_input_skin">
            	<div class="global_input_wrapper">
            		<div class="global_input_skin">
            			<input class="f_file_input" type="text" placeholder="<? if(isset($args['placeholder'])){ echo $args['placeholder']; } else { echo 'Browse'; };?>"/>
            		</div>
            	</div>
            	<div class="btn">
            		Browse
            	</div>
            </div>
        	</div>
            <input type="hidden" name="action" value="image" />
            <input type="hidden" name="path" value="<? if(isset($args['folder'])){ echo $args['folder']; } else { echo 'Image Upload'; };?>" />
            <input class="btn btn-primary" type="submit" name="Submit" value="<? if(isset($args['submit'])){ echo $args['submit']; } else { echo 'Upload'; };?>" />
        </form>
    </fieldset>
<? }

function to_permalink($str)
{
	    if($str !== mb_convert_encoding( mb_convert_encoding($str, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32') )
	        $str = mb_convert_encoding($str, 'UTF-8', mb_detect_encoding($str));
	    $str = htmlentities($str, ENT_NOQUOTES, 'UTF-8');
	    $str = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\\1', $str);
	    $str = html_entity_decode($str, ENT_NOQUOTES, 'UTF-8');
	    $str = preg_replace(array('`[^a-z0-9]`i','`[-]+`'), '-', $str);
	    $str = strtolower( trim($str, '-') );
	    return $str;
	} 

function directoryToArray($directory, $recursive) {
	$array_items = array();
	if ($handle = opendir($directory)) {
		while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != "..") {
				if (is_dir($directory. "/" . $file)) {
					if($recursive) {
						$array_items = array_merge($array_items, directoryToArray($directory. "/" . $file, $recursive));
					}
					$file = $directory . "/" . $file;
					$array_items[] = preg_replace("/\/\//si", "/", $file);
				} else {
					$file = $directory . "/" . $file;
					$array_items[] = preg_replace("/\/\//si", "/", $file);
				}
			}
		}
		closedir($handle);
	}
	return $array_items;
}

function tumblr_items($tag = 'Portfolio', $limit = '50', $baselimit = '50'){ ?>
	
	<ul class="thumbnails">

		<?  $count = 0;
			$api	= 'gEKQ7Pie9oqHJrK9IMrK3Emn4YEBALF7GlrWxFTcWO8yGvd4aq';
			$url	= 'http://api.tumblr.com/v2/blog/webrandbands.tumblr.com/posts/photo?api_key='.$api.'&tag='.$tag.'&limit='.$baselimit;
			$tumblr =  file_get_contents($url);
			$posts = json_decode($tumblr, true);
			$pictures = $posts['response']['posts'];
			shuffle($pictures);
			foreach($pictures as $picture){
    			$thumb = $picture['photos'][0]['alt_sizes'][2]['url'];
    			$large = $picture['photos'][0]['original_size']['url'];
    			
			?>
				<li class="span2"><a class="portfolio_item thumbnail" rel="gallery1" href="<?= $large;?>"><img src="<?= $thumb;?>" alt="" /></a></li>
			<? $count++; if($count >= $limit) break;}?>
		</ul>
<? }

function social_share(){ ?>
	<!-- AddThis Button BEGIN -->
	<div class="addthis_toolbox addthis_default_style addthis_16x16_style">
		<a class="addthis_button_facebook"></a>
		<a class="addthis_button_twitter"></a>
		<a class="addthis_button_google_plusone_share"></a>
		<a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
	</div>
	<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5183eff56a248b9d"></script>
	<!-- AddThis Button END -->
<? }

function social_links(){
	
}

function hero_slider($site_id){
	
	global $db;
	$heros = $db->get_results("SELECT * FROM site_".$site_id."_hero");
	
	if($heros){
		$i = 1;
		foreach($heros as $hero){ 
		?>
			<!-- Slide <?=$i;?> -->
			<? if($i == '1'){ 
				
				// If is the first slide, set it to active ?>
				<div class="item active">	
			<? } else { ?>
			
				<div class="item">
			<? }; ?>
			
				<img src="<?= URL.SITE.'/uploads/'.$hero->heroimg;?>" alt="#" />
				<div class="carousel-caption">
					<h2><?=$hero->herotitle;?></h2>
					<p><?=$hero->herocontent;?></p>
					
					<? if($hero->heroaction){
						$heroaction_url = str_replace('http://', '', $hero->heroaction);
					} ?>
					<a href="http://<?=$heroaction_url;?>" class="btn btn-default btn-large">Watch Now</a>
				</div>
			</div>
		<? $i++; }
	}
}
	
	?>
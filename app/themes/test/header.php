	<? /* Main header file
------------------------------
** ClientCare main header file
------------------------------
** Here we go */
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta charset="utf-8">
	    <meta name="google-site-verification" content="xgdf-eFPIXvtj3gor7DtmBDW4IvkmIZ5mXBuhAc5DnM" />
	    <? 
	    global $db;
	    $page = new Page($db);
	    if( isset($_GET['pagename'])){
		    $page->load_metadata($_GET['pagename']);
		 } else {
		    $page->load_metadata();
		 }?>
	    <!-- Le styles -->
   	    <? app_head('1');?>
	    <link href="<? get_theme_path('css');?>/style.css" rel="stylesheet">
	    <link href="<? get_theme_path('css');?>/jquery.fancybox.css" rel="stylesheet">
	   	
	    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->
	
	    <!-- Modernizr -->
	    <script type="text/javascript" src="<? get_resource_path('js');?>/modernizr.js"></script>
	
	    <!-- Fav and touch icons -->
	    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
	    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
	    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
	    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
	    <link rel="shortcut icon" href="../assets/ico/favicon.png">
	    
	    <!-- Analytics -->
	    <? $options = app_options();
		    echo $options->app_analytics; 
	    ?>
	    
	    
	    
	</head>

  <body>
  <? print_r($_GET);?>
  
	<div id="wrap">
	  	<div id="pageHeader">
	  		<div class="container">
		  		<div id="branding">
		  			<a href="<?=URL;?>">
		  				<img src="<? get_theme_path('images');?>/cc-logo.png" alt="Clickity Clank" width="213" height="65" />
		  			</a>
		  			<div id="mainNav" class="navbar navbar-inverse">
						<? echo app_nav('nav-collapse collapse main', 'main');?>
			  		</div>
		  		</div>
	  		</div>
	  	</div>
			<? if(is_homepage()){?>
			
			<div id="carouselWrapper">
				<div id="myCarousel" class="carousel slide" style="visibility:hidden;">
					 
					<? 
						$h = 0;
						$heros = $db->get_results("SELECT * FROM app_hero");
						if($heros):
							foreach($heros as $hero){?>
								<div class="item <? if($h == 0){echo 'active';}?>">
									<div class="heroHolder">
										<div class="heroContent">
											<h2><?= $hero->herotitle;?></h2>
											<?= $hero->herocontent;?>
											<? /* <a class="btn btn-success btn-large" href="<?= URL;?>/contact">Learn More</a> */ ?>
										</div>
										<div class="grime"></div>
										<div class="heroImg">
											<img src="<? get_theme_path('images/heros');?>/<?= $hero->heroimg;?>"/>
										</div>
									</div>
								</div>
								<? $h++; ?>
							<?  };
							endif;  ?>
					
				</div>	
			</div>
		<? } ?>
		<div id="mainContent">
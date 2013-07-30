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
   	    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">
   	    <link href="<? get_theme_path('css');?>/bootstrap-glyphicons.css" rel="stylesheet">
	    <link href="<? get_theme_path('css');?>/css/screen.css" rel="stylesheet">
	   	
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
	    
	</head>

  <body>
  		<div class="navbar navbar-fixed-top">
  			<div class="container">
  				<div class="row">
  					<div class="col-6 col-lg-3">
			  			<a href="<?=URL;?>" class="navbar-brand">
			  				<img src="<? get_theme_path('images');?>/webninja-logo@2x.png" alt="Web Ninja" />
			  			</a>
		  			</div>
		  			<div class="col-6 col-lg-3 pull-right">
		  				<a href="" class="login btn btn-default btn-large pull-right">
		  					Login
		  				</a>
		  			</div>
	  			</div>
  			</div>
  		</div>
  		<? if(is_homepage()){?>
  			<div class="jumbotron">
  				<div class="container">
  					<div class="row">
  						<div class="col-lg-8">
  							<h1>Get a simple website tailored to your business</h1>
  							<button type="button" class="btn btn-default btn-large">Get Started</button>
  						</div>
  					</div>
  				</div>
  			</div>
  		<? } ?>
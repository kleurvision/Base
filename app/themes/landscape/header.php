<? /* Main header file
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
	<!-- Load styles -->
	<link href="<? get_theme_path('css');?>/screen.css" rel="stylesheet">
	
	<? app_head('1'); ?>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Load Scripts -->
	<script type="text/javascript" src="<? get_theme_path('js');?>/holder.js"></script>
	<script type="text/javascript" src="<? get_theme_path('js');?>/modernizr.js"></script>

	<!-- Fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="../images/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="../images/favicon.png">
</head>

<body>
	<header>
		<!-- Primary Nav -->
		<div class="navbar">
			<div class="container">
				<!-- Display Company Branding -->
		  		<a class="navbar-brand" href="<?=SITE;?>">Company Name</a>
		  		<a class="pull-right" href="/contact">Get a Free Quote</a>
			</div>
		</div>
		<!-- / End Primary Nav -->
		<!-- Primary Nav -->
		<div class="navbar main-nav navbar-default" role="navigation">
			<div class="container">
				<!-- Mobile Dropdown Button -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
		  		<!-- Display Nav -->
		  		<div class="collapse navbar-collapse navbar-responsive-collapse">
		  			<ul class="nav navbar-nav">
		  				<li><a href="#">Link 1</a></li>
		  				<li><a href="#">Link 1</a></li>
		  				<li><a href="#">Link 1</a></li>
		  			</ul>
				</div>
			</div>
		</div>
		<!-- / End Primary Nav -->
	</header>

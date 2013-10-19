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
		<!-- Primaryh Nav -->
		<nav class="navbar main-nav navbar-default" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?=NAV;?>"><img src="<?=URL.SITE;?>/img/logo.png" /></a>
				</div>

					<!-- Display Nav -->
					<div class="collapse navbar-collapse navbar-responsive-collapse">
						<?php app_nav('1'); ?>
					</div>
				</div>
			</div>
		</nav>

		<!-- / End Primary Nav -->
	</header>

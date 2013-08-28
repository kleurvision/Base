<? // Load the primary 
require('bootstrap-admin.php');

// Make sure user is an admin
is_admin();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>

		WebNinja<?php if (isset($pagetitle)) { echo " - ", $pagetitle; } ?>

	</title>
	<!-- Bootstrap and core CSS -->
	<link href="/app/admin/assets/css/bootstrap.css" rel="stylesheet">
	<link href="/app/admin/assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="/app/admin/assets/css/dashboard.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
  		<script src="/app/admin/assets/js/html5shiv.js"></script>
		<script src="/app/admin/assets/js/respond.min.js"></script>
	<![endif]-->

	<!-- Favicons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/app/admin/assets/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/app/admin/assets/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/app/admin/assets/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="/app/admin/assets/ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="/app/admin/assets/ico/favicon.png">

  <!-- Place anything custom after this. -->
  
  	<!-- Brian, work this into your .sass complier -->
  	<style>
  	body.modal-open, .modal-open .navbar-fixed-top, .modal-open .navbar-fixed-bottom {
    	margin-right: 15px;
	}
	
	.admin_form .row{
		margin-bottom: 10px;
	}
	
	</style>
  
</head>
	<body>
		<?
		error_reporting(E_ALL);
		ini_set('display_errors', '1');
		?>
		<div class="page-container">
			<div class="navbar hidden-lg">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="" class="navbar-brand"><h4>WebNinja</h4></a>
				<div class="nav-collapse collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<?php get_admin_nav(); ?>
					</ul>
				</div>
			</div>
			<section id="page">
				<div class="col-3 visible-lg">
					<div id="branding">
						<img src="assets/img/logo@2x.png"/>
					</div>
					<? include 'inc/sidebar.php'; ?>
				</div>
				<div class="col-12 col-lg-9">
					<div class="row" id="header">
						<div class="col-6 ">
							<h3 id="page-title">
							<?php if (isset($pagetitle)) { 
								echo $pagetitle;
							} ?>
							</h3>
						</div>
						<div class="col-6 ">
							<ul class="list-inline pull-right">
								<li>
									<a href="" class="btn btn-default btn-lg" data-toggle="tooltip" title="Account Settings">
										<i class="icon-cog"></i>
									</a>
								</li>
								<li>
									<a href="/logout" class="btn btn-default btn-lg" data-toggle="tooltip" title="Logout">
										<i class="icon-off"></i>
									</a>
								</li>
							</ul>				
						</div>
					</div>

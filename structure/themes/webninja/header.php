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
		  				<a data-toggle="modal" href="#login-modal" class="login btn btn-default btn-large pull-right">Login</a>
		  			</div>
	  			</div>
  			</div>
  		</div>
  		<div class="modal fade" id="login-modal">
  			<div class="modal-dialog">
  				<div class="modal-content">
  					<div class="modal-header">
  						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  						<h4 class="modal-title">Login</h4>
  					</div>
  					<div class="modal-body">
  						<form>
  							<fieldset>
								<div class="form-group">
									<input type="text" class="form-control" id="exampleInputEmail" placeholder="username">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="exampleInputPassword" placeholder="password">
									<button type="submit" class="btn btn-default btn-block contact-submit pull-right">Submit</button>
								</div>
  							</fieldset>
  						</form>
  					</div>
  				</div><!-- /.modal-content -->
  			</div><!-- /.modal-dialog -->
  		</div><!-- /.modal -->  		
  		<? if(is_homepage()){?>
  			<div class="jumbotron">
  				<div class="container">
  					<div class="row">
  						<div class="col-lg-8">
  							<h1>Get a simple website tailored to your business</h1>
  							<a data-toggle="modal" href="#contact-modal" class="btn btn-default btn-large">Get Started</a>
  						</div>
  					</div>
  				</div>
  			</div>
  			<div class="modal fade" id="contact-modal">
  				<div class="modal-dialog">
  					<div class="modal-content">
  						<div class="modal-header">
  							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  							<h4 class="modal-title">Get Started</h4>
  						</div>
  						<div class="modal-body">
  							<form>
  								<fieldset>
  									<div class="row">
  										<div class="col-lg-6">
  											<div class="form-group">
  												<label for="exampleInputEmail">First Name</label>
  												<input type="text" class="form-control" id="exampleInputEmail">
  											</div>
  											<div class="form-group">
  												<label for="exampleInputPassword">Last Name</label>
  												<input type="text" class="form-control" id="exampleInputPassword">
  											</div>
  										</div>
  										<div class="col-lg-6">
  											<div class="form-group">
  												<label for="exampleInputEmail">Email</label>
  												<input type="text" class="form-control" id="exampleInputEmail">
  											</div>
  											<div class="form-group">
  												<label for="exampleInputPassword">Phone</label>
  												<input type="password" class="form-control" id="exampleInputPassword">
  											</div>
  										</div>	
  										<div class="col-lg-12">
  											<label for="exampleInputPassword">Message</label>
  											<textarea class="form-control" rows="3"></textarea>
  											<button type="submit" class="btn btn-default contact-submit pull-right">Submit</button>
  										</div>
  									</div>
  								</fieldset>
  							</form>
  						</div>
  					</div><!-- /.modal-content -->
  				</div><!-- /.modal-dialog -->
  			</div><!-- /.modal -->  			
  		<? } ?>
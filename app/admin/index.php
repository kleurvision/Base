<? 
include 'header.php';
?>
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
				<h3 id="page-title">Dashboard</h3>
			</div>
			<div class="col-6 ">
				<ul class="list-inline pull-right">
					<li><a href="" class="btn btn-default btn-lg" data-toggle="tooltip" title="Account Settings"><i class="icon-cog"></i></a></li>
					<li><a href="" class="btn btn-default btn-lg" data-toggle="tooltip" title="Logout"><i class="icon-off"></i></a></li>
				</ul>				
			</div>
		</div>
		<div class="row" id="content">
			<div class="col-12">
				<div class="row">
					<div class="col-6">
						<h4>Your Sites</h4>
					</div>
					<div class="col-6">
						<ul class="list-inline pull-right ">
							<li><a href="" class="btn btn-default btn-lg"><i class="icon-plus"></i> Add Site</a></li>
						</ul>
					</div>
				</div>
				
				<? get_sites(); ?>


			</div>
		</div>
	</div>
</section>

<?php 
	include 'footer.php';
?>
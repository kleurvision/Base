<? 
include 'header.php';
?>

<section id="page">
	<div class="col-3 visible-lg">
		<div id="branding">
			<img src="assets/img/logo.png"/>
		</div>
		<div id="sidebar">
			<nav>
				<ul class="list-unstyled" id="main-nav">
					<li><a href=""><span class="glyphicon glyphicon-home"></span>Dashboard</a></li>
					<li><a href=""><span class="glyphicon glyphicon-user"></span>Users</a></li>
					<li><a href=""><span class="glyphicon glyphicon-download"></span>App Store</a></li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="col-12 col-lg-9">
		<div class="row" id="header">
			<div class="col-6 ">
				<h3 id="page-title">Dashboard</h3>
			</div>
			<div class="col-6 ">
				<ul class="list-inline pull-right">
					<li><a href="" class="btn btn-default btn-lg" data-toggle="tooltip" title="Account Settings"><span class="glyphicon glyphicon-cog"></span></a></li>
					<li><a href="" class="btn btn-default btn-lg" data-toggle="tooltip" title="Logout"><span class="glyphicon glyphicon-off"></span></a></li>
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
							<li><a href="" class="btn btn-default btn-lg">Add Site</a></li>
						</ul>
					</div>
				</div>
				<table class="table sites-table">
					<thead>
						<tr>
							<th>#</th>
							<th>Site Name</th>
							<th>Site URL</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Jim's Plumbing</td>
							<td><a href="#">http://sitename.com</a></td>
							<td>						
								<ul class="list-inline pull-right">
									<li><a href="" class="btn btn-default btn-sm" data-toggle="tooltip" title="Delete" ><span class="glyphicon glyphicon-remove"></span></a></li>
									<li><a href="" class="btn btn-default btn-sm" data-toggle="tooltip" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a></li>
								</ul>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Jim's Plumbing</td>
							<td><a href="#">http://sitename.com</a></td>
							<td>						
								<ul class="list-inline pull-right">
									<li><a href="" class="btn btn-default btn-sm" data-toggle="tooltip" title="Delete" ><span class="glyphicon glyphicon-remove"></span></a></li>
									<li><a href="" class="btn btn-default btn-sm" data-toggle="tooltip" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a></li>
								</ul>
							</td>
						</tr>						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<?php 
	include 'footer.php';
?>
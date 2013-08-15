<? 
include 'header.php';
?>

<section id="page">
	<div class="col-3 visible-lg">
		<div id="branding">
			<img src="assets/img/logo@2x.png"/>
		</div>
		<div id="sidebar">
			<nav>
				<ul class="list-unstyled" id="main-nav">
					<li><a href=""><i class="icon-home"></i>Dashboard</a></li>
					<li><a href=""><i class="icon-user"></i>Users</a></li>
					<li><a href=""><i class="icon-download"></i>App Store</a></li>
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
									<li><a href="" class="btn btn-default btn-sm" data-toggle="tooltip" title="Delete" ><i class="icon-remove"></i></a></li>
									<li><a href="" class="btn btn-default btn-sm" data-toggle="tooltip" title="Edit"><i class="icon-pencil"></i></a></li>
								</ul>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Jim's Plumbing</td>
							<td><a href="#">http://sitename.com</a></td>
							<td>						
								<ul class="list-inline pull-right">
									<li><a href="" class="btn btn-default btn-sm" data-toggle="tooltip" title="Delete" ><i class="icon-remove"></i></a></li>
									<li><a href="" class="btn btn-default btn-sm" data-toggle="tooltip" title="Edit"><i class="icon-pencil"></i></a></li>
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
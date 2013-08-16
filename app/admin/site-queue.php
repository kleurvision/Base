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
				<h3 id="page-title">Site Queue</h3>
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
					<div class="col-12">
						<div class="btn-group pull-right">
							<button type="button" class="btn btn-default">Filter</button>
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">New Site</a></li>
								<li><a href="#">Approval Phase</a></li>
								<li><a href="#">Review Phase</a></li>
								<li><a href="#">Complete</a></li>
							</ul>
						</div>
					</div>

				</div>
				<table class="table sites-table">
					<thead>
						<tr>
							<th>Status</th>
							<th>Access URL</th>
							<th>Customer</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-default">New Site</button>
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="#">Approval Phase</a></li>
										<li><a href="#">Review Phase</a></li>
										<li><a href="#">Complete</a></li>
									</ul>
								</div>
							</td>
							<td><a href="#">http://webninja.me/sites/tonmontana.com</a></td>
							<td><a href="#">Tommy Hammer</a></td>
							<td>
								<ul class="list-inline pull-right">
									<li><a href="" class="btn btn-default btn-sm" >Begin Setup</a></li>
								</ul>
							</td>
						</tr>
						<tr>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-default">New Site</button>
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="#">Approval Phase</a></li>
										<li><a href="#">Review Phase</a></li>
										<li><a href="#">Complete</a></li>
									</ul>
								</div>
							</td>
							<td><a href="#">http://webninja.me/sites/tonmontana.com</a></td>
							<td><a href="#">Tommy Hammer</a></td>
							<td>
								<ul class="list-inline pull-right">
									<li><a href="" class="btn btn-default btn-sm" >Begin Setup</a></li>
								</ul>
							</td>
						</tr>
						<tr>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-default">Approval Phase</button>
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="#">New Site</a></li>
										<li><a href="#">Review Phase</a></li>
										<li><a href="#">Complete</a></li>
									</ul>
								</div>
							</td>
							<td><a href="#">http://webninja.me/sites/tonmontana.com</a></td>
							<td><a href="#">Tommy Hammer</a></td>
							<td>
								<ul class="list-inline pull-right">
									<li><a href="" class="btn btn-default btn-sm" >Edit Site</a></li>
								</ul>
							</td>
						</tr>
						<tr>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-default">Approval Phase</button>
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="#">New Site</a></li>
										<li><a href="#">Review Phase</a></li>
										<li><a href="#">Complete</a></li>
									</ul>
								</div>
							</td>
							<td><a href="#">http://webninja.me/sites/tonmontana.com</a></td>
							<td><a href="#">Tommy Hammer</a></td>							
							<td>
								<ul class="list-inline pull-right">
									<li><a href="" class="btn btn-default btn-sm" >Edit Site</a></li>
								</ul>
							</td>
						</tr>
						<tr>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-default">Review Phase</button>
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="#">New Site</a></li>
										<li><a href="#">Approval Phase</a></li>
										<li><a href="#">Complete</a></li>
									</ul>
								</div>
							</td>
							<td><a href="#">http://webninja.me/sites/tonmontana.com</a></td>
							<td><a href="#">Tommy Hammer</a></td>							
							<td>
								<ul class="list-inline pull-right">
									<li><a href="" class="btn btn-default btn-sm" >Edit Site</a></li>
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
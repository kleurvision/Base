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
				<h3 id="page-title">Users</h3>
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
					<div class="col-12 col-lg-9">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search">
							<span class="input-group-btn">
								<button class="btn" type="button"><i class="icon-search"></i></button>
							</span>
						</div>
						<br/>
					</div>
					<div class="col-12 col-lg-3">
						<div class="btn-group ">
							<button type="button" class="btn btn-default btn-lg">Filter</button>
							<button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown">
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">Adminitrator</a></li>
								<li><a href="#">Customers</a></li>
								<li><a href="#">Ninjas</a></li>
							</ul>
						</div>
						<div class="btn-group pull-right">
							<button type="button" class="btn btn-default btn-lg"><i class="icon-plus"></i>&nbsp;&nbsp;Add User</button>
						</div>
					</div>
				</div>
				<br/>
				<table class="table sites-table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Role</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><a href="#">Tommy Hammer</a></td>
							<td>Administrator</td>
							<td><a href="#">tommy@hammertime.com</a></td>
							<td>
								<ul class="list-inline pull-right">
									<li><a href="" class="btn btn-default btn-sm" >Edit</a></li>
								</ul>
							</td>
						</tr>
						<tr>
							<td><a href="#">Tommy Hammer</a></td>
							<td>Administrator</td>
							<td><a href="#">tommy@hammertime.com</a></td>
							<td>
								<ul class="list-inline pull-right">
									<li><a href="" class="btn btn-default btn-sm" >Edit</a></li>
								</ul>
							</td>
						</tr>
						<tr>
							<td><a href="#">Tommy Hammer</a></td>
							<td>Administrator</td>
							<td><a href="#">tommy@hammertime.com</a></td>
							<td>
								<ul class="list-inline pull-right">
									<li><a href="" class="btn btn-default btn-sm" >Edit</a></li>
								</ul>
							</td>
						</tr>
						<tr>
							<td><a href="#">Tommy Hammer</a></td>
							<td>Administrator</td>
							<td><a href="#">tommy@hammertime.com</a></td>							
							<td>
								<ul class="list-inline pull-right">
									<li><a href="" class="btn btn-default btn-sm" >Edit</a></li>
								</ul>
							</td>
						</tr>
						<tr>
							<td><a href="#">Tommy Hammer</a></td>
							<td>Administrator</td>
							<td><a href="#">tommy@hammertime.com</a></td>							
							<td>
								<ul class="list-inline pull-right">
									<li><a href="" class="btn btn-default btn-sm" >Edit</a></li>
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
<? 
$pagetitle = 'Sites Queue';
include 'header.php';
?>
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
<?php 
	include 'footer.php';
?>
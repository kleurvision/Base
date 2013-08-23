<? 
include 'header.php';
?>
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
					<a href="add-user" class="btn btn-default btn-lg"><i class="icon-plus"></i>&nbsp;&nbsp;Add User</a>
				</div>
			</div>
		</div>
		<br/>
		<? get_users();?>
	</div>
</div>
<?php 
	include 'footer.php';
?>
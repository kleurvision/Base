<? 
$pagetitle = 'Sites';
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
				<div class="btn-group pull-right">
					<a href="add-site" class="btn btn-default btn-lg"><i class="icon-plus"></i>&nbsp;&nbsp;Add Site</a>
				</div>
			</div>
		</div>
		<? get_all_sites();?>
	</div>
</div>
<?php 
	include 'footer.php';
?>
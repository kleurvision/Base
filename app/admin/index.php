<?
$pagetitle = 'Dashboard';
include 'header.php';
?>
<div class="row" id="content">
	<div class="col-12">
		<div class="row">
			<div class="col-6">
				<h4>Your Sites</h4>
			</div>
			<div class="col-6">
				<ul class="list-inline pull-right ">
					<li><a href="#orderSite" data-toggle="modal" class="btn btn-default btn-lg"><i class="icon-plus"></i> Order Site</a></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<? get_sites(); ?>
			</div>
		</div>
	</div>
</div>

<!-- Modals -->
<div class="modal fade" id="orderSite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Order Site</h4>
			</div>
			<div class="modal-body">
				Something will happen here
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</div>
</div>


<?php 
	include 'footer.php';
?>
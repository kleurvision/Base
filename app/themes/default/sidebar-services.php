<? /* App Default Sidebar
------------------------------
** Here we go */
?>

<div class="span4">
	<div class="sidebar">
Click to Learn the details about the services we offer: 
		<div class="row-fluid">
				<h3>Our process</h3>
				<img src="<?=THEME;?>/images/sidebar/CC_Sidebar_Website.png" alt="CC_Sidebar_Website" width="" height="" />
		</div>
	</div>
</div>

<!-- /span2 -->


<!-- Modal -->
<div id="quoteModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3>How can we help?</h3>
</div>
<div class="modal-body">
<? include('quote-form.php');?>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
<button class="btn btn-primary" data-submit="<?= $type;?>" id="submit-quote">Save changes</button>
</div>
</div>
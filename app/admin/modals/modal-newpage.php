<? /* Add new page modal
------------------------------
------------------------------
** Here we go */
?>
<div class="hud-modal-header">
    <button type="button" class="hud-close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="hud-modal-title">Add a New Page</h4>
</div>

<div class="hud-modal-body">
	<form id="add-page" method="post" action="<?= URL.'/'.ADMIN.'/actions/add-page.php' ?>"?>
		<label>Title:</label>
		<input type="text" value="" name="page-title">
		<textarea name="page-content" rows="5" ></textarea>
		<div class="form-actions">
			<input type="hidden" value="<?= SITE_ID;?>" name="site_id">
			<input class="btn btn-primary" type="submit" name="Add Page" value="Add Page">
		</div>
	</form>
</div>
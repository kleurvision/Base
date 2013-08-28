<? /* Default admin modal template
------------------------------
Save as modal-*modal-template-name*.php to extend
------------------------------
** Here we go */
?>
<div class="hud-modal-header">
    <button type="button" class="hud-close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="hud-modal-title">Add a New Slide</h4>
</div>

<div class="hud-modal-body">
	<form id="add-hero" enctype="multipart/form-data" method="post" action="<?= URL.ADMIN.'actions/add-hero.php'; ?>">
		<label>Title:</label>
		<input type="text" name="hero-title">
		<textarea id="add-slide-content" name="hero-content" rows="5" ></textarea>
		<label >File:</label>
		<input type="file" name="hero-file">
		<div class="form-actions">
			<input type="hidden" value="add-hero" name="form">
			<input id="add-hero-element-4" class="btn btn-primary" type="submit" name="" value="Add Hero">
		</div>
	</form>
</div>
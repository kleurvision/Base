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
		<div class="hud-form-group">
			<label>Title</label>
			<input type="text" name="hero-title" class="hud-form-control">
		</div>
		<div class="hud-form-group">
			<label>Action</label>
			<input type="text" name="hero-action" class="hud-form-control">
		</div>
		<div class="hud-form-group">
			<label>Hero Body</label>
			<textarea id="add-slide-content" name="hero-content" rows="5" ></textarea>
		</div>
		<div class="hud-form-group">
			<label>File</label>
			<input type="file" name="hero-file">
		</div>
		<div class="hud-form-group">
			<div class="form-actions">
				<input type="hidden" value="add-hero" name="form">
				<input type="hidden" value="<?= NAV;?>" name="redirect">
				<input type="hidden" value="<?= SITE_ID;?>" name="site_id">
				<input id="add-hero-element-4" class="btn btn-primary" type="submit" name="" value="Add Hero">
			</div>
		</div>
	</form>
</div>
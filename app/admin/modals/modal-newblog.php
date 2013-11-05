<? /* Add new page modal
------------------------------
------------------------------
*/

?>
<div class="hud-modal-header">
    <button type="button" class="hud-close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="hud-modal-title">Add a New Blog</h4>
</div>

<div class="hud-modal-body">
	<form id="add-page" method="post" action="<?= URL.ADMIN.'actions/add-blog.php';?>">
		<div class="hud-form-group">
			<label>Page Title:</label>
			<input type="text" value="" class="hud-form-control" name="page-title">
		</div>
		<div class="hud-form-group">
			<label>Page Content:</label>
			<textarea name="page-content" id="add-page-content" rows="5" ></textarea>
		</div>
		<div class="hud-panel-heading">
			<h4 class="hud-panel-title">
				<a class="hud-accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
					Page Options<i class="icon-plus pull-right"></i>
				</a>
			</h4>
		</div>
		<div id="collapseOne" class="hud-panel-collapse collapse">
			<div class="hud-row">
				<div class="hud-col-12 hud-col-lg-8">
					<div class="hud-well">
						<h4>Search Engine Optimization</h4>
						<div class="hud-form-group">
							<label>Optimized Page Title:</label>
							<input type="text" class="hud-form-control" name="edit-meta-title">
						</div>

						<div class="hud-form-group">
							<label>Optimized Page URL:</label>
							<input type="text" class="hud-form-control" name="edit-pagename">
						</div>

						<div class="hud-form-group">
							<label>Meta Description:</label>
							<input type="text" class="hud-form-control" name="edit-meta-desc">
						</div>

						<div class="hud-form-group">
							<label>Meta Keywords:</label>
							<input type="text" class="hud-form-control" name="edit-keywords">			
						</div>
					</div>
				</div>

				<div class="hud-col-12 hud-col-lg-4">
					<div class="hud-well">
						<h4>Layout</h4>
						<label>Template:</label>
						<select class="hud-form-control" name="template">
							<? foreach($template as $option){?>
							<option value="<?= $option;?>" <? if($pageTemplate == $option){echo "selected";}?>><?= $option;?></option>
							<? } ?>
						</select> 
						<!--<div class="hud-form-group">
							<label>Author:</label>
							<input type="text" class="hud-form-control" name="edit-author">
						</div>-->
					</div>
				</div>
			</div>
		</div>		
		<div class="hud-row">
			<div class="col-12">
				<div class="form-actions pull-right">
					<input type="hidden" value="<?= SITE_ID;?>" name="site_id">
					<input type="hidden" value="<?= NAV;?>" name="redirect">
					<input class="hud-btn hud-btn-primary btn-lg" type="submit" name="Add Page" value="Add Page">
				</div>
			</div>
		</div>
	</form>
</div>
<? /* Load in the HUD Toolbar on call */

global $user;

?>

<div id="hud_toolbar_wrapper">
	<div id="hud_toolbar">
		<div class="left">
			<div id="hud_logo" onclick="hud_extend();" >Elements&trade;</div>
		</div>
		<div class="right">
			
			<div class="btn-group" id="hud_tools">
				<button class="btn btn-mini trigger" href="#editnavModalAdmin" data-toggle="modal">
					<i class="icon-list"></i> Edit Navigation
				</button>
				<button class="btn btn-mini trigger" href="#editpageModalAdmin" data-toggle="modal">
					<i class="icon-edit"></i> Edit Page
				</button>
				<button class="btn btn-mini" href="#newpageModalAdmin" data-toggle="modal">
					<i class="icon-plus"></i> New Page
				</button>
				<button class="btn btn-mini" href="#newheroModalAdmin" data-toggle="modal">
					<i class="icon-picture"></i> Add Hero
				</button>				
				<button class="btn btn-mini btn-danger">
					<i class="icon-remove"></i> Delete Page
				</button>
			</div>
		</div>
	</div>
	<div class="hud_stage" style="display:none">
		Found it!
		
	</div>
</div>	
	

<? /* Load in the admin stage on call */?>
<div class="hud_vail">
	
	<div class="hud_edit_nav">
		<? admin_modal('editnav');?>
	</div>
	<div class="hud_new_page">
		<? admin_modal('newpage');?>
	</div>
	<div class="hud_edit_page">
		<? admin_modal('editpage');?>
	</div>
	<div class="hud_new-hero">
		<? admin_modal('newhero');?>
	</div>
	
</div>
<? /* Load in the HUD Toolbar on call */ ?>

<div id="hud_toolbar_wrapper">
	<div id="hud_toolbar">
		<div class="left">
			<div id="hud_logo">Elements&trade;</div>
		</div>
		<div class="right">
			
			<div class="btn-group" id="hud_tools">
				<button class="btn btn-mini trigger" onclick="hud_extend();">
					<i class="icon-edit"></i> Edit Page
				</button>
				<button class="btn btn-mini" href="#newpageModalAdmin" data-toggle="modal">
					<i class="icon-plus"></i> New Page
				</button>
				<button class="btn btn-mini btn-danger">
					<i class="icon-remove"></i> Delete Page
				</button>
			</div>
		</div>
	</div>
	<div class="hud_stage">
		The User Edit Panel
		<? get_profile();?>
	</div>
</div>	
	

<? /* Load in the admin stage on call */?>
<div class="hud_vail">
	
	<div class="hud_new_page">
		<? admin_modal('newpage');?>
	</div>
	
</div>
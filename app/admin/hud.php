<? /* Load in the HUD Toolbar on call */

global $user;

?>

<div id="hud_toolbar_wrapper">
	<div id="hud_toolbar">
		<div class="pull-left">
			<div id="hud_logo" onclick="hud_extend();" ><img src="<?= ADMIN; ?>/assets/img/icon@2x.png" /></div>
		</div>
		<div class="pull-right" id="hud_tools">
			<div id="hud-menu-button">Menu</div>
			<ul id="hud_menu">
				<li>
					<a href="#" id="hud_edit_trigger"><i class="icon-pencil"></i>&nbsp;&nbsp;Edit</a>
					<ul id="hud_edit_menu">
						<li><a class="hud_btn trigger" href="#editpageModalAdmin" data-toggle="modal">Page</a></li>
						<li><a class="hud_btn trigger" href="#editnavModalAdmin" data-toggle="modal">Navigation</a></li>
					</ul>
				</li>
				<li>
					<a href="#" id="hud_new_trigger"><i class="icon-plus"></i>&nbsp;&nbsp;Add</a>
					<ul id="hud_new_menu">
						<li><a class="hud_btn" href="#newpageModalAdmin" data-toggle="modal">Page</a></li>
						<li><a class="hud_btn" href="#newheroModalAdmin" data-toggle="modal">Slide</a></li>
					</ul>
				</li>
				<li><a href="<?= URL;?>/app/admin" data-toggle="tooltip" title="Dashboard"><i class="icon-home"></i></a></li>
				<li><a href="<?= URL.'logout';?>" data-toggle="tooltip" title="Logout"><i class="icon-off"></i></a></li>
			</ul>
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
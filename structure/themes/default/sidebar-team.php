<? /* App Default Sidebar
------------------------------
** Here we go */
?>

<div class="sidebar span4">
	<div class="row-fluid">
		<div class="span12">
			<h2>The Team</h2>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span6">
			<img src="../<?=THEME;?>/images/team/pat_rainbow.jpg" class="img-rounded" alt="Patrick Lyver - Capitan" title="Patrick Lyver - Capitan" />
			<h3 class="teamName">Patrick Lyver, Capitan</h3>
		</div>	
		<div class="span6">
			<img src="../<?=THEME;?>/images/team/trevor_bacon.jpg" class="img-rounded" alt="Trevor Cave - Runner Up" title="Trevor Cave - Runner Up" />
			<h3 class="teamName">Trevor Cave, Runner Up</h3>
		</div>	
	</div>
	<div class="row-fluid">
		<div class="span6">
			<img src="../<?=THEME;?>/images/team/matt_pew.jpg" class="img-rounded" alt="Matt Bell - Evil Genius" title="Matt Bell - Evil Genius" />
			<h3 class="teamName">Matt Bell, Evil Genius</h3>
		</div>	
		<div class="span6">
			<img src="../<?=THEME;?>/images/team/ali_unicorn.jpg" class="img-rounded" alt="Ali Elle - Dreamshaper" title="Ali El - Dreamshaper" />
			<h3 class="teamName">Ali Elle, Dreamshaper</h3>
		</div>	
	</div>
	<div class="row-fluid">
		<div class="span6">
			<img src="../<?=THEME;?>/images/team/brian_viking.jpg" class="img-rounded" alt="Brian Warren — Pixelator" title="Brian Warren — Pixelator" />
			<h3 class="teamName">Brian Warren, Pixelator</h3>
		</div>
		<div class="span6">
			<img src="../<?=THEME;?>/images/team/rob_balls.jpg" class="img-rounded" alt="Rob Biglin — Pixelator" title="Rob Biglin — Pixelator" />
			<h3 class="teamName">Rob Biglin, Pixelator</h3>
		</div>	
	</div>
	<div class="row-fluid">
		<div class="span6">
			<img src="../<?=THEME;?>/images/team/mike_godzilla.jpg" class="img-rounded" alt="Michael Couture — Marketing Giant" title="Michael Couture — Marketing Giant" />
			<h3 class="teamName">Michael Couture, Marketing Giant</h3>
		</div>	
	</div>
	<div class="row-fluid">
	<h2>Want to join the team?</h2>
	<p>Recruitment speak goes here... Insert team building chant here... We want cool people (convince them)... And add in a pop-over trigger below to let those that are interested submit their info.</p>
	<a href="#recruitModal" role="button" class="btn btn-large btn-block" data-toggle="modal">Let me in!</a>
	</div>
</div>
<!-- /span2 -->

<!-- Modal -->
<div id="recruitModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3>Joining team awesome...</h3>
	</div>
	<div class="modal-body">
	<? $type = 'Recruiter';
		include('recruit-form.php');?>
	</div>
	<div class="modal-footer">
	<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	<button class="btn btn-primary" id="submit-jobinterest" data-submit="<?=$type;?>">Save changes</button>
	</div>
</div>
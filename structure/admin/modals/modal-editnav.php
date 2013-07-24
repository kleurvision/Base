<? /* Default admin modal template
------------------------------
Save as modal-*modal-template-name*.php to extend
------------------------------
** Here we go */
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Edit Nav</h3>
</div>

<div class="modal-body">
	<div class="row-fluid">
		<div class="span7">
			<? global $db;
			 
			 	$navigation = $db->get_results("SELECT navigation FROM app_nav ORDER BY id DESC LIMIT 1");
				if($navigation){
					$navs = json_decode($navigation[0]->navigation, true);
					echo "<div class='dd' id='nestable'>\r\n";
				    echo "<ol id='siteNavigation' class='dd-list'>\r\n";
					foreach($navs as $nav){
						
						$pages = $db->get_row("SELECT id, pageparent, pagename, pagetitle FROM app_pages WHERE id =". $nav['id']);
						// Check to see if the page has children
						if(isset($nav['children'])){
							$child_pages = $nav['children'];
						} else {
							$child_pages = '';
						}
			
						if($pages->pageparent == ''){
							echo '<li class="dd-item dd3-item" data-id="'.$pages->id.'">'."\r\n";
							echo '<div class="dd-handle dd3-handle"></div><div class="dd3-content">'."\r\n";
							echo $pages->pagetitle;
							echo '<i class="icon-remove right removeItem"></i></div>';
						};
						
						if($child_pages){
							echo '<ol class="dd-list">'."\r\n";
							foreach($child_pages as $child){
								$childUrls = $db->get_row("SELECT id, pagename, pagetitle FROM app_pages WHERE id = ".$child['id']);
								echo '<li class="dd-item" data-id="'.$childUrls->id.'">'."\r\n"
											.'<div class="dd-handle dd3-handle"></div><div class="dd3-content">'."\r\n"
											.$childUrls->pagetitle.'<i class="icon-remove right removeItem" data-id="'.$childUrls->id.'"></i></div></li>'."\r\n";
							}
							echo '</ol>'."\r\n";
						}
						
						if($pages->pageparent == ''){
								echo '</li>'."\r\n";
							}
					}
					
						echo '</ol>'."\r\n"
						.'</div>'."\r\n";
				} else {
			 
					$navs = $db->get_results("SELECT id, pageparent, pagename, pagetitle FROM app_pages");
					if($navs){
						echo "<div class='dd' id='nestable'>\r\n";
				        echo "<ol class='dd-list'>\r\n";
						foreach($navs as $nav){
							if($nav->pageparent == ''){
				
							echo '<li class="dd-item" data-id="'.$nav->id.'">'."\r\n";
							echo '<div class="dd-handle">'."\r\n";
							
								echo $nav->pagetitle;
							echo '</div>';
							} 	
								
							$child_pages = $db->get_results("SELECT id, pagename, pagetitle FROM app_pages WHERE pageparent = ".$nav->id."");
							
							if($child_pages){
								echo '<ol class="dd-list">'."\r\n";
								foreach($child_pages as $child){
									echo '<li class="dd-item" data-show="1" data-id="'.$child->id.'">'."\r\n"
											.'<div class="dd-handle">'."\r\n"
											.$child->pagetitle.'</div></li>'."\r\n";
								}
								echo '</ol>'."\r\n";
							}
							if($nav->pageparent == ''){
								echo '</li>'."\r\n";
							}
						}
						echo '</ol>'."\r\n"
							.'</div>'."\r\n";
					}
			}
			?>
		</div>
		<div class="span5">
			<? $allPages = $db->get_results("SELECT id, pagetitle FROM app_pages ORDER BY pagetitle ASC");
				if($allPages){?>
					<form>
						<fieldset>
							<legend>Add Page</legend>
							<div class="input-append">
								<select id="pagesToAdd">
									<? foreach($allPages as $pages){
										echo '<option value="'.$pages->id.'" >' .  $pages->pagetitle . '</option>';
									} ?>
								</select>
								<a onclick="addItem()" class="btn btn-primary">Add <i class="icon-plus icon-white"></i></a>
							</div>
						</fieldset>
					</form>
			<? }?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<form class="form-inline" method="post" id="edit-page" action="<?= URL.'/'.ADMIN.'/actions/edit-nav.php';?>"> 
				<textarea style="display:none" name="nav-order" id="nestable-output"></textarea>	 
				<div class="form-actions">
					<input type="submit" class="btn btn-primary" name="" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<script>

	    var updateOutput = function(e) {
	        var list = e.length ? e : $(e.target),
	            output = list.data('output');
	        if (window.JSON) {
	            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
	        } else {
	            output.val('JSON browser support required for this demo.');
	        }
	    };
	    
	    function addItem(){
		    
			    var pageID		= $('#pagesToAdd option:selected').val();
			    var pageName 	= $('#pagesToAdd option:selected').html();
			    
		    $('ol#siteNavigation').append('<li data-id="'+pageID+'" class="dd-item dd3-item">'
		    +'<div class="dd-handle dd3-handle"></div>'
		    +'<div class="dd3-content">'
		    + pageName
		    +'<i class="icon-remove right removeItem"></i>'
		    +'</div></li>');
		    updateOutput($('#nestable').data('output', $('#nestable-output')));
	    }
	    
	    
	
	    // activate Nestable for list 1
	    $('#nestable').nestable({
	        group: 1,
	        maxDepth: 2
	    })
	    .on('change', updateOutput);
	    
	    $(".removeItem").click(function () {
			$(this).parent().parent().remove();
		    updateOutput($('#nestable').data('output', $('#nestable-output')));
		});
	    
	     // output initial serialised data
	    updateOutput($('#nestable').data('output', $('#nestable-output')));
	
	    $('#nestable-menu').on('click', function(e)
	    {
	        var target = $(e.target),
	            action = target.data('action');
	        if (action === 'expand-all') {
	            $('.dd').nestable('expandAll');
	        }
	        if (action === 'collapse-all') {
	            $('.dd').nestable('collapseAll');
	        }
	    });
	    
	    
	
	
</script>

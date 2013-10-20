<? /* Edit page modal
------------------------------
------------------------------
** Here we go */
?>
<div class="hud-modal-header">
	<button type="button" class="hud-close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="hud-modal-title">Edit Page</h4>
</div>

<div class="hud-modal-body">
	<?
	global $db;
	$page = new Page($db);
	if(isset($_GET['pagename'])){
		$pagemap 		= $page->page_map($_GET['pagename']);
	} else {
		$pagemap 		= $page->page_map('home-page');
	}

	$pageID 		= $pagemap->id;
	$pageslug		= $pagemap->pagename;
	$pagetitle 		= $pagemap->pagetitle;
	$pageContent 	= $pagemap->pagecontent;
	$pageauthor		= $pagemap->pageauthor;
	$pagemeta_title	= $pagemap->pagemeta_desc;
	$pagemeta_desc	= $pagemap->pagemeta_desc;
	$pagekeywords	= $pagemap->pagemeta_keywords;
	$pageTemplate	= $pagemap->pagetemplate;

	$template[]= '';

	$files = directoryToArray(THEME, false);
	foreach ($files as $file) {
		$template_contents = file_get_contents($file);
		if (preg_match_all("/Template Name:(.*)\n/siU",$template_contents,$template_name)){						
			$template_name = trim($template_name[1][0]);
			$template[] = strtolower($template_name);
		}
	}




/*
$form = new Form("edit-page");
$form->configure(array(
    "prevent" => array("bootstrap", "jQuery"),
    "view" => new View_Vertical,
    "action" => URL.''.ADMIN."/actions/edit-page.php",
));


$form->setValues(array(
    "template" => $pageTemplate
));

					
$form->addElement(new Element_Hidden("form", "edit-page"));
$form->addElement(new Element_Hidden("pageID", "$pageID"));
$form->addElement(new Element_Hidden("site_id", SITE_ID));
$form->addElement(new Element_Textbox("Display Title:", "edit-title", array("value" => "$pagetitle")));
$form->addElement(new Element_Textbox("SEO Title:", "edit-meta-title", array("value" => "$pagemeta_title")));
$form->addElement(new Element_Textbox("Page URL:", "edit-pagename", array("value" => "$pageslug")));
$form->addElement(new Element_TinyMCE("", "edit-content",array("value" => "$pageContent"), array("checked" => 'contact')));
$form->addElement(new Element_Select("Template:", "template", $template));
$form->addElement(new Element_Textbox("Author:", "edit-author", array("value" => "$pageauthor")));
$form->addElement(new Element_Textbox("Meta Description:", "edit-meta-desc", array("value" => "$pagemeta_desc")));
$form->addElement(new Element_Textbox("Meta Keywords:", "edit-keywords", array("value" => "$pagekeywords")));

$form->addElement(new Element_Button("Save"));
$form->render(); 
*/ 
?>
<form id="edit-page" role="form" method="post" action="<?= URL.ADMIN.'actions/edit-page.php'?>">

	<div class="hud-form-group">
		<label for="displaytitle" >Page Title:</label>
		<input type="text" class="hud-form-control" value="<?= $pagetitle;?>" name="edit-title" placeholder="Home Page">
	</div>

	<div class="hud-form-group">
		<label for="pagecontent" >Page Content:</label>
		<textarea id="edit-page-content" name="edit-content" rows="1" ><?= $pageContent;?></textarea>
	</div>

	<div class="hud-panel-heading">
		<h4 class="hud-panel-title">
			<a class="hud-accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
				Page Options<i class="icon-plus pull-right"></i>

			</a>
		</h4>
	</div>

	<div id="collapseTwo" class="hud-panel-collapse collapse">
		<div class="hud-row">
			<div class="hud-col-12 hud-col-lg-8">
				<div class="hud-well">
					<h4>Search Enginge Optimization</h4>
					<div class="hud-form-group">
						<label>Optimized Page Title:</label>
						<input type="text" class="hud-form-control" value="<?= $pagemeta_title;?>" name="edit-meta-title">
					</div>

					<div class="hud-form-group">
						<label>Optimized Page URL:</label>
						<input type="text" class="hud-form-control" value="<?= $pageslug;?>" name="edit-pagename">
					</div>

					<div class="hud-form-group">
						<label>Meta Description:</label>
						<input type="text" class="hud-form-control" value="<?= $pagemeta_desc;?>" name="edit-meta-desc">
					</div>

					<div class="hud-form-group">
						<label>Meta Keywords:</label>
						<input type="text" class="hud-form-control" value="<?= $pagekeywords;?>" name="edit-keywords">			
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
						<input type="text" class="hud-form-control" value="<?= $pageauthor;?>" name="edit-author">
					</div>-->
				</div>
			</div>
		</div>
	</div>

	<div class="hud-row">
		<div class="col-12">
			<div class="form-actions pull-right">
				<input type="hidden" value="edit-page" name="form">
				<input type="hidden" value="<?= $pageID;?>" name="pageID">
				<input type="hidden" value="<?= SITE_ID; ?>" name="site_id">
				<input type="hidden" value="<?= SITE_SLUG;?>" name="site_slug">
				<input class="hud-btn hud-btn-primary btn-lg" type="submit" name="" value="Save">
			</div>
		</div>
	</div>
</form>
</div>
<? /* Default admin modal template
------------------------------
Save as modal-*modal-template-name*.php to extend
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

$template[]= 'default';

$files = directoryToArray(THEME, false);
foreach ($files as $file) {
	$template_contents = file_get_contents($file);
	if (preg_match_all("/Template Name:(.*)\n/siU",$template_contents,$template_name)){						
		$template_name = trim($template_name[1][0]);
		$template[] = strtolower($template_name);
	}
}

								
$form = new Form("edit-page");
$form->configure(array(
    "prevent" => array("bootstrap", "jQuery"),
    "view" => new View_Vertical,
    "action" => URL.'/'.ADMIN."/actions/edit-page.php",
));


$form->setValues(array(
    "template" => $pageTemplate
));

					
$form->addElement(new Element_Hidden("form", "edit-page"));
$form->addElement(new Element_Hidden("pageID", "$pageID"));
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
?>

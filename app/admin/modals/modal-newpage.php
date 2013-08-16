<? /* Default admin modal template
------------------------------
Save as modal-*modal-template-name*.php to extend
------------------------------
** Here we go */
?>
<div class="hud-modal-header">
    <button type="button" class="hud-close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="hud-modal-title">Add a New Page</h4>
</div>

<div class="hud-modal-body">
<? 

$form = new Form("add-page");
$form->configure(array(
    "prevent" => array("bootstrap", "jQuery"),
    "view" => new View_Vertical,
    "action" => URL.'/'.ADMIN."/actions/add-page.php",
));
$form->addElement(new Element_Hidden("form", "add-page"));
$form->addElement(new Element_Textbox("Title:", "page-title"));
$form->addElement(new Element_TinyMCE("", "page-content"));
$form->addElement(new Element_Button("Add Page"));
$form->render();
?>

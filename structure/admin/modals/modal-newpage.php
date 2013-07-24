<? /* Default admin modal template
------------------------------
Save as modal-*modal-template-name*.php to extend
------------------------------
** Here we go */
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Add a new page</h3>
</div>

<div class="modal-body">
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

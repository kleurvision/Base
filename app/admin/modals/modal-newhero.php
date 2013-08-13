<? /* Default admin modal template
------------------------------
Save as modal-*modal-template-name*.php to extend
------------------------------
** Here we go */
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Add a Homepage Hero</h3>
</div>

<div class="modal-body">
<? 

$form = new Form("add-hero");
$form->configure(array(
    "prevent" => array("bootstrap", "jQuery"),
    "view" => new View_Vertical,
    "action" => URL.'/'.ADMIN."/actions/add-hero.php",
    "enctype"=> "multipart/form-data"
));
$form->addElement(new Element_Hidden("form", "add-hero"));
$form->addElement(new Element_Textbox("Title:", "hero-title"));
$form->addElement(new Element_TinyMCE("", "hero-content"));
$form->addElement(new Element_File("File:", "hero-file"));
$form->addElement(new Element_Button("Add Hero"));
$form->render();
?>
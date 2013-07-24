<?
$form = new Form($type);
$form->configure(array(
    "prevent" => array("bootstrap", "jQuery"),
   	"action" => URL.'/'.THEME."/actions/submit-form.php"

    //"labelToPlaceholder" => 1
));
$form->addElement(new Element_Textbox("Who are you? *", "name", array("placeholder"=>"Name", "class"=>"input-block-level")));
$form->addElement(new Element_Textbox("Who sent you?", "company", array("placeholder"=>"Company", "class"=>"input-block-level")));
$form->addElement(new Element_Textbox("What's your email address? *", "email", array("placeholder"=>"Email", "class"=>"input-block-level")));
$form->addElement(new Element_Textbox("Number to reach you at *", "phone", array("placeholder"=>"Phone", "class"=>"input-block-level")));
$form->addElement(new Element_Textarea("Why do you want to partner with Clickity Clank?", "description", array("rows" => 3, "class"=>"input-block-level")));
$form->addElement(new Element_Hidden("Type", $type));

// $form->addElement(new Element_Button("Bombs Away"));
$form->render();
?>
<?
$form = new Form($type);
$form->configure(array(
    "prevent" => array("bootstrap", "jQuery"),
   	"action" => URL.'/'.THEME."/actions/submit-form.php"

    //"labelToPlaceholder" => 1
));
$roleOptions = array('Designer', 'Photographer', 'Video Expert', 'Programmer', 'Accounts and Sales');
$serviceOptions = array('Design', 'Fans', 'Hosting', 'Domains', 'Website', 'Branding');

$form->addElement(new Element_Textbox("Who are you?", "name", array("placeholder"=>"Name", "class"=>"input-block-level")));
$form->addElement(new Element_Textbox("What's your email address?", "email", array("placeholder"=>"Email", "class"=>"input-block-level")));
// $form->addElement(new Element_Checkbox("Services Required", "services", $serviceOptions));
$form->addElement(new Element_Select("Choose your own adventure", "role", $roleOptions, array("class"=>"input-block-level")));
$form->addElement(new Element_Textarea("What are you good at?", "description", array("class"=>"input-block-level")));
$form->addElement(new Element_Hidden("Type", $type));

// $form->addElement(new Element_Button("Bombs Away"));
$form->render();
?>
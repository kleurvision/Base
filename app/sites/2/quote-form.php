<?
$form = new Form($type);
$form->configure(array(
    "prevent" => array("bootstrap", "jQuery"),    //"labelToPlaceholder" => 1
     "action" => URL.'/'.THEME."/actions/submit-form.php"

));
$urgencyOptions = array('Yesterday/Rush', 'Sooner than Later', 'Whenever');
$serviceOptions = array('Design', 'Fans', 'Hosting', 'Domains', 'Website', 'Branding');

$form->addElement(new Element_HTML('<legend>'.$type.' Quote</legend>'));
$form->addElement(new Element_Textbox("Shoot us your name *", "name", array("class" => "input-block-level", "placeholder" => "Name")));
$form->addElement(new Element_Textbox("Add email address so we can get back to you *", "email", array("class" => "input-block-level", "placeholder" => "Email")));
// $form->addElement(new Element_Checkbox("Services Required", "services", $serviceOptions));
$form->addElement(new Element_Select("Let us know your timeline", "urgency", $urgencyOptions, array("class" => "input-block-level")));
$form->addElement(new Element_Textarea("Give us some details", "description", array("class" => "input-block-level", "rows" => 4)));
$form->addElement(new Element_Hidden("Type", $type));
$form->render();

?>
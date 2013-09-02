<?  /*
$form = new Form('Contact');
$form->configure(array(
    "prevent" => array("bootstrap", "jQuery"),
    "view" => new View_Vertical,
    "method" => "post",
    "action" => URL.'/'.THEME."/actions/submit-form.php"
    //"labelToPlaceholder" => 1
));
$form->addElement(new Element_Textbox("Your name *", "name", array("placeholder"=>"Name", "class"=>"input-block-level")));
$form->addElement(new Element_Textbox("Your email *", "email", array("placeholder"=>"Email Address", "class"=>"input-block-level")));
$form->addElement(new Element_Textbox("Your phone number", "phone", array("placeholder"=>"Phone", "class"=>"input-block-level")));
$form->addElement(new Element_Textarea("Whats up?", "description", array("class"=>"input-block-level")));
$form->addElement(new Element_Button("And Go!"));
$form->render();

*/ 

?>

<!-- BEGIN Podio web form -->
<script src="https://podio.com/webforms/5088208/398552.js"></script>
<script type="text/javascript">
  _podioWebForm.render("398552")
</script>
  <div class="podio-webform-container">
  </div>
<!-- END Podio web form -->

<? // Grab Cleared Variables 

$clear = $_SESSION['CLEAR'];

/*
0 = First Name
1 = Last Name
2 = Email
3 = Password
4 = Confirmed Password
*/

$fname_clear		= $clear['0'];
$lname_clear		= $clear['1'];
$email_clear		= $clear['2'];
$pass_clear			= $clear['3'];
$conf_pass_clear	= $clear['4'];

?>

<form id="registerForm" name="registerForm" method="post" action="../library/registration/register-exec.php">
	<fieldset form="registerForm" name="Create an Account">
		<legend>Create an Account</legend>
		<ul class="fieldSet">
			<li>
				<label>First Name</label>
				<input name="fname" type="text" class="textfield" id="fname" value="<?= $fname_clear;?>"/>
			</li>
			<li>
				<label>Last Name</label>
				<input name="lname" type="text" class="textfield" id="lname" value="<?= $lname_clear;?>"/>
			</li>
			<li>
				<label>Email</label>
				<input name="email" type="text" class="textfield" id="email" value="<?= $email_clear;?>" />
			</li>
			<li>
				<label>Password</label>
				<input name="password" type="password" class="textfield" id="password" value="<?= $pass_clear;?>"/>
			</li>
			<li>
				<label>Confirm Password</label>
				<input name="cpassword" type="password" class="textfield" id="cpassword" value="<?= $conf_pass_clear;?>" />
			</li>
		</ul>
	</fieldset>
	<input type="submit" name="Submit" value="Register" /> <? if((!$errorCheck) && ($newAcc != '1')) { ?><a class="button" id="cancel">Cancel</a><? }; ?>
</form>
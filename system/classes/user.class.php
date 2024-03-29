<? /* Define user credentials and forms */
class User {

	function __construct($db){
		
		// Recall database from included config.php (above)
		$this->db = $db;
				
		// Check for login variables
		if(isset($_SESSION['USER'])){
			$this->user_id	= $_SESSION['USER'];
			$this->user 	= $this->db->get_row("SELECT * FROM app_users WHERE id = '".$this->user_id."'");
		} else {
			$this->user = 'undefined';
		}
	}
	
	// Get user logged in details
	function get_user(){
		if(!isset($this->user_id)){
			$user = 'undefined';
		} else {
			$user = $this->db->get_row("SELECT * FROM app_users WHERE id = '".$this->user_id."'");
		};
		return $user;
	}
	
	// Get role
	function get_role(){
		if($this->user != 'undefined'){
			$role = $this->db->get_var("SELECT name FROM app_roles WHERE id = '".$this->user->role."'");
			return $role;
		}
	}
	
	// Get owner
	function get_owner(){
		if($this->user != 'undefined'){
			$owner = $this->db->get_var("SELECT count(*) FROM app_sites WHERE id = '".SITE_ID."' && site_users = '".$this->user->id."'");
			if($owner == '1'){
				return true;
			}
		}
	}
		
	// Login form submission
	function login_submit(){
		
		// Check login POST submission
		if(isset($_POST['login_form_submit'])){
			
			$email		= $_POST['login_user'];
			$password	= md5($_POST['login_password']);
			
			if($email == ''){
				$err_msg['no_email'] = 'Please enter an email address';
			} else {			
				if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
					$err_msg['invalid_email'] = 'Please enter a valid email address';
				}
			}
			
			if($password == ''){
				$err_msg['no_password'] = 'Please enter your password';
			}
			
			if(isset($err_msg)){
				
				foreach($err_msg as $error){ ?>
					    <div class="alert">
						    <button type="button" class="close" data-dismiss="alert">&times;</button>
						    <?=$error;?>
						</div>
				<? }
				
			} else {
		
				$user = $this->db->get_row("SELECT id, username, role FROM app_users WHERE email = '$email' && password = '$password'");
				
				if($user->id != ''){
					
					// Generate sessions 
					$date_on 				= date('ymdHis');
					$user_session 			= hash('md5',($date_on*$user->id));
					$set_user_session 		= $this->db->query("INSERT INTO app_user_sessions (user_id, user_session, session_status, session_time_on) VALUES ('".$user->id."', '$user_session', 'active', '$date_on') ");
					
					$_SESSION['USER'] 		= $user->id;
					$_SESSION['ROLE']		= $user->role;
					$_SESSION['SESSION_ID'] = $user_session;
					
					$sitebrief = "". URL ."/admin/site-brief";
					$currentpage = URL.$_SERVER['REQUEST_URI'];
					if($sitebrief==$currentpage) {
						header("location:". URL .'admin/site-brief'); 
					} else {
						header("location:". URL .'admin'); 
					}

					
				} else { ?>
					 <div class="alert">
					    <button type="button" class="close" data-dismiss="alert">&times;</button>
					    Username and password combination not present in our database
					</div>
				<? };
			}

		}
	}
	
	// Login form
	function login_form(){
		
		// Load login form
		if(!isset($this->user_id)){ ?>
		<fieldset id="user_login_fields">
			<form role="form" id="login_form" action="" method="post">
				<div class="form-group">
					<input class="form-control" id="exampleInputEmail" type="text" name="login_user" placeholder="Email">
				</div>
				<div class="form-group">
					<input class="form-control" id="exampleInputPassword" type="password" name="login_password" placeholder="Password">
				</div>
				<div class="form-group">
					<input class="btn btn-primary form-control pull-right" type="submit" name="login_form_submit" value="Login"/>
				</div>
				<a href="/forgot">Forgot Password?</a>
			</form> 
		</fieldset>
		<? } else {
				
				// If already logged in, load user details
				$user = $this->db->get_row("SELECT * FROM app_users WHERE id = '".$this->user_id."'");
				echo $user->email.' is logged in';
		}
		
	}
	
	// Registration form
	function register_user(){
	
		// Check registraiont POST submission
		if(isset($_POST['reg_form_submit'])){
						
			$role = 1;
			$email		= stripslashes($_POST['reg_user']);
			//$bio		= stripslashes($_POST['bio']);
			//$addr1		= stripslashes($_POST['addr1']);
			//$addr2		= stripslashes($_POST['addr2']);
			//$phone		= stripslashes($_POST['phone']);
			//$postal		= stripslashes($_POST['postal']);
			//$city		= stripslashes($_POST['city']);
			//$province	= stripslashes($_POST['province']);
			//$country	= stripslashes($_POST['country']);
			$fname		= stripslashes($_POST['fname']);
			$lname		= stripslashes($_POST['lname']);
			$partner	= stripslashes($_POST['partner_id']);
			//$mobile		= stripslashes($_POST['mobile']);
			

			if($email == ''){
				$err_msg['no_email'] = 'Please enter an email address';
			} else {			
				if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
					$err_msg['invalid_email'] = 'Please enter a valid email address';
				}
			}
			
			$check_email = $this->db->get_var("SELECT id FROM app_users WHERE email = '$email'");
			
			if($check_email != ''){
				$err_msg['email_exists'] = 'An account has already been registered with that email address';
			}
			
			// Compare and encrypt the password - replace MD5 encryption
			// Use Salted and Hashed password algorythms
			// For Trevor
			
			if(stripslashes($_POST['reg_password']) == stripslashes($_POST['reg_password_confirm'])){
				$password	= md5($_POST['reg_password']);
			} else {
				$err_msg['password_match'] = 'Passwords do not match';
			}
			
			if($err_msg){
				
				foreach($err_msg as $error){ ?>
					    <div class="alert">
						    <button type="button" class="close" data-dismiss="alert">&times;</button>
						    <?=$error;?>
						</div>
				<? }
				
			} else {

				$create_user = $this->db->query("INSERT INTO app_users (email, password, role, bio, addr1, addr2, postal, city, province, country, mobile, fname, lname, partner_id ) VALUES ('$email', '$password', '$role', '$bio', '$addr1', '$addr2', '$postal', '$city', '$province', '$country', '$mobile', '$fname', '$lname', '$partner')");
				
				if($create_user){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						User successfully added
					</div>
				<? } else { ?>
					<div class="alert alert-error">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						Database error
					</div>
				<? };
			}

		} 
		
		?>
		
			<form class="admin_form" role="form" id="registration_form" action="" method="post">
				<fieldset id="essential_information">
					<div class="row">
						<div class="col-6">
							<input class="form-control" type="text" name="fname" placeholder="First Name">
						</div>
						
						<div class="col-6">
							<input class="form-control" type="text" name="lname" placeholder="Last Name">
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<input class="form-control" type="text" name="reg_user" placeholder="Email">
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<input class="form-control" type="password" name="reg_password" placeholder="Password">
						</div>
						<div class="col-6">
							<input class="form-control" type="password" name="reg_password_confirm" placeholder="Confirm Password">
						</div>
					</div>
				</fieldset>
				<br/>
				<!-- 
				<fieldset id="additional_information">
					<h4>Contact Information</h4>
					<div class="row">
						<div class="col-6">
							<input class="form-control" type="text" name="phone" placeholder="Phone">
						</div>
						<div class="col-6">
							<input class="form-control" type="text" name="mobile" placeholder="Mobile">
						</div>
					</div>
					<div class="row">
						<div class="col-9">
							<input class="form-control" type="text" name="addr1" placeholder="Street Address">
						</div>
						<div class="col-3">
							<input class="form-control" type="text" name="addr2" placeholder="Suite/Apt/Unit">
						</div>
					</div>			
					<div class="row">
						<div class="col-3">
							<input class="form-control" type="text" name="city" placeholder="City">
						</div>
						<div class="col-3">
							<input class="form-control" type="text" name="province" placeholder="Province">
						</div>
						<div class="col-3">
							<input class="form-control" type="text" name="country" placeholder="Country">
						</div>
						<div class="col-3">
							<input class="form-control" type="text" name="postal" placeholder="Postal Code">
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<textarea class="form-control" rows="6" type="text" name="bio" placeholder="Notes"></textarea>
						</div>
					</div>
					-->
					<!-- Submit -->
					<div clas-"form-group">
						<input class="btn btn-primary form-control" type="submit" name="reg_form_submit" value="Create Account"/>
					</div>
				</fieldset>
			</form> 
		
		<?
	}
	


	// If user level is application admin or site owner, load HUD controllers
	function load_hud(){
		
			if($this->get_role() == 'super'){
				
				// If you are a super admin, load admin HUD
				include ADMIN.'hud.php';
			} else if($this->get_owner() == true ){
				
				// Check to see if you're looking at your own profile
				include ADMIN.'hud.php';		
			} else {

			}
	}
	
	
}
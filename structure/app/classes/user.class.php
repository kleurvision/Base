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
			$user = 'not logged in';
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
		
				$user = $this->db->get_row("SELECT id, username FROM app_users WHERE email = '$email' && password = '$password'");
				
				if($user->id != ''){
					
					$_SESSION['USER'] = $user->id;
					header("location:".URL); 
					
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
			<legend>User Login</legend>
			<form id="login_form" action="" method="post">
				<div class="form_row">
					<div class="global_input_wrapper">
						<div class="global_input_skin">
							<input type="text" name="login_user" placeholder="email">
						</div>
					</div>
					<div class="global_input_wrapper">
						<div class="global_input_skin">
							<input type="password" name="login_password" placeholder="password">
						</div>
					</div>
					<div class="global_form_button">
						<input class="btn btn-primary" type="submit" name="login_form_submit" value="Login"/>
					</div>
				</div>
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
						
			$email		= stripslashes($_POST['reg_user']);
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
			
				$create_user = $this->db->query("INSERT INTO app_users (email, password) VALUES ('$email', '$password')");
				
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
		
		// Check to see if user it logged in
		if(!isset($this->user_id)){?>
		<fieldset id="user_register_form">
			<legend>Register User</legend>
			<form id="registration_form" action="" method="post">
				<div class="form_row">
					<div class="global_input_wrapper">
						<div class="global_input_skin">
							<input type="text" name="reg_user" placeholder="email">
						</div>
					</div>
					<div class="global_input_wrapper">
						<div class="global_input_skin">
							<input type="password" name="reg_password" placeholder="password">
						</div>
					</div>
					<div class="global_input_wrapper">
						<div class="global_input_skin">
							<input type="password" name="reg_password_confirm" placeholder="confirm password">
						</div>
					</div>
					<div class="global_form_button">
						<input class="btn btn-primary" type="submit" name="reg_form_submit" value="Register"/>
					</div>
				</div>
			</form> 
		</fieldset>
		<? }
		
		
	}
	
	// If user level is application admin, load HUD controllers
	function load_hud(){
		
		// Check for active user
		if($this->user != 'undefined'){
			
			// Check to see if its a user page			
			if(isset($_GET['user'])){
				$user_profile = $_GET['user'];
			}

			// Check to see if user is an administrator or super user
			// Admins are level 9, Super users are 10 or higher
			$level = 9;
			$role = $this->user->role;
			$permissions = $this->db->get_var("SELECT permissions FROM app_roles WHERE id = '".$role."'");
	
			// Check to see if user is an administrator or super user
			if($permissions >= $level){
				include ADMIN.'/hud.php';
			} else if($permissions < $level){
				
				// Check to see if you're looking at your own profile
				if($user_profile == $this->user->username){
					include ADMIN.'/hud-user.php';	
				};		
			} else {
				// No HUD access
			}
		};
	}
	
	
}
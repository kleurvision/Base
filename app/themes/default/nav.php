<? /* Main navigation file
------------------------------
** ClientCare main navigation file
------------------------------
** Here we go */
?>

			  <div class="container">
					    <? app_nav('main');?>
			  </div>
			  
			 <? /* <div class="user_info">
				  <? // Load in user info 
				  	global $db;
					$user = new User($db);
					$details = $user->get_user();
					if(isset($details->email)){
						echo $details->email.' is logged in <a class="btn" href="'.URL.'/logout.php">Logout</a>';
					} else {
						echo '<a class="btn" href="'.URL.'/login">Login</a>';
					}
				  	?>
			  </div> */?>

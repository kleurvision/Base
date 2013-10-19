<? /* Main footer file
------------------------------
** Here we go */
?>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6">
				<a href="http://webninja.me">Fitness Websites</a> by Webninja - &copy; Fit Motto
			</div>
			<div class="col-12 col-lg-6">
				<section class="social-footer">
					<div class="col-12 ">
						<ul class="social-links list-unstyled list-inline">
							<li>
								<a href="http://www.facebook.com/FitMotto">
									<span class="icon-stack">
										<i class="icon-circle icon-stack-base"></i>
										<i class='icon-facebook icon-light'></i>
									</span>
								</a>
							</li>
							<li>
								<a href="http://www.twitter.com/FitMotto">
									<span class="icon-stack">
										<i class="icon-circle icon-stack-base"></i>
										<i class='icon-twitter icon-light'></i>
									</span>
								</a>
							</li> 
							<li>
								<a href="https://plus.google.com/108352986588769841661/posts">
									<span class="icon-stack">
										<i class="icon-circle icon-stack-base"></i>
										<i class='icon-google-plus-sign icon-light'></i>
									</span>
								</a>
							</li>		
						</ul>
					</div>
				</section>
			</div>		
		</div>
	</div>
</footer>

	<? // Load final app elements into footer
	app_foot();
	?>    
	
	<!-- Load Admin Bar -->
	<? 
	global $user;
	$hud = $user->load_hud();
	echo $hud;
	?>

	<!-- Analytics -->
	
</body>
</html>

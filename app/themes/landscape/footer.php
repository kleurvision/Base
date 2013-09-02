<? /* Main footer file
------------------------------
** Here we go */
?>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-12">
				<a href="http://webninja.me">Example websites</a> by Webninja - &copy; Company Name
			</div>
			<section class="social-footer">
				<div class="col-12 ">
					<ul class="social-links list-unstyled list-inline">
						<li>
							<a href="#">
								<span class="icon-stack">
									<i class="icon-circle icon-stack-base"></i>
									<i class='icon-facebook icon-light'></i>
								</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="icon-stack">
									<i class="icon-circle icon-stack-base"></i>
									<i class='icon-twitter icon-light'></i>
								</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="icon-stack">
									<i class="icon-circle icon-stack-base"></i>
									<i class='icon-linkedin icon-light'></i>
								</span>
							</a>
						</li>		
					</ul>
				</div>
			</section>			
		</div>
	</div>
</footer>

	<? // Load final app elements into footer
	app_foot();
	?>    
	
	<!-- Load Admin Bar -->
	<? 
	global $db;
	$user = new User($db);
	$hud = $user->load_hud();
	echo $hud;
	?>

	<!-- Analytics -->
	
</body>
</html>

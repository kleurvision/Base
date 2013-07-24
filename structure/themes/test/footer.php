<? /* Main footer file
------------------------------
** ClientCare main footer file
------------------------------
** Here we go */
?>
	<div id="push"></div>
</div>

<div id="footer" class="footerWrapper">
	<div class="twitterWrapper">
		<div class="container">
			<div id="twitterBar" class="row">
		    	<div class="tweet span12"></div> 
		    </div>
		</div>
	</div>
	<footer>
		<div class="container">
			<div class="row">
				<div class="span8">
					<ul class="footerNav nav" id="footer-nav">
						<li><a href="/">Home</a></li>
						<li><a href="http://blog.clickityclank.com">Blog</a></li>
						<li><a href="/about-us">About Clickity Clank</a></li>
						<li><a href="/website-development">Website Design for Bands</a></li>
						<li><a href="/branding">Logo Design for Bands</a></li>
						<li><a href="/technology">Tech Services</a></li>
						<li><a href="/partnerships">Agency Partnerships</a></li>
					</ul>
				</div>
				<div class="span4">
					<? social_links();?>
				</div>
				<div class="span12">
					<div id="copyright">
						&copy;<?= date('Y'); ?> <? site_info('title');?>. Lovingly made in Canada.<br />
						<a href="http://kleurvision.com" alt="Kleurvision Inc. Design and Development">
							Website Design, Development and Hosting by Kleurvision Inc.
						</a>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<? 
	global $db;
	$user = new User($db);
	$hud = $user->load_hud();
	echo $hud;
?>
	
 	<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="<? get_theme_path('js');?>/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="<? get_theme_path('js');?>/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="<? get_resource_path('js');?>/bootstrap.min.js"></script>
    <script type="text/javascript" src="<? get_resource_path('js');?>/app.js"></script>
    <script type="text/javascript" src="<? get_resource_path('js');?>/jquery.tweet.js"></script>
    <script src="<? get_theme_path('js');?>/clickityclank.js"></script>
    
    <? // Load final app elements into footer
	 	app_foot();
	?>    
    

	
  </body>
</html>

<? /* Main footer file
------------------------------
** Here we go */
?>
	
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <a href="http://webninja.me">Example websites</a> by Webninja - &copy; Company Name
                </div>
                <div class="col-12 col-lg-6">
                    <? include 'partials/social-links.php'; ?>
                </div>
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

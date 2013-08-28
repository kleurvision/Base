<? /* Main footer file
------------------------------
** ClientCare main footer file
------------------------------
** Here we go */
?>
	
 	<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="/system/library/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
      window.onload = function() {
        CKEDITOR.replace( 'edit-page-content' );
        CKEDITOR.replace( 'add-page-content' );
        CKEDITOR.replace( 'add-slide-content' );
    };
    </script>
    <? // Load final app elements into footer
	 	app_foot();
	?>    
    
    <? 
    	global $db;
    	$user = new User($db);
    	$hud = $user->load_hud();
    	echo $hud;
    ?>
	
  </body>
</html>

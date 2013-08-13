<? /* App Index Page
------------------------------
** Here we go */

echo $page->get_header();

// include ('header.php'); // Need to cascase $page class into header
?>

	<div class="container">
	
		<h1>Oh No, Fo Oh Fo!</h1>
		<p>Use this document as a way to quick start any new project.<br/>
		All you get is this message and a barebones HTML document.</p>
				
		
			<? /* <div>
			
				<? // Page Loop
				$args = array(
					'type'=>'page'
				); 
				
				$query = db_query($args);
				
				if($query){
					foreach($query as $page){				
						print_r($page);
					};
				}; ?>
				
			</div> */ ?>
	
	</div> <!-- /container -->

<? echo $page->get_footer();?>
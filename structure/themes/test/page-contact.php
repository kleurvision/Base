<? /* 
	Template Name: Contact
 */

echo $page->get_header();
?>

    <div id="<?=$pagemap->pagename;?>" class="container">
    	<div class="row">
    		<div class="span12">
			    		<? $page->breadcrumbs($pagemap->pagename);?>
				    		<h1><?= $pagemap->pagetitle;?></h1>
				    		<h2 class="centered">We’re an independent creative studio that caters to bands, labels, and agencies. We are highly skilled individuals (alas most of us have no musical talent). We pour our love for music into the experiences that we create. <span class="hilite">Rock on.</span></h2>
				    		<!-- <img src="<?=THEME;?>/images/cc_contact_image.jpg" alt="Contact the best music industry designers - Clickity Clank"/> -->

    			<div class="row-fluid">
	    			<div class="span4">
			    		<h3>Our Locations</h3>
			    		<ul>
							<li>Toronto</li>
							<li>New York</li>
							<li>Denver</li>
						</ul>
			    		
	    			</div>
	    			<div class="span4">
				    		<?= $pagemap->pagecontent;?>
	    			</div>
	    			<div class="span4">
			    		<h3>Electronic Mail </h3>
			    		<? include('contact-form.php');?>
			    	</div>
    			</div>

    		</div>
	    		
	    			    		
    	</div><!-- /row -->	    		
    </div> <!-- /container -->

<? echo $page->get_footer();?>
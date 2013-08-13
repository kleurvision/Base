<? /* App Default Page Template
------------------------------
/* Template Name: Partnerships

** Here we go */

echo $page->get_header();
?>

    <div id="<?=$pagemap->pagename;?>" class="container">
    	<div class="row">
    		<div class="span12">
    			<div class="row">
    				<div class="span12">
    					<? $page->breadcrumbs($pagemap->pagename);?>
    					<h1><?= $pagemap->pagetitle;?></h1>
    				</div>
    			</div>
    			<div class="row">
	    			<div class="span8">
			    		<?= $pagemap->pagecontent;?>
			    		<div class="engagement">
			    			<h3>Want to partner with Clickity Clank?</h3>
			    			<p>So, you have a <strong>cool app</strong> or you want to offer white-labelled <strong>design, print, and development</strong> services to your client base? Lets chat.</p>
			    			<a href="#partnerModal" role="button" class="btn btn-large btn-block" data-toggle="modal">Lets hook up.</a>
			    		</div>
			  
					</div><!-- /span8 -->
					<? echo $page->get_sidebar('partnerships');?>
    			</div><!-- /row -->
    		</div><!-- /span12 -->
    	</div><!-- /row -->	    		
    </div> <!-- /container -->

<? echo $page->get_footer();?>
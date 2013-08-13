<? /* App Default Page Template
------------------------------
/* Template Name: Services-Website

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
			    		<div class="examples">
			    			<h3>Website Examples</h3>
			    			<? tumblr_items('website','8');?>
			    		</div>
			    		<div class="engagement">
			    			<h3>Don't know where to start?</h3>
			    			<p>We can walk you <strong>step-by-step</strong> and get your band online with a jealousy-inducing website masterpiece, and for a lot  less hard-earned cash than you might think. One thing we won't do? Leave you hanging. <strong>Do-it-yourself</strong> is for building a deck on the weekend...</p>
			    			<a href="#quoteModal" role="button" class="btn btn-large btn-block" data-toggle="modal">We Build Websites</a>
			    		</div>
					</div><!-- /span8 -->
					<? echo $page->get_sidebar('services-website');?>
    			</div><!-- /row -->
    		</div><!-- /span12 -->
    	</div><!-- /row -->	    		
    </div> <!-- /container -->

<? echo $page->get_footer();?>
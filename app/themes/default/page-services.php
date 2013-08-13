<? /* App Default Page Template
------------------------------
/* Template Name: Services

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
			    			<h3>Don't know where to start?</h3>
			    			<p>We can walk you <strong>step-by-step</strong> and get your band online with an jealousy-inducing website masterpiece, and for a lot  less hard-earned cash than you might think. One thing we won't do? Leave you hanging. <strong>Do-it-yourself</strong> is for building a deck on the weekend...</p>
			    			<a href="#quoteModal" role="button" class="btn btn-large btn-block" data-toggle="modal">Get Help!</a>
			    		</div>
					</div><!-- /span8 -->
					<? echo $page->get_sidebar('services');?>
    			</div><!-- /row -->
    		</div><!-- /span12 -->
    	</div><!-- /row -->	    		
    </div> <!-- /container -->

<? echo $page->get_footer();?>
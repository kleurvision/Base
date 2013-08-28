<? /* App Default Page Template
------------------------------
/* Template Name: Services-Design

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
			    			<h3>Design Examples</h3>
			    			<? tumblr_items('design','8');?>
			    		</div>
			    		<div class="engagement">
			    			<h3>It is time to get noticed!</h3>
			    			<p>Build your brand up with elegant graphic design solutions, <strong>including posters, album art, laminates, onesheets, business cards, promocards, stickers</strong> and anything else you can think of. Your fans will connect with good design - and they may not even know that they are doing it.</p>
			    			<a href="#quoteModal" role="button" class="btn btn-large btn-block" data-toggle="modal">Make Me Beautiful!</a>
			    		</div>
					</div><!-- /span8 -->
					<? echo $page->get_sidebar('services-design');?>
    			</div><!-- /row -->
    		</div><!-- /span12 -->
    	</div><!-- /row -->	    		
    </div> <!-- /container -->

<? echo $page->get_footer();?>
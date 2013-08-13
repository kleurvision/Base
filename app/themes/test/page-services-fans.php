<? /* App Default Page Template
------------------------------
/* Template Name: Services-Fans

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
			    			<h3>Want to build your harem?</h3>
			    			<p>We can work with you on <strong>targeting your key demographic</strong> and start building trust levels with the people that matter most to the success of your music project. Then <strong>we organize it</strong> so that you don't have to.</p>
			    			<a href="#quoteModal" role="button" class="btn btn-large btn-block" data-toggle="modal">Get Help!</a>
			    		</div>
					</div><!-- /span8 -->
					<? echo $page->get_sidebar('services-fans');?>
    			</div><!-- /row -->
    		</div><!-- /span12 -->
    	</div><!-- /row -->	    		
    </div> <!-- /container -->

<? echo $page->get_footer();?>
<? /* App Default Page Template
------------------------------
/* Template Name: Services-Branding

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
			    			<h3>Logo Examples</h3>
			    			<? tumblr_items('logo','8');?>
			    		</div>
			    		<div class="engagement">
			    			<h3>Ready to stand out from the ubiquitous sea of musicians?</h3>
			    			<p>Start your image building process with <strong>a strong visual brand</strong> and create an emotional connection with your fans. Be <strong>memorable</strong> and be <strong>unique</strong>.</p>
			    			<a href="#quoteModal" role="button" class="btn btn-large btn-block" data-toggle="modal">Lets Get Started!</a>
			    		</div>
					</div><!-- /span8 -->
					<? echo $page->get_sidebar('services-branding');?>
    			</div><!-- /row -->
    		</div><!-- /span12 -->
    	</div><!-- /row -->	    		
    </div> <!-- /container -->

<? echo $page->get_footer();?>
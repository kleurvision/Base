<? /* App Default Page Template
------------------------------
/* Template Name: Services-Print

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
			    			<h3>Merch Examples</h3>
			    			<? tumblr_items('merch','8');?>
			    		</div>
			    		<div class="engagement">
			    			<h3>Want to make some money slingin' threads?</h3>
			    			<p>We'll tell you this — <strong>ugly shirts don't sell</strong> — but kick ass ones do. Let the team at Clickity Clank walk you through Merch Design 101 and prepare some wallet draining concepts for your next tour. We can handle design, production, and logistics. Don't need merch but want to promote a show? We do paper printing too.</p>
			    			<a href="#quoteModal" role="button" class="btn btn-large btn-block" data-toggle="modal">Lay Down the Color</a>
			    		</div>
					</div><!-- /span8 -->
					<? echo $page->get_sidebar('services-print');?>
    			</div><!-- /row -->
    		</div><!-- /span12 -->
    	</div><!-- /row -->	    		
    </div> <!-- /container -->

<? echo $page->get_footer();?>
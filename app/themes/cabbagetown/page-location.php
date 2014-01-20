<? 
/* 
    Template Name: Location
 */

echo $page->get_header();
?>

    <div class="container">
    	<div class="row">
    		<div class="col-lg-12">
    		<? $page->breadcrumbs($pagemap->pagename);?>
	    		<h1><?= $pagemap->pagetitle;?></h1>
	    		<?= $pagemap->pagecontent;?>
    		</div><!-- /span10 -->
    	</div><!-- /row -->	    		
    </div> <!-- /container -->

<? echo $page->get_footer();?>
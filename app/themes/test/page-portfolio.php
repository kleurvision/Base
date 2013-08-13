<? /* 
	Template Name: Portfolio
 */

echo $page->get_header();
?>

    <div id="<?=$pagemap->pagename;?>" class="container">
    	<div class="row">
    		<div class="span12">
    		<? $page->breadcrumbs($pagemap->pagename);?>
	    		<h1><?= $pagemap->pagetitle;?></h1>
	    		<? tumblr_items();?>
    		</div>
	    		<? // echo $page->get_sidebar();?>
	    			    		
    	</div><!-- /row -->	    		
    </div> <!-- /container -->

<? echo $page->get_footer();?>
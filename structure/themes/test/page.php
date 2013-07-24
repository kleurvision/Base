<? /* App Default Page Template
------------------------------
** Here we go */

echo $page->get_header();
?>

    <div class="container">
    	<div class="row">
    		<div class="span8">
    		<? $page->breadcrumbs($pagemap->pagename);?>
	    		<h1><?= $pagemap->pagetitle;?></h1>
	    		<?= $pagemap->pagecontent;?>
    		</div><!-- /span10 -->
	    		<? echo $page->get_sidebar();?>
	    		
    	</div><!-- /row -->	    		
    </div> <!-- /container -->

<? echo $page->get_footer();?>
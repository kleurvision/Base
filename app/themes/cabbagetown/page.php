<? 
echo $page->get_header();
?>
<section class="page">
	<div class="page-header">
		<div class="container">
			<div class="col-12 col-lg-6">
				<h2 class="page-title animated fadeInLeft"><?= $pagemap->pagetitle;?></h2>
			</div>
			<div class="col-12 col-lg-6">
				<?= $page->breadcrumbs($pagemap->pagename);?>
			</div>			
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8 animated fadeInDown">
				<p><?= $pagemap->pagecontent;?></p>
			</div>
			<div class="col-12 col-lg-4 animated fadeInRight">
				<?= $page->get_sidebar();?>
			</div>
		</div>
	</div>
</section>
<?
echo $page->get_footer();
?>

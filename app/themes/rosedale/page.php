<? 
echo $page->get_header();
?>
<section class="page">
	<div class="page-header">
		<div class="container">
			<div class="col-12 col-lg-6">
				<h2 class="page-title"><?= $pagemap->pagetitle;?></h2>
			</div>		
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<p><?= $pagemap->pagecontent;?></p>
			</div>
			<div class="col-12 col-lg-4">
				<?= $page->get_sidebar();?>
			</div>
		</div>
	</div>
</section>
<?
echo $page->get_footer();
?>

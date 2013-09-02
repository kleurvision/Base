<? /* Index Page
------------------------------
** Here we go */

echo $page->get_header();
?>
<!-- Slider -->
<section class="slider">
	<div class="container">
		<div id="carousel-generic" class="carousel slide">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-generic" data-slide-to="1"></li>
				<li data-target="#carousel-generic" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<!-- Slide 1 -->
				<div class="item active">
					<a href="#" class="thumbnail">
						<img src="<?= URL.THEME;?>/img/sample-2.jpg" alt="">
						<div class="carousel-caption">
							<h3>Slide Title 1</h3>
							<p>Slide Description</p>
						</div>
					</a>
				</div>
				<!-- Slide 2 -->
				<div class="item">
					<a href="#" class="thumbnail">
						<img data-src="holder.js/100%x400" alt="">
						<div class="carousel-caption">
							<h3>Slide Title 2</h3>
							<p>Slide Description</p>
						</div>
					</a>
				</div>
				<!-- Slide 3 -->
				<div class="item">
					<a href="#" class="thumbnail">
						<img data-src="holder.js/100%x400" alt="">
						<div class="carousel-caption">
							<h3>Slide Title 3</h3>
							<p>Slide Description</p>
						</div>
					</a>
				</div>			
				
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-generic" data-slide="prev">
				<span class="icon-prev"></span>
			</a>
			<a class="right carousel-control" href="#carousel-generic" data-slide="next">
				<span class="icon-next"></span>
			</a>
		</div>
	</div>
</section>
<!-- /End Slider -->
<!-- Main Content -->
<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4">
				<h3>Service 1</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis quam nibh.</p>
				<a href="#" class="btn btn-default btn-block">Learn More</a>
			</div>
			<div class="col-12 col-lg-4">
				<h3>Service 2</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis quam nibh.</p>
				<a href="#" class="btn btn-default btn-block">Learn More</a>
			</div>
			<div class="col-12 col-lg-4">
				<h3>Service 3</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis quam nibh.</p>
				<a href="#" class="btn btn-default btn-block">Learn More</a>
			</div>						
		</div>
	</div>
</section>
<!-- /End Main Content -->
<? echo $page->get_footer();?>
<? /* Index Page
------------------------------
** Here we go */

echo $page->get_header();
?>
<!-- Slider -->
<section class="slider">
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
					<img src="<?= URL.SITE;?>/img/jpeg.jpeg" alt="#" />
					<div class="carousel-caption">
						<h2>Professional Landscape Construction</h2>
						<a href="#" class="btn btn-default btn-large">View Our Work</a>
					</div>
				</div>
				<!-- Slide 2 -->
				<div class="item">
					<img src="<?= URL.SITE;?>/img/jpeg-1.jpeg" alt="" />
					<div class="carousel-caption">
						<h2>Every Project Starts With a Great Plan</h2>
						<p>Get in touch with us to get started on your dream landscape. </p>
						<a href="#" class="btn btn-default btn-large">Contact Us</a>
					</div>
				</div>
				<!-- Slide 3 -->
				<div class="item">
					<img src="<?= URL.SITE;?>/img/jpeg-2.jpeg" alt="" />
					<div class="carousel-caption">
						<h2>Weekly and Seasonal Landscape Maintenance</h2>
						<p>We have a variety of plans tailored to your needs</p>
						<a href="#" class="btn btn-default btn-large">Contact Us</a>
					</div>
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
</section>
<!-- /End Slider -->
<!-- Action Banner -->
<section class="action-banner">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-9">
				<h3>Need a Free Consultation? Contact Us Today!</h3>
			</div>
			<div class="col-12 col-lg-3 action-button">
				<a href="#" class="btn btn-default btn-lg">Contact Us</a>
			</div>
		</div>
	</div>
</section>
<!-- /End Action Banner -->
<!-- Main Content -->
<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4">
				<div class="service">
					<div class="icon">
						<i class="icon-heart"></i>
					</div>
					<h4>Landscape Maintenance</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis quam nibh.</p>
					<a href="#" class="btn btn-default btn-block">Learn More</a>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<div class="service">
					<div class="icon">
						<i class="icon-leaf"></i>
					</div>
					<h4>Landscape Construction</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis quam nibh.</p>
					<a href="#" class="btn btn-default btn-block">Learn More</a>
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<div class="service">
					<div class="icon">
						<i class="icon-pencil"></i>
					</div>
					<h4>Landscape <br/> Design</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quis quam nibh.</p>
					<a href="#" class="btn btn-default btn-block">Learn More</a>
				</div>
			</div>						
		</div>
	</div>
</section>
<!-- /End Main Content -->
<? echo $page->get_footer();?>
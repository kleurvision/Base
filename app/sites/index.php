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
					<img src="<?= URL.SITE;?>/img/slide1.jpg" alt="#" />
					<div class="carousel-caption">
						<h2>Featured Workout</h2>
						<p>Burn calories fast with this power workout.</p>
						<a href="#" class="btn btn-default btn-large">Watch Now</a>
					</div>
				</div>
				<!-- Slide 2 -->
				<div class="item">
					<img src="<?= URL.SITE;?>/img/slide2.jpg" alt="" />
					<div class="carousel-caption">
						<h2>Recieve Monthly Fitness Tips</h2>
						<p>Join our newsletter and get monthly tips delivered to your inbox</p>
						<a href="#" class="btn btn-default btn-large">Subscribe</a>
					</div>
				</div>
				<!-- Slide 3 -->
				<div class="item">
					<img src="<?= URL.SITE;?>/img/slide3.jpg" alt="" />
					<div class="carousel-caption">
						<h2>Take the fitness challenge</h2>
						<p>Looking to get in shape? Signup for our fitness challenge.</p>
						<a href="#" class="btn btn-default btn-large">Learn More</a>
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
	</div>
</section>
<!-- /End Slider -->
<!-- Main Content -->
<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 col-lg-3" id="blue">
				<div class="service">
					<h3>Fitness</h3>
					<p>Integer enim sociis proin tempor lectus! Etiam pellentesque porttitor? Dolor, dignissim! Enim. Porta ut! Natoque, ultrices, pellentesque augue. Sagittis, pulvinar montes. In, integer rhoncus duis augue! </p>
					<a href="#" class="btn btn-default btn-large">Learn More</a>
				</div>
			</div>
			<div class="col-12 col-md-6 col-lg-3" id="green">
				<div class="service">
					<h3>Nutrition</h3>
					<p>Integer enim sociis proin tempor lectus! Etiam pellentesque porttitor? Dolor, dignissim! Enim. Porta ut! Natoque, ultrices, pellentesque augue. Sagittis, pulvinar montes. In, integer rhoncus duis augue! </p>
					<a href="#" class="btn btn-default btn-large">Learn More</a>
				</div>
			</div>
			<div class="col-12 col-md-6 col-lg-3" id="orange">
				<div class="service">
					<h3>Mottovation</h3>
					<p>Integer enim sociis proin tempor lectus! Etiam pellentesque porttitor? Dolor, dignissim! Enim. Porta ut! Natoque, ultrices, pellentesque augue. Sagittis, pulvinar montes. In, integer rhoncus duis augue! </p>
					<a href="#" class="btn btn-default btn-large">Learn More</a>
				</div>
			</div>					
		</div>
	</div>
</section>
<!-- /End Main Content -->
<? echo $page->get_footer();?>
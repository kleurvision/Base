<? /* App Index Page
------------------------------
** Here we go */

echo $page->get_header();
?>
<section id="who">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 pane-center">
				<h2>Get it done right. Hire a Ninja.</h2>
				<p>
					Webninja is perfect for the small business owner who wears many hats, but doesn’t want to wear them all.<br/>
					We handle the design, development, hosting and setup. You help us with the content. 
				</p>
			</div>
		</div>
	</div>
	<img id="village-people" src="<? get_theme_path('images');?>/village-people.jpg"/>
</section>
<section id="what" class="scrollblock">
	<div class="container" >
		<div class="row">
			<div class="col-lg-8" id="what-description">
				<h2>Expert Help when you need it.</h2>
				<p>Unlike other do-it-yourself website companies we don't leave you high and dry. Our team of experts will design, build, and help manage your website with you.</p>
				<p>No more fiddling around with complicated tools or wasting time trying to do-it-yourself. When you need us an expert is only an email or phone call away.</p>
			</div>
			<div class="col-lg-4" id="what-list">
				<div class="feature"><i class="icon-pencil"></i><strong>Professionally Built Website</strong></div>
				<div class="feature"><i class="icon-envelope-alt"></i><strong>Hosting and Email Included</strong></div>
				<div class="feature"><i class="icon-question-sign"></i><strong>Amazing Support</strong></div>
			</div>
		</div>
	</div>
</section>
<section id="examples">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 pane-center" id="examples-title">
				<h2>WebNinja powers dozens of websites.</h2>
				<h4>These are just a few of our happy customers</h4>
			</div>
		</div>

		<div id="carousel-customers" class="carousel slide">
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<div class="example">
						<img src="<? get_theme_path('images');?>/example1.jpg" alt="Web Ninja" />
						<div class="carousel-caption">
							Does it work
						</div>
					</div>
					<div class="example">
						<img src="<? get_theme_path('images');?>/example2.jpg" alt="Web Ninja" />
						<div class="carousel-caption">
							...
						</div>
					</div>
				</div>
				<div class="item">
					<div class="example">
						<img src="<? get_theme_path('images');?>/example1.jpg" alt="Web Ninja" />
						<div class="carousel-caption">
							Does it work
						</div>
					</div>
					<div class="example">
						<img src="<? get_theme_path('images');?>/example1.jpg" alt="Web Ninja" />
						<div class="carousel-caption">
							...
						</div>
					</div>
				</div>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-customers" data-slide="prev">
				<i class="icon-chevron-left"></i>
			</a>
			<a class="right carousel-control" href="#carousel-customers" data-slide="next">
				<i class="icon-chevron-right"></i>
			</a>
		</div>
	</div>
</section>
<section id="call-to-action">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<h3>Hire a Ninja to Build your website today. </h3>
			</div>
			<div class="col-lg-3">
				<a data-toggle="modal" href="#contact-modal" class="btn btn-lg">Get Started</a>
			</div>
		</div>
	</div>
</section>
<? echo $page->get_footer();?>
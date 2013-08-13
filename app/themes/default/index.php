<? /* App Index Page
------------------------------
** Here we go */

echo $page->get_header();
?>
	<section id="homeServices">
		<div id="<?=$pagemap->pagename;?>" class="container">
				<h2 id="homeBlock">When it comes to expression, Clickity Clank sets the bar. Need help creating a stage presence on and offline? Just want to bounce some ideas around with industry professionals? Our specialists will put the ultimate plan together to develop your look and build your brand.</h2>
				<div class="row">
					<div class="span6">
						<div class="row-fluid serviceItem">
								<img class="serviceIcon" src="<? get_theme_path('images');?>/icon-design.png" alt="icon-design" width="" height="" />
								<h3>Print & merchandising</h3>
								<p>From <strong>promo cards</strong> to <strong>merch</strong>, <strong>stage scrims</strong> to <strong>poster printing</strong>, we maintain relationships with industry leading providers of the materials you need to be successful.</p>
								<? /* <a class="btn btn-success right"><i class=" icon-tag icon-white"></i> Get A Quote</a> */ ?>
						</div>
					</div>
					<div class="span6">
						<div class="row-fluid serviceItem">
								<img class="serviceIcon" src="<? get_theme_path('images');?>/icon-fans.png" alt="icon-fans" width="" height="" />
								<h3>Fan Building</h3>
								<p><strong>We know and love data</strong>. It makes us nerds, but it makes you popular. Our creative user management platform can seamlessly build and manage your fan base.</p>
						</div>
					</div>
				</div>
		
				<div class="row">
					<div class="span6">
						<div class="row-fluid serviceItem">
								<img class="serviceIcon" src="<? get_theme_path('images');?>/icon-hosting.png" alt="icon-hosting" width="" height="" />
								<h3>technology</h3>
								<p>We take on the <strong>tedious</strong> of maintaining the technology required to successfully execute dynamic online campaigns and <strong>digital media management</strong>.</p>
						</div>
					</div>
					<div class="span6">
						<div class="row-fluid serviceItem">
							<img class="serviceIcon" src="<? get_theme_path('images');?>/icon-domains.png" alt="icon-domains" width="" height="" />
							<h3>Graphic Design</h3>
							<p>Our business is rooted deeply in graphic design. <strong>It is our mantra</strong> to make sure that image comes second to none. First impressions can only be made once, get it right.</p>
						</div>
					</div>
				</div>
		
				<div class="row">
					<div class="span6">
						<div class="row-fluid serviceItem">
								<img class="serviceIcon" src="<? get_theme_path('images');?>/icon-website.png" alt="icon-websites" width="" height="" />
								<h3>Website Solutions</h3>
								<p>A website is a digital playground. You control what your fans do and don't see. This is your home, the epicentre of your marketing strategy - <strong>we help you own it.</strong></p>
						</div>
					</div>
					<div class="span6">
						<div class="row-fluid serviceItem">
								<img class="serviceIcon" src="<? get_theme_path('images');?>/icon-branding.png" alt="icon-branding" width="" height="" />
								<h3>Branding</h3>
								<p>Without a recognizable, unique and trusting band image, fans will have little to connect with in this media saturated 21st century - <strong>we make you visible</strong>.</p>
						</div>
					</div>
				</div>
		</section>	
		<section id="homeShowcase">
			<div class="container">
				<h3>Bands & Brands We've Worked With<span class="pull-right"><a class="lightLink" href="contact-us">Work with us</a></span></h3>
				<ul id="logoLoop" class="bxslider">
					<li><img src="<? get_theme_path('images');?>/portfolio/branding/logo-class.png" alt="Classified"/></li>
					<li><img src="<? get_theme_path('images');?>/portfolio/branding/logo-ill.png" alt="illScarlet"/></li>
					<li><img src="<? get_theme_path('images');?>/portfolio/branding/logo-kl.png" alt="Kevin Lyman"/></li>
					<li><img src="<? get_theme_path('images');?>/portfolio/branding/logo-ld.png" alt="Leah Daniels" /></li>
					<li><img src="<? get_theme_path('images');?>/portfolio/branding/logo-sb.png" alt="Skratch Bastid"/></li>
					<li><img src="<? get_theme_path('images');?>/portfolio/branding/logo-wote.png" alt="Walk Off The Earth"/></li>
				</ul>
			</div>
		</section>
</div> <!-- close main container -->

<? echo $page->get_footer();?>
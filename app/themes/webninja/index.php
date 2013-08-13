<? /* App Index Page
------------------------------
** Here we go */

echo $page->get_header();
?>
<section id="who">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 pane-center">
				<h2>Is Webninja Right For You?</h2>
				<p>
					Webninja is perfect for the small business owner who wears many hats, but doesn’t want to wear them all.
					We handle the design, development, hosting and setup. You handle the content. 
				</p>
			</div>
		</div>
		<div class="row" id="what">
			<div class="col-6 col-lg-3"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Promote Services</div>
			<div class="col-6 col-lg-3"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Launch a Business</div>
			<div class="col-6 col-lg-3"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Drive App Downloads</div>
			<div class="col-6 col-lg-3"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Generate Sign-ups</div>
		</div>
	</div>
</section>
<section id="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<h2>Contact us to get started</h2>
				<p>Fill out the adjacent form and we’ll be in touch with you within 2 business days to begin the process of setting up your new website.</p>
			</div>			
			<div class="col-lg-6">
				<!-- BEGIN Podio web form -->
				<script src="https://podio.com/webforms/5088208/398552.js"></script>
				<script type="text/javascript">
				  _podioWebForm.render("398552")
				</script>
				  <div class="podio-webform-container">
				  </div>
				<!-- END Podio web form -->


			</div>
		</div>
	</div>
</section>


<? echo $page->get_footer();?>
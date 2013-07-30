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
					WebNinja is perfect for the small business owner who wears many hats, but doesn’t want to wear them all.
					We handle the design, development, hosting and setup. You handle the content. 
				</p>
			</div>
		</div>
		<div class="row" id="what">
			<div class="col-6 col-lg-3"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Promote Services</div>
			<div class="col-6 col-lg-3"><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Lunch a Business</div>
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
				<? // include('contact-form.php');?>
				<form>
					<fieldset>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="exampleInputEmail">First Name</label>
									<input type="text" class="form-control" id="exampleInputEmail">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword">Last Name</label>
									<input type="password" class="form-control" id="exampleInputPassword">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="exampleInputEmail">Email</label>
									<input type="text" class="form-control" id="exampleInputEmail">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword">Phone</label>
									<input type="password" class="form-control" id="exampleInputPassword">
								</div>
							</div>	
							<div class="col-lg-12">
								<label for="exampleInputPassword">Message</label>
								<textarea class="form-control" rows="3"></textarea>
								<button type="submit" class="btn btn-default pull-right">Submit</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</section>


<? echo $page->get_footer();?>
<?php require('bootstrap-admin.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>

		WebNinja<?php if (isset($pagetitle)) { echo " - ", $pagetitle; } ?>

	</title>
	<!-- Bootstrap and core CSS -->
	<link href="/app/admin/assets/css/bootstrap.css" rel="stylesheet">
	<link href="/app/admin/assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="/app/admin/assets/css/animate.min.css" rel="stylesheet">
	<link href="/app/admin/assets/css/site-brief.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
  		<script src="/app/admin/assets/js/html5shiv.js"></script>
		<script src="/app/admin/assets/js/respond.min.js"></script>
		<![endif]-->

		<!-- Favicons -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/app/admin/assets/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/app/admin/assets/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/app/admin/assets/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="/app/admin/assets/ico/apple-touch-icon-57-precomposed.png">
		<link rel="shortcut icon" href="/app/admin/assets/ico/favicon.png">

		<!-- Place anything custom after this. -->

	</head>

	<body>
		<?
		error_reporting(E_ALL);
		ini_set('display_errors', '1');
		?>

		<?php if($user->get_user() == 'undefined'){} else{ ?>
			<div class="container">
				<a href="http://local.webninja.me/" class="brand">
					<img src="/app/admin/assets/img/icon@2x.png" alt="Web Ninja">
				</a>
			</div>
		<?php }?>

		<div class="page-container">

			<? 
			global $user;
			if($user->get_user() == 'undefined'){ ?>

			<div class="container">
				<div class="row">
					<div class="col-12 col-lg-6 animated fadeInDown centered welcome">
						<img src="/app/admin/assets/img/logo_glow@2x.png" />
						<h3>Welcome Young Grasshopper</h3>
						<p>Step one to obtaining your new website requires us to ask you a few very important questions. But first you must login or create an account.</p>
					</div>
					<div class="col-12 col-lg-4 centered animated fadeInUp">
						<div id="login-form">
							<ul class="nav nav-tabs" id="loginTab">
								<li class="active"><a href="#login">Login</a></li>
								<li><a href="#signup">Create Account</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="login">
									<br/>
									<? $user->login_form(); ?>
								</div>
								<div class="tab-pane" id="signup">
									<br/>
									<? $user->register_user(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<? } else { ?>


			<!-- <div class="navbar animated fadeInDown" id="main-nav">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="pull-left">
					<div id="nav_logo"><img src="/app/admin/assets/img/icon@2x.png"></div>
				</div>
				<div class="nav-collapse collapse navbar-collapse ">
					<ul class="nav navbar-nav">
						<li class="active"><span>1</span>Website Details<i class="caret-active icon-caret-down"></i></li>
						<li><span>2</span>Choose Style</li>
						<li><span>3</span>Book a Ninja</li>
					</ul>
				</div>
			</div>
		-->
		<section id="page-wood">
			<div class="container" class="animated fadeIn">
				<div class="row">
					<div class="col-12 col-lg-6 animated fadeInDown centered welcome">
						<h3>Hello Tim, It's said that every great project starts with a great plan.</h3>
						<p>To advanced complete each section below.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-lg-7 animated fadeInLeft centered plan">
						<div id="plan">
							<img id="note-pad" src="/app/admin/assets/img/note_pad.jpg" />
							<div class="item" id="bio-info">
								<i class="icon-ok"></i>
								<!--<button class="btn btn-primary pull-right" id="bio-begin">Begin</button>-->
								<button class="btn btn-default pull-right" id="bio-edit">Edit</button>
							</div>
							<div class="item" id="about-services">
								<!--<i class="icon-ok"></i>-->
								<button class="btn btn-primary pull-right" id="about-begin">Begin</button>
								<!--<button class="btn btn-default pull-right" id="about-edit">Edit</button>-->
							</div>
							<div class="item" id="brand-vision">
								<!-- <i class="icon-ok"></i>-->
								<button class="btn btn-primary pull-right" id="brand-begin">Begin</button>
								<!--<button class="btn btn-default pull-right" id="brand-edit">Edit</button>-->
							</div>
							<div class="item" id="continue">
								<button class="btn btn-default pull-right" disabled="disabled" >Continue</button>
							</div>
						</div>

						<!--//////// Bio Information Questions ///////// -->
						<form role="form" id="bio-questions" class="question-batch">
							<h3 class="page-header">Business Profile Information</h3>
							<!-- site-name input-->
							<div class="form-group">
								<label>Business or Website Name</label>
								<input class="form-control" id="site-name" name="full-name" type="text" placeholder="eg. Tim's Dog Walking"
								class="input-xlarge">
								<p class="help-block"></p>
							</div>
							<!-- tagline input-->
							<div class="form-group">
								<label>Tagline</label>
								<input class="form-control" id="tagline" name="full-name" type="text" placeholder="eg. Protecting Paws since 2012"
								class="input-xlarge">
								<p class="help-block"></p>
							</div>
							<!-- Business Industry -->
							<div class="form-group">
								<label>Business/Organization Industry</label>
								<select id="country" name="country" class="form-control">
									<option value="" selected="selected">(please select an industry)</option>
									<option value="accountancy">Retail</option>
									<option value="automotive-aerospace">Health &amp; Wellness</option>
									<option value="banking-finance">Creative/Design/Photography</option>
									<option value="business-consultancy">Technology</option>
									<option value="business-consultancy">Corporate</option>	
									<option value="business-consultancy">Manufactoring</option>	
								</select>
								<p class="help-block"></p>
							</div>
							<!-- Existing Website input-->
							<div class="form-group">
								<label>Existing Website URL</label>
								<input class="form-control" id="tagline" name="full-name" type="text" placeholder="eg. http://websiteurl.com"
								class="input-xlarge">
								<p class="help-block">If you already have a domain name regierested enter it here.</p>
							</div>							
							<h3 class="page-header">Business Contact Information</h3>
							<div class="row">
								<div class="col-12">
									<!-- address-line1 input-->
									<div class="form-group">
										<label>Address</label>
										<input class="form-control" id="address-line1" name="address-line1" type="text" placeholder="eg. 180 Mary Street. Unit 10"
										class="input-xlarge">
										<p class="help-block"></p>
									</div>
								</div>
								<div class="col-12 col-lg-6">					 
									<!-- city input-->
									<div class="form-group">
										<label>City / Town</label>
										<input class="form-control" id="city" name="city" type="text" placeholder="eg. Toronto" class="input-xlarge">
										<p class="help-block"></p>
									</div>
									<!-- country select -->
									<div class="form-group">
										<label>Country</label>
										<select id="country" name="country" class="form-control">
											<option value="" selected="selected">(please select a country)</option>
											<option value="AF">Afghanistan</option>
											<option value="AL">Albania</option>
											<option value="DZ">Algeria</option>
											<option value="AS">American Samoa</option>
											<option value="AD">Andorra</option>
											<option value="AO">Angola</option>
											<option value="AI">Anguilla</option>
											<option value="AQ">Antarctica</option>
											<option value="AG">Antigua and Barbuda</option>
											<option value="AR">Argentina</option>
											<option value="AM">Armenia</option>
											<option value="AW">Aruba</option>
											<option value="AU">Australia</option>
											<option value="AT">Austria</option>
											<option value="AZ">Azerbaijan</option>
											<option value="BS">Bahamas</option>
											<option value="BH">Bahrain</option>
											<option value="BD">Bangladesh</option>
											<option value="BB">Barbados</option>
											<option value="BY">Belarus</option>
											<option value="BE">Belgium</option>
											<option value="BZ">Belize</option>
											<option value="BJ">Benin</option>
											<option value="BM">Bermuda</option>
											<option value="BT">Bhutan</option>
											<option value="BO">Bolivia</option>
											<option value="BA">Bosnia and Herzegowina</option>
											<option value="BW">Botswana</option>
											<option value="BV">Bouvet Island</option>
											<option value="BR">Brazil</option>
											<option value="IO">British Indian Ocean Territory</option>
											<option value="BN">Brunei Darussalam</option>
											<option value="BG">Bulgaria</option>
											<option value="BF">Burkina Faso</option>
											<option value="BI">Burundi</option>
											<option value="KH">Cambodia</option>
											<option value="CM">Cameroon</option>
											<option value="CA">Canada</option>
											<option value="CV">Cape Verde</option>
											<option value="KY">Cayman Islands</option>
											<option value="CF">Central African Republic</option>
											<option value="TD">Chad</option>
											<option value="CL">Chile</option>
											<option value="CN">China</option>
											<option value="CX">Christmas Island</option>
											<option value="CC">Cocos (Keeling) Islands</option>
											<option value="CO">Colombia</option>
											<option value="KM">Comoros</option>
											<option value="CG">Congo</option>
											<option value="CD">Congo, the Democratic Republic of the</option>
											<option value="CK">Cook Islands</option>
											<option value="CR">Costa Rica</option>
											<option value="CI">Cote d'Ivoire</option>
											<option value="HR">Croatia (Hrvatska)</option>
											<option value="CU">Cuba</option>
											<option value="CY">Cyprus</option>
											<option value="CZ">Czech Republic</option>
											<option value="DK">Denmark</option>
											<option value="DJ">Djibouti</option>
											<option value="DM">Dominica</option>
											<option value="DO">Dominican Republic</option>
											<option value="TP">East Timor</option>
											<option value="EC">Ecuador</option>
											<option value="EG">Egypt</option>
											<option value="SV">El Salvador</option>
											<option value="GQ">Equatorial Guinea</option>
											<option value="ER">Eritrea</option>
											<option value="EE">Estonia</option>
											<option value="ET">Ethiopia</option>
											<option value="FK">Falkland Islands (Malvinas)</option>
											<option value="FO">Faroe Islands</option>
											<option value="FJ">Fiji</option>
											<option value="FI">Finland</option>
											<option value="FR">France</option>
											<option value="FX">France, Metropolitan</option>
											<option value="GF">French Guiana</option>
											<option value="PF">French Polynesia</option>
											<option value="TF">French Southern Territories</option>
											<option value="GA">Gabon</option>
											<option value="GM">Gambia</option>
											<option value="GE">Georgia</option>
											<option value="DE">Germany</option>
											<option value="GH">Ghana</option>
											<option value="GI">Gibraltar</option>
											<option value="GR">Greece</option>
											<option value="GL">Greenland</option>
											<option value="GD">Grenada</option>
											<option value="GP">Guadeloupe</option>
											<option value="GU">Guam</option>
											<option value="GT">Guatemala</option>
											<option value="GN">Guinea</option>
											<option value="GW">Guinea-Bissau</option>
											<option value="GY">Guyana</option>
											<option value="HT">Haiti</option>
											<option value="HM">Heard and Mc Donald Islands</option>
											<option value="VA">Holy See (Vatican City State)</option>
											<option value="HN">Honduras</option>
											<option value="HK">Hong Kong</option>
											<option value="HU">Hungary</option>
											<option value="IS">Iceland</option>
											<option value="IN">India</option>
											<option value="ID">Indonesia</option>
											<option value="IR">Iran (Islamic Republic of)</option>
											<option value="IQ">Iraq</option>
											<option value="IE">Ireland</option>
											<option value="IL">Israel</option>
											<option value="IT">Italy</option>
											<option value="JM">Jamaica</option>
											<option value="JP">Japan</option>
											<option value="JO">Jordan</option>
											<option value="KZ">Kazakhstan</option>
											<option value="KE">Kenya</option>
											<option value="KI">Kiribati</option>
											<option value="KP">Korea, Democratic People's Republic of</option>
											<option value="KR">Korea, Republic of</option>
											<option value="KW">Kuwait</option>
											<option value="KG">Kyrgyzstan</option>
											<option value="LA">Lao People's Democratic Republic</option>
											<option value="LV">Latvia</option>
											<option value="LB">Lebanon</option>
											<option value="LS">Lesotho</option>
											<option value="LR">Liberia</option>
											<option value="LY">Libyan Arab Jamahiriya</option>
											<option value="LI">Liechtenstein</option>
											<option value="LT">Lithuania</option>
											<option value="LU">Luxembourg</option>
											<option value="MO">Macau</option>
											<option value="MK">Macedonia, The Former Yugoslav Republic of</option>
											<option value="MG">Madagascar</option>
											<option value="MW">Malawi</option>
											<option value="MY">Malaysia</option>
											<option value="MV">Maldives</option>
											<option value="ML">Mali</option>
											<option value="MT">Malta</option>
											<option value="MH">Marshall Islands</option>
											<option value="MQ">Martinique</option>
											<option value="MR">Mauritania</option>
											<option value="MU">Mauritius</option>
											<option value="YT">Mayotte</option>
											<option value="MX">Mexico</option>
											<option value="FM">Micronesia, Federated States of</option>
											<option value="MD">Moldova, Republic of</option>
											<option value="MC">Monaco</option>
											<option value="MN">Mongolia</option>
											<option value="MS">Montserrat</option>
											<option value="MA">Morocco</option>
											<option value="MZ">Mozambique</option>
											<option value="MM">Myanmar</option>
											<option value="NA">Namibia</option>
											<option value="NR">Nauru</option>
											<option value="NP">Nepal</option>
											<option value="NL">Netherlands</option>
											<option value="AN">Netherlands Antilles</option>
											<option value="NC">New Caledonia</option>
											<option value="NZ">New Zealand</option>
											<option value="NI">Nicaragua</option>
											<option value="NE">Niger</option>
											<option value="NG">Nigeria</option>
											<option value="NU">Niue</option>
											<option value="NF">Norfolk Island</option>
											<option value="MP">Northern Mariana Islands</option>
											<option value="NO">Norway</option>
											<option value="OM">Oman</option>
											<option value="PK">Pakistan</option>
											<option value="PW">Palau</option>
											<option value="PA">Panama</option>
											<option value="PG">Papua New Guinea</option>
											<option value="PY">Paraguay</option>
											<option value="PE">Peru</option>
											<option value="PH">Philippines</option>
											<option value="PN">Pitcairn</option>
											<option value="PL">Poland</option>
											<option value="PT">Portugal</option>
											<option value="PR">Puerto Rico</option>
											<option value="QA">Qatar</option>
											<option value="RE">Reunion</option>
											<option value="RO">Romania</option>
											<option value="RU">Russian Federation</option>
											<option value="RW">Rwanda</option>
											<option value="KN">Saint Kitts and Nevis</option>
											<option value="LC">Saint LUCIA</option>
											<option value="VC">Saint Vincent and the Grenadines</option>
											<option value="WS">Samoa</option>
											<option value="SM">San Marino</option>
											<option value="ST">Sao Tome and Principe</option>
											<option value="SA">Saudi Arabia</option>
											<option value="SN">Senegal</option>
											<option value="SC">Seychelles</option>
											<option value="SL">Sierra Leone</option>
											<option value="SG">Singapore</option>
											<option value="SK">Slovakia (Slovak Republic)</option>
											<option value="SI">Slovenia</option>
											<option value="SB">Solomon Islands</option>
											<option value="SO">Somalia</option>
											<option value="ZA">South Africa</option>
											<option value="GS">South Georgia and the South Sandwich Islands</option>
											<option value="ES">Spain</option>
											<option value="LK">Sri Lanka</option>
											<option value="SH">St. Helena</option>
											<option value="PM">St. Pierre and Miquelon</option>
											<option value="SD">Sudan</option>
											<option value="SR">Suriname</option>
											<option value="SJ">Svalbard and Jan Mayen Islands</option>
											<option value="SZ">Swaziland</option>
											<option value="SE">Sweden</option>
											<option value="CH">Switzerland</option>
											<option value="SY">Syrian Arab Republic</option>
											<option value="TW">Taiwan, Province of China</option>
											<option value="TJ">Tajikistan</option>
											<option value="TZ">Tanzania, United Republic of</option>
											<option value="TH">Thailand</option>
											<option value="TG">Togo</option>
											<option value="TK">Tokelau</option>
											<option value="TO">Tonga</option>
											<option value="TT">Trinidad and Tobago</option>
											<option value="TN">Tunisia</option>
											<option value="TR">Turkey</option>
											<option value="TM">Turkmenistan</option>
											<option value="TC">Turks and Caicos Islands</option>
											<option value="TV">Tuvalu</option>
											<option value="UG">Uganda</option>
											<option value="UA">Ukraine</option>
											<option value="AE">United Arab Emirates</option>
											<option value="GB">United Kingdom</option>
											<option value="US">United States</option>
											<option value="UM">United States Minor Outlying Islands</option>
											<option value="UY">Uruguay</option>
											<option value="UZ">Uzbekistan</option>
											<option value="VU">Vanuatu</option>
											<option value="VE">Venezuela</option>
											<option value="VN">Viet Nam</option>
											<option value="VG">Virgin Islands (British)</option>
											<option value="VI">Virgin Islands (U.S.)</option>
											<option value="WF">Wallis and Futuna Islands</option>
											<option value="EH">Western Sahara</option>
											<option value="YE">Yemen</option>
											<option value="YU">Yugoslavia</option>
											<option value="ZM">Zambia</option>
											<option value="ZW">Zimbabwe</option>
										</select>
									</div>									
								</div>
								<div class="col-12 col-lg-6">					 
									<!-- region input-->
									<div class="form-group">
										<label>State / Province / Region</label>
										<input class="form-control" id="region" name="region" type="text" placeholder="eg. Ontario"
										class="input-xlarge">
										<p class="help-block"></p>
									</div>
									<!-- postal-code input-->
									<div class="form-group">
										<label>Zip / Postal Code</label>
										<input class="form-control" id="postal-code" name="postal-code" type="text" placeholder="L6M 1C4"
										class="input-xlarge">
										<p class="help-block"></p>
									</div>
								</div>
							</div>
							<!-- Social Media Profile questions -->
							<h3 class="page-header">Social Profile Information</h3>
							<!-- Facebook input-->
							<div class="form-group">
								<label>Facebook Page URL</label>
								<input class="form-control" id="site-name" name="full-name" type="text" placeholder="eg. https://www.facebook.com/companyname"
								class="input-xlarge">
								<p class="help-block"></p>
							</div>
							<!-- Twitter input-->
							<div class="form-group">
								<label>Twitter Page URL</label>
								<input class="form-control" id="site-name" name="full-name" type="text" placeholder="eg. https://www.twitter.com/companyname"
								class="input-xlarge">
								<p class="help-block"></p>
							</div>
							<!-- Linkedin input-->
							<div class="form-group">
								<label>Linkedin Page URL</label>
								<input class="form-control" id="site-name" name="full-name" type="text" placeholder="eg. http://www.linkedin.com/in/companyname"
								class="input-xlarge">
								<p class="help-block"></p>
							</div>
							<!-- Google+ input-->
							<div class="form-group">
								<label>Google+ Page URL</label>
								<input class="form-control" id="site-name" name="full-name" type="text" placeholder="eg. https://plus.google.com/profileidnumber"
								class="input-xlarge">
								<p class="help-block"></p>
							</div>
							<button class="btn btn-primary pull-right save" >Save</button>
						</form>
						<!--//////// Bio Information Questions ///////// -->
						<form role="form" id="about-questions" class="question-batch">
							<!-- About Us input-->
							<div class="form-group">
								<label>Tell us about your business or organization</label>
								<textarea class="form-control" id="site-name" name="full-name" type="text" class="input-xlarge" rows="5"></textarea>
								<br/>
								<!-- Help/Example -->
								<a class="btn btn-sm btn-primary" data-toggle="collapse" href="#collapseOne"><i class="icon-info-sign "></i>&nbsp;View Example</a>
								<div id="collapseOne" class="panel-collapse collapse">
									<div class="panel-body">
										<p class="help-block">
											Example: ABC Paiting Company<br/>
											<em>ABC Painters is a decorating company that has been serving Ajax, Whitby, Oshawa, Pickering and the Durham region for over eight years. ABC Painters specializes in servicing homeowners, commercial and industrial facilities in the Durham area. Our main line of work is interior and exterior painting, commercial painting and wallpapering. Therefore, although we are primarily painters and decorators we can carry other remedial work. This makes it easier for you the customer by dealing with just ONE company.</em>
										</p>
									</div>
								</div>
							</div>
							<!-- Services input-->
							<div class="form-group">
								<label>Tell us about what services or products you provide</label>
								<textarea class="form-control" id="site-name" name="full-name" type="text" class="input-xlarge" rows="5"></textarea>
								<br/>
								<!-- Help/Example -->
								<a class="btn btn-sm btn-primary" data-toggle="collapse" href="#collapseTwo"><i class="icon-info-sign "></i>&nbsp;View Example</a>
								<div id="collapseTwo" class="panel-collapse collapse">
									<div class="panel-body">
										<p class="help-block">									
											Example: ABC Paiting Company<br/>
											<em>
												<ul>
													<li>Interior & Exterior Painting</li>
													<li>Wallpapering</li>
													<li>Faux Finish Specialists</li>
													<li>Airless Spraying</li>
													<li>Textured Ceilings</li>
												</ul>
											</em>
										</p>
									</div>
								</div>
							</div>
							<!-- Competitor Websites -->
							<div class="form-group">
								<label>Who are your top competitors? </label>
								<input class="form-control" id="site-name" name="full-name" type="text" placeholder="eg. http://someotherpaintingcompany.com" class="input-xlarge">
								<br/>
								<input class="form-control" id="site-name" name="full-name" type="text" placeholder="eg. http://someotherpaintingcompany.com" class="input-xlarge">
								<br/>
								<input class="form-control" id="site-name" name="full-name" type="text" placeholder="eg. http://someotherpaintingcompany.com" class="input-xlarge">
								<p class="help-block"></p>
							</div>
							<button class="btn btn-primary pull-right save" >Save</button>
						</form>	
						<!--//////// Bio Information Questions ///////// -->
						<form role="form" id="brand-questions" class="question-batch">
							<h3 class="page-header">Upload a Logo</h3>
							<p>If you have a logo available upload it now. If you'd like one <a href="http://webninja.me/contact">contact us</a> for more information and proceed to the next step.</p>
							<div class="alert alert-warning">
								Accepted file formats: .png .jpeg .gif
							</div>
							<div class="well upload">
								<p class="lead">Drag and Drop File Here</p>
							</div>
							<div class="progress progress-striped active">
								<div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
								</div>
							</div>
							<button class="btn btn-primary btn-lg"><i class="icon-plus"></i>&nbsp;Select File</button>
							<br/>
							<br/>
							<!-- Inspiration Websites -->
							<div class="form-group">
								<label>Share a few websites you like or find inspiring. </label>
								<input class="form-control" id="site-name" name="full-name" type="text" placeholder="eg. http://someotherpaintingcompany.com" class="input-xlarge">
								<br/>
								<input class="form-control" id="site-name" name="full-name" type="text" placeholder="eg. http://someotherpaintingcompany.com" class="input-xlarge">
								<br/>
								<input class="form-control" id="site-name" name="full-name" type="text" placeholder="eg. http://someotherpaintingcompany.com" class="input-xlarge">
								<p class="help-block"></p>
							</div>
							<button class="btn btn-primary pull-right save" >Save</button>
						</form>	
						<br/>
					</div>
				</div>
			</div>
		</section> 

		<? }; // End if logged in. ?>

		<!-- End Page Section -->
		<!-- JS and analytics only. -->
	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="/app/admin/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="/resources/js/typeahead.min.js"></script>
	<script type="text/javascript" src="/app/admin/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/system/library/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="/app/admin/assets/js/app.min.js"></script>
	

	<!-- Analytics
	================================================== -->

</body>
</html>

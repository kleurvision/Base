<!DOCTYPE html> 
<html> 

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	
	<title>YellowAPI Sample Application</title>
	
	<link rel="stylesheet" href="./css/jquery.mobile-1.0b2.css" />
	<link rel="stylesheet" href="./css/style.css" />
	
	<script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.0b2/jquery.mobile-1.0b2.min.js"></script>
</head> 

<body> 

<div data-role="page" data-theme="b">

	<div data-role="header" data-theme="a">
		<h1><img src="./img/yellowapi.png" alt="YellowAPI logo" /></h1>
	</div><!-- /header -->

	<div data-role="content">
		<form action="./listing.php" method="get">
			<label for="what">​What are you looking for?</label>​
			<input type="text" name="what" />​<br />
			
			<label for="where">​Where are you looking?</label>​
			<input type="text" name="where" />​<br />
			
			<input type="submit" value="Find it!" />
		</form>
	</div><!-- /content -->
	
</div><!-- /page -->

</body>
</html>

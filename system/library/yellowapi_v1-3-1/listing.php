<?php require_once('./YellowAPI/YellowAPI.class.php'); ?>
<?php require_once('./config.inc.php'); ?>

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

<div data-role="page" data-theme="c">

	<div data-role="header">
		<h1><img src="./img/yellowapi.png" alt="YellowAPI logo" /></h1>
	</div><!-- /header -->

	<div data-role="content">
		<?php
			// Get the field value from the search form
			$what = @$_GET['what'];
			$where = @$_GET['where'];

			// Fetch search results
			$yellowAPI = new YellowAPI('en', $YELLOW_API_KEY, $YELLOW_API_UID, true);
			$result = $yellowAPI->findBusiness($what, $where);
		?>
		
		<ul data-role="listview">
		
		<!-- Make sure the response contains results -->
		<?php if ($result && !empty($result['listings'])): ?>
			<?php foreach($result['listings'] as $item): ?>
				<!-- Pass the id of the merchant to the detail page -->
				<li><a href="./details.php?id=<?php echo $item['id']; ?>&prov=<?php echo urlencode($item['address']['prov']); ?>&bus-name=<?php echo urlencode($item['name']); ?>&city=<?php echo urlencode($item['address']['city']); ?>">
					<h3><?php echo $item['name']; ?></h3>
					<p><?php echo $item['address']['street']; ?></p>
				</a></li>
			<?php endforeach; ?>
		<?php else: ?>
			<h3>Sorry, there is no result available for your search</h3>
		<?php endif;?>
		</ul>
	</div><!-- /content -->
	
</div><!-- /page -->

</body>
</html>

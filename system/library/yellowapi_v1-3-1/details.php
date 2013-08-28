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

	<div id="content" data-role="content">
		<?php
			// Get the merchant Id from the result listing
			$id = @$_GET['id'];
			$prov = @$_GET['prov'];
			$city = @$_GET['city'];
			$busName = @$_GET['bus-name'];

			// Fetch merchant details
			$yellowAPI = new YellowAPI('en', $YELLOW_API_KEY, $YELLOW_API_UID, true);
			$result = $yellowAPI->getBusinessDetails($prov, $city, $busName, $id);
		?>
		
		<header>
			<?php 
				$logo = './img/nologo.png'; 
				
				// Making sure the information is available
				if (!empty($result['logos'])) {
					if (!empty($result['logos']['EN'])) {
						$logo = $result['logos']['EN'];
					} else if (!empty($result['logos']['FR'])) {
						$logo = $result['logos']['FR'];
					}
				}
			?>
			<div class="left">
				<img src="<?php echo $logo; ?>" alt="Business logo" />
			</div>
			
			<div class="right">
				<h1><?php echo $result['name']; ?></h1>
				<p><?php echo $result['address']['street']; ?></p>
			</div>
		</header>
		
		<ul data-role="listview" class="actions">
			<li>
				<a href="tel:<?php echo $result['phones'][0]['dispNum']; ?>"><img class="ui-li-icon ui-li-thumb" src="./img/phone.png" alt=""/><?php echo $result['phones'][0]['dispNum']; ?></a>
			</li>
			
			<?php
				$website = '';

				// Making sure the information is available
				if (!empty($result['products']['webUrl'])) {
					$website = $result['products']['webUrl'][0];
				}
			?>
			
			<?php if (strlen($website) > 0): ?>
			<li>
				<a href="<?php echo $website; ?>"><img class="ui-li-icon ui-li-thumb" src="./img/globe.png" alt=""/><?php echo $website; ?></a>
			</li>
			<?php endif; ?>
			
			<li class="categories">
				<img class="ui-li-icon ui-li-thumb" src="./img/tag.png" alt=""/>Categories
				<p>
					<?php foreach($result['categories'] as $item): ?>
						<?php echo $item['name']; ?><br />
					<?php endforeach; ?>
				</p>
			</li>
			
			<?php if (!empty($result['geoCode'])): ?>
			<li>
				<a href="http://maps.google.com/maps?z=16&q=<?php echo $result['geoCode']['latitude'] . ',' . $result['geoCode']['longitude']; ?>"><img class="ui-li-icon ui-li-thumb" src="./img/flag.png" alt=""/>Show on map</a>
			</li>
			<?php endif; ?>
		</ul>
		<br />
		<?php if (!empty($result['products']['dispAd'])): ?>
			<div class="center">
				<img class="ad" src="<?php echo $result['products']['dispAd'][0]['url']?>" alt="advertisment" />
			</div>
		<?php endif; ?>
	</div><!-- /content -->
	
</div><!-- /page -->

</body>
</html>

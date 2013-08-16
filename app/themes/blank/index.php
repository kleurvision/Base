<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
<? app_head();?>
</head>
<body>

<strong> Happy Birthday From Weyland Industries </strong>

<? app_foot(); ?>  

	<!-- Load Admin Bar -->
	<? 
		global $db;
		$user = new User($db);
		$hud = $user->load_hud();
		echo $hud;
	?>
	<body>
</html>
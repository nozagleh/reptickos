<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script type="text/javascript" src="getData.js"></script>
	</head>
	<body>
		<div class="wrapper">
			<?php include_once('navigation.php'); navDate(); ?>
			<div class="main">
				<div class="container">
					<div class="recipe_box"><table><tbody></tbody></table></div>
				</div>
			</div>
			<div class="footer">
				
			</div>
		</div>
	</body>
</html>

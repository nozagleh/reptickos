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
			<?php include_once('navigation.php'); navAdd(); ?>
			<div class="main">
				<div class="container">
					<form id="insertNew">
						<input name="storeName" id ="storeName" class="add" placeholder="Name of Store"/><br />
						<input name="amount" class="add medium_input" type="number" placeholder="Amount"/><input name="currency" id="curr" class="add small_input" placeholder="SEK"/><br />
						<input name="type" id="type" class="add" placeholder="Type of Reciept"/><br />
						<button id="btnInsert" type="submit">Add</button>
					</form>
				</div>
			</div>
			<div class="footer">
				
			</div>
		</div>
	</body>
</html>

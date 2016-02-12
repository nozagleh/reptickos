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
			<div class="header">
				<div class="header_bar">
					<div class="header_logo"><h1 class="h1_darkred">Reptickos</h1></div>
					<div class="header_login"><h3>Login</h3></div>
				</div>
				<div class="header_main">
					<div class="header_sum">
						<input id="datepicker" class="class_dp" readonly />
						<h2 id="gen_amount" class="h2_blue"></h2><!--<input id="currencypicker" class="class_dp" placeholder="AAA"/>-->
					</div>
					<div class="header_menu">
						<ul>
							<li><a href="">Add</a></li>
							<li><a href="">Day</a></li>
							<li><a href="">Range</a></li>
							<li><a href="">Type</a></li>
							<li><a href="">Statistics</a></li>
							<li><a href="">All</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="main">
				<div class="container">
					<form action="bullshit.php">
						<input name="storeName" id ="storeName" class="add" placeholder="Name of Store"/><br />
						<input name="amount" class="add medium_input" placeholder="Amount"/><input name="currency" id="curr" class="add small_input" placeholder="SEK"/><br />
						<input name="type" class="add" placeholder="Type of Reciept"/><br />
						<button type="submit">Add</button>
					</form>
				</div>
			</div>
			<div class="footer">
				
			</div>
		</div>
	</body>
</html>

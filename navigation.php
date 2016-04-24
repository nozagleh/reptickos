<?php

function navDate(){
	//navigation HTML
echo '<div class="header">
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
							<li><a href="index.php">Home</a></li>
							<li><a href="insert.php">Add</a></li>
							<li class="active"><a href="">Day</a></li>
							<li><a href="">Range</a></li>
							<li><a href="">Type</a></li>
							<li><a href="">Statistics</a></li>
							<li><a href="">All</a></li>
						</ul>
					</div>
				</div>
			</div>';
}

function navRecieptName($rname,$rdate){
		//navigation HTML
echo '<div class="header">
				<div class="header_bar">
					<div class="header_logo"><h1 class="h1_darkred">Reptickos</h1></div>
					<div class="header_login"><h3>Login</h3></div>
				</div>
				<div class="header_main">
					<div class="header_sum">
						<h2>' . $rname . '</h2>
						<input id="datepicker" class="class_dp" value="' . $rdate . '" readonly />
						<h2 id="gen_amount" class="h2_blue"></h2><!--<input id="currencypicker" class="class_dp" placeholder="AAA"/>-->
					</div>
					<div class="header_menu">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="insert.php">Add</a></li>
							<li><a href="">Day</a></li>
							<li><a href="">Range</a></li>
							<li><a href="">Type</a></li>
							<li><a href="">Statistics</a></li>
							<li><a href="">All</a></li>
						</ul>
					</div>
				</div>
			</div>';
}

function navAdd(){
	echo '<div class="header">
				<div class="header_bar">
					<div class="header_logo"><h1 class="h1_darkred">Reptickos</h1></div>
					<div class="header_login"><h3>Login</h3></div>
				</div>
				<div class="header_main">
					<div class="header_sum">
						<input id="datepicker" class="class_dp" readonly />
					</div>
					<div class="header_menu">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li class="active"><a href="insert.php">Add</a></li>
							<li><a href="">Day</a></li>
							<li><a href="">Range</a></li>
							<li><a href="">Type</a></li>
							<li><a href="">Statistics</a></li>
							<li><a href="">All</a></li>
						</ul>
					</div>
				</div>
			</div>';
}

?>
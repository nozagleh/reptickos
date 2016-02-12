<?php
	$storeName = $_GET["storeName"];
	$amount = $_GET["amount"];
	$curr = $_GET["currency"];
	$type = $_GET["type"];
	$date = $_GET["date"]
	include_once('getDate.php');
	$conn = new Connector();
	
	$a = $conn->insertReciept($storeName, $amount, $curr, $date, $type);
?>
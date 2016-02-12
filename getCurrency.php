<?php
	$curr = $_GET["currency"];
	include_once('getDate.php');
	$conn = new Connector();
	
	$a = $conn->getCurrencyList($curr);
?>
<?php
	$store = $_GET["storeHint"];
	include_once('getDate.php');
	$conn = new Connector();

	$a = $conn->getStoreName($store);
?>
<?php
	include_once('getDate.php');
	$date = $_GET["date"];
	$conn = new Connector();

	$a = $conn->getDate($date);
?>
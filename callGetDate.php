<?php
	$date = $_GET["date"];
	include_once('getDate.php');
	$conn = new Connector();

	$a = $conn->getDate($date);
?>
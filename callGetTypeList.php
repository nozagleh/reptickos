<?php
	$type = $_GET["typeName"];
	include_once('getDate.php');
	$conn = new Connector();

	$a = $conn->getTypeList($type);
?>
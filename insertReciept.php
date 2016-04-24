<?php
	session_start();

	include_once('dbConnection.php');
	DBConnection();

	$storeName = $_POST["storeName"];
	$amount = $_POST["amount"];
	$curr = $_POST["currency"];
	$type = $_POST["type"];
	$date = $_POST["date"]
	
	try{
		$stm = $db->prepare("INSERT INTO reciept");
	}catch (PDOException $e){
		echo "<p>" . $e->getMessage() . "</p>";
	}
?>
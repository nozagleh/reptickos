<?php
	$db = null;

	function DBConnection(){

		global $db;
		
		$host = "127.0.0.1";
		$dbName = "spendingMonth";
		$user = "root";
		$pass = "";

		try {
			$db = new PDO("mysql:host=".$host.";dbname=".$dbName.";charset=utf8;",$user,$pass);
		} catch (Exception $e) {
			echo "<p>" . $e->getMessage() . "</p>";
		}
		
	}
?>
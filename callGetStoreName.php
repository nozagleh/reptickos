<?php
	$store = $_GET["storeHint"];
	include_once('dbConnect.php');
	DBConnection();

	$store = strtolower($store);
	$store = "$store%";

	try {
		$stm = $db->prepare("SELECT `store`.`storeName` FROM `store` WHERE `storeName` LIKE :store ;");
		$stm->bindParam(":store", $store);
		$stm->execute();
		$arr = array();
		foreach($stm as $row){
			$arr[] = strtolower($row[0]);
		}
		echo json_encode($arr);
	} catch (PDOException $e) {
		echo "<p>" . $e->getMessage() . "</p>";
	}
?>
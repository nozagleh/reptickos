<?php
	$type = $_GET["typeName"];
	include_once('dbConnect.php');
	DBConnection();

	$type = strtolower($type);
	$type = "$type%";

	try {
		$stm = $db->prepare("SELECT `type`.`typeName` FROM `type` WHERE `typeName` LIKE :type ;");
		$stm->bindParam(":type", $type);
		$stm->execute();
		$arr = array();
		foreach($stm as $row){
			$arr[] = $row[0];
		}
		echo json_encode($arr);
	} catch (PDOException $e) {
		echo "<p>" . $e->getMessage() . "</p>";
	}
?>
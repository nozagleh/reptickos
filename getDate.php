<?php
include_once('dbConnect.php');
DBConnection();

$date = $_GET["date"];
//$conn = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf8;",self::$user,self::$pass);
try{
	$stm = $db->prepare("SELECT SUM(`reciept`.`amount`),`reciept`.`date`,`store`.`storeName`,`type`.`typeName`, `reciept`.`id` FROM `reciept`
		INNER JOIN `store` ON `reciept`.`FK_store` = `store`.`id`
		INNER JOIN `type` ON `reciept`.`FK_type` = `type`.`id`
		WHERE `reciept`.`date` = :date GROUP BY `store`.`storeName`;");
	$stm->bindParam(":date", $date);
	$stm->execute();
	$arr = array();
	$tempArr = array();
	//echo '<div class="recipe_box"><table><tbody>';
	foreach($stm as $row){
		//echo '<tr><td><h4 class="itemname">' . $row[2] . '</td><td><h5 class="itemname">' . $row[0] . '</td><td><h3 class="itemname">' . $row[3] . '</td></tr>';
		$tempArr[0] = $row[0];
		$tempArr[1] = $row[2];
		$tempArr[2] = $row[3];
		$tempArr[3] = $row[4];
		$tempArr[4] = $row[1];

		$arr[] = $tempArr;
	}

	//echo '</tbody></table></div>';
	echo json_encode($arr);
			
}catch(PDOException $e){
	echo "<p>" . $e->getMessage() . "</p>";
}


/*function getDateSum(){
	$conn = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf8;",self::$user,self::$pass);
	try {
		$stm = $conn->prepare("SELECT SUM(`amount`) FROM `reciept` WHERE `date` = :date ;");
		$stm->bindParam(":date", $date);
		$stm->execute();
		foreach($stm as $row){
			echo($row[0]);
		}
	} catch (PDOException $e) {
		echo "<p>" . $e->getMessage() . "</p>";
	}
}

function getCurrencyList($curr){
	$curr = strtoupper($curr);
	$curr = "$curr%";

	$conn = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf8;",self::$user,self::$pass);
	try {
		$stm = $conn->prepare("SELECT `currency`.`currencyAcr` FROM `currency` WHERE `currencyAcr` LIKE :curr ;");
		$stm->bindParam(":curr", $curr);
		$stm->execute();
		$arr = array();
		foreach($stm as $row){
			$arr[] = $row[0];
		}
		echo json_encode($arr);
	} catch (PDOException $e) {
		echo "<p>" . $e->getMessage() . "</p>";
	}
}

function insertReciept($storeName, $amount, $currency, $date, $type){
	
}*/
?>
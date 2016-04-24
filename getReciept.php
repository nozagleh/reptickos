<?php
	include_once('dbConnect.php');
	DBConnection();

	$rid = $_GET['rid'];

	function getReciept(){
		
	}
	//<div class="recipe_box"><table><tbody></tbody></table></div>
	try{
	$stm = $db->prepare("SELECT SUM(`reciept`.`amount`),`reciept`.`date`,`store`.`storeName`,`type`.`typeName`, `reciept`.`id` FROM `reciept`
		INNER JOIN `store` ON `reciept`.`FK_store` = `store`.`id`
		INNER JOIN `type` ON `reciept`.`FK_type` = `type`.`id`
		WHERE `reciept`.`id` = :rid");
	$stm->bindParam(":rid", $rid);
	$stm->execute();
	$tempArr = array();
	//echo '<div class="recipe_box"><table><tbody>';
	foreach($stm as $row){
		//echo '<tr><td><h4 class="itemname">' . $row[2] . '</td><td><h5 class="itemname">' . $row[0] . '</td><td><h3 class="itemname">' . $row[3] . '</td></tr>';
		$tempArr[0] = $row[0];
		$tempArr[1] = $row[2];
		$tempArr[2] = $row[3];
		$tempArr[3] = $row[4];

		echo('<tr><td><h1 class="h1_darkred">' . $row[2] . '</h1></td></tr><tr id="' . $row[4] . '"><td><h5 class="itemname">' . $row[0] . ' SEK</h5></td><td><h3 class="itemname">' . $row[3] . '</h3></td></tr>');
	}

	//echo '</tbody></table></div>';
	
			
	}catch(PDOException $e){
	echo "<p>" . $e->getMessage() . "</p>";
	}
?>
<?php
	class Connector{
		private static $host = "127.0.0.1";
		private static $dbName = "spendingMonth";
		private static $user = "root";
		private static $pass = "";
		

		function Connector(){
			
		}

		//$date = $_POST["d"];
		function getDate($date){
			$conn = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf8;",self::$user,self::$pass);
			try{
				$stm = $conn->prepare("SELECT SUM(`reciept`.`amount`),`reciept`.`date`,`store`.`storeName`,`type`.`typeName`, `reciept`.`id` FROM `reciept`
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

					$arr[] = $tempArr;
				}

				//echo '</tbody></table></div>';
				echo json_encode($arr);
						
			}catch(PDOException $e){
				echo "<p>" . $e->getMessage() . "</p>";
			}
		}

		function getDateSum(){
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

		function getStoreName($store){
			$conn = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf8;",self::$user,self::$pass);
			try {
				$stm = $conn->prepare("SELECT `store`.`storeName` FROM `store` WHERE `storeName` LIKE ':date%';");
				$stm->bindParam(":date", $date);
				$stm->execute();
				foreach($stm as $row){
					echo($row[0]);
				}
			} catch (PDOException $e) {
				echo "<p>" . $e->getMessage() . "</p>";
			}
		}
	}
?>
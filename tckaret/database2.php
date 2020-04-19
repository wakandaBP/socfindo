<?php
	
	Class Database{
		static $connection, $query, $result, $rowCount, $lastInsertId, $qStrings;
		public function __construct($query, $parameter = array()){
			try{
				self::$qStrings = self::parseQuery($query, $parameter);
				self::$connection = new PDO("sqlsrv:server=" . _DBSERVER_ . ", " . _DBPORT_ . ";database=" . _DBNAME_ , _DBUSER_ , _DBPASS_);
				self::$query = self::$connection->prepare($query);
				self::$query->execute($parameter);
				self::$result = self::$query->fetchAll(PDO::FETCH_ASSOC);
				self::$rowCount = self::$query->rowCount();
				self::$lastInsertId = self::$connection->lastInsertId();
			}
			catch(PDOException $e){
				echo "<pre>";
				print_r($e);
				echo "</pre>";
			}
		}


		public function parseQuery($query, $parameter = array()){
			$temp = explode("?", $query);
			$concated = "";
			for ($a = 0; $a < count($temp); $a++) {
				if($a < count($temp) - 1){
					$concated .= $temp[$a] . "\"" . $parameter[$a] . "\"";
				}
				else{
					$concated .= $temp[$a];
				}
			}
			return trim($concated);
		}
	}

?>
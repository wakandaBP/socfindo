<?php 
	require "../config.php";
	require "../database.php";

	$MetaData = array();
	$query = new Database("SELECT a.id, b.name as plantation, d.blocknumber as block, a.treecode, 
						a.yearofplanting as year, c.clonename as clone, a.line, a.gps, a.certified, 
						a.certificatenumber, a.isactive 
						FROM karet_tree a 
						JOIN karet_plantation b ON a.idplantation = b.id 
						JOIN karet_clone c ON a.clonename = c.id 
						JOIN karet_plantation_block d ON a.block = d.id
						WHERE a.isactive = ? ORDER BY a.id DESC",array(1));

	foreach ($query::$result as $key => $value) {
		$last_updated = "";
		if (isset($_POST['id']) != ""){
			if ($_POST['id'] == $value['id']){
				$last_updated = "last_updated";
			}
		}

		$certified = $value['certified'];
		$certinumber = $value['certificatenumber'];
		if ($certified == 'NULL' OR $certified == ''){
			$certified = "-";
			$certinumber = "-";
		}

		array_push($MetaData, 
			array(
				"id"=>$value["id"], 
				"plantation"=>$value["plantation"],
				"block"=>$value["block"],
				"treecode"=>$value["treecode"],
				"year"=>$value["year"],					// = year of planting
				"clone"=>$value["clone"],
				"line"=>$value["line"],
				"gps"=>$value["gps"],
				"certified"=>$certified,
				"certificatenumber"=>$certinumber,
				"isactive"=>$value["isactive"],
				"last_updated"=>$last_updated
			)
		);
	}

	$returnData = array(
				"draw"=>1,
				"recordsTotal"=>intval($query::$rowCount),
				"recordsFiltered"=>intval($query::$rowCount),
				"data"=>$MetaData
			);
	
	echo json_encode($returnData);
?>
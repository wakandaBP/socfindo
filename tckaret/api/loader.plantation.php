<?php 
	require "../config.php";
	require "../database.php";

	$MetaData = array();
	$query = new Database("SELECT a.id, a.name, a.isactive, a.description, b.name as region 
							FROM karet_plantation a 
							JOIN karet_plantation_region b ON b.id = a.region
							WHERE a.isactive = ?",array("1"));

	foreach ($query::$result as $key => $value) {
		$last_updated = "";
		if ($_POST['id'] != ""){
			if ($_POST['id'] == $value['id']){
				$last_updated = "last_updated";
			}
		}
		
		array_push($MetaData, 
			array(
				"id"=>$value["id"], 
				"name"=>$value["name"],
				"region"=>$value['region'],
				"status"=>$value["isactive"], 
				"description"=>$value["description"],
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
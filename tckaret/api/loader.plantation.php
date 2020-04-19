<?php 
	require "../config.php";
	require "../database.php";

	$MetaData = array();
	$query = new Database("SELECT * FROM karet_plantation WHERE isactive = ?",array("1"));

	foreach ($query::$result as $key => $value) {
		array_push($MetaData, 
			array(
				"id"=>$value["id"], 
				"name"=>$value["name"],
				"status"=>$value["isactive"], 
				"description"=>$value["description"]
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
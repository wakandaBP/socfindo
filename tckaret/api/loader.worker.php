<?php 
	require "../config.php";
	require "../database.php";

	$MetaData = array();
	$query = new Database("SELECT a.id, a.name, a.kode_employee as kode, a.initial, a.description, 
							a.status FROM karet_worker a WHERE a.isactive = ? ORDER BY id DESC",array("1"));

	foreach ($query::$result as $key => $value) {
		$last_updated = "";
		if ($_POST['id'] != ""){
			if ($_POST['id'] == $value['id']){
				$last_updated = "last_updated";
			}
		}

		array_push($MetaData, 
			array(
				"id"=>$value['id'],
				"kode"=>$value["kode"], 
				"nama"=>$value["name"],
				"initial"=>$value['initial'],
				"status"=>$value['status'],
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
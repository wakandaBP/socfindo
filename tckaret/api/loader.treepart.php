<?php 
	require "../config.php";
	require "../database.php";

	$MetaData = array();
	$query = new Database("SELECT * FROM karet_treepart WHERE isactive = ? ORDER BY id DESC",array("1"));

	foreach ($query::$result as $key => $value) {
		$last_updated = "";
		if (isset($_POST['id']) != ""){
			if ($_POST['id'] == $value['id']){
				$last_updated = "last_updated";
			}
		}

		array_push($MetaData, 
			array(
				"id"=>$value["id"], 
				"partname"=>$value["partname"],
				"description"=>$value["description"],
				"status"=>$value["isactive"],
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
<?php 
	require "../config.php";
	require "../database.php";

	$MetaData = array();
	$dataBlock = array();

	$block = "";

	if (isset($_POST['idblock'])){
		$query = new Database("SELECT * FROM karet_plantation_block WHERE id = ? AND isactive = ?",array($_POST["idblock"],"1"));
		$block = true;
	} elseif (isset($_POST['idplantation'])) {
		$query = new Database("SELECT * FROM karet_plantation_block WHERE idplantation = ? AND isactive = ?",array($_POST["idplantation"],"1"));
		$block = false;
	}

	foreach ($query::$result as $key => $value) {
		array_push($MetaData, 
			array(
				"idblock"=>$value["id"], 
				"plantation"=>$value["idplantation"],
				"blocknumber"=>$value["blocknumber"], 
				"description"=>$value["description"]
			)
		);
	}

	$dataBlock = $MetaData;

	$returnData = array(
				"draw"=>1,
				"recordsTotal"=>intval($query::$rowCount),
				"recordsFiltered"=>intval($query::$rowCount),
				"data"=>$MetaData
			);
	
	if ($block == false){
		echo json_encode($returnData);
	} else {
		echo json_encode($dataBlock);
	}
?>
<?php 
	require "../config.php";
	require "../database.php";

	$MetaData = array();
	$query = new Database("SELECT * FROM karet_plantation_block WHERE idplantation = ? AND isactive = ?",array($_POST['idplantation'],"1"));

	foreach ($query::$result as $key => $value) {
		array_push($MetaData, 
			array(
				"id"=>$value["id"], 
				"blocknumber"=>$value["blocknumber"]
			)
		);
	}

	echo json_encode($MetaData);
?>
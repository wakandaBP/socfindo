<?php 
	require "../../config.php";
	require "../../database.php";
	require "../../all_function.php";

	$MetaData = array();
	$query = new Database("SELECT * FROM karet_initiation_obs
								WHERE id = ? AND isactive = ? AND isavailable = ?",array($_POST['id'],1,1));

	foreach ($query::$result as $key => $value) {
		array_push($MetaData, 
			array(
				"id"=>$value["id"], 
				"idtreatment"=>$value["id_treatment"],
				"obsdate"=>$value["obsdate"],
				"obsworker"=>$value["obsworker"],
				"notreact"=>$value['piecesnotreact'],
				"alotof"=>$value['alotofcallus'],
				"littlebit"=>$value['littlebitofcallus'],
				"yellow"=>$value['yellow'],
				"white"=>$value['white'],
				"orange"=>$value['orange'],
				"brown"=>$value['brown'],
				"dead"=>$value['dead']
			)
		);
	}

	/*$returnData = array(
				"draw"=>1,
				"recordsTotal"=>intval($query::$rowCount),
				"recordsFiltered"=>intval($query::$rowCount),
				"data"=>$MetaData
			);*/
	echo json_encode($MetaData);

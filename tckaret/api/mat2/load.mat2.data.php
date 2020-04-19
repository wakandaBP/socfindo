<?php 
	require "../../config.php";
	require "../../database.php";
	require "../../all_function.php";
	require "../../myfunction.php";

	$MetaData = array();
	$query = new Database("SELECT * FROM karet_embryo_maturation_2 WHERE id = ? "
							,array($_POST['id']));

	foreach ($query::$result as $key => $value) {
		//$worker = getWorkerInitial($value['screening_worker']);

		array_push($MetaData, 
			array(
				"id"=>$value['id'],
				"idembryo"=>$value["id_embryo"], 
				"transdate"=>$value["transferdate"],
				"worker"=>$value['maturation2_worker'],
				"laminar"=>$value['laminar'],
				"culroom"=>$value['cultureroom'],
				"nobox"=>$value['nobox'],
				"comment"=>$value['comment']
			)
		);
	}

	echo json_encode($MetaData);
?>
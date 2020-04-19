<?php 
	require "../config.php";
	require "../database.php";
	require "../all_function.php";
	require "../myfunction.php";

	$MetaData = array();
	$query = new Database("SELECT DISTINCT (id_treatment) as id, MAX(screening_date) as lastdate, 
							MAX(screening_checkpoint) as cekpoin
							FROM karet_embryo_screening WHERE isactive = ? GROUP BY id_treatment"
							,array("1"));

	foreach ($query::$result as $key => $value) {
		$embryo = new Database("SELECT SUM(grow_embryo) as embryo FROM karet_embryo_screening WHERE id_treatment = ?",array($value['id']));
		$totalem = $embryo::$result[0]['embryo'];	
		
		$cekmedia = new Database("SELECT * FROM karet_transcallus WHERE id_treatment = ?",array($value['id']));
		$idmedia = $cekmedia::$result[0]['id_mediatranslog'];

		if ($idmedia != NULL AND $idmedia != ""){
			$media = getMedia($idmedia);

			array_push($MetaData, 
				array(
					"id"=>$value["id"], 
					"lastdate"=>DateToIndo($value["lastdate"]),
					"checkpoint"=>$value["cekpoin"],
					"embryo"=>$totalem,
					"petri"=>$media['petridish']
				)
			);
		}
	}

	$returnData = array(
				"draw"=>1,
				"recordsTotal"=>intval($query::$rowCount),
				"recordsFiltered"=>intval($query::$rowCount),
				"data"=>$MetaData
			);
	echo json_encode($returnData);
?>
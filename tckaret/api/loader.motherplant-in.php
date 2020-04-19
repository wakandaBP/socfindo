<?php 
	require "../config.php";
	require "../database.php";

	$MetaData = array();
	$query = new Database("SELECT * FROM karet_motherplant_in WHERE isactive = ? AND is_available = ?"
							,array(1,1));

	foreach ($query::$result as $key => $value) {
		$dataEm = new Database("SELECT * FROM karet_embryo WHERE id = ?",array($value['id_embryo']));
		$idTreat = $dataEm::$result[0]['id_treatment'];

		$dataTreat = new Database("SELECT * FROM karet_initiation WHERE id_treatment = ?",array($idTreat));
		$idRecep = $dataTreat::$result[0]['id_reception'];

		$dataRecep = new Database("SELECT * FROM karet_reception WHERE id = ?",array($idRecep));
		$harvestdate = strtotime($dataRecep::$result[0]['harvestdate']);
		$season = $bulan[intval(date("m", $harvestdate)) - 1];

		$clone = new Database("SELECT * FROM karet_clone WHERE id = ?",array($dataRecep::$result[0]['clone']));
		$clonename = $clone::$result[0]['clonename'];

		$germ = new Database("SELECT * FROM karet_embryo_germination_prepare WHERE id_embryo = ?",array($value['id_embryo']));


		array_push($MetaData, 
			array(
				"idEm"=>$value["id_embryo"], 
				"idTreat"=>$idTreat,
				"idRecep"=>$idRecep,
				"year"=>date("Y", $harvestdate),
				"season"=>$season,
				"clone"=>$clonename,
				"germdate"=>$germ::$result[0]['germ_date'],
				"codese"=>$value['codese'],
				"leafsample"=>$value['leafsample'],
				"resultofident"=>$value['resultofident']
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
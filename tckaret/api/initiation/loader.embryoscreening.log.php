<?php 
	require "../../config.php";
	require "../../database.php";
	require "../../all_function.php";
	require "../../myfunction.php";

	$MetaData = array();
	$query = new Database("SELECT a.id, a.id_treatment, a.screening_date, a.screening_worker, a.grow_embryo,
							a.screening_checkpoint, a.comment, a.idcontaminationrecord
							FROM karet_initiation_embryo_screening a
							--JOIN karet_initation_trans b ON b.id_treatment = a.id_treatment
							WHERE a.id_initiation_trans = ? AND a.isactive = 1 
							ORDER BY screening_checkpoint DESC"
							,array($_POST['id'],1));

	foreach ($query::$result as $key => $value) {
		$worker = getWorkerInitial($value['screening_worker']);
		$cont = getContamination($value['idcontaminationrecord']);

		array_push($MetaData, 
			array(
				"id"=>$value["id"],
				"idtreatment"=>$value["id_treatment"], 
				"date"=>$value["screening_date"],
				"worker"=>$worker['initial'],
				"checkpoint"=>$value["screening_checkpoint"],
				"embryo"=>$value['grow_embryo'],
				"fungi"=>$cont['fungi'],
				"bact"=>$cont['bact'],
				"pink"=>$cont['pink'],
				"dead"=>$cont['dead']
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
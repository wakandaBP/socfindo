<?php 
	require "../../config.php";
	require "../../database.php";
	require "../../all_function.php";
	require "../../myfunction.php";

	$MetaData = array();
	$query = new Database("SELECT a.id, a.id_treatment, a.screening_date, a.screening_worker, a.grow_embryo,
							a.screening_checkpoint, a.comment, b.contamination_bact as bact, 
							b.contamination_fungi as fungi, b.pink, b.dead
							FROM karet_initiation_embryo_screening a 
							JOIN karet_contamination_record b ON b.id = a.idcontaminationrecord
							WHERE (b.contamination_bact != 0 OR b.contamination_fungi != 0 OR b.pink != 0 OR b.dead != 0) AND a.isactive = 1 
							ORDER BY a.screening_checkpoint DESC"
							,array());

	foreach ($query::$result as $key => $value) {
		$worker = getWorkerInitial($value['screening_worker']);

		array_push($MetaData, 
			array(
				"id"=>$value['id'],
				"idtreatment"=>$value["id_treatment"], 
				"date"=>DateToEngText($value["screening_date"]),
				"worker"=>$worker['initial'],
				"checkpoint"=>$value["screening_checkpoint"],
				"embryo"=>$value['grow_embryo'],
				"fungi"=>$value['fungi'],
				"bact"=>$value['bact'],
				"pink"=>$value['pink'],
				"dead"=>$value['dead']
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
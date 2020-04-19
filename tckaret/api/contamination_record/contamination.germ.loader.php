<?php 
	require "../../config.php";
	require "../../database.php";
	require "../../all_function.php";
	require "../../myfunction.php";

	$MetaData = array();
	$query = new Database("SELECT a.id, a.id_embryo, a.screening_date, a.screening_worker,
							a.screening_checkpoint, a.comment, b.contamination_bact as bact, 
							b.contamination_fungi as fungi, b.pink, b.dead
							FROM karet_embryo_germination_screening a 
							JOIN karet_contamination_record b ON b.id = a.idcontaminationrecord
							WHERE (b.contamination_bact != 0 OR b.contamination_fungi != 0 OR b.pink != 0 OR b.dead != 0) AND a.isactive = 1 
							ORDER BY screening_checkpoint DESC"
							,array());

	foreach ($query::$result as $key => $value) {
		$worker = getWorkerInitial($value['screening_worker']);

		$fungi = $bact = $pink = $dead = "No";

		if ($value['fungi'] == 1){
			$fungi = "Yes";
		}

		if ($value['bact'] == 1){
			$bact = "Yes";
		}

		if ($value['pink'] == 1){
			$pink = "Yes";
		}

		if ($value['dead'] == 1){
			$dead = "Yes";
		}

		array_push($MetaData, 
			array(
				"id"=>$value['id'],
				"idembryo"=>$value["id_embryo"], 
				"date"=>DateToEngText($value["screening_date"]),
				"worker"=>$worker['initial'],
				"checkpoint"=>$value["screening_checkpoint"],
				"fungi"=>$fungi,
				"bact"=>$bact,
				"pink"=>$pink,
				"dead"=>$dead
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
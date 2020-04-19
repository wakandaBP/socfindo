<?php 
	require "../../config.php";
	require "../../database.php";
	require "../../all_function.php";
	require "../../myfunction.php";

	$MetaData = array();
	$query = new Database("SELECT * FROM karet_embryo_maturation2_screening
							WHERE id_embryo = ?
							ORDER BY screening_checkpoint DESC"
							,array($_POST['id'],1));

	foreach ($query::$result as $key => $value) {
		$worker = getWorkerInitial($value['screening_worker']);
		$cont = getContamination($value['idcontaminationrecord']);

		$fungi = "No";
		if ($cont['fungi'] == 1){
			$fungi = "Yes";
		}

		$bact = "No";
		if ($cont['bact'] == 1){
			$bact = "Yes";
		}

		$pink = "No";
		if ($cont['pink'] == 1){
			$pink = "Yes";
		}

		$dead = "No";
		if ($cont['dead'] == 1){
			$dead = "Yes";
		}

		array_push($MetaData, 
			array(
				"idlog"=>$value['id'],
				"idembryo"=>$value["id_embryo"], 
				"date"=>$value["screening_date"],
				"worker"=>$worker['initial'],
				"checkpoint"=>$value["screening_checkpoint"],
				"comment"=>$value['comment'],
				"fungi"=>$fungi,
				"bact"=>$bact,
				"pink"=>$pink,
				"dead"=>$dead,
				"contcomment"=>$cont['comment']
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
<?php 
	require "../../config.php";
	require "../../database.php";
	require "../../all_function.php";
	require "../../myfunction.php";

	$MetaData = array();
	$query = new Database("SELECT * FROM karet_embryo_germination_screening
							WHERE id = ? 
							ORDER BY screening_checkpoint DESC"
							,array($_POST['id'],1));

	foreach ($query::$result as $key => $value) {
		//$worker = getWorkerInitial($value['screening_worker']);
		$cont = getContamination($value['idcontaminationrecord']);

		$r = $value['screening_checkpoint'];

		if ($r == 1){
			$r = $r . "st";
		} elseif ($r == 2){
			$r = $r . "nd";
		} elseif ($r == 3) {
			$r = $r . "rd";
		} else {
			$r = $r . "th";
		}

		array_push($MetaData, 
			array(
				"idlog"=>$value['id'],
				"idembryo"=>$value["id_embryo"], 
				"date"=>$value["screening_date"],
				"worker"=>$value['screening_worker'],
				"checkpoint"=>$r,
				"comment"=>$value['comment'],
				"fungi"=>$cont['fungi'],
				"bact"=>$cont['bact'],
				"pink"=>$cont['pink'],
				"dead"=>$cont['dead'],
				"contcomment"=>$cont['comment']
			)
		);
	}

	echo json_encode($MetaData);
?>
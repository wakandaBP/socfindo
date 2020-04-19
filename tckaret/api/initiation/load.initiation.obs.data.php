<?php 
	require "../../config.php";
	require "../../database.php";
	require "../../all_function.php";

	$MetaData = array();

	$query = new Database("SELECT * FROM karet_initiation_obs WHERE id = ?",array($_POST['id']));
	$data = $query::$result[0];

	$query2 = new Database("SELECT * FROM karet_contamination_record WHERE id = ?",array($data['idcontaminationrecord']));
	$cont = $query2::$result[0];

	$query3 = new Database("SELECT * FROM karet_initiation WHERE id_treatment = ?",array($data['id_treatment']));
	$treat = $query3::$result[0];

	$MetaData = array(
					"id"=>$data['id'],
					"idtreatment"=>$data['id_treatment'],
					"obsdate"=>$data['obsdate'],
					"obsworker"=>$data['obsworker'],
					"alotof"=>$data['alotofcallus'],
					"littlebit"=>$data['littlebitofcallus'],
					"yellow"=>$data['yellow'],
					"white"=>$data['white'],
					"orange"=>$data['orange'],
					"brown"=>$data['brown'],
					"dead"=>$data['dead'],
					"notreact"=>$data['piecesnotreact'],
					//"idcontaminationrecord"=>$query::$result[0]['idcontaminationrecord']
					"fungi"=>$cont['contamination_fungi'],
					"bact"=>$cont['contamination_bact'],
					"remain_media"=>$treat['remaining_petri'],
					"obs_sample"=>$data['alotofcallus'] + $data['littlebitofcallus']
				);

	echo json_encode($MetaData); 
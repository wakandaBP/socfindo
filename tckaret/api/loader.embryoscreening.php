<?php 
	require "../config.php";
	require "../database.php";
	require "../all_function.php";
	require "../myfunction.php";

	$MetaData = array();

	if (isset($_POST['awal']) && isset($_POST['akhir']) && $_POST['awal'] != "" && $_POST['akhir'] != ""){
		$query = new Database("SELECT * FROM karet_initiation_trans WHERE isactive = ? 
								AND transferdate BETWEEN ? AND ? 
								ORDER BY transferdate DESC",array("1",$_POST['awal'],$_POST['akhir']));
	} else {
		$query = new Database("SELECT * FROM karet_initiation_trans WHERE isactive = ? 
								ORDER BY transferdate DESC",array("1"));
	}

	foreach ($query::$result as $key => $value) {
		$worker = getWorkerInitial($value['transferworker']);
		$laminar = getLaminar($value['laminar']);

		$query2 = new Database("SELECT MAX(screening_date) as maxdate, MAX(screening_checkpoint) as cekpoin 
								FROM karet_initiation_embryo_screening WHERE id_initiation_trans = ?",array($value['id']));
		
		$lastdate = $query2::$result[0]['maxdate'];
		$cekpoin = $query2::$result[0]['cekpoin'];

		if ($lastdate == NULL AND $cekpoin == NULL){
			$lastdate = "-";
			$cekpoin = "-";
		}

		$query3 = new Database("SELECT * FROM karet_initiation_embryo_grow WHERE id_initiation_trans = ?",array($value['id']));

		$growem = "0";
		$remainem = "0";

		if ($query3::$rowCount > 0){
			$growem = $query3::$result[0]['growing_embryo'];
			$remainem = $query3::$result[0]['remaining_embryo'];
		}
	
		$lastmediadate = $value['transferdate'];
		if ($value['idpengeluaranmedia'] != ""){
			$media_data = new Database("SELECT * FROM karet_media_pengeluaran WHERE id = ?",array($value['idpengeluaranmedia']));

			$lastmedia = $media_data::$result[0];
			$lastmediadate = date("Y-m-d", strtotime($lastmedia['tglkeluar']));
		}
	
		array_push($MetaData, 
			array(
				"id"=>$value["id"], 
				"idtreatment"=>$value["id_treatment"],
				"callustrans"=>$value["callustransfer"],
				"transdate"=>$value["transferdate"],
				"transworker"=>$worker['initial'],
				"laminar"=>$laminar['nolaminar'],
				"lastdate"=>$lastdate,
				"cekpoin"=>$cekpoin,
				"growembryo"=>$growem,
				"remainembryo"=>$remainem,
				"idpengeluaranmedia"=>$value['idpengeluaranmedia'],
				"lastmedia"=>$lastmediadate
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
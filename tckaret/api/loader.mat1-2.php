<?php 
	require "../config.php";
	require "../database.php";
	require "../myfunction.php";

	$MetaData = array();
	/*if (isset($_POST['awal']) && isset($_POST['akhir']) && $_POST['awal'] != "" && $_POST['akhir'] != ""){
		$query = new Database("SELECT * FROM karet_embryo_maturation_1 WHERE isactive = ? AND is_available = ? AND transferdate ? BETWEEN ? ORDER BY transferdate",array(1,1,$_POST['awal'],$_POST['akhir']));
	} else {
		$query = new Database("SELECT * FROM karet_embryo_maturation_1 WHERE isactive = ? AND is_available = ? ORDER BY transferdate",array(1,1));
	}*/


	if (isset($_POST['awal']) && isset($_POST['akhir']) && $_POST['awal'] != "" && $_POST['akhir'] != ""){
		$query = new Database("SELECT * FROM karet_embryo_maturation_1 WHERE isactive = ? AND is_available = ? AND transferdate ? BETWEEN ? ORDER BY transferdate",array(1,1,$_POST['awal'],$_POST['akhir']));
	} else {
		$query = new Database("SELECT * FROM karet_embryo_maturation_1 WHERE isactive = ? AND is_available = ? ORDER BY transferdate",array(1,1));
	}

	
	foreach ($query::$result as $key => $value) {
		$laminar1 = new Database("SELECT * FROM karet_laminar WHERE id = ?",array($value['laminar']));
		$laminar2 = $laminar1::$result[0]["nolaminar"];

		$query2 = new Database("SELECT MAX(screening_date) as maxdate, MAX(screening_checkpoint) as cekpoin 
								FROM karet_initiation_embryo_screening WHERE id_initiation_trans = ?",array($value['id']));
		
		$lastdate = $query2::$result[0]['maxdate'];
		$cekpoin = $query2::$result[0]['cekpoin'];

		if ($lastdate == NULL AND $cekpoin == NULL){
			$lastdate = "-";
			$cekpoin = "-";
		}

		$media = getMedia2($value['idmedia']);  

		$idtreatment = new Database("SELECT id_treatment FROM karet_embryo WHERE id = ?"
										,array($value['id_embryo']));

		$stats = "Available";
		$disabled = "";
		if ($value['is_available'] == 0){
			$stats = "Has Transfered";
			$disabled = "disabled";
		} elseif ($value['is_available'] == 2){
			$stats = "Has Discarded";
			$disabled = "disabled";
		}

		array_push($MetaData, 
			array(
				"id"=>$value["id"], 
				"idembryo"=>$value["id_embryo"],
				"idtreatment"=>$idtreatment::$result[0]['id_treatment'],
				"transdate"=>$value["transferdate"],
				"nobox"=>$value["nobox"],
				"culroom"=>$value["cultureroom"],
				"laminar"=>$laminar2,
				"media"=>$media['mediacode'],
				"status"=>$stats,
				"disabled"=>$disabled
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
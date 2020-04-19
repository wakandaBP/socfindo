<?php 
	require "../config.php";
	require "../database.php";
	require "../myfunction.php";

	$MetaData = array();
	if (isset($_POST['awal']) && isset($_POST['akhir']) && $_POST['awal'] != "" && $_POST['akhir'] != ""){
		$query = new Database("SELECT * FROM karet_embryo_maturation_1 WHERE isactive = ? AND is_available = ? AND transferdate ? BETWEEN ? ORDER BY transferdate",array(1,1,$_POST['awal'],$_POST['akhir']));
	} else {
		$query = new Database("SELECT * FROM karet_embryo_maturation_1 WHERE isactive = ? AND is_available = ? ORDER BY transferdate",array(1,1));
	}

	/*if (isset($_POST['awal']) && isset($_POST['akhir']) && $_POST['awal'] != "" && $_POST['akhir'] != ""){
		$query = new Database("SELECT a.id, a.id_embryo, a.transferdate, a.nobox, a.cultureroom, a.laminar
								
								WHERE isactive = ? AND is_available = ? AND transferdate ? BETWEEN ? ORDER BY transferdate",array(1,1,$_POST['awal'],$_POST['akhir']));
	} else {
		$query = new Database("SELECT a.id, a.id_embryo, a.transferdate, a.nobox, a.cultureroom, a.laminar,
								a.idmedia FROM karet_embryo_maturation_1 a
								JOIN karet_embryo_maturation1_screening b ON b.id_embryo = a.id_embryo  
								JOIN karet_contamination_record c ON c.id = b.idcontaminationrecord
								WHERE a.isactive = ? AND a.is_available = ? ORDER BY transferdate",array(1,1));
	}*/

	foreach ($query::$result as $key => $value) {
		$laminar1 = new Database("SELECT * FROM karet_laminar WHERE id = ?",array($value['laminar']));
		$laminar2 = $laminar1::$result[0]["nolaminar"];

		$query2 = new Database("SELECT MAX(screening_date) as maxdate, MAX(screening_checkpoint) as cekpoin 
								FROM karet_embryo_maturation1_screening WHERE id_embryo = ? AND isactive = ?",array($value['id_embryo'],1));
		
		$lastdate = $query2::$result[0]['maxdate'];
		$cekpoin = $query2::$result[0]['cekpoin'];

		$disabled = "";
		if ($lastdate == NULL AND $cekpoin == NULL){
			$lastdate = "-";
			$cekpoin = "-";
			$disabled = "disabled";
		}

		$media = getMedia2($value['idmedia']);  

		$cekidtreatment = new Database("SELECT id_treatment FROM karet_embryo WHERE id = ?"
										,array($value['id_embryo']));
		$idtreatment = $cekidtreatment::$result[0]['id_treatment'];

		/*$stats = "Available";
		$disabled = "disabled";
		if ($countScreen > 0){
			$disabled = "";
		}*/

		$cekCont = new Database("SELECT * FROM karet_contamination_record WHERE id_embryo = ? AND reju_step = ? AND (contamination_fungi = ? OR contamination_bact = ? OR pink = ? OR dead = ?)",array($value['id_embryo'],3,1,1,1,1));

		if ($cekCont::$rowCount < 1){
			array_push($MetaData, 
				array(
					"id"=>$value["id"], 
					"idembryo"=>$value["id_embryo"],
					"idtreatment"=>$idtreatment,
					"transdate"=>$value["transferdate"],
					"nobox"=>$value["nobox"],
					"culroom"=>$value["cultureroom"],
					"laminar"=>$laminar2,
					"media"=>$media['mediacode'],
					"disabled"=>$disabled,
					"lastdate"=>$lastdate,
					"cekpoin"=>$cekpoin
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
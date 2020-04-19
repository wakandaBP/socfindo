<?php 
	require "../config.php";
	require "../database.php";
	require "../myfunction.php";

	$MetaData = array();
	if (isset($_POST['awal']) && isset($_POST['akhir']) && $_POST['awal'] != "" && $_POST['akhir'] != ""){
		$query = new Database("SELECT * FROM karet_embryo_germination WHERE isactive = ? AND is_available = ? AND transferdate ? BETWEEN ? ORDER BY transferdate",array(1,1,$_POST['awal'],$_POST['akhir']));
	} else {
		$query = new Database("SELECT * FROM karet_embryo_germination WHERE isactive = ? AND is_available = ? ORDER BY transferdate",array(1,1));
	}

	foreach ($query::$result as $key => $value) {
		$laminar1 = new Database("SELECT * FROM karet_laminar WHERE id = ?",array($value['laminar']));
		$laminar2 = $laminar1::$result[0]["nolaminar"];

		$worker = getWorkerInitial($value['germ_worker']);

		$media = getMedia2($value['idmedia']);  

		$query2 = new Database("SELECT MAX(screening_date) as maxdate, MAX(screening_checkpoint) as cekpoin 
								FROM karet_embryo_germination_screening WHERE id_embryo = ? AND isactive = ?",array($value['id_embryo'],1));
		
		$lastdate = $query2::$result[0]['maxdate'];
		$cekpoin = $query2::$result[0]['cekpoin'];

		$disabled = "";
		if ($lastdate == NULL AND $cekpoin == NULL){
			$lastdate = "-";
			$cekpoin = "-";
			$disabled = "disabled";
		}

		$cekidtreatment = new Database("SELECT id_treatment FROM karet_embryo WHERE id = ?"
										,array($value['id_embryo']));
		$idtreatment = $cekidtreatment::$result[0]['id_treatment'];

		$d = new Database("SELECT * FROM karet_embryo_germination_screening WHERE id_embryo = ? AND isactive = ?",array($value['id_embryo'],1)); 

		$cekContRowCount = 0;
		foreach ($d::$result as $key => $items) {
			$cekCont = new Database("SELECT * FROM karet_contamination_record WHERE id = ? AND (contamination_fungi = ? OR contamination_bact = ? OR pink = ? OR dead = ?)",array($items['idcontaminationrecord'],1,1,1,1));

			//print_r($items['idcontaminationrecord']);
			$cekContRowCount = $cekContRowCount + $cekCont::$rowCount;
		}
		
		if ($cekContRowCount < 1){
			array_push($MetaData, 
				array(
					"id"=>$value["id"], 
					"idembryo"=>$value["id_embryo"],
					"idtreatment"=>$idtreatment,
					"transdate"=>$value["transferdate"],
					"worker"=>$worker['initial'],
					"nobox"=>$value["nobox"],
					"culroom"=>$value["cultureroom"],
					"laminar"=>$laminar2,
					"media"=>$media['mediacode'],

					"connectem"=>$value['connected_to_other'],
					"shapeofem"=>$value['shape_of_embryo'],
					"sizeofem"=>$value['size_of_embryo'],

					"typecallus"=>$value['type_of_callus'],
					"colorcallus"=>$value['color_of_callus'],

					"lastdate"=>$lastdate,
					"cekpoin"=>$cekpoin,

					//"status"=>$stats,
					"disabled"=>$disabled,
					"row"=>$cekContRowCount
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
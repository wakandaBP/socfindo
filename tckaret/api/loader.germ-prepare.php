<?php 
	require "../config.php";
	require "../database.php";
	require "../myfunction.php";

	$MetaData = array();
	if (isset($_POST['awal']) && isset($_POST['akhir']) && $_POST['awal'] != "" && $_POST['akhir'] != ""){
		$query = new Database("SELECT * FROM karet_embryo_germination_prepare WHERE isactive = ? AND is_available = ? AND germ_date ? BETWEEN ? ORDER BY id DESC",array(1,1,$_POST['awal'],$_POST['akhir']));
	} else {
		$query = new Database("SELECT * FROM karet_embryo_germination_prepare WHERE isactive = ? AND is_available = ? ORDER BY id DESC",array(1,1));
	}

	foreach ($query::$result as $key => $value) {
		$germ1 = new Database("SELECT * FROM karet_embryo WHERE id = ?",array($value['id_embryo']));
		$germ2 = $germ1::$result[0]["id_treatment"];

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

		$d = new Database("SELECT * FROM karet_embryo_germination_prepare_screening WHERE id_embryo = ? AND isactive = ?",array($value['id_embryo'],1)); 

		$cekContRowCount = 0;
		foreach ($d::$result as $key => $item) {
			$cekCont = new Database("SELECT * FROM karet_contamination_record WHERE id = ? AND isactive = ? AND (contamination_fungi = ? OR contamination_bact = ? OR pink = ? OR dead = ?)",array($item['idcontaminationrecord'],1,1,1,1,1));

			$cekContRowCount = $cekContRowCount + $cekCont::$rowCount;
		}
		
		if ($cekContRowCount < 1){
			array_push($MetaData, 
				array(
					"id"=>$value["id"], 
					"idembryo"=>$value["id_embryo"],
					"idtreatment"=>$idtreatment,
					"germdate"=>$value["germ_date"],
					"worker"=>$worker['initial'],
					"shoot"=>$value['shoot'],
					"germinated"=>$value['germinated'],
					"media"=>$media['mediacode'],

					"lastdate"=>$lastdate,
					"cekpoin"=>$cekpoin,
					"disabled"=>$disabled,
					"idpengeluaranmedia"=>$value['idpengeluaranmedia']
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
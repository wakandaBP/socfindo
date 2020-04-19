<?php 
	require "../config.php";
	require "../database.php";
	require "../all_function.php";
	require "../myfunction.php";

	$MetaData = array();
	
	if (isset($_POST['awal']) && isset($_POST['akhir']) && $_POST['awal'] != "" && $_POST['akhir'] != ""){
		$query = new Database("SELECT a.id_treatment, a.id_reception, a.sample, a.initiation_date, 
							a.widthseed, a.numberofseeds, a.seedcomments, a.ze, a.se, 
							--a.petridishnumber, 
							a.initiation_worker, e.nolaminar as laminar, a.treatmentcomment, 
							--d.mediacode as initiationmedium, a.mediumpreparedate, a.workermedia, 
							a.nobox, c.clonename, a.remaining_sample, d.mediacode, a.remaining_petri,
							a.idpengeluaranmedia
							FROM karet_initiation a
							JOIN karet_reception b ON  a.id_reception = b.id
							JOIN karet_clone c ON b.clone = c.id
							JOIN karet_media d ON d.id = a.idmedia
							JOIN karet_laminar e ON a.laminar = e.id 
							WHERE a.isactive = ? AND a.remaining_sample > 0 AND a.initiation_date BETWEEN ? AND ? 
							ORDER BY a.initiation_date DESC",array("1",$_POST['awal'],$_POST['akhir']));

	} else {
		$query = new Database("SELECT a.id_treatment, a.id_reception, a.sample, a.initiation_date, 
							a.widthseed, a.numberofseeds, a.seedcomments, a.ze, a.se, 
							--a.petridishnumber, 
							a.initiation_worker, e.nolaminar as laminar, a.treatmentcomment, 
							--d.mediacode as initiationmedium, a.mediumpreparedate, a.workermedia, 
							a.nobox, c.clonename, a.remaining_sample, d.mediacode, a.remaining_petri,
							a.idpengeluaranmedia
							FROM karet_initiation a
							JOIN karet_reception b ON  a.id_reception = b.id
							JOIN karet_clone c ON b.clone = c.id
							JOIN karet_media d ON d.id = a.idmedia
							JOIN karet_laminar e ON a.laminar = e.id 
							WHERE a.isactive = ? AND a.remaining_sample > 0 ORDER BY a.initiation_date DESC",array("1"));
	}
	

	foreach ($query::$result as $key => $value) {
		$workerinit = getWorkerName($value["initiation_worker"]);

		$disabled = "";
		if ((intval($value['ze']) + intval($value['se'])) != intval($value['remaining_sample'])){
			$disabled = "disabled";
		}
		
		$lastmediadate = $value["initiation_date"];
		if ($value['idpengeluaranmedia'] != ""){
			$media_data = new Database("SELECT * FROM karet_media_pengeluaran WHERE id = ?",array($value['idpengeluaranmedia']));

			$lastmedia = $media_data::$result[0];
			$lastmediadate = date("Y-m-d", strtotime($lastmedia['tglkeluar']));
		}

		array_push($MetaData, 
			array(
				"id"=>$value["id_treatment"],
				"idreception"=>$value["id_reception"],
				"sample"=>$value["sample"],
				"initiationdate"=>$value["initiation_date"],
				"widthseed"=>$value["widthseed"],
				"totalseeds"=>$value["numberofseeds"],
				"seedcomments"=>$value["seedcomments"],
				"ze"=>$value["ze"],
				"se"=>$value["se"],
				"media"=>$value['mediacode'],
				"initworker"=>$workerinit,
				"laminar"=>$value["laminar"],
				"treatment"=>$value["treatmentcomment"],
				"nobox"=>$value["nobox"],
				"clonename"=>$value["clonename"],
				"remaining"=>$value["remaining_sample"],
				"petriremain"=>$value["remaining_petri"],
				"disabled"=>$disabled,
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
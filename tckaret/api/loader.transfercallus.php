<?php 
	require "../config.php";
	require "../database.php";
	require "../all_function.php";

	$MetaData = array();
	
	$query = new Database("SELECT a.id_treatment, a.transferdate, a.transferworker, a.transfercomment, 
							e.nolaminar as laminar, a.id_mediatranslog, a.callustransfer, a.contamination
							FROM karet_transcallus a
							--JOIN karet_media_transaction_log d ON a.id_mediatranslog = d.id
							JOIN karet_laminar e ON a.laminar = e.id 
							WHERE a.isactive = ?",array("1"));
	

	foreach ($query::$result as $key => $value) {
		$workertrans = getWorkerName($value["transferworker"]);
		$media = array('petridish'=>'-');

		if ($value['id_mediatranslog'] != ""){
			$media = getMedia($value['id_mediatranslog']);
			//print_r($media);
		}

		array_push($MetaData, 
			array(
				"id"=>$value["id_treatment"],
				"callustrans"=>$value['callustransfer'],
				"transdate"=>DateToIndo($value["transferdate"]),
				"transworker"=>$workertrans,
				"transcomment"=>$value['transfercomment'],
				"laminar"=>$value["laminar"],
				"cont"=>$value["contamination"],
				"petri"=>$media['petridish'],
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


	/*--------------- GETTING WORKER NAME -------------*/

	function getWorkerName($value){
		$worker1 = new Database("SELECT id_pegawaimaster FROM karet_worker WHERE id = ?",array($value));

		foreach ($worker1::$result as $key => $items) {
			$worker2 = new Database("SELECT nama FROM master_pegawai WHERE id = ?",array($items['id_pegawaimaster']));

			foreach ($worker2::$result as $key => $data) {
				$name = $data['nama'];
			}

		}
		return $name;
	}

	function getMedia($value){
		$media1 = new Database("SELECT idpembuatanmedia, no_vessel FROM karet_media_transaction_log WHERE id = ?",array($value));

		foreach ($media1::$result as $key => $items) {
			$media2 = new Database("SELECT a.mediacode, b.tglpembuatanmedia as mediadate, d.nama as worker 
						FROM karet_media a 
						JOIN karet_media_pembuatan b ON a.id = b.idmedia 
						JOIN karet_worker c ON c.id = b.idworker
						JOIN master_pegawai d ON d.id = c.id_pegawaimaster
						WHERE b.id = ?",array($items['idpembuatanmedia']));

			foreach ($media2::$result as $key => $data) {
				$mediacode = array("media"=>$data['mediacode'],"petridish"=>$items['no_vessel'],"mediadate"=>$data['mediadate'],"mediaworker"=>$data['worker']);
			}

		}
		return $mediacode;
	}

?>
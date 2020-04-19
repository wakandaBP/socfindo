<?php 

	require "../../config.php";
	require "../../database.php";
	require "../../all_function.php";

	$MetaData = array();
	$query = new Database("SELECT a.id_treatment, a.id_reception, a.sample, a.initiation_date, 
							a.widthseed, a.numberofseeds, a.seedcomments, a.ze, a.se, 
							--a.petridishnumber, 
							a.initiation_worker, e.nolaminar as laminar, a.treatmentcomment, 
							--d.mediacode as initiationmedium, a.mediumpreparedate, a.workermedia, 
							a.nobox, c.clonename, a.remaining_sample, a.idpengeluaranmedia
							FROM karet_initiation a
							JOIN karet_reception b ON  a.id_reception = b.id
							JOIN karet_clone c ON b.clone = c.id
							--JOIN karet_media_transaction_log d ON a.id_mediatranslog = d.id
							JOIN karet_laminar e ON a.laminar = e.id 
							WHERE a.id_treatment = ? AND a.isactive = 1",array($_POST['id'],"1"));

	
	foreach ($query::$result as $key => $value) {
		$mediainit = array();

		$workerinit = $value["initiation_worker"];
		if ($value['idpengeluaranmedia'] != ''){
			//$mediainit = getMedia($value['idpengeluaranmedia']);

			array_push($MetaData, 
				array(
					"id"=>$value["id_treatment"],
					"idreception"=>$value["id_reception"],
					"sample"=>$value["sample"],
					"initiationdate"=>DateToIndo($value["initiation_date"]),
					"widthseed"=>$value["widthseed"],
					"totalseeds"=>$value["numberofseeds"],
					"seedcomments"=>$value["seedcomments"],
					"ze"=>$value["ze"],
					"se"=>$value["se"],
					//"petridish"=>$mediainit["petridish"],
					"initworker"=>$workerinit,
					"laminar"=>$value["laminar"],
					"treatment"=>$value["treatmentcomment"],
					//"initiationmedium"=>$mediainit["media"],
					//"mediumpreparedate"=>DateToIndo($mediainit["mediadate"]),
					//"workermedia"=>$mediainit["mediaworker"],
					"nobox"=>$value["nobox"],
					"clonename"=>$value["clonename"],
					"remaining"=>$value['remaining_sample']
				)
			);
		} else {
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
					"initworker"=>$workerinit,
					"laminar"=>$value["laminar"],
					"treatment"=>$value["treatmentcomment"],
					"nobox"=>$value["nobox"],
					"clonename"=>$value["clonename"],
					"remaining"=>$value['remaining_sample']
				)
			);
		}
	}

	echo json_encode($MetaData);


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

	/*--------------- GETTING MEDIA -------------*/

	function getMedia($value){
		$media1 = new Database("SELECT idpembuatanmedia, jumlah_keluar FROM karet_media_pengeluaran WHERE id = ?",array($value));

		foreach ($media1::$result as $key => $items) {
			$media2 = new Database("SELECT a.mediacode, b.tglpembuatanmedia as mediadate, d.nama as worker 
						FROM karet_media a 
						JOIN karet_media_pembuatan b ON a.id = b.idmedia 
						JOIN karet_worker c ON c.id = b.idworker
						JOIN master_pegawai d ON d.id = c.id_pegawaimaster
						WHERE b.id = ?",array($items['idpembuatanmedia']));

			foreach ($media2::$result as $key => $data) {
				$mediacode = array("media"=>$data['mediacode'],"petridish"=>$items['jumlah_keluar'],"mediadate"=>$data['mediadate'],"mediaworker"=>$data['worker']);
			}

		}
		return $mediacode;
	}







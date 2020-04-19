<?php 

	require "../../config.php";
	require "../../database.php";
	require "../../all_function.php";

	$MetaData = array();
	$query = new Database("SELECT a.id_treatment, d.id_reception, d.sample, a.obsdate, 
							--a.widthseed, a.numberofseeds, a.seedcomments, a.ze, a.se, 
							a.obsworker, e.nolaminar as laminar, a.contfungi, a.contbact, 
							a.alotofcallus, a.littlebitofcallus, a.yellow, a.white, a.orange, a.brown, 
							a.dead, a.piecesnotreact,
							--d.mediacode as initiationmedium, a.mediumpreparedate, a.workermedia, 
							d.nobox, c.clonename, d.id_mediatranslog  
							FROM karet_obscallus a
							JOIN karet_initiation d ON d.id_treatment = a.id_treatment
							JOIN karet_reception b ON  d.id_reception = b.id
							JOIN karet_clone c ON b.clone = c.id
							--JOIN karet_media_pembuatan d ON a.id_mediatranslog = d.id
							JOIN karet_laminar e ON d.laminar = e.id 
							WHERE a.id_treatment = ? AND a.isactive = ?",array($_POST['id'],"1"));

	
	foreach ($query::$result as $key => $value) {
		$mediainit = array();

		$workerobs = getWorkerName($value["obsworker"]);
		if ($value['id_mediatranslog'] != ''){
			$mediainit = getMedia($value['id_mediatranslog']);

			array_push($MetaData, 
				array(
					"id"=>$value["id_treatment"],
					"idreception"=>$value["id_reception"],
					"sample"=>$value["sample"],
					"obsdate"=>DateToIndo($value["obsdate"]),
					"obsworker"=>$workerobs,
					"contbact"=>$value['contbact'],
					"contfungi"=>$value['contfungi'],
					"alotof"=>$value['alotofcallus'],
					"littlebit"=>$value['littlebitofcallus'],
					"yellow"=>$value['yellow'],
					"white"=>$value['white'],
					"orange"=>$value['orange'],
					"brown"=>$value['brown'],
					"dead"=>$value['dead'],
					"notreact"=>$value['piecesnotreact'],

					"petridish"=>$mediainit["petridish"],
					"laminar"=>$value["laminar"],
					"medium"=>$mediainit["media"],
					"mediumpreparedate"=>DateToIndo($mediainit["mediadate"]),
					"workermedia"=>$mediainit["mediaworker"],
					"nobox"=>$value["nobox"],
					"clonename"=>$value["clonename"]
				)
			);
		} else {
			array_push($MetaData, 
				array(
					"id"=>$value["id_treatment"],
					"idreception"=>$value["id_reception"],
					"sample"=>$value["sample"],
					"obsdate"=>DateToIndo($value["obsdate"]),
					"obsworker"=>$workerobs,
					"contbact"=>$value['contbact'],
					"contfungi"=>$value['contfungi'],
					"alotof"=>$value['alotofcallus'],
					"littlebit"=>$value['littlebitofcallus'],
					"yellow"=>$value['yellow'],
					"white"=>$value['white'],
					"orange"=>$value['orange'],
					"brown"=>$value['brown'],
					"dead"=>$value['dead'],
					"notreact"=>$value['piecesnotreact'],

					"petridish"=>$mediainit["petridish"],
					"laminar"=>$value["laminar"],
					"nobox"=>$value["nobox"],
					"clonename"=>$value["clonename"]
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







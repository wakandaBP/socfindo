<?php 
	require "../../config.php";
	require "../../database.php";
	require "../../all_function.php";

	$MetaData = array();
	$query = new Database("SELECT a.id, d.initial, a.tglpembuatanmedia, a.volume, 
								--e.nama as worker, 
						a.jumlah, a.lamakerja FROM karet_media_pembuatan a 
						JOIN karet_media b ON a.idmedia = b.id
						JOIN karet_worker d ON a.idworker = d.id
						--JOIN master_pegawai e ON d.id_pegawaimaster = e.id
						WHERE a.isactive = ? AND a.idmedia = ? ORDER BY a.tglpembuatanmedia DESC ",array("1",$_POST["idmedia"]));

	foreach ($query::$result as $key => $value) {
		array_push($MetaData, 
			array(
				"id"=>$value["id"],
				"worker"=>$value["initial"],
				"tglbuatmedia"=>DateToIndo($value["tglpembuatanmedia"])
			)
		);
	}
	
	/*$returnData = array(
				"draw"=>1,
				"recordsTotal"=>intval($query::$rowCount),
				"recordsFiltered"=>intval($query::$rowCount),
				"data"=>$MetaData
			);*/
	echo json_encode($MetaData);
?>
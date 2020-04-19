<?php 
	require "../config.php";
	require "../database.php";
	require "../all_function.php";

	$MetaData = array();
	$query = new Database("SELECT a.id, b.mediacode as media, d.initial as worker, a.tglpembuatanmedia, 
								a.volume, c.vesselcode, a.jumlah, a.lamakerja, a.remaining_media, a.is_remove
								FROM karet_media_pembuatan a 
								JOIN karet_media b ON a.idmedia = b.id 
								JOIN karet_vessel c ON a.idvessel = c.id
								JOIN karet_worker d ON a.idworker = d.id
								WHERE a.isactive = ? AND a.idmedia = ? 
								AND a.is_remove = ? AND a.remaining_media != ?
								ORDER BY a.tglpembuatanmedia DESC ",array("1",$_POST["idmedia"],0,0));

	foreach ($query::$result as $key => $value) {
		$date1 = new DateTime($value['tglpembuatanmedia']);
		$date2 = new DateTime();
		$datediff = $date2->diff($date1)->format("%a");

		$expired = "Usable";
		$disabled = "";
		
		/*if ($value['remaining_media'] == 0){
			$expired = "Out of Stock";
			$disabled = "disabled";
		} */
			
		if ($datediff > 30){
			$expired = "Expired";
		}

		array_push($MetaData, 
			array(
				"id"=>$value["id"], 
				"media"=>$value["media"],
				"worker"=>$value["worker"],
				"tglbuatmedia"=>$value["tglpembuatanmedia"],
				"volume"=>number_format($value["volume"],2),
				"vessel"=>$value["vesselcode"],
				"jumlah"=>$value["jumlah"],
				"lamakerja"=>$value["lamakerja"],
				"status"=>$expired,
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
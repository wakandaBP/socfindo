<?php 
	require "../config.php";
	require "../database.php";

	$MetaData = array();
	$query = new Database("SELECT a.id, a.mediacode, b.nama_jenis as jenismedia, a.description, a.stok, a.isactive
							FROM karet_media a JOIN karet_media_type b ON b.id = a.id_jenis_media
							WHERE a.isactive = ?",array("1"));

	foreach ($query::$result as $key => $value) {
		$last_updated = "";
		if (isset($_POST['id']) != ""){
			if ($_POST['id'] == $value['id']){
				$last_updated = "last_updated";
			}
		}

		array_push($MetaData, 
			array(
				"id"=>$value["id"], 
				"mediacode"=>$value["mediacode"],
				"media"=>$value["jenismedia"],
				"description"=>$value["description"],
				"stok"=>$value["stok"],
				"status"=>$value["isactive"],
				"last_updated"=>$last_updated
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
<?php 
	require "../../config.php";
	require "../../database.php";
	require "../../myfunction.php";

	$MetaData = array("qty"=>0);

	if (isset($_POST['vessel']) AND isset($_POST['media'])){

		//get idpembuatanmedia using idmedia
		/*$cekmedia = new Database("SELECT a.id as idpembuatan, b.id as idmedia FROM karet_media_pembuatan a 
								JOIN karet_media b ON b.id = a.idmedia WHERE a.idmedia = ? AND b.isactive = ? AND a.is_remove = ?"
								,array($_POST['media'],1,0));*/

		$cekmedia = new Database("SELECT * FROM karet_media_pembuatan WHERE idmedia = ? AND idvessel = ?", array($_POST['media'], $_POST['vessel']));

		$qty_available = 0;
		foreach ($cekmedia::$result as $key => $value) {
			$qty_available += intval($value['remaining_media']); 
		}

		$MetaData['qty'] = $qty_available;
	}

	echo json_encode($MetaData);

?>
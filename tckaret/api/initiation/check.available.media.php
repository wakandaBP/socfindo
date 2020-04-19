<?php 
	require "../../config.php";
	require "../../database.php";

	
	if (isset($_POST['amount']) && isset($_POST['idmedia'])){
		$data = new Database("SELECT * FROM karet_media
								WHERE id = ? AND isactive = ?",array($_POST['idmedia'],1));

		$msg = "";

		if ($data::$result[0]['stok'] < $_POST['amount']){
			$msg = "Not enough media. Please add stok for media " . $data::$result[0]['mediacode'];
		}

		echo json_encode($msg);
	}



?>
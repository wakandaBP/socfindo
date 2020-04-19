<?php 
	require "../../config.php";
	require "../../database.php";

	
	if (isset($_POST['amount']) AND $_POST['idmedia'] != ""){
		$data = new Database("SELECT * FROM karet_media
								WHERE id = ? AND isactive = ?",array($_POST['idmedia'],1));

		$msg = array();

		/*if ($data::$result[0]['stok'] < $_POST['amount']){
			$msg = "<span style='color:red;'>Not enough media. Please add stok for media " . $data::$result[0]['mediacode'] . "</span>";
		}*/
		if ($data::$result[0]['stok'] < $_POST['amount']){
			$msg = array("msg"=>"<span style='color:red;'>Not enough media. Please add stok for media " . $data::$result[0]['mediacode'] . "</span>","stok"=>$data::$result[0]['stok']);
		} else {
			$msg = array("msg"=>"","stok"=>$data::$result[0]['stok']);
		}

		print_r(json_encode($msg));
	}



?>
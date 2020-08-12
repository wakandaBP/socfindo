<?php 
	require "../../config.php";
	require "../../database.php";

	
	$msg = array();
	if (isset($_POST['amount']) AND $_POST['idmedia'] != "" AND isset($_POST['idpengeluaranmedia'])){
		
		$data = new Database("SELECT * FROM karet_media
								WHERE id = ? AND isactive = ?",array($_POST['idmedia'],1));
		$stok = $data::$result[0]['stok'];
		$mediacode = $data::$result[0]['mediacode'];

		$cekLog = new Database("SELECT * FROM karet_media_pengeluaran WHERE id = ?",array($_POST['idpengeluaranmedia']));

		$logStok = $totalStok = 0;

		if ($_POST['idmedia'] == $cekLog::$result[0]['id_media']){ 
			$logStok = $cekLog::$result[0]['jumlah_keluar'];
			$totalStok = $stok + $logStok;
		} else {
			$totalStok = $stok;
		}

		$msg = ["stok"=>$totalStok,"msg"=>""];

		if ($stok + $logStok < $_POST['amount']){
			$msg = ["msg"=>"<span style='color:red;'>Not enough media. Please add stok for media " . $mediacode . "</span>", "stok"=>$totalStok];
		}

		print_r(json_encode($msg));
	}



?>
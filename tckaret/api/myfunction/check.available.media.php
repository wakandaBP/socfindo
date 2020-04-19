<?php 
	require "../../config.php";
	require "../../database.php";
	require "../../myfunction.php";

	$MetaData = array();

	if (isset($_POST['amount']) AND isset($_POST['media'])){

		//get idpembuatanmedia using idmedia
		$cekmedia = new Database("SELECT a.id as idpembuatan, b.id as idmedia FROM karet_media_pembuatan a 
								JOIN karet_media b ON b.id = a.idmedia WHERE a.idmedia = ? AND b.isactive = ? AND a.is_remove = ?"
								,array($_POST['media'],1,0));

		foreach ($cekmedia::$result as $key => $item) {
			$idpembuatan = $item['idpembuatan'];

			//check stok from stok in
			$pemasukan = new Database("SELECT jumlah FROM karet_media_pembuatan WHERE id = ? AND isactive = ? AND is_remove = ?",array($idpembuatan,1,0));
			$in = $pemasukan::$result[0]['jumlah'];

			//check stok from stock out
			$pengeluaran = new Database("SELECT jumlah_keluar FROM karet_media_pengeluaran WHERE idpembuatanmedia = ? AND isactive = ?",array($idpembuatan,1));
			if ($pengeluaran::$rowCount > 0){
				$out = $pengeluaran::$result[0]['jumlah_keluar'];
			} else {
				$out = 0;
			}
			
			//get remaining stock based idpembuatanmedia (stok in id)
			$minus = intval($in) - intval($out);
			//check if request smaller than available stock
			if ($minus >= intval($_POST['amount'])){
				$data = new Database("SELECT * FROM karet_media_pembuatan WHERE id = ? AND isactive = ?"
										,array($idpembuatan,1));

				foreach ($data::$result as $key => $value) {
					$worker = new Database("SELECT initial FROM karet_worker WHERE id = ?",array($value['idworker']));

					array_push($MetaData, 
						array(
							"id"=>$value["id"],
							"worker"=>$worker::$result[0]['initial'],
							"tglbuatmedia"=>$value["tglpembuatanmedia"]
						)
					);
				}
			}

			
		}

	echo json_encode($MetaData);
	
	}


?>
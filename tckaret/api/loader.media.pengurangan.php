<?php 
	require "../config.php";
	require "../database.php";
	require "../all_function.php";

	$MetaData = array();
	// $query = new Database("SELECT a.id, a.idpembuatanmedia, a.tglkeluar, c.mediacode
	// 						FROM karet_media_transaction_log a
	// 						JOIN karet_media_pembuatan b ON b.id = a.idpembuatanmedia
	// 						JOIN karet_media c ON c.id = b.idmedia  
	// 						WHERE a.isactive = ?",array("1"));

	/*$query = new Database("SELECT DISTINCT a.tglkeluar
								FROM karet_media_pengeluaran a
								JOIN karet_media_pembuatan b ON b.id = a.idpembuatanmedia
								JOIN karet_media c ON c.id = b.idmedia  
								WHERE c.id = ? AND a.isactive = ?",array($_POST['idmedia'],"1"));*/

	$query = new Database("SELECT * FROM karet_media_pengeluaran
								WHERE id_media = ? AND isactive = ? ORDER BY tglkeluar DESC",array($_POST['idmedia'],"1"));

	foreach ($query::$result as $key => $value) {

		/*$jumlah = new Database("SELECT * FROM karet_media_pengeluaran
									WHERE tglkeluar = ? AND id_media = ? AND isactive = ?"
									,array($value['tglkeluar'],$_POST['idmedia'],"1"));
		
		$qty = 0;
		foreach ($jumlah::$result as $key => $items) {
			$qty = $qty + $items['jumlah_keluar'];
			$idmedia = $items['id_media'];
		}*/

		array_push($MetaData, 
			array(
				"id"=>$value['id'],
				"idmedia"=>$value['id_media'],
				"tglkeluar"=>date_format(date_create($value['tglkeluar']),'Y-m-d'),
				"qty"=>$value['jumlah_keluar']
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
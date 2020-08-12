<?php 
	require "../../config.php";
	require "../../database.php";
	require "../../all_function.php";

	$MetaData = array();

	$query = new Database("SELECT a.idpengeluaranmedia, b.jumlah_keluar, b.id_media 
								FROM karet_initiation_trans a JOIN karet_media_pengeluaran b
								ON b.id = a.idpengeluaranmedia
								WHERE a.id = ?",array($_POST['id']));
	
	$jumlah_keluar = $query::$result[0]['jumlah_keluar'];
	$media = $query::$result[0]['id_media'];
	$idmediaout = $query::$result[0]['idpengeluaranmedia'];

	$query2 = new Database("SELECT * FROM karet_media WHERE id = ?",array($media));
	$stok = $query2::$result[0]['stok'];

	$MetaData = array(
					"jumlah"=>$jumlah_keluar,
					"media"=>$media,
					"stok"=>$stok + $jumlah_keluar,
					"idmediaout"=>$idmediaout
				);

	echo json_encode($MetaData); 
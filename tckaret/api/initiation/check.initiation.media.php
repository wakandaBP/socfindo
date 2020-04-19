<?php 
	require "../../config.php";
	require "../../database.php";
	require "../../all_function.php";

	$MetaData = array();

	$query = new Database("SELECT a.idpengeluaranmedia, b.jumlah_keluar, b.id_media 
								FROM karet_initiation a JOIN karet_media_pengeluaran b
								ON b.id = a.idpengeluaranmedia
								WHERE a.id_treatment = ?",array($_POST['idtreatment']));

	$MetaData = array(
					"jumlah"=>$query::$result[0]['jumlah_keluar'],
					"media"=>$query::$result[0]['id_media'],
					"idmediaout"=>$query::$result[0]['idpengeluaranmedia']
				);

	echo json_encode($MetaData); 
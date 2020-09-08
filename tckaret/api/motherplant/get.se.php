<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	if (isset($_GET['se_id']) && $_GET['se_id'] != ""){
		$query = new Database("SELECT a.id as id_embryo
			,a.id_treatment
			,b.id_reception
			,c.harvestdate
			,c.idtree
			,c.treepart
			FROM karet_embryo a
			JOIN karet_initiation b ON b.id_treatment = a.id_treatment
			JOIN karet_reception c ON c.id = b.id_reception 
			WHERE a.id = ?
			",array($_GET['se_id']));
	

		foreach ($query::$result as $key => $value) {
			$get_germ = new Database("SELECT a.transferdate as germination_date
				,b.mediacode as germination_media
				FROM karet_embryo_germination a
				JOIN karet_media b ON b.id = a.idmedia
				WHERE a.id_embryo = ?
				",array($_GET['se_id']));
			$germ = $get_germ::$result[0];

			 
			$MetaData = array(
					"id_embryo"			=>	$value['id_embryo'],
					"id_treatment"		=>	$value['id_treatment'],
					"id_reception"		=>	$value['id_reception'],
					"harvest_date"		=>	$value['harvestdate'],
					"tree"				=>	$value['idtree'],
					"treepart"			=>	$value['treepart'],
					"germination_date"	=>	$germ['germination_date'],
					"germination_media"	=>	$germ['germination_media']
				);
		}
		
		echo json_encode($MetaData);
	}
	
?>
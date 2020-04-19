<?php 
	require "../../config.php";
	require "../../database.php";
	require "../../all_function.php";

	$MetaData = array();

	$query = new Database("SELECT * FROM karet_initiation_embryo_grow WHERE id_initiation_trans = ? AND isactive = ?",array($_POST['idinit'],1));

	$MetaData = array("id"=>$query::$result[0]['id_initiation_trans'],"idtreatment"=>$query::$result[0]['id_treatment'],"grow"=>$query::$result[0]['growing_embryo'],"remain"=>$query::$result[0]['remaining_embryo']);

	echo json_encode($MetaData);

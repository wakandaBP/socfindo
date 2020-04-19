<?php 
	require "../../config.php";
	require "../../database.php";
	require "../../all_function.php";

	$MetaData = array();

	$query = new Database("SELECT * FROM karet_initiation_trans WHERE id = ?",array($_POST['id']));

	$MetaData = array(
					"id"=>$query::$result[0]['id'],
					"idtreatment"=>$query::$result[0]['id_treatment'],
					"transdate"=>$query::$result[0]['transferdate'],
					"callus"=>$query::$result[0]['callustransfer'],
					"transworker"=>$query::$result[0]['transferworker'],
					"laminar"=>$query::$result[0]['laminar'],
					"comment"=>$query::$result[0]['comment']
				);

	echo json_encode($MetaData); 
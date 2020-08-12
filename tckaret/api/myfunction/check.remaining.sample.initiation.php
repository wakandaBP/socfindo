<?php 
	require "../../config.php";
	require "../../database.php";
	require "../../all_function.php";
	require "../../myfunction.php";

	$MetaData = array();
	$query = new Database("SELECT * FROM karet_initiation WHERE id_treatment = ? ",array($_POST['id'],1));

    $sampleRemain = $query::$result[0]['remaining_sample'];
	
	echo json_encode($sampleRemain);
?>
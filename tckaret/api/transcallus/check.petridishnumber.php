<?php 
	require "../../config.php";
	require "../../database.php";

	
	if (isset($_POST['petri'])){
		$data = new Database("SELECT * FROM karet_media_transaction_log 
								WHERE no_vessel = ? AND reju_step = ? AND isactive = ?",array($_POST['petri'],3,1));
	}

	echo json_encode($data::$rowCount);

?>
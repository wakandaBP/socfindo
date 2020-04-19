<?php 
	require "../../config.php";
	require "../../database.php";

	if (isset($_POST['initial']) AND isset($_POST['id'])){
		$data = new Database("SELECT * FROM karet_worker
								WHERE initial = ? AND isactive = ?",array($_POST['initial'],1));

		$msg = "";

		if ($data::$rowCount > 0){
			if ($data::$result[0]['initial'] == $_POST['initial'] AND $data::$result[0]['id'] != $_POST['id']){
				$msg = "<span style='color:red;'>Initial is not available. ". $_POST['initial'] ." has been used by another user</span>";
			}
		}
		
		echo $msg;
		
	} elseif (isset($_POST['initial'])){
		$data = new Database("SELECT * FROM karet_worker
								WHERE initial = ? AND isactive = ?",array($_POST['initial'],1));

		$msg = "";

		if ($data::$rowCount > 0){
			if ($data::$result[0]['initial'] == $_POST['initial']){
				$msg = "<span style='color:red;'>Initial is not available. ". $_POST['initial'] ." has been used by another user</span>";
			}
		}
		
		echo $msg;
	}

	



?>
<?php 
	require "../../config.php";
	require "../../database.php";

	if (isset($_POST['kode']) AND isset($_POST['id'])){
		$data = new Database("SELECT * FROM karet_worker
								WHERE kode_employee = ? AND isactive = ?",array($_POST['kode'],1));

		$msg = "";

		if ($data::$rowCount > 0){
			if ($data::$result[0]['kode_employee'] == $_POST['kode'] AND $data::$result[0]['id'] != $_POST['id']){
				$msg = "<span style='color:red;'>Employee Code is not available. ". $_POST['kode'] ." has been used by another user</span>";
			}
		}
		
		echo $msg;
	}
	
	elseif (isset($_POST['kode'])){
		$data = new Database("SELECT * FROM karet_worker
								WHERE kode_employee = ? AND isactive = ?",array($_POST['kode'],1));

		$msg = "";

		if ($data::$rowCount > 0){
			if ($data::$result[0]['kode_employee'] == $_POST['kode']){
				$msg = "<span style='color:red;'>Employee Code is not available. ". $_POST['kode'] ." has been used by another user</span>";
			}
		}
		
		echo $msg;
	}



?>
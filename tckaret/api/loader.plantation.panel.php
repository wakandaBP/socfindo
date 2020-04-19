<?php 
	require "../config.php";
	require "../database.php";

	$MetaData = array();
	$dataPanel = array();

	if (isset($_POST['idpanel'])){
		$query = new Database("SELECT a.id, a.idblock, b.blocknumber, a.panelname, a.description 
						FROM karet_plantation_panel a
						JOIN karet_plantation_block b ON a.idblock = b.id 
						WHERE a.id = ? AND a.isactive = ?",array($_POST['idpanel'],"1"));		
		$panel = true;
	} elseif (isset($_POST['idblock'])) {
		$query = new Database("SELECT a.id, a.idblock, b.blocknumber, a.panelname, a.description 
						FROM karet_plantation_panel a
						JOIN karet_plantation_block b ON a.idblock = b.id 
						WHERE a.idblock = ? AND a.isactive = ?",array($_POST['idblock'],"1"));
		$panel = false;
	}


	foreach ($query::$result as $key => $value) {
		array_push($MetaData, 
			array(
				"id"=>$value["id"],
				"idblock"=>$value["idblock"],
				"blocknumber"=>$value["blocknumber"],
				"panelname"=>$value["panelname"], 
				"description"=>$value["description"]
			)
		);
	}

	$dataPanel = $MetaData;

	$returnData = array(
				"draw"=>1,
				"recordsTotal"=>intval($query::$rowCount),
				"recordsFiltered"=>intval($query::$rowCount),
				"data"=>$MetaData
			);
	
	if ($panel == false){
		echo json_encode($returnData);
	} else {
		echo json_encode($dataPanel);
	}
?>
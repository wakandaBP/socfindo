<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	if ( isset($_GET['clone_id']) && $_GET['clone_id'] != "" && isset($_GET['mother_id']) && $_GET['mother_id'] != ""){
		$query = new Database("SELECT a.id
			,a.unique_code
			,a.deactivated
			,a.plantation
			,a.country_arrival_date
			,a.supplier
			,a.date_of_shipment
			,a.plantation_arrival_date
			,a.start_date
			,a.green_house_number
			,a.qty_received
			,a.qty_rejected
			,a.qty_at_end
			,a.dead_plant
			,a.motherplant_id
			,a.qty_remaining
			,a.end_date
			,c.code_se
			,e.id as clone_id
			FROM karet_acclimatization a
			JOIN karet_motherplant c ON c.id = a.motherplant_id 
			JOIN karet_tree d ON d.id = c.tree
			JOIN karet_clone e ON e.id = d.clonename
		    WHERE a.unique_code LIKE '%" . 	$_GET['params'] . "%'
			AND a.motherplant_id = ?
		    AND d.clonename = ?
		    AND a.deleted_at IS NULL 
		    AND a.deactivated = ?",array($_GET['mother_id'], $_GET['clone_id'], 'FALSE'));
	} else {
		$query = new Database("SELECT a.id
			,a.unique_code
			,a.deactivated
			,a.plantation
			,a.country_arrival_date
			,a.supplier as id_supplier
			,a.date_of_shipment
			,a.plantation_arrival_date
			,a.start_date
			,a.green_house_number
			,a.qty_received
			,a.qty_rejected
			,a.qty_at_end
			,a.dead_plant
			,a.motherplant_id
			,a.qty_remaining
			,a.end_date
			,c.code_se
			,e.id as clone_id
			FROM karet_acclimatization a
			JOIN karet_motherplant c ON c.id = a.motherplant_id 
			JOIN karet_tree d ON d.id = c.tree
			JOIN karet_clone e ON e.id = d.clonename
		    WHERE a.unique_code LIKE '%" . 	$_GET['params'] . "%' 
		    AND a.deleted_at IS NULL 
		    AND a.deactivated = ?",array('FALSE'));
	}

	foreach ($query::$result as $key => $value) {
		$get_motherembryo = new Database("SELECT code_se FROM karet_motherplant WHERE id = ?",array($value['motherplant_id']));
		$mother_embryo = $get_motherembryo::$result[0]["code_se"];

		$get_supplier = new Database("SELECT name FROM karet_supplier WHERE id = ?", array($value['id_supplier']));
		$supplier = $get_supplier::$result[0]["name"];

		/*	$get_vessel = new Database("SELECT vessel, vesselcode FROM karet_vessel WHERE id = ?", array($value['recipient']));
		$vessel = $get_vessel::$result[0]['vesselcode'];*/

		array_push($MetaData, 
			array(
				"id"					=>	$value['id']
				,"text"					=>	$value["unique_code"]
				,"unique_code"			=>	$value["unique_code"]
				,"mother_embryo"		=>	$mother_embryo
				,"plantation"			=>	$value['plantation']
				,"country_arrival_date"	=>	$value['country_arrival_date']
				,"plantation_arrival_date"	=>	$value['plantation_arrival_date']
				,"start_date"			=>	$value['start_date']
				,"green_house_number"	=>	$value["green_house_number"]
				,"qty_received"			=>	$value["qty_received"]
				,"qty_rejected"			=>	$value['qty_rejected']
				,"qty_at_end"			=>	$value["qty_at_end"]
				,"dead_plant"			=>	$value['dead_plant']
				,"supplier"				=>	$supplier
				,"clone_id"				=>	$value['clone_id']
				,"motherplant_id"		=>	$value['motherplant_id']
				,"qty_remaining"		=>	$value['qty_remaining']
				,"end_date"				=>	$value['end_date']
			)
		);
	}

	$returnData = array(
		"draw"=>1,
		"recordsTotal"=>intval($query::$rowCount),
		"recordsFiltered"=>intval($query::$rowCount),
		"data"=>$MetaData
	);

	
	echo json_encode($MetaData);
?>
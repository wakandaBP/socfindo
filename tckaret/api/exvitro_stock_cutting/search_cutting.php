<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	if ( isset($_GET['clone_id']) && $_GET['clone_id'] != "" && isset($_GET['mother_id']) && $_GET['mother_id'] != ""){
		$query = new Database("SELECT a.id
			,a.unique_code
			,a.deactivated
			,a.site
			,a.date_stock
			,a.qty
			,a.qty_remaining
			,a.table_number
			,a.motherplant_id
			,a.created_at
			,a.updated_at
			,a.end_date
			,a.start_date
			,c.code_se
			,e.id as clone_id
			FROM karet_exvitro_stock_cutting a
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
			,a.site
			,a.date_stock
			,a.qty
			,a.qty_remaining
			,a.table_number
			,a.motherplant_id
			,a.created_at
			,a.updated_at
			,a.end_date
			,a.start_date
			,c.code_se
			,e.id as clone_id
			FROM karet_exvitro_stock_cutting a
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

		$get_site = new Database("SELECT name, region FROM karet_plantation WHERE id = ?",array($value['site']));
		$site = $get_site::$result[0]["name"];
		$region_id = $get_site::$result[0]["region"];

		$get_region = new Database("SELECT name FROM karet_plantation_region WHERE id = ?",array($region_id));
		$region = $get_region::$result[0]["name"];

		array_push($MetaData, 
			array(
				"id"					=>	$value['id']
				,"text"					=>	$value["unique_code"]
				,"unique_code"			=>	$value["unique_code"]
				,"deactivated"			=>	$value['deactivated']
				,"mother_embryo"		=>	$mother_embryo
				,"site"					=>	$site
				,"region"				=>	$region
				,"date_stock"			=>	$value['date_stock']
				,"qty"					=>	$value["qty"]
				,"qty_remaining"		=>	$value["qty_remaining"]
				,"table_number"			=>	$value['table_number']
				,"end_date"				=>	$value["end_date"]
				,"start_date"			=>	$value["start_date"]
				,"mother_id"			=>	$value['motherplant_id']
				,"clone_id"				=>	$value['clone_id']
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
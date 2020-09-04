<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	if ( isset($_GET['clone_id']) && $_GET['clone_id'] != "" && isset($_GET['mother_id']) && $_GET['mother_id'] != ""){
		$query = new Database("SELECT a.id
			,a.unique_code
			,a.deactivated
			,a.start_date
			,a.qty_at_start
			,a.qty_at_end
			,a.end_date
			,a.motherplant_id
			,a.created_at
			,a.updated_at
			,a.qty_remaining
			,c.code_se
			,e.id as clone_id
			FROM karet_exvitro_rooting_green_house a
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
			,a.start_date
			,a.qty_at_start
			,a.qty_at_end
			,a.end_date
			,a.motherplant_id
			,a.created_at
			,a.updated_at
			,a.qty_remaining
			,c.code_se
			,e.id as clone_id
			FROM karet_exvitro_rooting_green_house a
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

		array_push($MetaData, 
			array(
				"id"					=>	$value['id']
				,"text"					=>	$value["unique_code"]
				,"unique_code"			=>	$value["unique_code"]
				,"mother_embryo"		=>	$mother_embryo
				,"start_date"			=>	$value['start_date']
				,"deactivated"			=>	$value['deactivated']
				,"start_date"			=>	$value['start_date']
				,"end_date"				=>	$value["end_date"]
				,"qty_at_start"			=>	$value["qty_at_start"]
				,"qty_remaining"		=>	$value['qty_remaining']
				,"qty_at_end"			=>	$value["qty_at_end"]
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
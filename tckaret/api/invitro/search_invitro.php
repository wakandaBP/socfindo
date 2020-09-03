<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	if ( isset($_GET['clone_id']) && $_GET['clone_id'] != "" && isset($_GET['mother_id']) && $_GET['mother_id'] != ""){
		$query = new Database("SELECT a.id
			,a.unique_code
			,a.deactivated
			,a.start_date
			,a.medium
			,a.recipient
			,a.number_of_plants
			,a.number_of_alive
			,a.number_of_dead
			,a.number_of_contaminated
			,a.end_date
			,a.new_shoots_for_r
			,a.new_shoots_on_m
			,a.motherplant_id
			,c.code_se
			,e.id as clone_id
			,e.clonename as clone
			/*,[laminar_flow]
			,[worker]
			,[created_at]
			,[updated_at]
			,[deleted_at] */
			FROM karet_invitro a
			--JOIN karet_invitro_parent_child b ON b.child = a.id 
			JOIN karet_motherplant c ON c.id = a.motherplant_id 
			JOIN karet_tree d ON d.id = c.tree
			JOIN karet_clone e ON e.id = d.clonename
		    WHERE a.unique_code LIKE '%" . 	$_GET['params'] . "%'
			AND c.id = ?
		    AND d.clonename = ?
		    AND a.deleted_at IS NULL 
		    AND a.deactivated = ?",array($_GET['mother_id'], $_GET['clone_id'], 'FALSE'));
	} else {
		$query = new Database("SELECT a.id
			,a.unique_code
			,a.deactivated
			,a.start_date
			,a.medium
			,a.recipient
			,a.number_of_plants
			,a.number_of_alive
			,a.number_of_dead
			,a.number_of_contaminated
			,a.end_date
			,a.new_shoots_for_r
			,a.new_shoots_on_m
			,a.motherplant_id
			,c.code_se
			,e.id as clone_id
			,e.clonename as clone
			/*,[new_shoots_for_r]
			,[new_shoots_on_m]
			,[laminar_flow]
			,[worker]
			,[created_at]
			,[updated_at]
			,[deleted_at] */
			FROM karet_invitro a
			--JOIN karet_invitro_parent_child b ON b.child = a.id 
			JOIN karet_motherplant c ON c.id = a.motherplant_id 
			JOIN karet_tree d ON d.id = c.tree
			JOIN karet_clone e ON e.id = d.clonename
		    WHERE a.unique_code LIKE '%" . 	$_GET['params'] . "%' 
		    AND a.deleted_at IS NULL 
		    AND a.deactivated = ?",array('FALSE'));
	}

	foreach ($query::$result as $key => $value) {
		/*$get_motherembryo = new Database("SELECT a.parent, b.code_se FROM karet_invitro_parent_child a JOIN karet_motherplant b ON a.parent = b.id WHERE a.child = ?",array($value['id']));
		$mother_embryo = $get_motherembryo::$result[0]["code_se"];
		$mother_id = $get_motherembryo::$result[0]['parent'];*/

	/*	$get_laminar = new Database("SELECT nolaminar FROM karet_laminar WHERE id = ?", array($value['laminar_flow']));
		$laminar = $get_laminar::$result[0]["nolaminar"];

		$get_vessel = new Database("SELECT vessel, vesselcode FROM karet_vessel WHERE id = ?", array($value['recipient']));
		$vessel = $get_vessel::$result[0]['vesselcode'];*/

		$get_medium = new Database("SELECT mediacode FROM karet_media WHERE id = ?", array($value['medium']));
		$medium = $get_medium::$result[0]['mediacode'];

		array_push($MetaData, 
			array(
				"id"=>$value['id']
				,"text"=>$value["unique_code"]
				,"unique_code"=>$value["unique_code"]
				,"mother_embryo"=>$value['code_se']
				,"mother_id" => $value['motherplant_id']
				,"clone_id" => $value['clone_id']
				,"clone"=>$value['clone']
				,"number_of_plants"=>intval($value["number_of_plants"])
				,"number_of_alive"=>intval($value["number_of_alive"])
				,"number_of_dead"=>intval($value['number_of_dead'])
				,"number_of_contaminated"=>intval($value['number_of_contaminated'])
				,"deactivated"=>$value["deactivated"]
				,"start_date"=>$value["start_date"]
				,"medium_name"=>$medium
				,"end_date"=>$value["end_date"]
				,"new_shoots_for_r"=>intval($value["new_shoots_for_r"])
				,"new_shoots_on_m"=>intval($value["new_shoots_on_m"])
				/*,"recipient"=>$value["recipient"]
				,"recipient_name"=>$vessel
				,"laminar_flow"=>$value["laminar_flow"]
				,"laminar_flow_name"=>$laminar
				,"worker"=>$value["worker"]*/
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
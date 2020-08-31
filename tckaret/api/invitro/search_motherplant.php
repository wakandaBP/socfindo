<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	/*$query = new Database("SELECT a.id
						,a.code_se
						,a.deactivated
						,a.initiation_year
						,c.clonename as clone
						,[new_shoots_for_r]
						,[new_shoots_on_m]
						,[laminar_flow]
						,[end_date]
						,[worker]
						,[created_at]
						,[updated_at]
						,[deleted_at] 
						FROM karet_motherplant a
						JOIN karet_tree b ON b.id = a.tree
						JOIN karet_clone c ON c.id = b.clonename
					    WHERE a.code_se LIKE '%" . strtoupper($_GET['term']) . "%' AND a.deleted_at IS NULL AND a.deactivated = ?",array('FALSE'));*/


	$query = new Database("SELECT a.id
						,a.code_se
						,a.deactivated
						,a.initiation_year
						,c.clonename as clone
						FROM karet_motherplant a
						JOIN karet_tree b ON b.id = a.tree
						JOIN karet_clone c ON c.id = b.clonename
					    WHERE a.code_se LIKE '%" . strtoupper($_GET['params']) . "%' AND a.deleted_at IS NULL AND a.deactivated = ?",array('FALSE'));

	foreach ($query::$result as $key => $value) {
	/*	$get_laminar = new Database("SELECT nolaminar FROM karet_laminar WHERE id = ?", array($value['laminar_flow']));
		$laminar = $get_laminar::$result[0]["nolaminar"];

		$get_medium = new Database("SELECT mediacode FROM karet_media WHERE id = ?", array($value['medium']));
		$medium = $get_medium::$result[0]['mediacode'];

		$get_vessel = new Database("SELECT vessel, vesselcode FROM karet_vessel WHERE id = ?", array($value['recipient']));
		$vessel = $get_vessel::$result[0]['vesselcode'];*/

		array_push($MetaData, 
			array(
				"id"				=> $value['id']
				,"text"				=> $value["code_se"]
				,"clone"			=> $value['clone']
				,"year"				=> $value['initiation_year']
				,"deactivated"		=> $value['deactivated']
				/*,"deactivated"=>$value["deactivated"]
				,"start_date"=>$value["start_date"]
				,"medium"=>$value["medium"]
				,"medium_name"=>$medium
				,"recipient"=>$value["recipient"]
				,"recipient_name"=>$vessel
				,"new_shoots_for_r"=>intval($value["new_shoots_for_r"])
				,"new_shoots_on_m"=>intval($value["new_shoots_on_m"])
				,"laminar_flow"=>$value["laminar_flow"]
				,"laminar_flow_name"=>$laminar
				,"end_date"=>$value["end_date"]
				,"worker"=>$value["worker"]*/
			)
		);
	}

	$pagination = ["more" => true];

	$returnData = array(
		"results"	=> $MetaData,
		//"pagination" => $pagination
	);

	
	echo json_encode($MetaData);
?>	
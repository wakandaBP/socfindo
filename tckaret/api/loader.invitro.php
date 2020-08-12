<?php 
	require "../config.php";
	require "../database.php";

	$MetaData = array();
	$query = new Database("SELECT [id]
						      ,[unique_code]
						      ,[deactivated]
						      ,[start_date]
						      ,[medium]
						      ,[recipient]
						      ,[number_of_plants]
						      ,[number_of_alive]
						      ,[number_of_dead]
						      ,[number_of_contaminated]
						      ,[new_shoots_for_r]
						      ,[new_shoots_on_m]
						      ,[contamination_type]
						      ,[laminar_flow]
						      ,[end_date]
						      ,[worker]
						      ,[created_at]
						      ,[updated_at]
						      ,[deleted_at] 
						      FROM karet_invitro WHERE deleted_at IS NULL",array());

	foreach ($query::$result as $key => $value) {
		/*$get_motherembryo = new Database("SELECT a.parent, b.code_se FROM karet_invitro_parent_child a JOIN karet_motherplant b ON a.parent = b.id WHERE a.child = ?",array($value['id']));
		$mother_embryo = $get_motherembryo::$result[0]["code_se"];*/

		$get_parent_child = new Database("SELECT parent, child, parent_option FROM karet_invitro_parent_child WHERE child = ?", array($value['id']));

		if ($get_parent_child::$result[0]['parent_option'] == "motherplant") {
			$get_motherembryo = new Database("SELECT a.parent, b.code_se FROM karet_invitro_parent_child a JOIN karet_motherplant b ON a.parent = b.id WHERE a.child = ?",array($value['id']));
			$mother_embryo = $get_motherembryo::$result[0]["code_se"];
		} else {
			$get_parent = new Database("SELECT parent, parent_option FROM karet_invitro_parent_child WHERE child = ?",array($value['id']));
			
			$get_motherembryo = new Database("SELECT a.parent, b.code_se FROM karet_invitro_parent_child a JOIN karet_motherplant b ON a.parent = b.id WHERE a.child = ?",array($get_parent::$result[0]['parent']));
			$mother_embryo = $get_motherembryo::$result[0]["code_se"];
		}

		$get_laminar = new Database("SELECT nolaminar FROM karet_laminar WHERE id = ?", array($value['laminar_flow']));
		$laminar = $get_laminar::$result[0]["nolaminar"];

		$get_medium = new Database("SELECT mediacode FROM karet_media WHERE id = ?", array($value['medium']));
		$medium = $get_medium::$result[0]['mediacode'];

		$get_vessel = new Database("SELECT vessel, vesselcode FROM karet_vessel WHERE id = ?", array($value['recipient']));
		$vessel = $get_vessel::$result[0]['vesselcode'];

		$last_updated = "";
		if (isset($_POST['id']) != ""){
			if ($_POST['id'] == $value['id']){
				$last_updated = "last_updated";
			}
		}

		array_push($MetaData, 
			array(
				"id"=>$value['id']
				,"unique_code"=>$value["unique_code"]
				,"mother_embryo"=>$mother_embryo
				,"deactivated"=>$value["deactivated"]
				,"start_date"=>$value["start_date"]
				,"medium"=>$value["medium"]
				,"medium_name"=>$medium
				,"recipient"=>$value["recipient"]
				,"recipient_name"=>$vessel
				,"number_of_plants"=>intval($value["number_of_plants"])
				,"number_of_alive"=>intval($value["number_of_alive"])
				,"number_of_dead"=>intval($value['number_of_dead'])
				,"number_of_contaminated"=>intval($value['number_of_contaminated'])
				,"new_shoots_for_r"=>intval($value["new_shoots_for_r"])
				,"new_shoots_on_m"=>intval($value["new_shoots_on_m"])
				,"contamination_type"=>$value["contamination_type"]
				,"laminar_flow"=>$value["laminar_flow"]
				,"laminar_flow_name"=>$laminar
				,"end_date"=>$value["end_date"]
				,"worker"=>$value["worker"]
				,"created_at"=>$value["created_at"]
				,"updated_at"=>$value["updated_at"]
				,"deleted_at"=>$value["deleted_at"]
				,"last_updated"=>$last_updated
			)
		);
	}

	$returnData = array(
				"draw"=>1,
				"recordsTotal"=>intval($query::$rowCount),
				"recordsFiltered"=>intval($query::$rowCount),
				"data"=>$MetaData
			);
	
	echo json_encode($returnData);
?>
<?php 
	require "../config.php";
	require "../database.php";

	$MetaData = array();
	$query = new Database("SELECT [id]
		,[unique_code]
		,[panel]
		,[qty_planted]
		,[qty_stands_at_planting]
		,[qty_stands_after_1_cencus]
		,[scan_date]
		,[motherplant_id]
		,[created_at]
		,[updated_at]
		,[deleted_at]
		,[planting_date]
		FROM karet_exvitro_plantation_field WHERE deleted_at IS NULL",array()
	);

	foreach ($query::$result as $key => $value) {

		$get_motherembryo = new Database("SELECT code_se FROM karet_motherplant WHERE id = ?",array($value['motherplant_id']));
		$mother_embryo = $get_motherembryo::$result[0]["code_se"];

		$last_updated = "";
		if (isset($_POST['id']) != ""){
			if ($_POST['id'] == $value['id']){
				$last_updated = "last_updated";
			}
		}

		$panel = new Database("SELECT * FROM karet_plantation_panel WHERE id = ?", array($value['panel']));
		$PanelName = $panel::$result[0]['panelname'];
		$block = new Database("SELECT * FROM karet_plantation_block WHERE id = ?", array($panel::$result[0]['idblock']));
		$BlockName = $block::$result[0]['blocknumber'];
		$plantation = new Database("SELECT * FROM karet_plantation WHERE id = ?", array($block::$result[0]['idplantation']));
		$PlantationName = $plantation::$result[0]['name'];
		$region = new Database("SELECT * FROM karet_plantation_region WHERE id = ?", array($plantation::$result[0]['region']));
		$RegionName = $region::$result[0]['name'];

		array_push($MetaData, 
			array(
				"id"							=>	$value['id']
				,"unique_code" 					=>	$value["unique_code"]
				,"mother_embryo"				=>	$mother_embryo
				,"panel"						=>	$value['panel']
				,"panel_name"					=>	$PanelName
				,"block"						=>	$BlockName
				,"plantation"					=>	$PlantationName
				,"region"						=>	$RegionName
				,"motherplant_id"				=>	$value["motherplant_id"]
				,"qty_planted"					=>	$value["qty_planted"]
				,"qty_stands_at_planting"		=>	$value["qty_stands_at_planting"]
				,"qty_stands_after_1_cencus"	=>	$value["qty_stands_after_1_cencus"]
				,"scan_date"					=>	$value['scan_date']
				,"created_at"					=>	$value["created_at"]
				,"updated_at"					=>	$last_updated
				,"planting_date"				=>	$value['planting_date']
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
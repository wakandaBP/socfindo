<?php 
	require "../config.php";
	require "../database.php";

	$MetaData = array();
	$query = new Database("SELECT [id]
		,[unique_code]
		,[start_date]
		,[qty_at_start]
		,[qty_remaining]
		,[qty_at_end]
		,[end_date]
		,[deactivated]
		,[created_at]
		,[updated_at]
		,[deleted_at]
		,[motherplant_id]
		FROM karet_exvitro_nursery WHERE deleted_at IS NULL",array()
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

		array_push($MetaData, 
			array(
				"id"						=>	$value['id']
				,"unique_code" 				=>	$value["unique_code"]
				,"mother_embryo"			=>	$mother_embryo
				,"motherplant_id"			=>	$value["motherplant_id"]
				,"deactivated"				=>	$value["deactivated"]
				,"qty_at_start"				=>	$value["qty_at_start"]
				,"qty_remaining"			=>	$value["qty_remaining"]
				,"qty_at_end"				=>	$value['qty_at_end']
				,"start_date"				=>	$value['start_date']
				,"end_date"					=>	$value["end_date"]
				,"created_at"				=>	$value["created_at"]
				,"last_updated"				=>	$last_updated
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
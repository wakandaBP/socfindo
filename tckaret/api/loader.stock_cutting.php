<?php 
	require "../config.php";
	require "../database.php";

	$MetaData = array();
	$query = new Database("SELECT [id]
		,[unique_code]
		,[deactivated]
		,[site]
		,[date_stock]
		,[qty]
		,[qty_remaining]
		,[table_number]
		,[motherplant_id]
		,[created_at]
		,[updated_at]
		,[end_date]
		,[start_date]
		FROM karet_exvitro_stock_cutting WHERE deleted_at IS NULL",array()
	);

	foreach ($query::$result as $key => $value) {

		$get_motherembryo = new Database("SELECT code_se FROM karet_motherplant WHERE id = ?",array($value['motherplant_id']));
		$mother_embryo = $get_motherembryo::$result[0]["code_se"];

		$get_plantation = new Database("SELECT a.name as plantation, b.name as region FROM karet_plantation a JOIN karet_plantation_region b ON b.id = a.region WHERE a.id = ?",array($value['site']));
		$plantation = $get_plantation::$result[0]["plantation"] . "; " . $get_plantation::$result[0]["region"];

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
				,"plantation_id"			=>	$value["site"]
				,"plantation"				=>	$plantation
				,"date_stock"				=>	$value["qty_remaining"]
				,"qty"						=>	$value['qty']
				,"qty_remaining"			=>	$value['qty_remaining']
				,"table_number"				=>	$value['table_number']
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
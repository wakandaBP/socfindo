<?php 
	require "../config.php";
	require "../database.php";

	$MetaData = array();
	$query = new Database("SELECT [id]
		,[unique_code]
		,[deactivated]
		,[plantation]
		,[country_arrival_date]
		,[supplier]
		,[date_of_shipment]
		,[plantation_arrival_date]
		,[start_date]
		,[green_house_number]
		,[qty_received]
		,[qty_rejected]
		,[qty_at_end]
		,[dead_plant]
		,[motherplant_id]
		,[created_at]
		,[updated_at]
		FROM karet_acclimatization WHERE deleted_at IS NULL",array()
	);

	foreach ($query::$result as $key => $value) {

		$get_motherembryo = new Database("SELECT code_se FROM karet_motherplant WHERE id = ?",array($value['motherplant_id']));
		$mother_embryo = $get_motherembryo::$result[0]["code_se"];
		
		$get_plantation = new Database("SELECT a.name as plantation, b.name as region FROM karet_plantation a 
			JOIN karet_plantation_region b ON b.id = a.region				
			WHERE a.id = ?", array($value['plantation']));

		$plantation = $get_plantation::$result[0]["region"] . "; " . $get_plantation::$result[0]["plantation"];

		$get_supplier = new Database("SELECT name FROM karet_supplier WHERE id = ?", array($value['supplier']));
		$supplier = $get_supplier::$result[0]['name'];

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
				,"deactivated"				=>	$value["deactivated"]
				,"plantation"				=>	$plantation
				,"country_arrival_date"		=>	$value["country_arrival_date"]
				,"supplier"					=>	$supplier
				,"date_of_shipment"			=>	$value["date_of_shipment"]
				,"plantation_arrival_date"	=>	$value["plantation_arrival_date"]
				,"start_date"				=>	$value["start_date"]
				,"green_house_number"		=>	$value["green_house_number"]
				,"qty_received"				=>	$value["qty_received"]
				,"qty_rejected"				=>	$value["qty_rejected"]
				,"qty_at_end"				=>	$value["qty_at_end"]
				,"dead_plant"				=>	$value["dead_plant"]
				,"motherplant_id"			=>	$value["motherplant_id"]
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
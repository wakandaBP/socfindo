<?php 
	require "../config.php";
	require "../database.php";

	$MetaData = array();
	$query = new Database("SELECT [id]
		,[unique_code]
		,[block]
		,[planting_date]
		,[qty_planted]
		,[qty_stands]
		,[qty_rejected]
		,[motherplant_id]
		,[created_at]
		,[updated_at]
		FROM karet_exvitro_budwood_garden WHERE deleted_at IS NULL",array()
	);

	foreach ($query::$result as $key => $value) {

		$get_motherembryo = new Database("SELECT code_se FROM karet_motherplant WHERE id = ?",array($value['motherplant_id']));
		$mother_embryo = $get_motherembryo::$result[0]["code_se"];

		$get_block = new Database("SELECT blocknumber FROM karet_plantation_block WHERE id = ?",array($value['block']));
		$block = $get_block::$result[0]["blocknumber"];

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
				,"block"					=>	$block
				,"planting_date"			=>	$value["planting_date"]
				,"qty_planted"				=>	$value["qty_planted"]
				,"qty_stands"				=>	$value['qty_stands']
				,"qty_rejected"				=>	$value['qty_rejected']
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
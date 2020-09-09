<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	if ( isset($_GET['id']) && $_GET['id'] != "" ) {

		$query = new Database("SELECT id
						,parent
						,child
						FROM karet_exvitro_budwood_garden_parent_child 
					    WHERE child = ?
					    AND deleted_at IS NULL",array($_GET['id']));

		foreach ($query::$result as $key => $value) {

			$get_plant_field = new Database("SELECT unique_code, qty_at_start, start_date, end_date FROM  karet_exvitro_nursery WHERE id = ?", array($value['parent']));

			$unique_code = $get_plant_field::$result[0]['unique_code'];
			$qty_at_start = $get_plant_field::$result[0]['qty_at_start'];
			$nursery_start = $get_plant_field::$result[0]['start_date'];
			$nursery_end = $get_plant_field::$result[0]['end_date'];

			array_push($MetaData, 
				array(
					"id"				=> $value['parent']
					,"unique_code"		=> $unique_code
					,"qty_at_start"		=> $qty_at_start
					,"nursery_start"	=> $nursery_start
					,"nursery_end"		=> $nursery_end
				)
			);
		}
		
		echo json_encode($MetaData);
	}
	
?>	
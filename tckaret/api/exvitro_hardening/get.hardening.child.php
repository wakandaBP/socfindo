<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	if ( isset($_GET['id']) && $_GET['id'] != "" ) {

		$query = new Database("SELECT id
						,parent
						,child
						FROM karet_exvitro_nursery_parent_child 
					    WHERE parent = ?
					    AND deleted_at IS NULL",array($_GET['id']));

		foreach ($query::$result as $key => $value) {
			$unique_code = "";
			$qty_at_start = "-";
			$nursery_start = "-";

			$get_nursery = new Database("SELECT unique_code, qty_at_start, start_date FROM karet_exvitro_nursery WHERE id = ?", array($value['child']));

			$unique_code = $get_nursery::$result[0]['unique_code'];
			$qty_at_start = $get_nursery::$result[0]['qty_at_start'];
			$nursery_start = $get_nursery::$result[0]['start_date'];


			array_push($MetaData, 
				array(
					"id"				=> $value['child']
					,"unique_code"		=> $unique_code
					,"qty_at_start"		=> $qty_at_start
					,"start_end"		=> $nursery_start
				)
			);
		}
		
		echo json_encode($MetaData);
	}
	
?>	
<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	if ( isset($_GET['id']) && $_GET['id'] != "" ) {

		$query = new Database("SELECT id
						,parent
						,child
						FROM karet_exvitro_rooting_green_house_parent_child 
					    WHERE parent = ?
					    AND deleted_at IS NULL",array($_GET['id']));

		foreach ($query::$result as $key => $value) {

			$get_rooting = new Database("SELECT unique_code, qty_at_start, qty_at_end, start_date, end_date FROM  karet_exvitro_rooting_green_house WHERE id = ?", array($value['child']));

			$qty_at_end = "-";
			if ($get_rooting::$result[0]['qty_at_end'] != null){
				$qty_at_end = $get_rooting::$result[0]['qty_at_end'];
			}

			array_push($MetaData, 
				array(
					"id"				=> $value['parent']
					,"unique_code"		=> $get_rooting::$result[0]['unique_code']
					,"qty_at_start"		=> $get_rooting::$result[0]['qty_at_start']
					,"qty_at_end"		=> $qty_at_end
					,"rooting_start"	=> $get_rooting::$result[0]['start_date']
				)
			);
		}
		
		echo json_encode($MetaData);
	}
	
?>	
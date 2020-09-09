<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	if ( isset($_GET['id']) && $_GET['id'] != "" ) {

		$query = new Database("SELECT id
						,parent
						,child
						FROM karet_exvitro_nursery_parent_child 
					    WHERE child = ?
					    AND deleted_at IS NULL",array($_GET['id']));

		foreach ($query::$result as $key => $value) {
			$unique_code = "";
			$qty_at_start = "-";
			$hardening_end = "-";

			$get_hardening = new Database("SELECT unique_code, qty_at_start, start_date, end_date FROM karet_exvitro_hardening WHERE id = ?", array($value['parent']));

			$unique_code = $get_hardening::$result[0]['unique_code'];
			$qty_at_start = $get_hardening::$result[0]['qty_at_start'];
			$hardening_start = $get_hardening::$result[0]['start_date'];
			$hardening_end = $get_hardening::$result[0]['end_date'];


			array_push($MetaData, 
				array(
					"id"				=> $value['parent']
					,"unique_code"		=> $unique_code
					,"qty_at_start"		=> $qty_at_start
					,"hardening_start"	=> $hardening_start
					,"hardening_end"	=> $hardening_end
				)
			);
		}
		
		echo json_encode($MetaData);
	}
	
?>	
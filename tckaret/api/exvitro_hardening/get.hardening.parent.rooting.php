<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	if ( isset($_GET['id']) && $_GET['id'] != "" ) {

		$query = new Database("SELECT id
						,parent
						,child
						,parent_option
						FROM karet_exvitro_hardening_parent_child 
					    WHERE child = ?
					    AND parent_option = ?
					    AND deleted_at IS NULL",array($_GET['id'], 'rooting'));

		foreach ($query::$result as $key => $value) {
			$unique_code = "";
			$qty_at_start = "-";
			$rooting_end = "-";

			$get_acc = new Database("SELECT unique_code, qty_at_start, end_date FROM karet_exvitro_rooting_green_house WHERE id = ?", array($value['parent']));

			$unique_code = $get_acc::$result[0]['unique_code'];
			$qty_at_start = $get_acc::$result[0]['qty_at_start'];
			$rooting_end = $get_acc::$result[0]['end_date'];


			array_push($MetaData, 
				array(
					"id"				=> $value['parent']
					,"unique_code"		=> $unique_code
					,"qty_at_start"		=> $qty_at_start
					,"rooting_end"		=> $rooting_end
				)
			);
		}
		
		echo json_encode($MetaData);
	}
	
?>	
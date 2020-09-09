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
					    AND deleted_at IS NULL",array($_GET['id'], 'acclimatization'));

		foreach ($query::$result as $key => $value) {
			$unique_code = "";
			$qty_received = "-";
			$acc_end = "-";

			$get_acc = new Database("SELECT unique_code, qty_received, end_date FROM karet_acclimatization WHERE id = ?", array($value['parent']));

			$unique_code = $get_acc::$result[0]['unique_code'];
			$qty_received = $get_acc::$result[0]['qty_received'];
			$acc_end = $get_acc::$result[0]['end_date'];


			array_push($MetaData, 
				array(
					"id"				=> $value['parent']
					,"unique_code"		=> $unique_code
					,"qty_received"		=> $qty_received
					,"acc_end"			=> $acc_end
				)
			);
		}
		
		echo json_encode($MetaData);
	}
	
?>	
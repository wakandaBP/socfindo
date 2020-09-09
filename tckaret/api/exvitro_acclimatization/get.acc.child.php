<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	if ( isset($_GET['id']) && $_GET['id'] != "" ) {

		$query = new Database("SELECT id
						,parent
						,child
						FROM karet_exvitro_hardening_parent_child 
					    WHERE parent = ?
					    AND deleted_at IS NULL",array($_GET['id'], 'FALSE'));

		foreach ($query::$result as $key => $value) {
			$get_acc = new Database("SELECT unique_code, qty_at_start FROM karet_exvitro_hardening WHERE id = ?", array($value['child']));
			
			$unique_code = $get_acc::$result[0]['unique_code'];
			$qty_at_start = $get_acc::$result[0]['qty_at_start'];

			array_push($MetaData, 
				array(
					"id"				=> $value['child']
					,"unique_code"		=> $unique_code
					,"qty_at_start"		=> $qty_at_start
				)
			);
		}
		
		echo json_encode($MetaData);
	}
	
?>	
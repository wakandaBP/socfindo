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
					    AND parent_option = ?
					    AND deleted_at IS NULL",array($_GET['id'], 'rooting'));

		foreach ($query::$result as $key => $value) {

			$get_hardening = new Database("SELECT unique_code, qty_at_start, start_date, qty_at_end FROM karet_exvitro_hardening WHERE id = ?", array($value['child']));

			$qty_at_end = $get_hardening::$result[0]['qty_at_end'];
			
			if ($qty_at_end == null){
				$qty_at_end = "-";
			}

			array_push($MetaData, 
				array(
					"id"				=> $value['parent']
					,"unique_code"		=> $get_hardening::$result[0]['unique_code']
					,"qty_at_start"		=> $get_hardening::$result[0]['qty_at_start']
					,"hardening_start"	=> $get_hardening::$result[0]['start_date']
					,"qty_at_end"		=> $qty_at_end
				)
			);
		}
		
		echo json_encode($MetaData);
	}
	
?>	
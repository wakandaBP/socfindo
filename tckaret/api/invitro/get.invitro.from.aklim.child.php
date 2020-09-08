<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	if ( isset($_GET['id']) && $_GET['id'] != "" ) {

		$query = new Database("SELECT id
						,parent
						,child
						FROM karet_acclimatization_parent_child 
					    WHERE parent = ?
					    AND deleted_at IS NULL",array($_GET['id'], 'FALSE'));

		foreach ($query::$result as $key => $value) {
			$unique_code = "";
			$quantity = "";
			$invitro_end = "";

			$get_child = new Database("SELECT unique_code, qty_received FROM karet_acclimatization WHERE id = ?", array($value['child']));

			$unique_code = $get_child::$result[0]['unique_code'];
			$quantity =  $get_child::$result[0]['qty_received'];

			$get_invitro = new Database("SELECT unique_code, end_date FROM karet_invitro WHERE id = ?", array($_GET['id']));
			$invitro_end = $get_invitro::$result[0]['end_date'];


			array_push($MetaData, 
				array(
					"id"				=>	$value['child']
					,"unique_code"		=>	$unique_code
					,"quantity"			=>	$quantity
					,"invitro_end"		=>	$invitro_end
				)
			);
		}
		
		echo json_encode($MetaData);
	}
	
?>	
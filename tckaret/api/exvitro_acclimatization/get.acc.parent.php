<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	if ( isset($_GET['id']) && $_GET['id'] != "" ) {

		$query = new Database("SELECT id
						,parent
						,child
						FROM karet_acclimatization_parent_child 
					    WHERE child = ?
					    AND deleted_at IS NULL",array($_GET['id'], 'FALSE'));

		foreach ($query::$result as $key => $value) {
			$unique_code = "";
			$number_of_plants = "-";
			$invitro_end = "-";

			$get_invitro = new Database("SELECT unique_code, end_date, number_of_plants FROM karet_invitro WHERE id = ?", array($value['parent']));

			$unique_code = $get_invitro::$result[0]['unique_code'];
			$number_of_plants = $get_invitro::$result[0]['number_of_plants'];
			$invitro_end = $get_invitro::$result[0]['end_date'];


			array_push($MetaData, 
				array(
					"id"				=> $value['parent']
					,"unique_code"		=> $unique_code
					,"number_of_plants"	=> $number_of_plants
					,"invitro_end"		=> $invitro_end
				)
			);
		}
		
		echo json_encode($MetaData);
	}
	
?>	
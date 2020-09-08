<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	if ( isset($_GET['id']) && $_GET['id'] != "" ) {

		$query = new Database("SELECT id
						,parent
						,child
						,parent_option
						FROM karet_invitro_parent_child 
					    WHERE parent = ?
					    AND parent_option = ?
					    AND deleted_at IS NULL",array($_GET['id'], 'invitro', 'FALSE'));

		foreach ($query::$result as $key => $value) {
			$unique_code = "";
			$number_of_plants = "";

			$get_child = new Database("SELECT unique_code, number_of_plants FROM karet_invitro WHERE id = ?", array($value['child']));

			$unique_code = $get_child::$result[0]['unique_code'];
			$number_of_plants =  $get_child::$result[0]['number_of_plants'];

			array_push($MetaData, 
				array(
					"id"				=> $value['child']
					,"unique_code"		=> $unique_code
					,"number_of_plants"	=> $number_of_plants
				)
			);
		}
		
		echo json_encode($MetaData);
	}
	
?>	
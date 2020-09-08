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
					    WHERE child = ?
					    AND deleted_at IS NULL",array($_GET['id'], 'FALSE'));

		foreach ($query::$result as $key => $value) {
			$unique_code = "";
			$number_of_alive = "-";
			$number_of_dead = "-";

			if ( $value['parent_option'] == 'motherplant' ){

				$get_mother = new Database("SELECT code_se FROM karet_motherplant WHERE id = ?", array($value['parent']));
				$unique_code = $get_mother::$result[0]['code_se'];

			} elseif ( $value['parent_option'] == 'invitro') {
				
				$get_mother = new Database("SELECT unique_code, number_of_alive, number_of_dead FROM karet_invitro WHERE id = ?", array($value['parent']));
				$unique_code = $get_mother::$result[0]['unique_code'];
				$number_of_alive =  $get_mother::$result[0]['number_of_alive'];
				$number_of_dead =  $get_mother::$result[0]['number_of_dead'];

			}


			array_push($MetaData, 
				array(
					"id"				=> $value['parent']
					,"unique_code"		=> $unique_code
					,"number_of_alive"	=> $number_of_alive
					,"number_of_dead"	=> $number_of_dead
				)
			);
		}
		
		echo json_encode($MetaData);
	}
	
?>	
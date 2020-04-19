	<?php 
	require "../../config.php";
	require "../../database.php";
	require "../../all_function.php";
	require "../../myfunction.php";

	$MetaData = array();
	$query = new Database("SELECT * FROM karet_embryo_germination_prepare WHERE id_embryo = ? "
							,array($_POST['id']));

	foreach ($query::$result as $key => $value) {
		
		array_push($MetaData, 
			array(
				"id"=>$value['id'],
				"idembryo"=>$value["id_embryo"], 
				"germdate"=>$value["germ_date"],
				"worker"=>$value['germ_worker'],
				"shoot"=>$value['shoot'],
				"germinated"=>$value['germinated'],
				"comment"=>$value['comment']
				//"media"=>$value['mediacode']
			)
		);
	}

	echo json_encode($MetaData);
?>
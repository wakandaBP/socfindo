<?php 
	require "../config.php";
	require "../database.php";
 
	$MetaData = array();
	

	$query = new Database("SELECT * FROM karet_motherplant_file WHERE file_motherplan = ?", array($_POST["id"])); 

	foreach ($query::$result as $key => $value) {
		array_push($MetaData, 
			array(
				"comment_id"=>$value["file_id"],
				"comment_content"=>$value["file_comment"],
				"comment_date"=>$value["file_date"],
				"comment_file"=>$value["file_name"],
				"comment_target"=>$value["file_location"],
			)
		);
	}
	$returnData = array(
		"draw"=>1,
		"recordsTotal"=>intval($query::$rowCount),
		"recordsFiltered"=>intval($query::$rowCount),
		"data"=>$MetaData
	);
	echo json_encode($returnData);


?>
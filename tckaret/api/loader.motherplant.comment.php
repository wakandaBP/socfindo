<?php 
	require "../config.php";
	require "../database.php";
 
	$MetaData = array();
	

	$query = new Database("SELECT * FROM karet_motherplant_comment WHERE comment_motherplan = ?", array($_POST["id"])); 

	foreach ($query::$result as $key => $value) {
		array_push($MetaData, 
			array(
				"comment_id"=>$value["comment_id"],
				"comment_content"=>$value["comment_content"],
				"comment_date"=>$value["comment_date"],
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
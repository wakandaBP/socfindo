<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	$query = new Database("SELECT a.id
						,a.code_se
						,a.deactivated
						,a.initiation_year
						,c.clonename as clone
						FROM karet_motherplant a
						JOIN karet_tree b ON b.id = a.tree
						JOIN karet_clone c ON c.id = b.clonename
					    WHERE a.code_se LIKE '%" . strtoupper($_GET['params']) . "%' 
					    AND a.deleted_at IS NULL AND a.deactivated = ?",array('FALSE'));

	foreach ($query::$result as $key => $value) {
		array_push($MetaData, 
			array(
				"id"				=> $value['id']
				,"text"				=> $value["code_se"]
				,"clone"			=> $value['clone']
				,"year"				=> $value['initiation_year']
				,"deactivated"		=> $value['deactivated']
			)
		);
	}

	$pagination = ["more" => true];

	$returnData = array(
		"results"	=> $MetaData,
		"pagination" => $pagination
	);

	
	echo json_encode($MetaData);
?>	
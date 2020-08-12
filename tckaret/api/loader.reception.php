<?php 
	require "../config.php";
	require "../database.php";
	require "../all_function.php";

	$MetaData = array();

	if (isset($_POST['awal']) && isset($_POST['akhir']) && $_POST['awal'] != "" && $_POST['akhir'] != ""){
		$query = new Database("SELECT a.id, b.treecode, a.harvestdate, a.senddate, 
									a.receiptdate, a.flowersharvested, a.fruitsharvested, 
									a.comment, d.partname, c.clonename, e.name as plantation  
							FROM karet_reception a 
							JOIN karet_tree b ON a.idtree = b.id
							JOIN karet_clone c ON a.clone = c.id
							JOIN karet_treepart d ON a.treepart = d.id
							JOIN karet_plantation e ON a.plantation = e.id
							WHERE a.isactive = ? AND a.receiptdate BETWEEN ? AND ? ORDER BY a.id DESC",array("1",$_POST['awal'],$_POST['akhir']));

	} else {
		$query = new Database("SELECT a.id, b.treecode, a.harvestdate, a.senddate, 
									a.receiptdate, a.flowersharvested, a.fruitsharvested, 
									a.comment, d.partname, c.clonename, e.name as plantation  
							FROM karet_reception a 
							JOIN karet_tree b ON a.idtree = b.id
							JOIN karet_clone c ON a.clone = c.id
							JOIN karet_treepart d ON a.treepart = d.id
							JOIN karet_plantation e ON a.plantation = e.id
							WHERE a.isactive = ? ORDER BY a.id DESC",array("1"));
	}

	foreach ($query::$result as $key => $value) {
		$last_updated = "";
		if ($_POST['id'] != ""){
			if ($_POST['id'] == $value['id']){
				$last_updated = "last_updated";
			}
		}
	
		array_push($MetaData, 
			array(
				"id"=>$value["id"],
				"treecode"=>$value["treecode"],
				"harvestdate"=>$value["harvestdate"],
				"senddate"=>$value["senddate"],
				"receiptdate"=>$value["receiptdate"],
				"flowers"=>$value["flowersharvested"],
				"fruits"=>$value["fruitsharvested"],
				"comment"=>$value["comment"], 
				"clonename"=>$value["clonename"],
				"treepart"=>$value["partname"],
				"plantation"=>$value["plantation"],
				"last_updated"=>$last_updated
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
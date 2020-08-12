<?php 
	require "../config.php";
	require "../database.php";
 
	$MetaData = array();
	

	$query = new Database("SELECT * FROM karet_motherplant WHERE deleted_at IS NULL", array()); 

	foreach ($query::$result as $key => $value) {
		if(!empty($value["code_se"])){
			
			$getTree = new Database("SELECT * FROM karet_tree WHERE id = ?", array($value["tree"]));
			$IDTree = $getTree::$result[0]["id"];
			$IDPlantation = $getTree::$result[0]["idplantation"];
			$YearOfPlanting = $getTree::$result[0]["yearofplanting"];

			$getClone = new Database("SELECT * FROM karet_clone WHERE id = ?", array($getTree::$result[0]["clonename"]));
			$CloneName = $getClone::$result[0]["clonename"];

			$getPlantation = new Database("SELECT * FROM karet_plantation WHERE id = ?", array($IDPlantation));
			$PlantationName = $getPlantation::$result[0]["name"];
			
			$getTreePart = new Database("SELECT * FROM karet_treepart WHERE id = ?", array($value["treepart"]));
			$PartName = $getTreePart::$result[0]["partname"];

			$getMedium = new Database("SELECT * FROM karet_media WHERE id = ?", array($value["start_medium"]));
			$readMedium = $getMedium::$result[0]["mediacode"];
			//$readMedium = "";// $value["idmedium"];

			//$getEmbryo = new Database("SELECT * FROM karet_embryo WHERE se = ?", array($value["idembryo"]));
			

			array_push($MetaData, 
				array(
					"id"=>$value["id"],
					"codese"=>$value["code_se"],
					"se"=>$value['se'],
					"certified"=>$value["certified"],
					"deactive"=>$value["deactivated"],
					"initiationyear"=>$value["initiation_year"],
					"tree"=>$CloneName,
					"treecode_id" => $value['tree'],
					"treepart_name"=>$PartName, 
					"treepart_id" => $value["treepart"],

					"receptionug"=>date("d F Y", strtotime($value["reception_ug"])),
					"receptionug_format"=>date("d-m-Y", strtotime($value["reception_ug"])),
					"usageofseeds"=>($value["usage_of_seeds"] == "") ? "" : date("d F Y", strtotime($value["usage_of_seeds"])),
					"usageofseeds_format"=>date("d-m-Y", strtotime($value["usage_of_seeds"])),
					"harvestdate"=>date("d F Y", strtotime($value["harvest_date"])),
					"harvestdate_format"=>date("d-m-Y", strtotime($value["harvest_date"])),
					"germinationdate"=>date("d F Y", strtotime($value["germination_date"])),
					"germinationdate_format"=>date("d-m-Y", strtotime($value["germination_date"])),
					
					"plantation_name"=>$PlantationName,
					"yearofplanting"=>/*$YearOfPlanting*/"",
					"startmedium"=>$value['start_medium'],
					"startmedium_name"=>$readMedium,
					//"germination"=>$value["germination"],
					"germinationmedium"=>$value["germination_medium"],
					"leafsample"=>$value["leaf_sample"],
					"leafsamplelocation"=>$value["leaf_sample_location"],
					"leafsamplecirad"=>$value["leaf_sample_cirad"],
					"germinationse"=>$value["germination_se"]
				)
			);
		}
	}
	$returnData = array(
		"draw"=>1,
		"recordsTotal"=>intval($query::$rowCount),
		"recordsFiltered"=>intval($query::$rowCount),
		"data"=>$MetaData
	);
	echo json_encode($returnData);

















	/*$query = new Database("SELECT a.id, a.codese, b.clonename as tree, 
								  d.name as tree , c.name as tree,e.partname as treepart,
								  a.leafsample, a.leafsamplelocation, a.leafsamplecirad,

								  

								  a.receptionug,
								  a.usageofseeds,



								  a.harvestdate, a.startmedium, a.germination,
								  a.germinationmedium, a.germinatedse, a.isactive, 
							
			  
							FROM karet_motherplan a 
							JOIN karet_clone b ON a.clonename = b.id
							JOIN karet_plantation c ON a.idplantation = c.id
							JOIN karet_tree d ON a.tree = d.id
							JOIN karet_treepart e ON a.partname = e.id
							",array());*/
	/*$query = new Database("
		SELECT
			a.id,
			a.idembryo,
			a.idresource,
			a.idtreatment,
			a.codese,
			a.certified,
			a.nocertified,
			a.initiationyear,
			a.tree,
			a.treepart,
			a.harvestdate,
			a.receptiondate,
			a.initiationdate,
			a.idmedium,
			a.germinationdate,
			a.germinationmedium,
			a.maturation2medium,
			a.maturation1medium,
			a.embryomedium,
			a.initiationmedium,
			a.leafsample,
			a.leafsamplelocation,
			a.leafsamplecirad,
			a.germinationse,
			a.used,
			a.isactive,
			a.deactive,

			b.yearofplanting,
			b.id as treecode_id,

			c.clonename as tree,

			d.name as plantation_name,


			e.partname as treepart_name,
			e.id as treepart_id,

			f.se


		FROM karet_motherplan a

		JOIN karet_tree b
			ON a.tree = b.treecode

		JOIN karet_clone c
			ON b.clonename = c.id

		JOIN karet_plantation d
			ON b.idplantation = d.id

		JOIN karet_treepart e
			ON a.treepart = e.id

		JOIN karet_embryo f
			ON a.idembryo = f.se


	", array());*/
?>
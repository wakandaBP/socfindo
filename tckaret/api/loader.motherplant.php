<?php 
	require "../config.php";
	require "../database.php";
 
	$MetaData = array();
	

	$query = new Database("SELECT * FROM karet_motherplan", array()); 

	foreach ($query::$result as $key => $value) {
		if(!empty($value["codese"])){
			
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

			/*$getMedium = new Database("SELECT * FROM karet_media WHERE id = ?", array($value["idmedium"]));
			$readMedium = $getMedium::$result[0]["mediacode"];*/
			$readMedium = $value["idmedium"];

			//$getEmbryo = new Database("SELECT * FROM karet_embryo WHERE se = ?", array($value["idembryo"]));
			

			array_push($MetaData, 
				array(
					"id"=>$value["id"],
					"codese"=>$value["codese"],
					"se"=>/*$getEmbryo::$result[0]["se"]*/"",
					"certified"=>$value["certified"],
					"deactive"=>$value["deactive"],
					"initiationyear"=>$value["initiationyear"],
					"tree"=>$CloneName,
					"treecode_id" => $IDTree,
					"treepart_name"=>$PartName, 
					"treepart_id" => $getTreePart::$result[0]["id"],

					"receptionug"=>date("d F Y", strtotime($value["receptiondate"])),
					"receptionug_format"=>date("d-m-Y", strtotime($value["receptiondate"])),
					"usageofseeds"=>($value["initiationdate"] == "") ? "" : date("d F Y", strtotime($value["initiationdate"])),
					"usageofseeds_format"=>date("d-m-Y", strtotime($value["initiationdate"])),
					"harvestdate"=>date("d F Y", strtotime($value["harvestdate"])),
					"harvestdate_format"=>date("d-m-Y", strtotime($value["harvestdate"])),
					"germinationdate"=>date("d F Y", strtotime($value["germinationdate"])),
					"germinationdate_format"=>date("d-m-Y", strtotime($value["germinationdate"])),
					
					"plantation_name"=>$PlantationName,
					"yearofplanting"=>/*$YearOfPlanting*/"",
					"startmedium"=>$readMedium,
					//"germination"=>$value["germination"],
					"germinationmedium"=>$value["germinationmedium"],
					"leafsample"=>$value["leafsample"],
					"leafsamplelocation"=>$value["leafsamplelocation"],
					"leafsamplecirad"=>$value["leafsamplecirad"],
					"germinationse"=>$value["germinationse"],
					"isactive" => $value["isactive"],
					"initiationmedium" => $value["initiationmedium"]
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
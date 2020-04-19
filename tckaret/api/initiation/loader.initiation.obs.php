<?php 
	require "../../config.php";
	require "../../database.php";
	require "../../all_function.php";

	$MetaData = array();
	$query = new Database("SELECT a.id, a.id_treatment, a.obsdate, a.piecesnotreact, 
								a.alotofcallus, a.littlebitofcallus, a.yellow, a.white, a.orange, a.brown, 
								a.dead, b.id_treatment, b.id_reception, b.sample, a.idcontaminationrecord,
								--d.mediacode as initiationmedium, a.mediumpreparedate, a.workermedia, 
								b.nobox, d.clonename, a.isavailable
								--b.id_mediatranslog
								FROM karet_initiation_obs a 
								JOIN karet_initiation b ON b.id_treatment = a.id_treatment
	 							JOIN karet_reception c ON c.id = b.id_reception 
								JOIN karet_clone d ON d.id = c.clone 
								--JOIN karet_media d ON d.id = a.idmedia
								--JOIN karet_laminar e ON a.laminar = e.id 
								WHERE a.id_treatment = ? AND a.isactive = ? ORDER BY a.obsdate DESC",array($_POST['id'],1));

	foreach ($query::$result as $key => $value) {
		$notdisable = "";
		$disable = "";
		if (intval($value['isavailable']) !== 1){
			//melakukan disable pada observasi yang sudah ditransfer
			$disable = "disabled";
		} else {
			$notdisable = "notdisabled";
		}

		array_push($MetaData, 
			array(
				"id"=>$value["id"], 
				"idtreatment"=>$value["id_treatment"],
				"idreception"=>$value["id_reception"],
				"obsdate"=>$value['obsdate'],
				"notreact"=>$value['piecesnotreact'],
				"alotof"=>$value['alotofcallus'],
				"littlebit"=>$value['littlebitofcallus'],
				"yellow"=>$value['yellow'],
				"white"=>$value['white'],
				"orange"=>$value['orange'],
				"brown"=>$value['brown'],
				"dead"=>$value['dead'],
				"notdisabled"=>$notdisable,
				"disabled"=>$disable
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

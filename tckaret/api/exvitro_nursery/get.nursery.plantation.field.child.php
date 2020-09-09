<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	if ( isset($_GET['id']) && $_GET['id'] != "" ) {

		$query = new Database("SELECT id
						,parent
						,child
						FROM karet_exvitro_plantation_field_parent_child 
					    WHERE parent = ?
					    AND deleted_at IS NULL",array($_GET['id']));

		foreach ($query::$result as $key => $value) {
			$unique_code = "";
			$qty_at_start = "-";
			$nursery_start = "-";

			$get_plan_field = new Database("SELECT 
				unique_code
				,qty_planted 
				,qty_stands_at_planting 
				,qty_stands_after_1_cencus 
				,panel
				,scan_date
				FROM karet_exvitro_plantation_field WHERE id = ?", array($value['child']));

			$plant_field = $get_plan_field::$result[0];

			$get_panel = new Database("SELECT 
				a.panelname
				, b.blocknumber
				, c.name as plantation
				, d.name as region 
				FROM karet_plantation_panel a 
				JOIN karet_plantation_block b ON b.id = a.idblock
				JOIN karet_plantation c ON c.id = b.idplantation
				JOIN karet_plantation_region d ON d.id = c.region
				WHERE a.id = ?", array($plant_field['panel']));
			
			$panel = $get_panel::$result[0];

			array_push($MetaData, 
				array(
					"id"							=>	$value['child']
					,"unique_code"					=>	$plant_field['unique_code']
					,"qty_planted"					=>	$plant_field['qty_planted']
					,"qty_stands_at_planting"		=>	$plant_field['qty_stands_at_planting']
					,"qty_stands_after_1_cencus"	=>	$plant_field['qty_stands_after_1_cencus']
					,"panel"						=>	$panel['panelname']
					,"block"						=>	$panel['blocknumber']
					,"plantation"					=>	$panel['plantation']
					,"region"						=>	$panel['region']
					,"scan_date"					=>	$plant_field['scan_date']
				)
			);
		}
		
		echo json_encode($MetaData);
	}
	
?>	
<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	if ( isset($_GET['id']) && $_GET['id'] != "" ) {

		$query = new Database("SELECT id
						,parent
						,child
						FROM karet_exvitro_budwood_garden_parent_child 
					    WHERE parent = ?
					    AND deleted_at IS NULL",array($_GET['id']));

		foreach ($query::$result as $key => $value) {
			$unique_code = "";
			$qty_at_start = "-";
			$nursery_start = "-";

			$get_budwood = new Database("SELECT 
				unique_code
				,qty_planted 
				,qty_stands
				,qty_rejected
				,block
				FROM karet_exvitro_budwood_garden WHERE id = ?", array($value['child']));

			$budwood = $get_budwood::$result[0];
			$qty_stands = $budwood['qty_stands'];
			$qty_rejected = $budwood['qty_rejected'];
			
			if ($qty_stands == null){
				$qty_stands = '-';
			}

			if ($qty_rejected == null){
				$qty_rejected = '-';
			}

			$get_block = new Database("SELECT 
				b.blocknumber
				, c.name as plantation
				, d.name as region 
				FROM karet_plantation_block b 
				JOIN karet_plantation c ON c.id = b.idplantation
				JOIN karet_plantation_region d ON d.id = c.region
				WHERE b.id = ?", array($budwood['block']));
			
			$block = $get_block::$result[0];

			array_push($MetaData, 
				array(
					"id"							=>	$value['child']
					,"unique_code"					=>	$budwood['unique_code']
					,"qty_planted"					=>	$budwood['qty_planted']
					,"qty_stands"					=>	$qty_stands
					,"qty_rejected"					=>	$qty_rejected
					,"block"						=>	$block['blocknumber']
					,"plantation"					=>	$block['plantation']
					,"region"						=>	$block['region']
				)
			);
		}
		
		echo json_encode($MetaData);
	}
	
?>	
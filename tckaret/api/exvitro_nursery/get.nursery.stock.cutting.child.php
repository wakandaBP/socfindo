<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	if ( isset($_GET['id']) && $_GET['id'] != "" ) {

		$query = new Database("SELECT id
						,parent
						,child
						FROM karet_exvitro_stock_cutting_parent_child 
					    WHERE parent = ?
					    AND deleted_at IS NULL",array($_GET['id']));

		foreach ($query::$result as $key => $value) {

			//site -> plantation
			$get_cutting = new Database("SELECT 
				unique_code
				,qty 
				,table_number
				,site
				,date_stock
				FROM karet_exvitro_stock_cutting WHERE id = ?", array($value['child']));



			$cutting = $get_cutting::$result[0];
			
			$get_plantation = new Database("SELECT 
				c.name as plantation
				, d.name as region 
				FROM karet_plantation_block b 
				JOIN karet_plantation c ON c.id = b.idplantation
				JOIN karet_plantation_region d ON d.id = c.region
				WHERE c.id = ?", array($cutting['site']));
			
			$plantation = $get_plantation::$result[0];

			array_push($MetaData, 
				array(
					"id"							=>	$value['child']
					,"unique_code"					=>	$cutting['unique_code']
					,"qty"							=>	$cutting['qty']
					,"table_number"					=>	$cutting['table_number']
					,"plantation"					=>	$plantation['plantation']
					,"region"						=>	$plantation['region']
					,"date_stock"					=>	$cutting['date_stock']
				)
			);
		}
		
		echo json_encode($MetaData);
	}
	
?>	
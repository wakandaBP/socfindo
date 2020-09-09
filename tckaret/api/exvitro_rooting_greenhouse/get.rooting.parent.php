<?php 
	require "../../config.php";
	require "../../database.php";

	$MetaData = array();

	if ( isset($_GET['id']) && $_GET['id'] != "" ) {

		$query = new Database("SELECT id
						,parent
						,child
						FROM karet_exvitro_rooting_green_house_parent_child 
					    WHERE child = ?
					    AND deleted_at IS NULL",array($_GET['id']));

		foreach ($query::$result as $key => $value) {

			$get_cutting = new Database("SELECT unique_code, date_stock, qty, table_number, site, end_date FROM  karet_exvitro_stock_cutting WHERE id = ?", array($value['parent']));

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
					"id"				=> $value['parent']
					,"unique_code"		=> $cutting['unique_code']
					,"date_stock"		=> $cutting['date_stock']
					,"qty"				=> $cutting['qty']
					,"table_number"		=> $cutting['table_number']
					,"plantation"		=> $plantation['plantation']
					,"region"			=> $plantation['region']
					,"end_date"			=> $cutting['end_date']
				)
			);
		}
		
		echo json_encode($MetaData);
	}
	
?>	
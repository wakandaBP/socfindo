<?php 
	require "../../config.php";
	require "../../database.php";

	$query = new Database("SELECT * FROM karet_embryo_germination_prepare_screening
							WHERE id_embryo = ?
							ORDER BY screening_checkpoint DESC"
							,array($_POST['id'],1));

	$checkpoint_stats = $query::$rowCount + 1;

	echo json_encode($checkpoint_stats);
?>
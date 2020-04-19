	<?php 
	require "../../config.php";
	require "../../database.php";
	require "../../all_function.php";
	require "../../myfunction.php";

	$MetaData = array();
	$query = new Database("SELECT * FROM karet_embryo_germination WHERE id = ? "
							,array($_POST['id']));

	foreach ($query::$result as $key => $value) {
		//$worker = getWorkerInitial($value['screening_worker']);

		array_push($MetaData, 
			array(
				"id"=>$value['id'],
				"idembryo"=>$value["id_embryo"], 
				"transdate"=>$value["transferdate"],
				"worker"=>$value['germ_worker'],
				"laminar"=>$value['laminar'],
				"culroom"=>$value['cultureroom'],
				"nobox"=>$value['nobox'],
				"comment"=>$value['comment'],
				"connect"=>$value['connected_to_other'],
				"shape"=>$value['shape_of_embryo'],
				"size"=>$value['size_of_embryo'],
				"em_comment"=>$value['comment_embryo'],
				"typecallus"=>$value['type_of_callus'],
				"colorcallus"=>$value['color_of_callus'],
				"cal_comment"=>$value['comment_callus']
			)
		);
	}

	echo json_encode($MetaData);
?>
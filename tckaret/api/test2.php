<?php 
	require "../config.php";
	require "../database.php";
	require "../myfunction.php";

	/*$getMedia = new Database("SELECT a.id, a.stok FROM karet_media a 
													JOIN karet_media_pembuatan b ON a.id = b.idmedia WHERE b.id = ?"
													,array(
														16
													)
												);

						$mediaStok = $getMedia::$result[0]['stok'];
						$idMedia = $getMedia::$result[0]['id'];

	echo $mediaStok . " ";
	echo $idMedia . " ";*/

	$data = array();

	//$data = $_POST['datacheckbox'];
	
	
	//echo json_encode($data);
	//echo new DateTime(format('Y-m-d H:i:s'));
	//$date = date_create();
	$date = date_format(date_create(),'Y-m-d');
	$date2 = date_format(date_create(),'Y-m-d H:i:s');

	//$date = date_create('2000-01-01', timezone_open('Pacific/Nauru'));
	$date2 = date_format(date_create(date(''),timezone_open('Asia/Jakarta')), 'Y-m-d H:i:s');
	echo date('Y-m-d H:i:s');
	$tgl = "2017-01-11";

	// $tanggal1 = new DateTime("2020-01-10");
	// $tanggal2 = new DateTime();
	 
	// $perbedaan = $tanggal2->diff($tanggal1)->format("%a");
	 
	// echo $perbedaan;
	// Break apart at new lines.
	//$pieces = explode("-", $text);

	// Join the pieces together back into one line.
	//$wrapped_lines = join('', $pieces);

	/*$barcode = generateBarcode(1,20,5,13,$tgl);

	echo $barcode;
	echo "<br />";
	echo strlen($barcode);*/

	/*$a = 1;

	if ($a < 0){
		echo "Bilangan A adalah negatif";
	} elseif ($a > 0) {
		echo "Bilangan A adalah positif";
	}*/
	/*$arr = "1";
	
	foreach ($arr as $key => $value) {
		echo $value . " ";
	}*/

	$randomString = generateRandomString(5);
	$barcode = generateBarcode(1,20,5,2,$tgl,"T",$randomString);
    
	$unicode = generateUnicode(1,1,"M");
    //echo $unicode;

    /*$str = "jorbut";
    $str = strtoupper($str);*/

    //$str = editLogMedia(59,5,1);
    //print_r($str);
    //echo 10 + (-4);
?>	
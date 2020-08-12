<?php 
function timeStamp(){
	$date = date_format(date_create(date(''),timezone_open('Asia/Jakarta')), 'Y-m-d H:i:s');

	return $date;
}

function cekTimeout($admin,$timelog){
	$login_session_duration = 10; 
	$current_time = time(); 
	if(isset($_SESSION[md5('adminfortckaret')])) {  
		if(((time() - $_SESSION[md5('timeloginadminkaret')]) > $login_session_duration)){ 
			return true; 
		} 
	}
	return false;
}

/*--------------- FUNCTION GENERATE RANDOM STRING, BARCODE, UNICODE -----------------*/

function generateRandomString($length = 5){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/*===========================================================*/

function generateBarcode($idreception, $idtreat_or_embryo, $idworker, $idmedium, $tgl, $treat_or_embryo, $random){

	$recep = new Database("SELECT * FROM karet_reception WHERE id = ?",array($idreception));
	$clone = getClone($recep::$result[0]['clone']);		//getting clonename
	$worker = getWorkerInitial($idworker);				//getting worker initial
	$media = new Database("SELECT * FROM karet_media WHERE id = ?",array($idmedium));	//getting mediacode


	$tanggal = explode("-",$tgl);  
	$tglcode = join('',$tanggal);

	$barcode = str_pad($idreception, 5, "0", STR_PAD_LEFT). "_" .$clone['clonename']. "_" . str_pad($idtreat_or_embryo, 5, "0", STR_PAD_LEFT) . "_" .$worker['initial']. "_" .$media::$result[0]['mediacode']. "_" .$tglcode. "_" .$treat_or_embryo. "_" .$random;

	return $barcode;
}

/*===========================================================*/

function generateUnicode($id,$idembryo,$step){
	$dataEm = new Database("SELECT * FROM karet_embryo WHERE id = ?",array($idembryo));
	$idTreat = $dataEm::$result[0]['id_treatment'];

	$dataTreat = new Database("SELECT * FROM karet_initiation WHERE id_treatment = ?",array($idTreat));
	$idRecep = $dataTreat::$result[0]['id_reception'];

	$dataRecep = new Database("SELECT * FROM karet_reception WHERE id = ?",array($idRecep));
	$idtree = $dataRecep::$result[0]['idtree'];

	$dataClone = new Database("SELECT * FROM karet_clone WHERE id = ?",array($dataRecep::$result[0]['clone']));
	$clone = $dataClone::$result[0]['clonename'];

	$dataTree = new Database("SELECT * FROM karet_tree WHERE id = ?",array($idtree));
	$tree = $dataTree::$result[0]['treecode'];

	$unicode = $clone . "-" . $tree . "-" . $idembryo . "_" . $step . "_" . str_pad($id, 6, "0", STR_PAD_LEFT);

	return $unicode;
}

/*--------------------------------------------------------------------------*/

/*------------------------ FUNCTION FOR WORKER -----------------------------*/

function getWorkerName($value){
		$worker1 = new Database("SELECT * FROM karet_worker WHERE id = ?",array($value));
		$name = $worker1::$result[0]['name'];

		return $name;
	}

function getWorkerInitial($value){
	$data = array();
	
	$worker = new Database("SELECT kode_employee, initial FROM karet_worker WHERE id = ?",array($value));
	$data = array("kode"=>$worker::$result[0]['kode_employee'],"initial"=>$worker::$result[0]['initial']);
	
	return $data;
}

/* -------------------------------------------------------- */

/*function getMedia1($value){
	$media1 = new Database("SELECT idpembuatanmedia, no_vessel FROM karet_media_transaction_log WHERE id = ?",array($value));

	foreach ($media1::$result as $key => $items) {
		$media2 = new Database("SELECT a.mediacode, b.tglpembuatanmedia as mediadate, d.nama as worker 
					FROM karet_media a 
					JOIN karet_media_pembuatan b ON a.id = b.idmedia 
					JOIN karet_worker c ON c.id = b.idworker
					JOIN master_pegawai d ON d.id = c.id_pegawaimaster
					WHERE b.id = ?",array($items['idpembuatanmedia']));

		foreach ($media2::$result as $key => $data) {
			$mediacode = array("media"=>$data['mediacode'],"petridish"=>$items['no_vessel'],"mediadate"=>$data['mediadate'],"mediaworker"=>$data['worker']);
		}

	}
	return $mediacode;
}

function getMedia2($value){
	$mediacode = null;
	$media1 = new Database("SELECT idpembuatanmedia, no_vessel FROM karet_media_transaction_log WHERE id = ?",array($value));

	foreach ($media1::$result as $key => $items) {
		$mediacode = $items['no_vessel'];

	}
	
	return $mediacode;
}
*/

function getMedia1($value){
	$media1 = new Database("SELECT idpembuatanmedia, jumlah_keluar FROM karet_media_pengeluaran WHERE id = ?",array($value));

	foreach ($media1::$result as $key => $items) {
		$media2 = new Database("SELECT a.mediacode, b.tglpembuatanmedia as mediadate, d.nama as worker 
					FROM karet_media a 
					JOIN karet_media_pembuatan b ON a.id = b.idmedia 
					JOIN karet_worker c ON c.id = b.idworker
					JOIN master_pegawai d ON d.id = c.id_pegawaimaster
					WHERE b.id = ?",array($items['idpembuatanmedia']));

		foreach ($media2::$result as $key => $data) {
			$mediacode = array("media"=>$data['mediacode'],"petridish"=>$items['no_vessel'],"mediadate"=>$data['mediadate'],"mediaworker"=>$data['worker']);
		}

	}
	return $mediacode;
}

function getMedia2($value){
	$media = new Database("SELECT a.id, a.mediacode, b.nama_jenis as jenis FROM karet_media a
								JOIN karet_media_type b ON b.id = a.id_jenis_media  
								WHERE a.id = ?",array($value));

	
	if ($media::$rowCount > 0){
		$data = array("id"=>$media::$result[0]['id'],"mediacode"=>$media::$result[0]['mediacode'],"jenis"=>$media::$result[0]['jenis']);
		return $data;
	}
}

function getMediaTotal2($id){
	$mediacode = null;
	$media1 = new Database("SELECT idpembuatanmedia, jumlah_keluar, tglkeluar 
								FROM karet_media_pengeluaran WHERE id = ?",array($id));

	foreach ($media1::$result as $key => $items) {
		$mediacode = $items['jumlah_keluar'];

	}
	
	return $mediacode;
}

/*------------------------ FUNCTION FOR CLONE -----------------------------*/

function getClone($idclone){
	$clonedata = array();

	$clone = new Database("SELECT * FROM karet_clone WHERE id = ?",array($idclone));
	$clonedata = array("idclone"=>$clone::$result[0]['id'],"clonename"=>$clone::$result[0]['clonename']);

	return $clonedata;
}

/*------------------------------------------------------------------------*/

/*------------------------ FUNCTION FOR LAMINAR --------------------------*/

function getLaminar($id){
	$laminardata = array();

	$laminar = new Database("SELECT * FROM karet_laminar WHERE id = ?",array($id));
	$laminardata = array("idlaminar"=>$laminar::$result[0]['id'],"nolaminar"=>$laminar::$result[0]['nolaminar'],"cleandate"=>$laminar::$result[0]['cleaningdate'],"datetoclean"=>$laminar::$result[0]['datetoclean']);

	return $laminardata;
}

/*------------------------------------------------------------------------*/

/*------------------------ FUNCTION FOR CONTAMINATION --------------------*/

function getContamination($id){
	$query1 = new Database("SELECT * FROM karet_contamination_record WHERE id = ?",array($id));

	$data = array("fungi"=>$query1::$result[0]['contamination_fungi'],"bact"=>$query1::$result[0]['contamination_bact'],"pink"=>$query1::$result[0]['pink'],"dead"=>$query1::$result[0]['dead'],"comment"=>$query1::$result[0]['comments']);
	
	return $data;	
}

/*------------------------------------------------------------------------*/

/*function createLogMedia($idtreat, $idpembuatanmedia, $amount, $rejustep){
	$data = array();

	$date = date_format(date_create(),'Y-m-d');
	$query2 = new Database("INSERT INTO karet_media_pengeluaran (idpembuatanmedia, jumlah_keluar,
					tglkeluar, reju_step, id_treatment, isactive) VALUES (?,?,?,?,?,?)"
					,array($idpembuatanmedia,$amount,$date,$rejustep,$idtreat,1));	
	$idkeluarmedia = $query2::$lastInsertId;
	$q2 = $query2::$rowCount;

	$getMedia = new Database("SELECT a.id, a.stok FROM karet_media a 
								JOIN karet_media_pembuatan b ON a.id = b.idmedia WHERE b.id = ?"
								,array(
									$idpembuatanmedia
								)
							);

	$mediaStok = $getMedia::$result[0]['stok'];
	$idMedia = $getMedia::$result[0]['id'];
	
	$mediaStokupdate = new Database("UPDATE karet_media set stok = ? WHERE id = ?",array(($mediaStok - intval($amount)),$idMedia));	
	$q3 = $mediaStokupdate::$rowCount;

	$data = array("idmedia"=>$idMedia,"idpengeluaranmedia"=>$idkeluarmedia);

	return $data;
}*/

/* -------------------------- FUNCTION FOR LOG MEDIA STOK ----------------------------*/

function createLogMedia($idtreat, $idmedia, $amount, $rejustep, $idembryo = NULL){
	$data = array();
	$remainmedia = 0;

	$date = timeStamp();
	$query2 = new Database("INSERT INTO karet_media_pengeluaran (jumlah_keluar,
					tglkeluar, reju_step, id_treatment, id_media, id_embryo ,isactive) VALUES (?,?,?,?,?,?,?)"
					,array($amount,$date,$rejustep,$idtreat,$idmedia,$idembryo,1));	
	
	$idMediakeluar = $query2::$lastInsertId;

	$count = intval($amount);
	while ($count > 0){
		/*$query3 = new Database("SELECT * FROM karet_media_pembuatan WHERE idmedia = ? AND remaining_media > ? AND isactive = ? AND is_expired = ?",array($idmedia,0,1,0));*/

		$query3 = new Database("SELECT MIN(tglpembuatanmedia) as tglbuat, id, remaining_media FROM karet_media_pembuatan WHERE idmedia = ? AND remaining_media > ? AND isactive = ? AND is_expired = ? GROUP BY id, remaining_media ORDER BY tglbuat ASC",array($idmedia,0,1,0));
		$idBuat = $query3::$result[0]['id'];

		$count = $count - intval($query3::$result[0]['remaining_media']);

		$remainmedia = 0;
		if ($count < 0){
			$remainmedia = abs($count);
		}

		$query4 = new Database("UPDATE karet_media_pembuatan SET remaining_media = ? WHERE id = ?",array($remainmedia,$idBuat)); 
	}

	//$query5 = new Database("SELECT * FROM karet_media WHERE id = ?",array($idmedia));

	$query6 = new Database("SELECT * FROM karet_media_pembuatan WHERE idmedia = ? AND isactive = ? AND is_expired = ?",array($idmedia,1,0));
	
	//check available media stok based by idmedia 
	$remainstok = 0;
	foreach ($query6::$result as $key => $value) {
		$remainstok = $remainstok + $value['remaining_media'];
	}

	//update stok to media
	$mediaStokupdate = new Database("UPDATE karet_media set stok = ? WHERE id = ?"
										,array($remainstok,$idmedia));	

	$countAll = $query2::$rowCount + $query3::$rowCount + $query4::$rowCount + $mediaStokupdate::$rowCount;
	$resultStok = array("count"=>$countAll,"idMediaOut"=>$idMediakeluar);

	return $resultStok;
}

/*===========================================================*/

function editLogMedia($idmediaout, $amount, $idmedia){
	$countAll = 0;

	$cekLog = new Database("SELECT * FROM karet_media_pengeluaran WHERE id = ?",array($idmediaout));
	$logJlhKeluar = intval($cekLog::$result[0]['jumlah_keluar']);
	$idMediaKeluar = $cekLog::$result[0]['id_media'];

	if ($idMediaKeluar == $idmedia){
		$q2 = 0;

		if ($logJlhKeluar > $amount){
			//get excess media : count_of_out_log - amount
			$lebih = intval($logJlhKeluar) - intval($amount); 

			while ($lebih > 0){
				$query1 = new Database("SELECT MAX(tglpembuatanmedia) as tglbuat, id, jumlah,
								jumlah - remaining_media as sisa FROM karet_media_pembuatan 
								WHERE idmedia = ? AND jumlah > remaining_media AND is_expired = ? 
								GROUP BY id, jumlah, remaining_media ORDER BY tglbuat DESC"
								,array($idmedia,0));

				$idBuat = $query1::$result[0]['id'];
				$jlhMedia = intval($query1::$result[0]['jumlah']);
				$sisaMedia = intval($query1::$result[0]['sisa']);

				//getting result of $lebih
				$lebih = $lebih	- $sisaMedia;
				$tambah = $lebih;

				//if media out log more than remain_media
				if ($lebih > 0){
					$tambah = 0;
				}

				$query2 = new Database("UPDATE karet_media_pembuatan SET remaining_media = ? WHERE id = ?",array($jlhMedia + $tambah,$idBuat));

				$q2 = $query2::$rowCount;
			}

		} elseif ($logJlhKeluar < $amount) {
			//get remain media needed : amount - count_of_out_log
			$sisa = intval($amount) - intval($logJlhKeluar); 

			while ($sisa > 0) {
				
				$query1 = new Database("SELECT MIN(tglpembuatanmedia) as tglbuat, id, remaining_media FROM karet_media_pembuatan WHERE idmedia = ? AND remaining_media > 0 AND is_expired = ? GROUP BY id, remaining_media ORDER BY tglbuat ASC",array($idmedia,0));
				$idBuat = $query1::$result[0]['id'];
				$mediaBuat = $query1::$result[0]['remaining_media'];
				
				$sisa = $sisa - intval($mediaBuat);
				if ($sisa < 0){
					$remainmedia = abs($sisa);
				}

				$query2 = new Database("UPDATE karet_media_pembuatan SET remaining_media = ? WHERE id = ?",array($remainmedia,$idBuat));

				$q2 = $query2::$rowCount; 
			}
		}

		$query3 = new Database("UPDATE karet_media_pengeluaran SET jumlah_keluar = ?, id_media = ? WHERE id = ?",array($amount,$idmedia,$idmediaout));

		$countAll = $countAll + $q2 + $query3::$rowCount;

	} else {
		//$cekStokMedia = new Database("SELECT * FROM karet_media WHERE id = ?",array($idMediaPeng));		

		//returning stok to the beginning 
		//$initStok = $LogStok + $cekStokMedia::$result[0]['stok'];

		//returning remaining stok into creation log
		$lebih = intval($logJlhKeluar);
		while ($lebih > 0){
			$query1 = new Database("SELECT MAX(tglpembuatanmedia) as tglbuat, id, jumlah,
								jumlah - remaining_media as sisa FROM karet_media_pembuatan 
								WHERE idmedia = ? AND jumlah > remaining_media AND is_expired = ? 
								GROUP BY id, jumlah, remaining_media ORDER BY tglbuat DESC"
								,array($idMediaKeluar,0));

			$idBuat = $query1::$result[0]['id'];
			$jlhMedia = intval($query1::$result[0]['jumlah']);
			$sisaMedia = intval($query1::$result[0]['sisa']);

			//getting result of $lebih
			$lebih = $lebih	- $sisaMedia;
			$tambah = $lebih;

			//if media out log more than remain_media
			if ($lebih > 0){
				$tambah = 0;
			}

			$query2 = new Database("UPDATE karet_media_pembuatan SET remaining_media = ? WHERE id = ?",array($jlhMedia + $tambah,$idBuat));

			$q2 = $query2::$rowCount;
		}

		//count stok for media returning stok
		countStokMedia($idMediaKeluar);

		$count = intval($amount);
		while ($count > 0){
			/*$query3 = new Database("SELECT * FROM karet_media_pembuatan WHERE idmedia = ? AND remaining_media > ? AND isactive = ? AND is_expired = ?",array($idmedia,0,1,0));*/

			$query1 = new Database("SELECT MIN(tglpembuatanmedia) as tglbuat, id, remaining_media FROM karet_media_pembuatan WHERE idmedia = ? AND remaining_media > 0 AND isactive = ? AND is_expired = ? GROUP BY id, remaining_media ORDER BY tglbuat ASC",array($idmedia,1,0));
			$idBuat = $query1::$result[0]['id'];

			$count = $count - intval($query1::$result[0]['remaining_media']);

			$remainmedia = 0;
			if ($count < 0){
				$remainmedia = abs($count);
			}

			$query2 = new Database("UPDATE karet_media_pembuatan SET remaining_media = ? WHERE id = ?",array($remainmedia,$idBuat)); 

			$q2 = $query2::$rowCount;
		}

		$query3 = new Database("UPDATE karet_media_pengeluaran SET jumlah_keluar = ?, id_media = ? WHERE id = ?",array($amount,$idmedia,$idmediaout));

		$countAll = $countAll + $q2 + $query3::$rowCount;
	}

	//check stok and update to karet_media
	$mediaStokUpdate = countStokMedia($idmedia);	

	$countAll = $countAll + $mediaStokUpdate;
	$resultStok = array("count"=>$countAll,"idMediaOut"=>$idmediaout);

	return $resultStok;

}

/*====================================*/

function countStokMedia($idmedia){
	$query6 = new Database("SELECT * FROM karet_media_pembuatan WHERE idmedia = ? AND isactive = ? AND is_expired = ?",array($idmedia,1,0));
		
	$remainstok = 0;
	foreach ($query6::$result as $key => $value) {
		$remainstok = $remainstok + $value['remaining_media'];
	}

	$mediaStokupdate = new Database("UPDATE karet_media set stok = ? WHERE id = ?"
										,array($remainstok,$idmedia));

	return $mediaStokupdate::$rowCount; 
}

/*------------------------------------------------------------------------------*/

/*-------------------------- FUNGSI UNTUK MENAMPILKAN HASIL ADD / UPDATE -------------------------------------------*/
function printResult($id, $rowcount){
	$result = array("id"=>$id,"rowcount"=>$rowcount);
	print_r(json_encode($result));
}



<?php 
	session_start();

	require "config.php";
	require "database.php";
	require "myfunction.php";

	try {
		switch ($_POST["action"]) {
			case "login":
				$query = new Database("SELECT * FROM karet_users WHERE username = ? AND password = ?"
								,array($_POST['username'],md5($_POST['password'])));
				
			 
				if ($query::$rowCount > 0){
					$_SESSION[md5('adminfortckaret')] = $query::$result[0]['username'];
					$_SESSION[md5('timeloginadminkaret')] = time();
				} 	

				echo $query::$rowCount;
			break;

			/*-----------------Worker CRUD---------------------*/

			case "add-worker":
				$query = new Database("INSERT INTO karet_worker (kode_employee, name, initial, description, isactive, status) VALUES (?,?,?,?,?,?)",
					array(
						$_POST["kode"],
						$_POST['name'],
						$_POST["initial"],
						$_POST["description"],
						"1",
						$_POST["status"]
					)
				);

				$id = $query::$lastInsertId;
				
				//own function
				printResult($id, $query::$rowCount);
			break;

			case "update-worker":
				$query = new Database("UPDATE karet_worker SET kode_employee = ?, name = ?, initial = ?, description = ?, status = ? WHERE id = ?",
					array(
						$_POST["kode"],
						$_POST["name"],
						$_POST["initial"],
						$_POST["description"],
						$_POST["status"],
						$_POST["id"]
					)
				);
				
				printResult($_POST["id"],$query::$rowCount);
			break;

			case "delete-worker":
				$query = new Database("UPDATE karet_worker SET isactive = ? WHERE id = ?",array("0",$_POST["id"]));
				echo $query::$rowCount;
			break;


			/*-----------------Region CRUD---------------------*/

			case "add-region":
				$query = new Database("INSERT INTO karet_plantation_region (name, isactive) VALUES (?, ?)",array(strtoupper($_POST["name"]),1)); 

				$id = $query::$lastInsertId;
				$count = $query::$rowCount;

				printResult($id, $count);
			break;

			case "update-region":
				$query = new Database("UPDATE karet_plantation_region SET name = ? WHERE id = ?",array(strtoupper($_POST["name"]), $_POST["id"]));
				
				$count = $query::$rowCount;

				printResult($_POST['id'], $count);
			break;

			case "delete-region":
				$query = new Database("UPDATE karet_plantation_region SET isactive = ? WHERE id = ?",array(0,$_POST["id"]));
				echo $query::$rowCount;
			break;

			/*-----------------Plantation CRUD---------------------*/

			case "add-plantation":
				$query = new Database("INSERT INTO karet_plantation (name, region, description, isactive) VALUES (?,?,?,?)",array(strtoupper($_POST["name"]), $_POST['region'], $_POST["description"],"1")); 

				$id = $query::$lastInsertId;
				$count = $query::$rowCount;

				printResult($id, $count);
			break;

			case "update-plantation":
				$query = new Database("UPDATE karet_plantation SET name = ?, region = ?, description = ? WHERE id = ?",array(strtoupper($_POST["name"]), $_POST['region'], $_POST["description"],$_POST["id"]));
				
				$count = $query::$rowCount;

				printResult($_POST['id'], $count);
			break;

			case "delete-plantation":
				$query = new Database("UPDATE karet_plantation SET isactive = ? WHERE id = ?",array("0",$_POST["id"]));
				echo $query::$rowCount;
			break;

			/*-----------------Block CRUD---------------------*/

			case "add-block":
				$query = new Database("INSERT INTO karet_plantation_block (idplantation, blocknumber, description, isactive) VALUES (?,?,?,?)",array($_POST["idplantation"],$_POST["blocknumber"],$_POST["description"],"1"));
				
				$id = $query::$lastInsertId;
				$count = $query::$rowCount;

				printResult($id, $count);
			break;

			case "update-block":
				$query = new Database("UPDATE karet_plantation_block SET blocknumber = ?, description = ? WHERE id = ?",array($_POST["blocknumber"],$_POST["description"],$_POST["idblock"]));
				
				$count = $query::$rowCount;

				printResult($_POST['idblock'], $count);
			break;

			case "delete-block":
				$query = new Database("UPDATE karet_plantation_block SET isactive = ? WHERE id = ?",array("0",$_POST["id"]));
				echo $query::$rowCount;
			break;

			/*-----------------Panel CRUD---------------------*/

			case "add-panel":
				$query = new Database("INSERT INTO karet_plantation_panel (idblock, panelname, description, isactive) VALUES (?,?,?,?)",array($_POST["idblock"],$_POST["panelname"],$_POST["description"],"1"));
				
				$id = $query::$lastInsertId;
				$count = $query::$rowCount;

				printResult($id, $count);
			break;

			case "update-panel":
				$query = new Database("UPDATE karet_plantation_panel SET panelname = ?, description = ? WHERE id = ?",array($_POST["panelname"],$_POST["description"],$_POST["idpanel"]));			
				
				$count = $query::$rowCount;

				printResult($_POST['idpanel'], $count);
			break;

			case "delete-panel":
				$query = new Database("UPDATE karet_plantation_panel SET isactive = ? WHERE id = ?",array("0",$_POST["id"]));
				echo $query::$rowCount;
			break;


			/*-----------------Supplier CRUD---------------------*/

			case "add-supplier":
				$query = new Database("INSERT INTO karet_supplier (name, isactive) VALUES (?, ?)",array(strtoupper($_POST["name"]),1)); 

				$id = $query::$lastInsertId;
				$count = $query::$rowCount;

				printResult($id, $count);
			break;

			case "update-supplier":
				$query = new Database("UPDATE karet_supplier SET name = ? WHERE id = ?",array(strtoupper($_POST["name"]), $_POST["id"]));
				
				$count = $query::$rowCount;

				printResult($_POST['id'], $count);
			break;

			case "delete-supplier":
				$query = new Database("UPDATE karet_supplier SET isactive = ? WHERE id = ?",array(0,$_POST["id"]));
				echo $query::$rowCount;
			break;

			/*-----------------Clone CRUD---------------------*/

			case "add-clone":
				$query = new Database("INSERT INTO karet_clone (clonename, description, isactive) VALUES (?,?,?)",array($_POST["clonename"],$_POST["description"],"1"));
				
				$id = $query::$lastInsertId;
				$count = $query::$rowCount;

				printResult($id, $count);
			break;

			case "update-clone":
				$query = new Database("UPDATE karet_clone SET clonename = ?, description = ? WHERE id = ?",array($_POST["clonename"],$_POST["description"],$_POST["id"]));
				
				$count = $query::$rowCount;

				printResult($_POST['id'], $count);
			break;

			case "delete-clone":
				$query = new Database("UPDATE karet_clone SET isactive = ? WHERE id = ?",array("0",$_POST["id"]));
				echo $query::$rowCount;
			break;

			/*-----------------Treepart / leafstage CRUD---------------------*/

			case "add-treepart":
				$query = new Database("INSERT INTO karet_treepart (partname, description, isactive) VALUES (?,?,?)",array($_POST["partname"],$_POST["description"],"1"));
				
				$id = $query::$lastInsertId;
				$count = $query::$rowCount;

				printResult($id, $count);
			break;

			case "update-treepart":
				$query = new Database("UPDATE karet_treepart SET partname = ?, description = ? WHERE id = ?",array($_POST["partname"],$_POST["description"],$_POST["id"]));
				
				$count = $query::$rowCount;

				printResult($_POST['id'], $count);
			break;

			case "delete-treepart":
				$query = new Database("UPDATE karet_treepart SET isactive = ? WHERE id = ?",array("0",$_POST["id"]));
				echo $query::$rowCount;
			break;


			/*-----------------Tree CRUD---------------------*/

			case "add-tree":
				$query = new Database("INSERT INTO karet_tree (idplantation, num_tree, block, treecode, yearofplanting, clonename, line, gps, certified, certificatenumber, isactive) VALUES (?,?,?,?,?,?,?,?,?,?,?)"
					,array(
						$_POST["plantation"],
						$_POST['num_tree'],
						$_POST["block"],
						$_POST["treecode"],
						$_POST["yearofplant"],
						$_POST["clone"],
						$_POST["line"],
						$_POST["gps"],
						$_POST["certified"],
						$_POST["certinumber"],
						"1"
					)
				);

				$id = $query::$lastInsertId;
				$count = $query::$rowCount;

				printResult($id, $count);
			break;

			case "update-tree":
				$query = new Database("UPDATE karet_tree SET idplantation = ?, num_tree = ?, block = ?, treecode = ?, yearofplanting = ?, clonename = ?, line = ?, gps = ?, certified = ?, certificatenumber = ? WHERE id = ?"
					,array(
						$_POST["plantation"],
						$_POST['num_tree'],
						$_POST["block"],
						$_POST["treecode"],
						$_POST["yearofplant"],
						$_POST["clone"],
						$_POST["line"],
						$_POST["gps"],
						$_POST["certified"],
						$_POST["certinumber"],
						$_POST["id"]));
				

				$count = $query::$rowCount;

				printResult($_POST['id'], $count);
			break;

			case "delete-tree":
				$query = new Database("UPDATE karet_tree SET isactive = ? WHERE id = ?",array("0",$_POST["id"]));
				echo $query::$rowCount;
			break;

			/*-----------------Laminar CRUD---------------------*/

			case "add-laminar":
				$query = new Database("INSERT INTO karet_laminar (nolaminar, cleaningdate, datetoclean, description, isactive) VALUES (?,?,?,?,?)"
					,array(
						$_POST["nolaminar"],
						$_POST["cleaningdate"],
						$_POST["datetoclean"],
						$_POST["description"],
						"1"));
				
				$id = $query::$lastInsertId;
				$count = $query::$rowCount;

				printResult($id, $count);
			break;

			case "update-laminar":
				$query = new Database("UPDATE karet_laminar SET nolaminar = ?, cleaningdate = ?, datetoclean = ?, description = ? WHERE id = ?"
					,array(
						$_POST["nolaminar"],
						$_POST["cleaningdate"],
						$_POST["datetoclean"],
						$_POST["description"],
						$_POST["id"]
					)
				);
				
				$count = $query::$rowCount;

				printResult($_POST['id'], $count);
			break;

			case "delete-laminar":
				$query = new Database("UPDATE karet_laminar SET isactive = ? WHERE id = ?",array("0",$_POST["id"]));
				echo $query::$rowCount;
			break;

			/*-----------------Vessel CRUD---------------------*/

			case "add-vessel":
				$query = new Database("INSERT INTO karet_vessel (vesselcode, vessel, description, isactive) 
									VALUES (?,?,?,?)"
									,array(
										$_POST["vesselcode"],
										$_POST["vessel"],
										$_POST["description"],
										"1"));
				
				$id = $query::$lastInsertId;
				$count = $query::$rowCount;

				printResult($id, $count);
			break;

			case "update-vessel":
				$query = new Database("UPDATE karet_vessel SET vesselcode = ?, vessel = ?, description = ? WHERE id = ?"
					,array(
						$_POST["vesselcode"],
						$_POST["vessel"],
						$_POST["description"],
						$_POST["id"]
					)
				);
				$count = $query::$rowCount;

				printResult($_POST['id'], $count);
			break;

			case "delete-vessel":
				$query = new Database("UPDATE karet_vessel SET isactive = ? WHERE id = ?",array("0",$_POST["id"]));
				echo $query::$rowCount;
			break;

			/*-----------------Contamination CRUD---------------------*/

			case "add-contamination":
				$query = new Database("INSERT INTO karet_contamination (species, deactive, isactive) VALUES (?,?,?)",array($_POST["species"],"Y","1"));
				
				$id = $query::$lastInsertId;
				$count = $query::$rowCount;

				printResult($id, $count);
			break;

			case "update-contamination":
				$query = new Database("UPDATE karet_contamination SET species = ? WHERE id = ?",array($_POST["species"],$_POST["id"]));
				
				$count = $query::$rowCount;

				printResult($_POST['id'], $count);
			break;

			case "delete-contamination":
				$query = new Database("UPDATE karet_contamination SET isactive = ? WHERE id = ?",array("0",$_POST["id"]));
				echo $query::$rowCount;
			break;

			/*-----------------Media Type CRUD----------------*/

			case "add-mediatype":
				$query = new Database("INSERT INTO karet_media_type (nama_jenis, keterangan, isactive) VALUES (?,?,?)",array($_POST["type"],$_POST["keterangan"],1));
				
				$id = $query::$lastInsertId;
				$count = $query::$rowCount;

				printResult($id, $count);
			break;

			case "update-mediatype":
				$query = new Database("UPDATE karet_media_type SET nama_jenis = ?, keterangan = ? WHERE id = ?",array($_POST["type"],$_POST["keterangan"],$_POST['id']));
				
				$count = $query::$rowCount;

				printResult($_POST['id'], $count);
			break;

			case "delete-mediatype":
				$query = new Database("UPDATE karet_media_type SET isactive = ? WHERE id = ?",array(0,$_POST['id']));
				echo $query::$rowCount;
			break;

			/*-----------------Media CRUD---------------------*/

			case "add-media":
				$query = new Database("INSERT INTO karet_media (mediacode, id_jenis_media, description, isactive, stok) VALUES (?,?,?,?,?)",array($_POST["mediacode"],$_POST["media"],$_POST["description"],"1",0));
				
				$id = $query::$lastInsertId;
				$count = $query::$rowCount;

				printResult($id, $count);
			break;

			case "update-media":
				$query = new Database("UPDATE karet_media SET mediacode = ?, id_jenis_media = ?, description = ? WHERE id = ?",array($_POST["mediacode"],$_POST["media"],$_POST["description"],$_POST["id"]));
				
				$count = $query::$rowCount;

				printResult($_POST['id'], $count);
			break;

			case "delete-media":
				$query = new Database("UPDATE karet_media SET isactive = ? WHERE id = ?",array("0",$_POST["id"]));
				echo $query::$rowCount;
			break;

			/*-------------------Media Stok Add CRUD---------------------*/

			case "add-media-stok":
				$barcode = generateRandomString(10);

				//insert to karet_media_pembuatan for log data
				$query = new Database("INSERT INTO karet_media_pembuatan (idmedia, tglpembuatanmedia, idworker, volume, idvessel, jumlah, isactive, lamakerja, remaining_media, is_expired, barcode, is_remove) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)"
					,array(
						$_POST["idmedia"],
						$_POST["tglbuatmedia"],
						$_POST["worker"],
						$_POST["volume"],
						$_POST["vessel"],
						$_POST["jumlah"],
						"1",
						$_POST["lamakerja"],
						$_POST["jumlah"],
						0,
						$barcode,
						0
					)
				);
				
				//get last stok value from karet_media
				$media = new Database("SELECT stok FROM karet_media WHERE id = ?",array($_POST["idmedia"]));

				//insert last stok from media to temporary variabel
				foreach ($media::$result as $key => $value) {
					$jumlahstok = "";
					$jumlahstok = $value['stok'];
				}

				//check if stok null or 0. If not, it will update stok at karet_media 
				if ($_POST["jumlah"] != null OR $_POST["jumlah"] != 0){
					$stok = new Database("UPDATE karet_media SET stok = ? WHERE id = ?",array($_POST["jumlah"] + $jumlahstok,$_POST["idmedia"]));

					$params = $stok::$rowCount;
				}

				$countStok = countStokMedia($_POST['idmedia']);
				
				echo ($query::$rowCount + $params + $countStok);
			break;

			case "update-media-stok":
				//get stock value from stok log
				$data = new Database("SELECT * FROM karet_media_pembuatan WHERE id = ?",array($_POST["idbuatmedia"]));

				//insert to a temp variabel
				foreach ($data::$result as $key => $value) {

					//check the stok value will input is same with data stok from database
					if ($_POST['jumlah'] == $value['jumlah']) {
						//if same, execute
						$query = new Database("UPDATE karet_media_pembuatan SET tglpembuatanmedia = ?, idworker = ?, volume = ?, idvessel = ?, lamakerja = ? WHERE id = ?"
							,array(
								$_POST['tglbuatmedia'],
								$_POST['worker'],
								$_POST['volume'],
								$_POST['vessel'],
								$_POST['lamakerja'],
								$_POST['idbuatmedia']
							)
						);
					} else {	//if not same, execute

						//first, get stok value from karet_media 
						$stokmedia = new Database("SELECT stok FROM karet_media WHERE id = ?",array($_POST['idmedia']));

						foreach ($stokmedia::$result as $key => $items) {
							$jumlahstok = "";
							
							//then, get back up stok value before adding this log stok. The way is = karet_media.stok - karet_media_pembuatan.jumlah 
							$jumlahstok = ($items['stok'] - $value['jumlah']);

							//then execute the query
							$query = new Database("UPDATE karet_media_pembuatan SET tglpembuatanmedia = ?, idworker = ?, volume = ?, idvessel = ?, jumlah = ?, lamakerja = ?, remaining_media = ? WHERE id = ?"
								,array(
									$_POST['tglbuatmedia'],
									$_POST['worker'],
									$_POST['volume'],
									$_POST['vessel'],
									$_POST['jumlah'],
									$_POST['lamakerja'],
									$_POST['jumlah'],
									$_POST['idbuatmedia']
								)
							);
						}
					}
				}

				$countStok = countStokMedia($_POST['idmedia']);
				
				echo $query::$rowCount + $countStok;
			break;

			case "delete-media-stok":
				$cek = new Database("SELECT * FROM karet_media_pembuatan WHERE id = ?",array($_POST['id']));

				$kurang = $cek::$result[0]['remaining_media'];
				$idmedia = $cek::$result[0]['idmedia'];

				$query1 = new Database("UPDATE karet_media_pembuatan SET isactive = ? WHERE id = ?",array("0",$_POST["id"]));

				$cekstok = new Database("SELECT * FROM karet_media WHERE id = ?",array($idmedia));
				$stok = $cekstok::$result[0]['stok'] - $kurang;

				$query2 = new Database("UPDATE karet_media SET stok = ? WHERE id = ?",array($stok,$idmedia));

				$countStok = countStokMedia($idmedia);

				echo $query1::$rowCount + $query2::$rowCount + $countStok;
			break;

			
			/*--------------------------- REJUVINATION CRUD ---------------------------*/


			/*-----------------Reception CRUD---------------------*/

			case "add-reception":
				$query = new Database("INSERT INTO karet_reception 
								(idtree, harvestdate, receiptdate, flowersharvested, fruitsharvested, comment, isactive, treepart,clone,plantation) VALUES (?,?,?,?,?,?,?,?,?,?)"
							,array(
								$_POST["tree"],
								$_POST["harvest"],
								$_POST["receipt"],
								$_POST["flowers"],
								$_POST["fruits"],
								$_POST["comment"],
								"1",
								$_POST["treepart"],
								$_POST["clone"],
								//$_POST["block"],
								$_POST["plantation"],
								//$_POST["line"]
							)
						);
				$id = $query::$lastInsertId;	
				
				$result = array("id"=>$id,"rowcount"=>$query::$rowCount);
				print_r(json_encode($result));
			break;

			case "update-reception":
				$query = new Database("UPDATE karet_reception SET idtree = ?, harvestdate = ?, receiptdate = ?, flowersharvested = ?, fruitsharvested = ?, comment = ?, treepart = ?, clone = ?, plantation = ? WHERE id = ?"
					,array(
						$_POST["tree"],
						$_POST["harvest"],
						$_POST["receipt"],
						$_POST["flowers"],
						$_POST["fruits"],
						$_POST["comment"],
						$_POST["treepart"],
						$_POST["clone"],
						//$_POST["block"],
						$_POST["plantation"],
						//$_POST["line"],
						$_POST["id"]
					)
				);

				$result = array("id"=>$_POST['id'],"rowcount"=>$query::$rowCount);
				print_r(json_encode($result));
			break;

			case "delete-reception":
				$query = new Database("UPDATE karet_reception SET isactive = ? WHERE id = ?",array("0",$_POST["id"]));
				echo $query::$rowCount;
			break;

			/*-----------------Reception Seeds Update---------------------*/

			case "update-reception-seeds":
				$query1 = 0;

				if ($_POST['fruitsparams'] > 0 AND $_POST['flowersparams'] > 0){

					if (isset($_POST['flowersused']) OR isset($_POST['rottenflowers']) OR isset($_POST['totalflowersused'])){

						if ($_POST['idfruits'] != ""){
							
							$flowers = new Database("UPDATE karet_reception_flowers SET flowersused = ?, rottenflowers = ?, totalflowersused = ? WHERE id = ?"
									,array(
										$_POST['flowersused'],
										$_POST['rottenflowers'],
										$_POST['totalflowersused'],
										$_POST['idflowers']
									)
								);
						
						} else {

							$flowers = new Database("INSERT INTO karet_reception_flowers 
										(idreception, flowersused, rottenflowers, totalflowersused,isactive) VALUES (?,?,?,?,?)"
										,array(
											$_POST['idreception'],
											$_POST['flowersused'],
											$_POST['rottenflowers'],
											$_POST['totalflowersused'],
											"1"
										)
									);
						}

						$query1 = $query1 + $flowers::$rowCount;
					}

					if (isset($_POST['fruitsused']) OR isset($_POST['woodyfruits']) OR isset($_POST['fruitstoosmall']) OR isset($_POST['looseseeds']) OR isset($_POST['rottenflowers']) OR isset($_POST['totalseeds'])){

						if ($_POST['idfruits'] != ""){

							$fruits = new Database("UPDATE karet_reception_fruits SET fruitsused = ?, woodyfruits = ?, toosmallfruits = ?, looseseeds = ?, rottenfruits = ?, totalseeds = ? WHERE id = ?"
									,array(
										$_POST['fruitsused'],
										$_POST['woodyfruits'],
										$_POST['fruitstoosmall'],
										$_POST['looseseeds'],
										$_POST['rottenfruits'],
										$_POST['totalseeds'],
										$_POST['idfruits']
									)
								);
						} else {
							$fruits = new Database("INSERT INTO karet_reception_fruits
									(idreception, fruitsused, woodyfruits, toosmallfruits, looseseeds, rottenfruits, totalseeds,isactive) VALUES (?,?,?,?,?,?,?,?)"
									,array(
										$_POST['idreception'],
										$_POST['fruitsused'],
										$_POST['woodyfruits'],
										$_POST['fruitstoosmall'],
										$_POST['looseseeds'],
										$_POST['rottenfruits'],
										$_POST['totalseeds'],
										"1"
									)
								);
						}

						$query1 = $query1 + $fruits::$rowCount;
					}				

				} elseif ($_POST['fruitsparams'] > 0 AND $_POST['flowersparams'] == 0){

					if ($_POST['idfruits'] == ""){
						$fruits = new Database("INSERT INTO karet_reception_fruits
									(idreception, fruitsused, woodyfruits, toosmallfruits, looseseeds, rottenfruits, totalseeds,isactive) VALUES (?,?,?,?,?,?,?,?)"
									,array(
										$_POST['idreception'],
										$_POST['fruitsused'],
										$_POST['woodyfruits'],
										$_POST['fruitstoosmall'],
										$_POST['looseseeds'],
										$_POST['rottenfruits'],
										$_POST['totalseeds'],
										"1"
									)
								);
					} else {

						$fruits = new Database("UPDATE karet_reception_fruits SET fruitsused = ?, woodyfruits = ?, toosmallfruits = ?, looseseeds = ?, rottenfruits = ?, totalseeds = ? WHERE id = ?"
									,array(
										$_POST['fruitsused'],
										$_POST['woodyfruits'],
										$_POST['fruitstoosmall'],
										$_POST['looseseeds'],
										$_POST['rottenfruits'],
										$_POST['totalseeds'],
										$_POST['idfruits']
									)
								);
						
					}

					$query1 = $fruits::$rowCount;

				} elseif ($_POST['fruitsparams'] == 0 AND $_POST['flowersparams'] > 0){

					if ($_POST['idflowers'] == ""){

						$flowers = new Database("INSERT INTO karet_reception_flowers 
									(idreception, flowersused, rottenflowers, totalflowersused,isactive) VALUES (?,?,?,?,?)"
									,array(
										$_POST['idreception'],
										$_POST['flowersused'],
										$_POST['rottenflowers'],
										$_POST['totalflowersused'],
										"1"
									)
								);

					} else {

						$flowers = new Database("UPDATE karet_reception_flowers SET flowersused = ?, rottenflowers = ?, totalflowersused = ? WHERE id = ?"
									,array(
										$_POST['flowersused'],
										$_POST['rottenflowers'],
										$_POST['totalflowersused'],
										$_POST['idflowers']
									)
								);
					}

					$query1 = $flowers::$rowCount;
				}
				
				echo $query1;
			break;

			/*----------------- INITIATION CRUD ------------------*/

			case "add-initiation":
				
				//add to initiation table the medium number has inputed last time
				$query1 = new Database("INSERT INTO karet_initiation (id_reception, nobox, sample, 
								initiation_date, widthseed, numberofseeds, seedcomments, se, ze, 
								initiation_worker, laminar, isactive, treatmentcomment, remaining_sample, remaining_petri, idmedia) 
								VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"
									,array(
										$_POST['idreception'],
										$_POST['nobox'],
										$_POST['sample'],
										$_POST['initdate'],
										$_POST['widthseed'],
										$_POST['totalseeds'],
										$_POST['seedcomment'],
										$_POST['se'],
										$_POST['ze'],
										$_POST['initworker'],
										$_POST['laminar'],
										'1',
										$_POST['treatmentcomment'],
										intval($_POST['se']) + intval($_POST['ze']),
										$_POST['amount'],
										$_POST['idmedia']
									)
								);
				
				$q1 = $query1::$rowCount;
				$idtreat = $query1::$lastInsertId;

				$mediaResult = createLogMedia($idtreat, $_POST['idmedia'], $_POST['amount'],2);

				//create barcode
				$randomstring = generateRandomString(5);
				$barcode = generateBarcode($_POST['idreception'], $idtreat, $_POST['initworker'], $_POST['idmedia'], $_POST['initdate'], "T", $randomstring);

				//update idpembuatan media to initiation
				$updateInit = new Database("UPDATE karet_initiation SET barcode = ?, idpengeluaranmedia = ? WHERE id_treatment = ?",array($barcode,$mediaResult['idMediaOut'],$idtreat));
				$q4 = $updateInit::$rowCount;

				echo $q1 + $mediaResult['count'] + $q4;				

			break;

			case "update-initiation":
				$cek = new Database("SELECT a.idmedia, b.jumlah_keluar 
									FROM karet_initiation a JOIN karet_media_pengeluaran b 
									ON b.id = a.idpengeluaranmedia
									WHERE a.id_treatment = ?"
									,array($_POST['idtreatment']));

				$idMedia = $cek::$result[0]['idmedia'];
				$idJumlah = $cek::$result[0]['jumlah_keluar'];

				$query1 = new Database("UPDATE karet_initiation SET nobox = ?, sample = ?, 
										initiation_date = ?, widthseed = ?, numberofseeds = ?, 
										seedcomments = ?, se = ?, ze = ?, initiation_worker = ?, 
										laminar = ?, treatmentcomment = ?, idmedia = ?, remaining_petri = ?
										WHERE id_treatment = ?"
										,array(
											$_POST['nobox'],
											$_POST['sample'],
											$_POST['initdate'],
											$_POST['widthseed'],
											$_POST['totalseeds'],
											$_POST['seedcomment'],
											$_POST['se'],
											$_POST['ze'],
											$_POST['initworker'],
											$_POST['laminar'],
											$_POST['treatmentcomment'],
											$_POST['idmedia'],
											$_POST['amountmedia'],
											$_POST['idtreatment'],
										)
						);

				$medCount = 0;
				if ($_POST['amountmedia'] != $idJumlah && $_POST['idmedia'] != $idMedia){
					$mediaCount = editLogMedia($_POST['idpengeluaranmedia'],$_POST['amountmedia'],$_POST['idmedia']);

					$medCount = $mediaCount['count'];
				}

				echo $query1::$rowCount + $medCount;
			break;

			case "delete-initiation":
				$query = new Database("UPDATE karet_initiation SET isactive = ? WHERE id_treatment = ?",array(0,$_POST['id']));

				echo $query::$rowCount;
			break;	

			/*---------------- INITIATION OBSCALLUS AND TRANSFER CrUD ---------------*/
				
			case "add-obs-callus":

				$q1 = new Database("INSERT INTO karet_contamination_record (id_treatment, contamination_fungi, contamination_bact, pink, dead, reju_step, isactive) VALUES (?,?,?,?,?,?,?)",array($_POST['idtreatment'],$_POST['contfungi'],$_POST['contbact'],$_POST['pink'],$_POST['dead'],3,1));
				$contid = $q1::$lastInsertId;
				$q1count = $q1::$rowCount; 

				$q2 = new Database("INSERT INTO karet_initiation_obs (id_treatment, obsdate, 
										obsworker, alotofcallus, littlebitofcallus, yellow, white,
										orange, brown, dead, piecesnotreact, isactive,
										idcontaminationrecord, isavailable) 
										VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)"
							,array(
								$_POST['idtreatment'],
								$_POST['obsdate'],
								$_POST['obsworker'],
								$_POST['alotof'],
								$_POST['littlebit'],
								$_POST['yellow'],
								$_POST['white'],
								$_POST['orange'],
								$_POST['brown'],
								$_POST['dead'],
								$_POST['notreact'],
								1,
								$contid,
								1
							)
						);

				$q2count = $q2::$rowCount;

				$q3 = new Database("UPDATE karet_initiation SET remaining_sample = ?, 
										remaining_petri = ? WHERE id_treatment = ?"
										,array($_POST['notreact'],$_POST['remainpetri'],$_POST['idtreatment']));
				
				$q3count = $q3::$rowCount;

				echo $q1count + $q2count + $q3count;

			break;
			
			case "edit-obs-callus":
				$get = new Database("SELECT * FROM karet_initiation_obs WHERE id = ?",array($_POST['id_init']));
				$idcont = $get::$result[0]['idcontaminationrecord'];
				$id_treat = $get::$result[0]['id_treatment'];

				$q1 = new Database("UPDATE karet_contamination_record SET contamination_fungi = ?, contamination_bact = ?, dead = ? WHERE id = ?",array($_POST['contfungi'],$_POST['contbact'],$_POST['dead'],$idcont));

				$q1count = $q1::$rowCount; 

				$q2 = new Database("UPDATE karet_initiation_obs SET obsdate = ?, obsworker = ?, 
										alotofcallus = ?, littlebitofcallus = ?, yellow = ?, white = ?,
										orange = ?, brown = ?, dead = ?, piecesnotreact = ? 
										WHERE id = ?"
							,array(
								$_POST['obsdate'],
								$_POST['obsworker'],
								$_POST['alotof'],
								$_POST['littlebit'],
								$_POST['yellow'],
								$_POST['white'],
								$_POST['orange'],
								$_POST['brown'],
								$_POST['dead'],
								$_POST['notreact'],
								$_POST['id_init']
							)
						);
				$q2count = $q2::$rowCount;

				$q3 = new Database("UPDATE karet_initiation SET remaining_sample = ?, 
										remaining_petri = ? WHERE id_treatment = ?"
										,array($_POST['notreact'],$_POST['remainpetri'],$id_treat));
				
				$q3count = $q3::$rowCount;

				echo $q1count + $q2count + $q3count;

			break;

			case "add-trans-callus":
				$idobs = $_POST['datafortransfer'];

				$media = createLogMedia($_POST['idtreatment'], $_POST['idmedia'], $_POST['amountmedia'],4);

				//to tabel initiation_trans
				$reception = new Database("SELECT * FROM karet_initiation WHERE id_treatment = ?",array($_POST['idtreatment']));

				$randomstring = generateRandomString(5);
				$barcode = generateBarcode($reception::$result[0]['id_reception'], $_POST['idtreatment'], $_POST['transworker'], $_POST['idmedia'], $_POST['transdate'], "T", $randomstring);

				$q1 = new Database("INSERT INTO karet_initiation_trans (id_treatment, callustransfer, 
									transferdate, transferworker, barcode, comment, 
									isactive, laminar, idmedia, idpengeluaranmedia) 
									VALUES (?,?,?,?,?,?,?,?,?,?)"
									,array(
										$_POST['idtreatment'],
										$_POST['callustrans'],
										$_POST['transdate'],
										$_POST['transworker'],
										$barcode,
										$_POST['comment'],
										1,
										$_POST['laminar'],
										$_POST['idmedia'],
										$media['idMediaOut']
									)
								);
				$q1count = $q1::$rowCount;
				$id = $q1::$lastInsertId;

				//disable row of initiation_obs has transfered
				$q2count = 0;
				foreach ($idobs as $key => $value) {
					$q2 = new Database("UPDATE karet_initiation_obs SET isavailable = ? WHERE id = ?",array(0,$value));

					$q2count = $q2count + $q2::$rowCount;
				}

				$count = $q1count + $q2count;

				printResult($id, $count);
				//echo $q1count + $q2count + $media['count'];
			break;

			case "update-trans-callus":
				$query = new Database("UPDATE karet_initiation_trans SET transferdate = ?, transferworker = ?, 
											laminar = ?, comment = ? WHERE id = ?"
											,array(
												$_POST['transdate'],
												$_POST['transworker'],
												$_POST['laminar'],
												$_POST['comment'],
												$_POST['id'],
											)
										);

				echo $query::$rowCount;
			break;
			

			case "update-obscallus":
				$query = new Database("UPDATE karet_obscallus SET obsdate = ?, obsworker = ?, contfungi = ?, contbact = ?, piecesnotreact = ?, alotofcallus = ?, littlebitofcallus = ?, yellow = ?, white = ?, orange = ?, brown = ?, dead = ? WHERE id_treatment = ?"
					,array(
						$_POST['obsdate'],
						$_POST['obsworker'],
						$_POST['contfungi'],
						$_POST['contbact'],
						$_POST['notreact'],
						$_POST['alotof'],
						$_POST['littlebit'],
						$_POST['yellow'],
						$_POST['white'],
						$_POST['orange'],
						$_POST['brown'],
						$_POST['dead'],
						$_POST['idtreatment']
					)
				);

				echo $query::$rowCount;
			break;

			case "delete-obscallus":
				$query = new Database("UPDATE karet_obscallus SET isactive = ? WHERE id = ?",array(0,$_POST['id']));

				echo $query::$rowCount;
			break;

			// -------------------------- UPDATE PETRI TRANSCALLUS ----------------------------

			case "update-petri-transcallus":
				$allData = $_POST['datacheckbox'];	//array data of id initiation
				$lastInsert = 0;

				//check available petrinumber and labelmedia
				$checkPetriNum = new Database("SELECT * FROM karet_media_transaction_log WHERE no_vessel = ? AND reju_step = ?",array($_POST['idvessel'],3)); 

				//if logic for petri number has not inputed, so this action will add log for out petridish and stok reduction
				if ($checkPetriNum::$rowCount == 0){
					
					if (isset($_POST['idpembuatanmedia'])){
						
						$date = date_format(date_create(),'Y-m-d');
							
						$petriAdd = new Database("INSERT INTO karet_media_transaction_log (idpembuatanmedia, 
								isactive, no_vessel, tglkeluar,reju_step) VALUES (?,?,?,?,?)" 
								,array(
									$_POST['idpembuatanmedia'],
									//$_POST['initdate'],
									"1",
									$_POST['idvessel'],
									$date,
									3
								)
							);
						
						$idMedTranslog = $petriAdd::$lastInsertId;
						//var_dump($idMedTranslog);
		
						$getMedia = new Database("SELECT a.id, a.stok FROM karet_media a 
													JOIN karet_media_pembuatan b ON a.id = b.idmedia WHERE b.id = ?"
													,array(
														$_POST['idpembuatanmedia']
													)
												);

						$mediaStok = $getMedia::$result[0]['stok'];
						$idMedia = $getMedia::$result[0]['id'];
						
						//foreach ($getMedia::$result as $key => $value) {
						$mediaStokupdate = new Database("UPDATE karet_media set stok = ? WHERE id = ?",array(($mediaStok - 1),$idMedia));	
						//}

					}

				} else {
					$idMedTranslog = $checkPetriNum::$result[0]['id'];
				}
				
				//looping for add id of media transaction log to initiation
				$count = 0;
				foreach ($allData as $value) {
					$petriNumAdd = new Database("UPDATE karet_transcallus set id_mediatranslog = ? 
											WHERE id_treatment = ? AND isactive = ?"
											,array(
												$idMedTranslog,
												$value,
												1
											)
										);

					$count = $count + $petriNumAdd::$rowCount;
				}
	
				echo $count;
			break;


			/*--------------- EMBRYO SCREENING CRUD --------------*/
			case "delete-embryoscreen":
				$query1 = new Database("UPDATE karet_initiation_trans SET isactive = ? WHERE id = ?"
										,array(0,$_POST['id_initiation_trans']));

				echo $query1::$rowCount;
			break;

			case "add-emscreening":
				$cont = new Database("INSERT INTO karet_contamination_record (id_treatment,
										contamination_fungi, contamination_bact, pink, dead, comments, 
										reju_step, isactive) VALUES (?,?,?,?,?,?,?,?)"
										,array(
											$_POST['idtreatment'],
											$_POST['fungi'],
											$_POST['bact'],
											$_POST['pink'],
											$_POST['dead'],
											$_POST['contcomment'],
											4,
											1
										)
									);

				$idcont = $cont::$lastInsertId;

				$cek = new Database("SELECT * FROM karet_initiation_embryo_screening WHERE id_treatment = ? AND id_initiation_trans = ?",array($_POST['idtreatment'],$_POST['idtrans']));

				$r = $cek::$rowCount + 1;

				$query1 = new Database("INSERT INTO karet_initiation_embryo_screening (id_treatment, 
										screening_date, screening_worker, grow_embryo, screening_checkpoint, 
										comment, idcontaminationrecord, isactive, id_initiation_trans) VALUES (?,?,?,?,?,?,?,?,?)",
								array(
									$_POST['idtreatment'],
									$_POST['screendate'],
									$_POST['screenworker'],
									$_POST['embryo'],
									$r,
									$_POST['comment'],
									$idcont,
									1,
									$_POST['idtrans']
								)
							);
				//$idEmScreen = $query1::$lastInsertId;

				$cekGrow = new Database("SELECT * FROM karet_initiation_embryo_grow WHERE id_initiation_trans = ? AND id_treatment = ?",array($_POST['idtrans'],$_POST['idtreatment']));

				if ($cekGrow::$rowCount > 0){
					$emGrow = intval($cekGrow::$result[0]['growing_embryo']);
					$reGrow = intval($cekGrow::$result[0]['remaining_embryo']);
					
					$query2 = new Database("UPDATE karet_initiation_embryo_grow SET growing_embryo = ?, 
												remaining_embryo = ? WHERE id_initiation_trans = ? 
												AND id_treatment = ?"
												,array(
													$emGrow + intval($_POST['embryo']),
													$reGrow + intval($_POST['embryo']),
													$_POST['idtrans'],
													$_POST['idtreatment']
												)
											); 
				} else {
					$query2 = new Database("INSERT INTO karet_initiation_embryo_grow (id_initiation_trans, 
											id_treatment, growing_embryo, remaining_embryo, isactive) 
											VALUES (?,?,?,?,?)"
											,array(
												$_POST['idtrans'],
												$_POST['idtreatment'],
												$_POST['embryo'],
												$_POST['embryo'],
												1
											)
										);
				}
				echo $cont::$rowCount + $query1::$rowCount + $query2::$rowCount;
			break;
			
			case "edit-emscreening":
				$getScreen = new Database("SELECT * FROM karet_initiation_embryo_screening WHERE id = ?",array($_POST['idemscreen']));

				$idcont = $getScreen::$result[0]['idcontaminationrecord'];
				$id_treat = $getScreen::$result[0]['id_treatment'];
				$id_init = $getScreen::$result[0]['id_initiation_trans'];
				$growEm = $getScreen::$result[0]['grow_embryo'];

				$cont = new Database("UPDATE karet_contamination_record SET contamination_fungi = ?, 
										contamination_bact = ?, pink = ?, dead = ?, comments = ?
										WHERE id = ?"
										,array(
											$_POST['fungi'],
											$_POST['bact'],
											$_POST['pink'],
											$_POST['dead'],
											$_POST['contcomment'],
											$idcont
										)
									);

				$query1 = new Database("UPDATE karet_initiation_embryo_screening SET screening_date = ?,
										screening_worker = ?, grow_embryo = ?, comment = ? WHERE id = ?"
										,array(
											$_POST['screendate'],
											$_POST['screenworker'],
											$_POST['embryo'],
											$_POST['comment'],
											$_POST['idemscreen']
										)
									);
				//$idEmScreen = $query1::$lastInsertId;

				$cekGrow = new Database("SELECT * FROM karet_initiation_embryo_grow WHERE id_initiation_trans = ? AND id_treatment = ? AND isactive = ?",array($id_init,$id_treat,1));

				$reGrow = intval($cekGrow::$result[0]['remaining_embryo']) - intval($growEm);

				if ($cekGrow::$rowCount > 0){
					$getEm = new Database("SELECT * FROM karet_initiation_embryo_screening WHERE id_initiation_trans = ? AND isactive = ?",array($id_init,1));

					$emGrow = 0;
					foreach ($getEm::$result as $value) {
						$emGrow = $emGrow + intval($value['grow_embryo']);
					}

					//$emGrow = intval($cekGrow::$result[0]['growing_embryo']);
					//$reGrow = intval($cekGrow::$result[0]['remaining_embryo']);
					$query2 = new Database("UPDATE karet_initiation_embryo_grow SET growing_embryo = ?, 
												remaining_embryo = ? WHERE id_initiation_trans = ? 
												AND id_treatment = ?"
												,array(
													$emGrow,
													$reGrow + intval($_POST['embryo']),
													$id_init,
													$id_treat
												)
											);
				} else {
					$query2 = new Database("INSERT INTO karet_initiation_embryo_grow (id_initiation_trans, 
											id_treatment, growing_embryo, remaining_embryo, isactive) 
											VALUES (?,?,?,?,?)"
											,array(
												$id_init,
												$id_treat,
												$_POST['embryo'],
												$_POST['embryo'],
												1
											)
										);
				}
				echo $cont::$rowCount + $query1::$rowCount + $query2::$rowCount;
			break;

			case "update-media-emscreening":
				$data = $_POST['selectedData'];

				$logCount = createLogMedia($data['idtreatment'], $_POST['idmedia'], $_POST['amountmedia'],4);
	
				echo $logCount;
			break;

			/*------------------------- MATURATION 1  -------------------------*/

			case "trans-to-mat1":
				$totalembryo = intval($_POST['embryo']);

				$cek = new Database("SELECT * FROM karet_initiation_embryo_grow WHERE id_initiation_trans = ?"
										,array($_POST['idinit']));

				$idtreat = $cek::$result[0]['id_treatment'];
				$remainem = intval($cek::$result[0]['remaining_embryo']) - $totalembryo;
				$q1 = 0;
				$q2 = 0;

				while ($totalembryo > 0){
					$query1 = new Database("INSERT INTO karet_embryo (id_treatment, id_initiation_trans,
												isactive) VALUES (?,?,?)"
												,array(
													$idtreat,
													$_POST['idinit'],
													1
												)
											);
					$idEm = $query1::$lastInsertId;

					$query2 = new Database("INSERT INTO karet_embryo_maturation_1 (id_embryo, transferdate, 
												maturation_worker, idmedia, laminar, isactive,
												cultureroom, nobox, is_available) 
												VALUES (?,?,?,?,?,?,?,?,?)"
												,array(
													$idEm,
													$_POST['transdate'],
													$_POST['mat1worker'],
													$_POST['idmedia'],
													$_POST['laminar'],
													1,
													$_POST['culroom'],
													$_POST['nobox'],
													1
												)
											);

					$q1 = $q1 + $query1::$rowCount;
					$q2 = $q2 + $query2::$rowCount;
					$totalembryo--;
				}

				$query3 = new Database("UPDATE karet_initiation_embryo_grow SET remaining_embryo = ? 
											WHERE id_initiation_trans = ?",array($remainem,$_POST['idinit']));

				echo $q1 + $q2; + $query3::$rowCount;
			break;

			case "update-mat1":
				$query1 = new Database("UPDATE karet_embryo_maturation_1 SET transferdate = ?, nobox = ?,
											cultureroom = ?, laminar = ?, maturation_worker = ?, 
											comment = ? WHERE id = ?"
											,array(
												$_POST['transdate'],
												$_POST['nobox'],
												$_POST['culroom'],
												$_POST['laminar'],
												$_POST['worker'],
												$_POST['comment'],
												$_POST['id']
											)
										);

				echo $query1::$rowCount;
			break;

			case "delete-mat1":
				$query1 = new Database("UPDATE karet_embryo_maturation_1 SET isactive = ?, is_available = ? WHERE id = ?",array(0,0,$_POST['id']));

				echo $query1::$rowCount;
			break;

			/*------------------------ MATURATION II MODULES  --------------------------*/

			case "trans-to-mat2":
				$q1 = 0;
				$q2 = 0;
				$Em = "";

				if (isset($_POST['idembryo'])){
					$query1 = new Database("INSERT INTO karet_embryo_maturation_2 (id_embryo, 
											transferdate, maturation2_worker, laminar, isactive,
											cultureroom, nobox, is_available, comment, idmedia) 
											VALUES (?,?,?,?,?,?,?,?,?,?)"
											,array(
												$_POST['idembryo'],
												$_POST['transdate'],
												$_POST['mat2worker'],
												$_POST['laminar'],
												1,
												$_POST['culroom'],
												$_POST['nobox'],
												1,
												$_POST['comment'],
												$_POST['idmedia']
											)
										);

					$lastRowInsertedId = $query1::$lastInsertId;

					$query2 = new Database("UPDATE karet_embryo_maturation_1 SET is_available = ? 
												WHERE id_embryo = ?",array(0,$_POST['idembryo']));

					$q1 = $q1 + $query1::$rowCount;
					$q2 = $q2 + $query2::$rowCount;
					$Em = $_POST['idembryo'];
				}

				$dats = new Database("SELECT * FROM karet_embryo WHERE id = ?",array($Em));

				$media = createLogMedia($dats::$result[0]['id_treatment'], $_POST['idmedia'], 
											$_POST['amount'],6,$Em);

				/*if (isset($allLastInserted)){
					foreach ($_POST['dataformultitransfer'] as $key => $value) {
						$query4 = new Database("UPDATE karet_embryo_maturation_2 SET idpengeluaranmedia = ? 
											WHERE id = ?",array($media['idMediaOut'],$value));
					}
				} else*/

				if (isset($lastRowInsertedId)){
					$query4 = new Database("UPDATE karet_embryo_maturation_2 SET idpengeluaranmedia = ? 
											WHERE id = ?",array($media['idMediaOut'],$lastRowInsertedId));
				}

				/*$query4 = new Database("UPDATE karet_embryo_maturation_2 SET idpengeluaranmedia = ? 
											WHERE id = ?"
											,array($media['idMediaOut'],$_POST['idembryo']));*/

				echo $q1 + $media['count'] + $query4::$rowCount;
			break;

			case "multi-trans-mat2":
				$q1 = 0;
				$q2 = 0;
				$Em = "";
				
				if (isset($_POST['dataformultitransfer'])){
					$dataAll = $_POST['dataformultitransfer'];
					$allLastInserted = array();
					
					foreach ($dataAll as $key => $idEm) {
						$query1 = new Database("INSERT INTO karet_embryo_maturation_2 (id_embryo, 
											transferdate, maturation2_worker, laminar, isactive,
											cultureroom, nobox, is_available, comment, idmedia) 
											VALUES (?,?,?,?,?,?,?,?,?,?)"
											,array(
												$idEm,
												$_POST['mat2transdate'],
												$_POST['mat2worker'],
												$_POST['mat2laminar'],
												1,
												$_POST['mat2culroom'],
												$_POST['mat2nobox'],
												1,
												$_POST['mat2comment'],
												$_POST['mat2media']
											)
										);

						$lastRowInsertedId = $query1::$lastInsertId;

						$query2 = new Database("UPDATE karet_embryo_maturation_1 SET is_available = ? 
												WHERE id_embryo = ?",array(0,$idEm));

						$q1 = $q1 + $query1::$rowCount;
						$q2 = $q2 + $query2::$rowCount;
						$Em = $idEm;
						array_push($allLastInserted, $lastRowInsertedId);
					}
				} 

				//$dats = new Database("SELECT * FROM karet_embryo WHERE id = ?",array($Em));
				$dataAllImplode = implode(",",$dataAll);
				$media = createLogMedia(NULL, $_POST['mat2media'],$_POST['mat2amountmedia'],6,$dataAllImplode);

				if (isset($allLastInserted)){
					foreach ($allLastInserted as $key => $value) {
						$query4 = new Database("UPDATE karet_embryo_maturation_2 SET idpengeluaranmedia = ? 
											WHERE id = ?",array($media['idMediaOut'],$value));
					}
				}

				echo $q1 + $media['count'] + $query4::$rowCount;
			break;

			case "update-mat2":
				$query1 = new Database("UPDATE karet_embryo_maturation_2 SET transferdate = ?, nobox = ?,
											cultureroom = ?, laminar = ?, maturation2_worker = ?, 
											comment = ? WHERE id = ?"
											,array(
												$_POST['transdate'],
												$_POST['nobox'],
												$_POST['culroom'],
												$_POST['laminar'],
												$_POST['worker'],
												$_POST['comment'],
												$_POST['id']
											)
										);

				echo $query1::$rowCount;
			break;

			case "delete-mat2":
				$query1 = new Database("UPDATE karet_embryo_maturation_2 SET isactive = ?, is_available = ? WHERE id = ?",array(0,0,$_POST['id']));

				echo $query1::$rowCount;
			break;

			/* --------------------------- Maturation I Screening -------------------------*/

			case "add-mat1screening":
				$cekidtreat = new Database("SELECT * FROM karet_embryo WHERE id = ?",array($_POST['idembryo']));;
				$idtreatment = $cekidtreat::$result[0]['id_treatment'];

				$cont = new Database("INSERT INTO karet_contamination_record (id_treatment, id_embryo,
										contamination_fungi, contamination_bact, pink, dead, comments, 
										reju_step, isactive) VALUES (?,?,?,?,?,?,?,?,?)"
										,array(
											$idtreatment,
											$_POST['idembryo'],
											$_POST['fungi'],
											$_POST['bact'],
											$_POST['pink'],
											$_POST['dead'],
											$_POST['contcomment'],
											5,
											1
										)
									);

				$idcont = $cont::$lastInsertId;

				$cek = new Database("SELECT * FROM karet_embryo_maturation1_screening WHERE id_embryo = ?"
										,array($_POST['idembryo']));

				$r = $cek::$rowCount + 1;

				$query1 = new Database("INSERT INTO karet_embryo_maturation1_screening (id_embryo, 
										screening_date, screening_worker, screening_checkpoint, 
										comment, idcontaminationrecord, isactive) 
										VALUES (?,?,?,?,?,?,?)",
								array(
									$_POST['idembryo'],
									$_POST['screendate'],
									$_POST['screenworker'],
									$r,
									$_POST['comment'],
									$idcont,
									1
								)
							);
				//$idEmScreen = $query1::$lastInsertId;

				echo $cont::$rowCount + $query1::$rowCount;
			break;

			case "update-mat1screening":
				$data = new Database("SELECT * FROM karet_embryo_maturation1_screening WHERE id = ?",array($_POST['idlog']));

				$cont = new Database("UPDATE karet_contamination_record SET contamination_fungi = ?, 
										contamination_bact = ?, pink = ?, dead = ?, comments = ?
										WHERE id = ?"
										,array(
											$_POST['fungi'],
											$_POST['bact'],
											$_POST['pink'],
											$_POST['dead'],
											$_POST['contcomment'],
											$data::$result[0]['idcontaminationrecord']
										)
									);

				$query1 = new Database("UPDATE karet_embryo_maturation1_screening SET 
										screening_date = ?, screening_worker = ?, comment = ? WHERE id = ?"
										,array(
											$_POST['screendate'],
											$_POST['screenworker'],
											$_POST['comment'],
											$_POST['idlog']
										)
									);
				//$idEmScreen = $query1::$lastInsertId;

				echo $cont::$rowCount + $query1::$rowCount;
			break;

			/* --------------------------- Maturation II Screening -------------------------*/
			
			case "add-mat2screening":
				$cekidtreat = new Database("SELECT * FROM karet_embryo WHERE id = ?",array($_POST['idembryo']));

				$cont = new Database("INSERT INTO karet_contamination_record (id_treatment, id_embryo,
										contamination_fungi, contamination_bact, pink, dead, comments, 
										reju_step, isactive) VALUES (?,?,?,?,?,?,?,?,?)"
										,array(
											$cekidtreat::$result[0]['id_treatment'],
											$_POST['idembryo'],
											$_POST['fungi'],
											$_POST['bact'],
											$_POST['pink'],
											$_POST['dead'],
											$_POST['contcomment'],
											6,
											1
										)
									);

				$idcont = $cont::$lastInsertId;

				$cek = new Database("SELECT * FROM karet_embryo_maturation2_screening WHERE id_embryo = ?"
										,array($_POST['idembryo']));

				$r = $cek::$rowCount + 1;

				$query1 = new Database("INSERT INTO karet_embryo_maturation2_screening (id_embryo, 
										screening_date, screening_worker, screening_checkpoint, 
										comment, idcontaminationrecord, isactive) 
										VALUES (?,?,?,?,?,?,?)",
								array(
									$_POST['idembryo'],
									$_POST['screendate'],
									$_POST['screenworker'],
									$r,
									$_POST['comment'],
									$idcont,
									1
								)
							);
				//$idEmScreen = $query1::$lastInsertId;

				echo $cont::$rowCount + $query1::$rowCount;
			break;

			case "update-mat2screening":
				$data = new Database("SELECT * FROM karet_embryo_maturation2_screening WHERE id = ?",array($_POST['idlog']));

				$cont = new Database("UPDATE karet_contamination_record SET contamination_fungi = ?, 
										contamination_bact = ?, pink = ?, dead = ?, comments = ?
										WHERE id = ?"
										,array(
											$_POST['fungi'],
											$_POST['bact'],
											$_POST['pink'],
											$_POST['dead'],
											$_POST['contcomment'],
											$data::$result[0]['idcontaminationrecord']
										)
									);

				$query1 = new Database("UPDATE karet_embryo_maturation2_screening SET 
										screening_date = ?, screening_worker = ?, comment = ? WHERE id = ?"
										,array(
											$_POST['screendate'],
											$_POST['screenworker'],
											$_POST['comment'],
											$_POST['idlog']
										)
									);
				//$idEmScreen = $query1::$lastInsertId;

				echo $cont::$rowCount + $query1::$rowCount;
			break;

			case "add-germ":
				$query1 = new Database("INSERT INTO karet_embryo_germination (id_embryo, transferdate,
											germ_worker, idmedia, laminar, cultureroom, nobox, is_available,
											isactive, connected_to_other, shape_of_embryo, size_of_embryo,
											comment_embryo, type_of_callus, color_of_callus, comment_callus) 
											VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"
											,array(
												$_POST['idembryo'],
												$_POST['transdate'],
												$_POST['idworker'],
												$_POST['idmedia'],
												$_POST['idlaminar'],
												$_POST['culroom'],
												$_POST['nobox'],
												1,
												1,

												$_POST['connect'],
												$_POST['shape_em'],
												$_POST['size_em'],
												$_POST['comment_em'],

												$_POST['typecallus'],
												$_POST['colorcallus'],
												$_POST['calluscomment']
											)
										);
				$lastRowInsertedId = $query1::$lastInsertId;

				$query2 = new Database("UPDATE karet_embryo_maturation_2 SET is_available = ? 
											WHERE id_embryo = ?",array(0,$_POST['idembryo']));

				$dats = new Database("SELECT * FROM karet_embryo WHERE id = ?",array($_POST['idembryo']));

				$media = createLogMedia($dats::$result[0]['id_treatment'], $_POST['idmedia'], 
											$_POST['amountmedia'],7,$_POST['idembryo']);

				//if (isset($lastRowInsertedId)){
				$query4 = new Database("UPDATE karet_embryo_germination SET idpengeluaranmedia = ? 
											WHERE id = ?",array($media['idMediaOut'],$lastRowInsertedId));
				//}

				echo $query1::$rowCount + $media['count'] + $query2::$rowCount + $query4::$rowCount;
			break;

			case "multi-trans-germ":
				$q1 = 0;
				$q2 = 0;
				$Em = "";
				
				if (isset($_POST['dataformultitransfer'])){
					$dataAll = $_POST['dataformultitransfer'];
					$allLastInserted = array();
					
					foreach ($dataAll as $key => $idEm) {
						$query1 = new Database("INSERT INTO karet_embryo_germination (id_embryo, transferdate,
											germ_worker, idmedia, laminar, cultureroom, nobox, is_available,
											isactive) 
											VALUES (?,?,?,?,?,?,?,?,?)"
											,array(
												$idEm,
												$_POST['germtransdate'],
												$_POST['germworker'],
												$_POST['germmedia'],
												$_POST['germlaminar'],
												$_POST['germculroom'],
												$_POST['germnobox'],
												1,
												1,
											)
										);

						$lastRowInsertedId = $query1::$lastInsertId;

						$query2 = new Database("UPDATE karet_embryo_maturation_2 SET is_available = ? 
												WHERE id_embryo = ?",array(0,$idEm));

						$q1 = $q1 + $query1::$rowCount;
						$q2 = $q2 + $query2::$rowCount;
						$Em = $idEm;
						array_push($allLastInserted, $lastRowInsertedId);
					}
				} 

				//$dats = new Database("SELECT * FROM karet_embryo WHERE id = ?",array($Em));
				$dataAllImplode = implode(",",$dataAll);
				$media = createLogMedia(NULL, $_POST['germmedia'],$_POST['germamountmedia'],7,$dataAllImplode);

				if (isset($allLastInserted)){
					foreach ($allLastInserted as $key => $value) {
						$query4 = new Database("UPDATE karet_embryo_germination SET idpengeluaranmedia = ? 
											WHERE id = ?",array($media['idMediaOut'],$value));
					}
				}

				echo $q1 + $media['count'] + $query4::$rowCount;
			break;

			case "update-germ":
				$query1 = new Database("UPDATE karet_embryo_germination SET transferdate = ?, germ_worker = ?,
											laminar = ?, cultureroom = ?, nobox = ?, connected_to_other = ?,
											shape_of_embryo = ?, size_of_embryo = ?, comment_embryo = ?,
											type_of_callus = ?, color_of_callus = ?, comment_callus = ? 
											WHERE id = ?"
											,array(
												$_POST['transdate'],
												$_POST['idworker'],
												$_POST['idlaminar'],
												$_POST['culroom'],
												$_POST['nobox'],

												$_POST['connect'],
												$_POST['shape_em'],
												$_POST['size_em'],
												$_POST['comment_em'],

												$_POST['typecallus'],
												$_POST['colorcallus'],
												$_POST['calluscomment'],

												$_POST['id']
											)
										);

				echo $query1::$rowCount;
			break;

			case "delete-germ":
				$query1 = new Database("UPDATE karet_embryo_germination SET isactive = ?, is_available = ? 
											WHERE id = ?",array(0,0,$_POST['id']));

				echo $query1::$rowCount;
			break;

			case "add-germscreening":
				$cont = new Database("INSERT INTO karet_contamination_record (id_embryo,
										contamination_fungi, contamination_bact, pink, dead, comments, 
										reju_step, isactive) VALUES (?,?,?,?,?,?,?,?)"
										,array(
											$_POST['idembryo'],
											$_POST['fungi'],
											$_POST['bact'],
											$_POST['pink'],
											$_POST['dead'],
											$_POST['contcomment'],
											7,
											1
										)
									);

				$idcont = $cont::$lastInsertId;

				$cek = new Database("SELECT * FROM karet_embryo_germination_screening WHERE id_embryo = ?"
										,array($_POST['idembryo']));

				$r = $cek::$rowCount + 1;

				$query1 = new Database("INSERT INTO karet_embryo_germination_screening (id_embryo, 
										screening_date, screening_worker, screening_checkpoint, 
										comment, idcontaminationrecord, isactive) 
										VALUES (?,?,?,?,?,?,?)",
								array(
									$_POST['idembryo'],
									$_POST['screendate'],
									$_POST['screenworker'],
									$r,
									$_POST['comment'],
									$idcont,
									1
								)
							);
				//$idEmScreen = $query1::$lastInsertId;

				echo $cont::$rowCount + $query1::$rowCount;
			break;

			case "update-germscreening":
				$data = new Database("SELECT * FROM karet_embryo_germination_screening WHERE id = ?",array($_POST['idlog']));

				$cont = new Database("UPDATE karet_contamination_record SET contamination_fungi = ?, 
										contamination_bact = ?, pink = ?, dead = ?, comments = ?
										WHERE id = ?"
										,array(
											$_POST['fungi'],
											$_POST['bact'],
											$_POST['pink'],
											$_POST['dead'],
											$_POST['contcomment'],
											$data::$result[0]['idcontaminationrecord']
										)
									);

				$query1 = new Database("UPDATE karet_embryo_germination_screening SET 
										screening_date = ?, screening_worker = ?, comment = ? WHERE id = ?"
										,array(
											$_POST['screendate'],
											$_POST['screenworker'],
											$_POST['comment'],
											$_POST['idlog']
										)
									);
				//$idEmScreen = $query1::$lastInsertId;

				echo $cont::$rowCount + $query1::$rowCount;
			break;

			/*--------------------------------------------------*/

			case "add-germ-prepare":
				$cek = new Database("SELECT * FROM karet_embryo_germination WHERE id_embryo = ?",array($_POST['idembryo']));
				
				$idmedia = $idpeng_media = 0;
				if ($cek::$rowCount > 0){
					$idmedia = $cek::$result[0]['idmedia'];
					$idpeng_media = $cek::$result[0]['idpengeluaranmedia'];
				}

				$query1 = new Database("INSERT INTO karet_embryo_germination_prepare (id_embryo, germ_date,
											germ_worker, shoot, germinated, comment, isactive, is_available, idmedia, idpengeluaranmedia)
											VALUES (?,?,?,?,?,?,?,?,?,?)"
											,array(
												$_POST['idembryo'],
												$_POST['germdate'],
												$_POST['worker'],
												$_POST['shoot'],
												$_POST['germinated'],
												$_POST['comment'],
												1,
												1,
												$idmedia,
												$idpeng_media
											)
										);

				$query2 = new Database("UPDATE karet_embryo_germination SET is_available = ? 
										WHERE id_embryo = ?",array(0,$_POST['idembryo']));

				echo $query1::$rowCount + $query2::$rowCount;
			break;

			case "update-germ-prepare":
				$query1 = new Database("UPDATE karet_embryo_germination_prepare SET germ_date = ?, 
											germ_worker = ?, shoot = ?, germinated = ?, comment = ? 
											WHERE id = ?"
											,array(
												$_POST['germdate'],
												$_POST['worker'],
												$_POST['shoot'],
												$_POST['germinated'],
												$_POST['comment'],
												$_POST['id']
											)
										);

				echo $query1::$rowCount;
			break;

			case "delete-germ-prepare":
				$query1 = new Database("UPDATE karet_embryo_germination_prepare SET isactive = ?, 
											is_available = ? WHERE id = ?",array(0,0,$_POST['id']));

				echo $query1::$rowCount;
			break;

			case "add-germ-prepare-screening":
				$cont = new Database("INSERT INTO karet_contamination_record (id_embryo,
										contamination_fungi, contamination_bact, pink, dead, comments, 
										reju_step, isactive) VALUES (?,?,?,?,?,?,?,?)"
										,array(
											$_POST['idembryo'],
											$_POST['fungi'],
											$_POST['bact'],
											$_POST['pink'],
											$_POST['dead'],
											$_POST['contcomment'],
											8,
											1
										)
									);

				$idcont = $cont::$lastInsertId;

				$cek = new Database("SELECT * FROM karet_embryo_germination_prepare_screening 
										WHERE id_embryo = ?",array($_POST['idembryo']));

				$r = $cek::$rowCount + 1;

				$query1 = new Database("INSERT INTO karet_embryo_germination_prepare_screening (id_embryo, 
										screening_date, screening_worker, screening_checkpoint, 
										comment, idcontaminationrecord, isactive) 
										VALUES (?,?,?,?,?,?,?)",
								array(
									$_POST['idembryo'],
									$_POST['screendate'],
									$_POST['screenworker'],
									$r,
									$_POST['comment'],
									$idcont,
									1
								)
							);
				//$idEmScreen = $query1::$lastInsertId;

				echo $cont::$rowCount + $query1::$rowCount;
			break;

			case "update-germ-prepare-screening":
				$data = new Database("SELECT * FROM karet_embryo_germination_prepare_screening WHERE id = ?",array($_POST['idlog']));

				$cont = new Database("UPDATE karet_contamination_record SET contamination_fungi = ?, 
										contamination_bact = ?, pink = ?, dead = ?, comments = ?
										WHERE id = ?"
										,array(
											$_POST['fungi'],
											$_POST['bact'],
											$_POST['pink'],
											$_POST['dead'],
											$_POST['contcomment'],
											$data::$result[0]['idcontaminationrecord']
										)
									);

				$query1 = new Database("UPDATE karet_embryo_germination_prepare_screening SET 
										screening_date = ?, screening_worker = ?, comment = ? WHERE id = ?"
										,array(
											$_POST['screendate'],
											$_POST['screenworker'],
											$_POST['comment'],
											$_POST['idlog']
										)
									);
				//$idEmScreen = $query1::$lastInsertId;

				echo $cont::$rowCount + $query1::$rowCount;
			break;

			/*--------------------------- UPDATE MEDIA INITIATION ---------------------------*/

			case "add-update-media-initiation":
				$logCount = createLogMedia($_POST['idtreatment'], $_POST['idmedia'], $_POST['amountmedia'],2);

				$query1 = new Database("UPDATE karet_initiation SET idpengeluaranmedia = ?, idmedia = ? 
										WHERE id_treatment = ?"
										,array($logCount['idMediaOut'],$_POST['idmedia']
											,$_POST['idtreatment']));
	
				echo $logCount['count'] + $query1::$rowCount;
			break;	

			case "edit-update-media-initiation":
				$cek = new Database("SELECT * FROM karet_initiation WHERE id_treatment = ?",array($_POST['idtreatment']));
				$idMediaOut = $cek::$result[0]['idpengeluaranmedia'];

				$mediaResult = editLogMedia($idMediaOut,$_POST['amountmedia'],$_POST['idmedia']);

				$query1 = new Database("UPDATE karet_initiation SET idpengeluaranmedia = ?, idmedia = ? 
										WHERE id_treatment = ?"
										,array($idMediaOut,$_POST['idmedia']
											,$_POST['idtreatment']));

				echo $mediaResult['count'] + $query1::$rowCount;
			break;

			/*--------------------------- UPDATE MEDIA EMBRYOSCREENING --------------------------*/

			case "add-update-media-emscreen":
				$treat = new Database("SELECT * FROM karet_initiation_trans WHERE id = ?"
											,array($_POST['id']));

				$logCount = createLogMedia($treat::$result[0]['id_treatment'],$_POST['idmedia'],$_POST['amountmedia'],4);

				$query1 = new Database("UPDATE karet_initiation_trans SET idpengeluaranmedia = ?, 
											idmedia = ? WHERE id = ?"
											,array(
												$logCount['idMediaOut'],
												$_POST['idmedia'],
												$_POST['id']
											)
										);
	
				echo $logCount['count'] + $query1::$rowCount;
			break;	

			case "edit-update-media-emscreen":
				$cek = new Database("SELECT * FROM karet_initiation_trans WHERE id = ?"
										,array($_POST['id']));

				$idMediaOut = $cek::$result[0]['idpengeluaranmedia'];
				$mediaResult = editLogMedia($idMediaOut,$_POST['amountmedia'],$_POST['idmedia']);

				$query1 = new Database("UPDATE karet_initiation_trans SET idpengeluaranmedia = ?, 
											idmedia = ? WHERE id = ?"
											,array($idMediaOut,$_POST['idmedia'],$_POST['id']));

				echo $mediaResult['count'] + $query1::$rowCount;
			break;

			/*--------------------------- UPDATE MEDIA MATURATION I ---------------------------*/

			case "add-update-media-mat1":
				$allData = array();

				$allData = $_POST['dataforaddmedia'];
				$allEmbryoId = implode(",",$allData);

				$logCount = createLogMedia(NULL, $_POST['idmedia'], $_POST['amountmedia'],5,$allEmbryoId);

				$q1 = 0;
				foreach ($allData as $key => $value) {
					$query1 = new Database("UPDATE karet_embryo_maturation_1 SET idpengeluaranmedia = ?, 
												idmedia = ? WHERE id_embryo = ?"
											,array($logCount['idMediaOut'],$_POST['idmedia'],$value));
					$q1 = $q1 + $query1::$rowCount;
				}
				echo $logCount['count'] + $query1::$rowCount;
			break;	

			/*case "edit-update-media-mat1":
				$cek = new Database("SELECT * FROM karet_embryo_maturation_1 WHERE id_treatment = ?"
										,array($_POST['idtreatment']));

				$idMediaOut = $cek::$result[0]['idpengeluaranmedia'];

				$mediaResult = editLogMedia($idMediaOut,$_POST['amountmedia'],$_POST['idmedia']);

				$query1 = new Database("UPDATE karet_embryo_maturation_1 SET idpengeluaranmedia = ?, 
											idmedia = ? WHERE id_treatment = ?"
										,array(
											$idMediaOut,$_POST['idmedia']
											,$_POST['idtreatment']
										)
									);

				echo $mediaResult['count'] + $query1::$rowCount;
			break;*/

			case "add-update-media-mat2":
				$allData = array();

				$allData = $_POST['dataforaddmedia'];
				$allEmbryoId = implode(",",$allData);

				
				$logCount = createLogMedia(NULL, $_POST['idmedia'], $_POST['amountmedia'],6,$allEmbryoId);

				$q1 = 0;
				foreach ($allData as $key => $value) {
					$query1 = new Database("UPDATE karet_embryo_maturation_2 SET idpengeluaranmedia = ?, 
												idmedia = ? WHERE id_embryo = ?"
											,array($logCount['idMediaOut'],$_POST['idmedia'],$value));
					$q1 = $q1 + $query1::$rowCount;
				}

				echo $logCount['count'] + $query1::$rowCount;
			break;

			case "add-update-media-germ":
				$allData = array();

				$allData = $_POST['dataforaddmedia'];
				$allEmbryoId = implode(",",$allData);

				$logCount = createLogMedia(NULL, $_POST['idmedia'], $_POST['amountmedia'],7,$allEmbryoId);

				$q1 = 0;
				foreach ($allData as $key => $value) {
					$query1 = new Database("UPDATE karet_embryo_germination SET idpengeluaranmedia = ?, 
												idmedia = ? WHERE id_embryo = ?"
											,array($logCount['idMediaOut'],$_POST['idmedia'],$value));
					$q1 = $q1 + $query1::$rowCount;
				}

				echo $logCount['count'] + $query1::$rowCount;
			break;
			
			/*-----------------add Motherplant---------------------*/

			case "add-motherplant-from-reju":
				//$get_data = new Database("SELECT id FROM ")

				$query1 = new Database("INSERT INTO karet_motherplant_in 
											(
											code_se,
											se,
											initiation_year,
											tree,
											tree_part,
											harvest_date,
											reception_ug,
											usage_of_seeds,
											start_medium,
											germination_date,
											germination_medium,
											from_reju,
											idembryo,
											idtreatment,
											transferdate,
											leafsample, 
											resultofident, 
											isactive, 
											is_available) 
											VALUES (?,?,?,?,?,?)"
											,array(
												$_POST['idembryo'],
												$_POST['transdate'],
												//$_POST['worker'],
												$_POST['leafsample'],
												$_POST['resultofident'],
												1,
												1
											)
										);

				$id = $query1::$lastInsertId;

				$unicode = generateUnicode($id,$_POST['idembryo'],"M");
				$query2 = new Database("UPDATE karet_motherplant_in SET codese = ? WHERE id = ?",array($unicode, $id));

				echo $query1::$rowCount + $query2::$rowCount;
			break;

			/*case "add-motherplant":
				$timestamp = timeStamp();

				$query = new Database("INSERT INTO karet_motherplant
								([se]
								,[certified]
								,[deactivated]
								,[initiation_year]
								,[tree]
								,[treepart]
								,[harvest_date]
								,[reception_ug]
								,[usage_of_seeds]
								,[start_medium]
								,[germination_date]
								,[germination_medium]
								,[leaf_sample]
								,[leaf_sample_location]
								,[leaf_sample_cirad]
								,[germination_se]
								,[from_reju]
								,[created_at]
      							,[updated_at])
								VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"
							,array(
								$_POST['se'],
								$_POST["certified"],
								$_POST["deactivated"],
								$_POST["initiation_year"],
								$_POST["tree"],
								$_POST["treepart"],
								$_POST["harvest_date"],
								$_POST["reception_ug"],
								$_POST["usage_of_seeds"],
								$_POST['start_medium'],
								$_POST["germination_date"],
								$_POST["germination_medium"],
								$_POST["leaf_sample"],
								$_POST["leaf_sample_location"],
								$_POST["leaf_sample_cirad"],
								$_POST["germination_se"],
								"No",
								$timestamp,
								$timestamp
							)
						);

				$row = $query::$rowCount;
				$SETID = $query::$lastInsertId;

				$tree = new Database("
					SELECT
						karet_tree.num_tree,
						karet_clone.clonename
					FROM karet_tree

					JOIN karet_clone
					ON karet_tree.clonename = karet_clone.id

					WHERE karet_tree.id = ?", array(
					$_POST["tree"]
				));

				$CODESE = $tree::$result[0]["clonename"] . "-" . $tree::$result[0]["num_tree"] . "-" . $_POST["se"] . "_M_" . str_pad($SETID, 6, "0", STR_PAD_LEFT);

				$updateCodeSE = new Database("UPDATE karet_motherplant SET code_se = ? WHERE id = ?", array(
					$CODESE, $SETID
				));
				
				if ($row > 0){
					$result = array("id"=>$SETID,"rowcount"=>$row);
				} else {
					$result = $query::$result;
				}

				print_r($result);
			break;*/

			case "add-motherplant":
				$timestamp = timeStamp();
				$query = new Database("INSERT INTO karet_motherplant
								([se]
								,[certified]
								,[deactivated]
								,[initiation_year]
								,[tree]
								,[treepart]
								,[harvest_date]
								,[reception_ug]
								,[usage_of_seeds]
								,[start_medium]
								,[germination_date]
								,[germination_medium]
								,[leaf_sample]
								,[leaf_sample_location]
								,[leaf_sample_cirad]
								,[germination_se]
								,[from_reju]
								,[created_at]
      							,[updated_at]
      							,[shipment_motherplant]
      							,[shipment_invitro])
								VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"
							,array(
								$_POST['se'],
								$_POST["certified"],
								$_POST["deactivated"],
								$_POST["initiation_year"],
								$_POST["tree"],
								$_POST["treepart"],
								$_POST["harvest_date"],
								$_POST["reception_ug"],
								$_POST["usage_of_seeds"],
								$_POST['start_medium'],
								$_POST["germination_date"],
								$_POST["germination_medium"],
								$_POST["leaf_sample"],
								$_POST["leaf_sample_location"],
								$_POST["leaf_sample_cirad"],
								$_POST["germination_se"],
								"No",
								$timestamp,
								$timestamp,
								(isset($_POST['shipment_mother'])) ? $_POST['shipment_mother'] : "",
								(isset($_POST['shipment_invitro'])) ? $_POST['shipment_invitro'] : ""
							)
						);
				$row = $query::$rowCount;
				$SETID = $query::$lastInsertId;
				$tree = new Database("
					SELECT
						karet_tree.num_tree,
						karet_clone.clonename
					FROM karet_tree
					JOIN karet_clone
					ON karet_tree.clonename = karet_clone.id
					WHERE karet_tree.id = ?", array(
					$_POST["tree"]
				));
				$CODESE = $tree::$result[0]["clonename"] . "-" . $tree::$result[0]["num_tree"] . "-" . $_POST["se"] . "_M_" . str_pad($SETID, 6, "0", STR_PAD_LEFT);
				$updateCodeSE = new Database("UPDATE karet_motherplant SET code_se = ? WHERE id = ?", array(
					$CODESE, $SETID
				));
				
				if ($row > 0){
					$result = array("id"=>$SETID,"rowcount"=>$row);
				} else {
					$result = $query::$result;
				}
				print_r($result);
			break;

			/*-----------------Update Motherplant---------------------*/
			case "update-motherplant":
				$query = new Database("
					UPDATE karet_motherplant
						SET
						idembryo = ?,
						certified = ?,
						deactivated = ?,
						initiationyear = ?,
						tree = ?,
						treepart = ?,
						harvestdate = ?,
						receptionug = ?,
						usageofseeds = ?,
						startmedium = ?,
						germinationdate = ?,
						germinationmedium = ?,
						leafsample = ?,
						leafsamplelocation = ?,
						leafsamplecirad = ?,
						germinationse = ?
						WHERE id = ?"
					,array(
						$_POST["se"],
						$_POST["certified"],
						$_POST["deactivated"],
						$_POST["initiationyear"],
						$_POST["tree"],
						$_POST["treepart"],
						$_POST["harvestdate"],
						$_POST["receptionug"],
						$_POST["usageofseeds"],
						$_POST["startmedium"],
						$_POST["germinationdate"],
						$_POST["germinationmedium"],
						$_POST["leafsample"],
						$_POST["leafsamplelocation"],
						$_POST["leafsamplecirad"],
						$_POST["germinationse"],
						$_POST["id"]
					)
				);
				echo ($query::$rowCount < 1)?$query::$qStrings:$query::$rowCount;
			break;

			case "tambah_komentar":
				$query = new Database("INSERT INTO karet_motherplant_comment ([comment_motherplan], [comment_content], [comment_date])
					VALUES (?,?,?)", array(
						intval($_POST["id"]),
						$_POST["comment"],
						$_POST["comment_date"]
					));
				echo ($query::$rowCount < 1)?$query::$qStrings:$query::$rowCount;
			break;

			case "tambah_file":
				$filename = $_FILES['file']['name'];
				$format = explode(".", $filename);
				$getFormat = $format[count($format) - 1];
				unset($format[count($format) - 1]);

				if ( 0 < $_FILES['file']['error'] ) {
					echo 'Error: ' . $_FILES['file']['error'] . '<br>';
				}
				else {
					if(file_exists('uploads/' . $filename)){
						$filename = implode(".", $format) . date("d-m-Y_H_i_s") . "." . $getFormat;
					}
					if(move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $filename)){
						$query = new Database("INSERT INTO karet_motherplant_file (file_name, file_location, file_comment, file_date, file_motherplan)
							VALUES(?,?,?,?,?)", array(
								$_FILES["file"]["name"],
								'uploads/' . $filename,
								$_POST["comment"],
								$_POST["comment_date"],
								$_POST["id"]

							));	
					}
				}
			break;

			case "edit_komen":
				$query = new Database("UPDATE karet_motherplant_comment SET comment_content = ? WHERE comment_id = ?", array(
					$_POST["comment"],
					$_POST["id"]
				));
				echo ($query::$rowCount < 1)?$query::$qStrings:$query::$rowCount;
			break;

			case "edit_komen_file":
				$query = new Database("UPDATE karet_motherplant_file SET file_comment = ? WHERE file_id = ?", array(
					$_POST["comment"],
					$_POST["id"]
				));
				echo ($query::$rowCount < 1)?$query::$qStrings:$query::$rowCount;
			break;

			case "invitro_from_se":

				//GET embryocode
				$codese = new Database("SELECT MAX(id) FROM karet_motherplant WHERE id = ?", array($_POST["motherplan"]));
				$getcodeSE = explode("_", $codese::$result[0]["codese"]);

				//GET nextcode
				$code = new Database("SELECT MAX(id) FROM karet_invitro");
				$nextcode = intval($code::$result[0]["MAX(id)"]) + 1;

				$query = new Database("INSERT INTO karet_invitro (
					unique_code,
					resource,
					motherembryo,
					deactive,
					startdate,
					idmedium,
					idrecipient,
					numofplants, 
					numofalive,
					numofdead,
					numofconta,
					newr,
					newm,
					flow,
					enddate,
					types,
					idstaf,
					idworker,
					contamination,
					iduser,
					createdate,
					isactive,
					obsdate)
					VALUES (?, ?, ?, ?, ?,
					?, ?, ?, ?, ?,
					?, ?, ?, ?, ?,
					?, ?, ?, ?, ?,
					NOW(), ?, ?)", array(
					$getcodeSE[0] . "_I_" . str_pad($nextcode, 6, "0", STR_PAD_LEFT),
					
				));
				echo ($query::$rowCount < 1)?$query::$qStrings:$query::$rowCount;
			break;

			case 'invitro-from-se':
				//GET embryocode
				$codese = new Database("SELECT * FROM karet_motherplant WHERE id = ?", array($_POST["motherplant"]));
				$getcodeSE = explode("_", $codese::$result[0]["code_se"]);

				//GET nextcode
				$code = new Database("SELECT MAX(id) max_id FROM karet_invitro");
				$nextcode = ($code::$rowCount > 0) ? intval($code::$result[0]["max_id"]) + 1 : 1;

				$timestamp = timeStamp();

				$query = new Database("INSERT INTO karet_invitro (
						unique_code,
						deactivated,
						start_date,
						medium,
						recipient,
						number_of_plants,
						laminar_flow,
						worker,
						motherplant_id,
						qty_start,
						qty_remaining,
						created_at,
						updated_at)
						VALUES (?, ?, ?, ?, ?, ?,
						?, ?, ?, ?, ?, ?, ?)"
					, array(
						$getcodeSE[0] . "_I_" . str_pad($nextcode, 6, "0", STR_PAD_LEFT),
						"FALSE",
						$_POST['startdate'],
						$_POST['medium'],
						$_POST['recipient'],
						$_POST['numberofplants'],
						$_POST['laminarflow'],
						$_POST['worker'],
						$_POST['motherplant'],
						$_POST['numberofplants'],
						$_POST['numberofplants'],
						$timestamp,
						$timestamp
				));

				$setID = $query::$lastInsertId;
				$rowCount = intval($query::$rowCount);

				if ($rowCount > 0){
					$parentTable = new Database("INSERT INTO 
						karet_invitro_parent_child (
								parent,
								child,
								parent_option,
								created_at,
								updated_at)
								VALUES (?,?,?,?,?)"
							,array(
								$_POST['motherplant'],
								$setID,
								"motherplant",
								$timestamp,
								$timestamp
						)	
					);

					$result = array("id"=>$setID,"rowcount"=>$rowCount);

					if ($parentTable::$rowCount > 0){
						$result["parent_table"] = $parentTable::$rowCount;
					}

				} else {
					$result = $query::$result;
				}

				//print_r($_POST['motherplant'] . " _ " . $_POST['startdate'] . " _ " . $_POST['medium'] . " _ " . $_POST['recipient'] . " _ " . $_POST['numberofplants'] . " _ " . $_POST['laminarflow'] . " _ " . $_POST['worker']);

				print_r(json_encode($result));

				break;

			case "invitro-from-invitro":
				
				//GET embryocode
				$getcodeSE = "";
				$getMotherplant = "";
				foreach ($_POST['dataParent'] as $key => $value) {
					$codese = new Database("SELECT * FROM karet_invitro WHERE id = ?", array($value["id"]));
					$getcodeSE = explode("_", $codese::$result[0]["unique_code"]);
					$getMotherplant = $codese::$result[0]['motherplant_id'];
					if ($getcodeSE != "" && $getMotherplant != "") { 
						break; 
					}
				}
				
				//GET nextcode
				$code = new Database("SELECT MAX(id) max_id FROM karet_invitro");
				$nextcode = ($code::$rowCount > 0) ? intval($code::$result[0]["max_id"]) + 1 : 1;

				$timestamp = timeStamp();

				$query = new Database("INSERT INTO karet_invitro (
						unique_code,
						deactivated,
						start_date,
						medium,
						recipient,
						number_of_plants,
						laminar_flow,
						worker,
						motherplant_id,
						created_at,
						updated_at)
						VALUES (?, ?, ?, ?, ?, ?,
						?, ?, ?, ?, ?)"
					, array(
						$getcodeSE[0] . "_I_" . str_pad($nextcode, 6, "0", STR_PAD_LEFT),
						"FALSE",
						$_POST['startdate'],
						$_POST['medium'],
						$_POST['recipient'],
						$_POST['numberofplants'],
						$_POST['laminarflow'],
						$_POST['worker'],
						$getMotherplant,
						$timestamp,
						$timestamp
				));

				$setID = $query::$lastInsertId;
				$rowCount = intval($query::$rowCount);

				if ($query::$rowCount > 0){
					$updateParentCount = 0;
					$parentChildCount = 0;
					foreach ($_POST['dataParent'] as $key => $value) {

						//new shoots for r has removed
						$updateParent = new Database("UPDATE karet_invitro SET 
							end_date = ?,
							deactivated = ?,
							number_of_plants = ?,
							number_of_alive = ?,
							number_of_dead = ?,
							number_of_contaminated = ?,
							new_shoots_on_m = ?,
							updated_at = ?
							WHERE id = ?"
							,array(
								$value['end_date'],
								$value['deactivated'],
								$value['qty'],
								$value['number_of_alive'],
								$value['number_of_dead'],
								$value['contaminated'],
								$value['new_shoots_on_m'],
								$timestamp,
								$value['id']
							)
						);
						
						if ($updateParent::$rowCount > 0){
							$updateParentCount += $updateParent::$rowCount;
						}

						$parentTable = new Database("INSERT INTO 
							karet_invitro_parent_child (
									parent,
									child,
									parent_option,
									created_at,
									updated_at)
									VALUES (?,?,?,?,?)"
								,array(
									$value['id'],
									$setID,
									"invitro",
									$timestamp,
									$timestamp
							)	
						);

						if ($parentTable::$rowCount > 0){
							$parentChildCount += $parentTable::$rowCount;
						}
						//}
					}

						$result = array("id"=>$setID,"rowcount"=>$rowCount);

						if ($parentTable::$rowCount > 0){
							$result["parent_update"] = $updateParentCount;
							$result["parent_table"] = $parentChildCount;
						}

				} else {
					$result = $query::$result;
				}

				print_r(json_encode($result));

				break;

			case 'update-invitro':
				$timestamp = timeStamp();
				$end_date = ($_POST['enddate'] != null) ? $_POST['enddate'] : NULL;

				$query = new Database("UPDATE karet_invitro SET 
						start_date = ?, 
						end_date = ?,
						medium = ?,
						recipient = ?,
						number_of_plants = ?,
						number_of_alive = ?,
						number_of_dead = ?,
						number_of_contaminated = ?,
						new_shoots_for_r = ?,
						new_shoots_on_m = ?,
						deactivated = ?,
						contamination_type = ?,
						laminar_flow = ?,
						worker = ?,
						updated_at = ?
						WHERE id = ?"
						, array(
							$_POST['startdate'],
							$end_date,
							$_POST['medium'],
							$_POST['recipient'],
							$_POST['numberofplants'],
							$_POST['numberofalive'],
							$_POST['numberofdead'],
							$_POST['contaminated'],
							$_POST['new_shoots_for_r'],
							$_POST['new_shoots_on_m'],
							$_POST['deactivated'],
							$_POST['contamination_type'],
							$_POST['laminarflow'],
							$_POST['worker'],
							$timestamp,
							$_POST['selectedID']
						)
					);

				if ($query::$rowCount > 0){
					$result = array("id"=>$query::$lastInsertId,"rowcount"=>intval($query::$rowCount));
				} else {
					$result = $query::$result;
				}

				print_r(json_encode($result));

				break;

			case "delete-invitro":
				$timestamp = timeStamp();
				
				$query1 = new Database("UPDATE karet_invitro SET deleted_at = ? WHERE id = ?",array($timestamp, $_POST['id']));

				echo $query1::$rowCount;
				break;

			/*------------------- ACCLIMATIZATION ------------------*/
			case "add-acclimatization":
				
				//GET embryocode
				$getcodeSE = "";
				$getMotherplant = "";
				foreach ($_POST['dataParent'] as $key => $value) {
					$codese = new Database("SELECT * FROM karet_invitro WHERE id = ?", array($value["id"]));
					$getcodeSE = explode("_", $codese::$result[0]["unique_code"]);
					$getMotherplant = $codese::$result[0]['motherplant_id'];
					if ($getcodeSE != "" && $getMotherplant != "") { 
						break; 
					}
				}
				
				//GET nextcode
				$code = new Database("SELECT MAX(id) max_id FROM karet_acclimatization");
				$nextcode = ($code::$rowCount > 0) ? intval($code::$result[0]["max_id"]) + 1 : 1;

				$timestamp = timeStamp();

				$query = new Database("INSERT INTO karet_acclimatization (
						unique_code,
						deactivated,
						plantation,
						country_arrival_date,
						supplier,
						date_of_shipment,
						plantation_arrival_date,
						start_date,
						green_house_number,
						qty_received,
						qty_rejected,
						qty_at_end,
						qty_remaining,
						motherplant_id,
						created_at,
						updated_at)
						VALUES (
						?, ?, ?, ?, ?, 
						?, ?, ?, ?, ?,
						?, ?, ?, ?, ?, ?
						)"
					, array(
						$getcodeSE[0] . "_A_" . str_pad($nextcode, 6, "0", STR_PAD_LEFT),
						"FALSE",
						$_POST['plantation'],
						$_POST['country_arrival_date'],
						$_POST['supplier'],
						$_POST['date_of_shipment'],
						$_POST['plantation_arrival_date'],
						$_POST['start_date'],
						$_POST['green_house_number'],
						$_POST['quantity_received'],
						$_POST['quantity_rejected'],
						$_POST['quantity_at_end'],
						$_POST['quantity_received'],
						$getMotherplant,
						$timestamp,
						$timestamp
				));

				$setID = $query::$lastInsertId;
				$rowCount = intval($query::$rowCount);

				if ($query::$rowCount > 0){
					$updateParentCount = 0;
					$parentChildCount = 0;
					foreach ($_POST['dataParent'] as $key => $value) {
						$updateParent = new Database("UPDATE karet_invitro SET 
							end_date = ?,
							deactivated = ?,
							qty_remaining = ?,
							new_shoots_for_r = ?,
							updated_at = ?
							WHERE id = ?"
							,array(
								$value['end_date'],
								$value['deactivated'],
								$value['qty_remaining'],
								$value['qty_used'],
								$timestamp,
								$value['id']
							)
						);
						
						if ($updateParent::$rowCount > 0){
							$updateParentCount += $updateParent::$rowCount;
						}

						$parentTable = new Database("INSERT INTO 
							karet_acclimatization_parent_child (
									parent,
									child,
									created_at,
									updated_at)
									VALUES (?,?,?,?)"
								,array(
									$value['id'],
									$setID,
									$timestamp,
									$timestamp
							)	
						);

						if ($parentTable::$rowCount > 0){
							$parentChildCount += $parentTable::$rowCount;
						}
						//}
					}

						$result = array("id"=>$setID,"rowcount"=>$rowCount);

						if ($parentTable::$rowCount > 0){
							$result["parent_update"] = $updateParentCount;
							$result["parent_table"] = $parentChildCount;
						}

				} else {
					$result = $query::$result;
				}

				print_r(json_encode($result));

				break;

			case 'update-acclimatization':
				$timestamp = timeStamp();

				$deadPlant = NULL;
				if ($_POST['dead_plant'] != ''){
					$deadPlant = $_POST['dead_plant'];
				}

				$query = new Database("UPDATE karet_acclimatization SET
						deactivated = ?,
						country_arrival_date = ?,
						supplier = ?,
						date_of_shipment = ?,
						plantation_arrival_date = ?,
						start_date = ?,
						green_house_number = ?,
						qty_received = ?,
						qty_rejected = ?,
						qty_at_end = ?,
						dead_plant = ?,
						updated_at = ?
						WHERE id = ?"
						, array(
							$_POST['deactivated'],
							$_POST['country_arrival_date'],
							$_POST['supplier'],
							$_POST['date_of_shipment'],
							$_POST['plantation_arrival_date'],
							$_POST['start_date'],
							$_POST['green_house_number'],
							$_POST['quantity_received'],
							$_POST['quantity_rejected'],
							$_POST['quantity_at_end'],
							$deadPlant,
							$timestamp,
							$_POST['selectedID']
						)
					);

				if ($query::$rowCount > 0){
					$result = array("id"=>$_POST['selectedID'],"rowcount"=>intval($query::$rowCount));
				} else {
					$result = $query::$result;
				}

				print_r(json_encode($result));

				break;

			case "delete-acclimatization":
				$timestamp = timeStamp();
				
				$query1 = new Database("UPDATE karet_acclimatization SET deleted_at = ? WHERE id = ?",array($timestamp, $_POST['id']));

				echo $query1::$rowCount;
				break;

			/*--------------------- HARDENING ------------------------*/
			case 'add-hardening-from-acc':
				//GET embryocode
				$getcodeSE = "";
				$getMotherplant = "";
				foreach ($_POST['dataParent'] as $key => $value) {
					$codese = new Database("SELECT * FROM karet_acclimatization WHERE id = ?", array($value["id"]));
					$getcodeSE = explode("_", $codese::$result[0]["unique_code"]);
					$getMotherplant = $codese::$result[0]['motherplant_id'];
					if ($getcodeSE != "" && $getMotherplant != "") { 
						break; 
					}
				}
				
				//GET nextcode
				$code = new Database("SELECT MAX(id) max_id FROM karet_exvitro_hardening");
				$nextcode = ($code::$rowCount > 0) ? intval($code::$result[0]["max_id"]) + 1 : 1;

				$timestamp = timeStamp();

				$query = new Database("INSERT INTO karet_exvitro_hardening (
						unique_code
						,deactivated
						,qty_at_start
						,start_date
						,qty_remaining
						,motherplant_id
						,created_at
						,updated_at
						)
						VALUES (
						?, ?, ?, ?,
						?, ?, ?, ?
						)"
					, array(
						$getcodeSE[0] . "_H_" . str_pad($nextcode, 6, "0", STR_PAD_LEFT),
						"FALSE",
						$_POST['qty_received'],
						$_POST['start_date'],
						$_POST['qty_received'],
						$getMotherplant,
						$timestamp,
						$timestamp
					)
				);

				$setID = $query::$lastInsertId;
				$rowCount = intval($query::$rowCount);

				
				if ($query::$rowCount > 0){
					$updateParentCount = 0;
					$parentChildCount = 0;
					foreach ($_POST['dataParent'] as $key => $value) {
						$updateParent = new Database("UPDATE karet_acclimatization SET 
							end_date = ?,
							deactivated = ?,
							qty_remaining = ?,
							updated_at = ?
							WHERE id = ?"
							,array(
								$value['end_date'],
								$value['deactivated'],
								$value['qty_remaining'],
								$timestamp,
								$value['id']
							)
						);
						
						if ($updateParent::$rowCount > 0){
							$updateParentCount += $updateParent::$rowCount;
						}

						$parentTable = new Database("INSERT INTO 
							karet_exvitro_hardening_parent_child (
									parent,
									child,
									parent_option,
									created_at,
									updated_at)
									VALUES (?,?,?,?,?)"
								,array(
									$value['id'],
									$setID,
									'acclimatization',
									$timestamp,
									$timestamp
							)	
						);

						if ($parentTable::$rowCount > 0){
							$parentChildCount += $parentTable::$rowCount;
						}
						//}
					}

						$result = array("id"=>$setID,"rowcount"=>$rowCount);

						if ($parentTable::$rowCount > 0){
							$result["parent_update"] = $updateParentCount;
							$result["parent_table"] = $parentChildCount;
						}

				} else {
					$result = $query::$result;
				}

				print_r(json_encode($result));

				break;

			case 'add-hardening-from-rooting':
				//GET embryocode
				$getcodeSE = "";
				$getMotherplant = "";
				foreach ($_POST['dataParent'] as $key => $value) {
					$codese = new Database("SELECT * FROM karet_exvitro_rooting_green_house WHERE id = ?", array($value["id"]));
					$getcodeSE = explode("_", $codese::$result[0]["unique_code"]);
					$getMotherplant = $codese::$result[0]['motherplant_id'];
					if ($getcodeSE != "" && $getMotherplant != "") { 
						break; 
					}
				}
				
				//GET nextcode
				$code = new Database("SELECT MAX(id) max_id FROM karet_exvitro_hardening");
				$nextcode = ($code::$rowCount > 0) ? intval($code::$result[0]["max_id"]) + 1 : 1;

				$timestamp = timeStamp();

				$query = new Database("INSERT INTO karet_exvitro_hardening (
						unique_code
						,deactivated
						,qty_at_start
						,start_date
						,qty_remaining
						,motherplant_id
						,created_at
						,updated_at
						)
						VALUES (
						?, ?, ?, ?,
						?, ?, ?, ?
						)"
					, array(
						$getcodeSE[0] . "_H_" . str_pad($nextcode, 6, "0", STR_PAD_LEFT),
						"FALSE",
						$_POST['qty_received'],
						$_POST['start_date'],
						$_POST['qty_received'],
						$getMotherplant,
						$timestamp,
						$timestamp
					)
				);

				$setID = $query::$lastInsertId;
				$rowCount = intval($query::$rowCount);

				
				if ($query::$rowCount > 0){
					$updateParentCount = 0;
					$parentChildCount = 0;
					foreach ($_POST['dataParent'] as $key => $value) {
						$updateParent = new Database("UPDATE karet_exvitro_rooting_green_house SET 
							end_date = ?,
							deactivated = ?,
							qty_remaining = ?,
							updated_at = ?
							WHERE id = ?"
							,array(
								$value['end_date'],
								$value['deactivated'],
								$value['qty_remaining'],
								$timestamp,
								$value['id']
							)
						);
						
						if ($updateParent::$rowCount > 0){
							$updateParentCount += $updateParent::$rowCount;
						}

						$parentTable = new Database("INSERT INTO 
							karet_exvitro_hardening_parent_child (
									parent,
									child,
									parent_option,
									created_at,
									updated_at)
									VALUES (?,?,?,?,?)"
								,array(
									$value['id'],
									$setID,
									'rooting',
									$timestamp,
									$timestamp
							)	
						);

						if ($parentTable::$rowCount > 0){
							$parentChildCount += $parentTable::$rowCount;
						}
						//}
					}

						$result = array("id"=>$setID,"rowcount"=>$rowCount);

						if ($parentTable::$rowCount > 0){
							$result["parent_update"] = $updateParentCount;
							$result["parent_table"] = $parentChildCount;
						}

				} else {
					$result = $query::$result;
				}

				print_r(json_encode($result));

				break;


			case 'update-hardening':
				$timestamp = timeStamp();

				$quantityAtEnd = NULL;
				if ($_POST['quantity_at_end'] != ''){
					$quantityAtEnd = $_POST['quantity_at_end'];
				}

				$query = new Database("UPDATE karet_exvitro_hardening SET
						deactivated = ?
						,qty_at_start = ?
						,qty_at_end = ?
						,start_date = ?
						,updated_at = ?
						WHERE id = ?"
						, array(
							$_POST['deactivated'],
							$_POST['quantity_at_start'],
							$quantityAtEnd,
							$_POST['start_date'],
							$timestamp,
							$_POST['selectedID']
						)
					);

				if ($query::$rowCount > 0){
					$result = array("id"=>$_POST['selectedID'],"rowcount"=>intval($query::$rowCount));
				} else {
					$result = $query::$result;
				}

				print_r(json_encode($result));
				break;

			case "delete-hardening":
				$timestamp = timeStamp();
				
				$query1 = new Database("UPDATE karet_exvitro_hardening SET deleted_at = ? WHERE id = ?",array($timestamp, $_POST['id']));

				echo $query1::$rowCount;
				break;

			/*--------------------- NURSERY ------------------------*/
			case 'add-nursery':
				//GET embryocode
				$getcodeSE = "";
				$getMotherplant = "";
				foreach ($_POST['dataParent'] as $key => $value) {
					$codese = new Database("SELECT * FROM karet_exvitro_hardening WHERE id = ?", array($value["id"]));
					$getcodeSE = explode("_", $codese::$result[0]["unique_code"]);
					$getMotherplant = $codese::$result[0]['motherplant_id'];
					if ($getcodeSE != "" && $getMotherplant != "") { 
						break; 
					}
				}
				
				//GET nextcode
				$code = new Database("SELECT MAX(id) max_id FROM karet_exvitro_nursery");
				$nextcode = ($code::$rowCount > 0) ? intval($code::$result[0]["max_id"]) + 1 : 1;

				$timestamp = timeStamp();

				$query = new Database("INSERT INTO karet_exvitro_nursery (
						unique_code
						,deactivated
						,qty_at_start
						,start_date
						,qty_remaining
						,motherplant_id
						,created_at
						,updated_at
						)
						VALUES (
						?, ?, ?, ?,
						?, ?, ?, ?
						)"
					, array(
						$getcodeSE[0] . "_N_" . str_pad($nextcode, 6, "0", STR_PAD_LEFT),
						"FALSE",
						$_POST['qty_received'],
						$_POST['start_date'],
						$_POST['qty_received'],
						$getMotherplant,
						$timestamp,
						$timestamp
					)
				);

				$setID = $query::$lastInsertId;
				$rowCount = intval($query::$rowCount);

				if ($query::$rowCount > 0){
					$updateParentCount = 0;
					$parentChildCount = 0;
					foreach ($_POST['dataParent'] as $key => $value) {
						$updateParent = new Database("UPDATE karet_exvitro_hardening SET 
							end_date = ?,
							deactivated = ?,
							qty_remaining = ?,
							updated_at = ?
							WHERE id = ?"
							,array(
								$value['end_date'],
								$value['deactivated'],
								$value['qty_remaining'],
								$timestamp,
								$value['id']
							)
						);
						
						if ($updateParent::$rowCount > 0){
							$updateParentCount += $updateParent::$rowCount;
						}

						$parentTable = new Database("INSERT INTO 
							karet_exvitro_nursery_parent_child (
									parent,
									child,
									created_at,
									updated_at)
									VALUES (?,?,?,?)"
								,array(
									$value['id'],
									$setID,
									$timestamp,
									$timestamp
							)	
						);

						if ($parentTable::$rowCount > 0){
							$parentChildCount += $parentTable::$rowCount;
						}
						//}
					}

						$result = array("id"=>$setID,"rowcount"=>$rowCount);

						if ($parentTable::$rowCount > 0){
							$result["parent_update"] = $updateParentCount;
							$result["parent_table"] = $parentChildCount;
						}

				} else {
					$result = $query::$result;
				}

				print_r(json_encode($result));

				break;

			case 'update-nursery':
				$timestamp = timeStamp();

				$quantityAtEnd = NULL;
				if ($_POST['quantity_at_end'] != ''){
					$quantityAtEnd = $_POST['quantity_at_end'];
				}

				$query = new Database("UPDATE karet_exvitro_nursery SET
						deactivated = ?
						,qty_at_start = ?
						,qty_at_end = ?
						,start_date = ?
						,updated_at = ?
						WHERE id = ?"
						, array(
							$_POST['deactivated'],
							$_POST['quantity_at_start'],
							$quantityAtEnd,
							$_POST['start_date'],
							$timestamp,
							$_POST['selectedID']
						)
					);

				if ($query::$rowCount > 0){
					$result = array("id"=>$_POST['selectedID'],"rowcount"=>intval($query::$rowCount));
				} else {
					$result = $query::$result;
				}

				print_r(json_encode($result));
				break;

			case "delete-nursery":
				$timestamp = timeStamp();
				
				$query1 = new Database("UPDATE karet_exvitro_nursery SET deleted_at = ? WHERE id = ?",array($timestamp, $_POST['id']));

				echo $query1::$rowCount;
				break;

			/*--------------------- BUDWOOD GARDEN ------------------------*/
			case 'add-budwood':
				//GET embryocode
				$getcodeSE = "";
				$getMotherplant = "";
				foreach ($_POST['dataParent'] as $key => $value) {
					$codese = new Database("SELECT * FROM karet_exvitro_nursery WHERE id = ?", array($value["id"]));
					$getcodeSE = explode("_", $codese::$result[0]["unique_code"]);
					$getMotherplant = $codese::$result[0]['motherplant_id'];
					if ($getcodeSE != "" && $getMotherplant != "") { 
						break; 
					}
				}
				
				//GET nextcode
				$code = new Database("SELECT MAX(id) max_id FROM karet_exvitro_budwood_garden");
				$nextcode = ($code::$rowCount > 0) ? intval($code::$result[0]["max_id"]) + 1 : 1;

				$timestamp = timeStamp();

				$query = new Database("INSERT INTO karet_exvitro_budwood_garden (
						unique_code
						,qty_planted
						,block
						,planting_date
						,motherplant_id
						,created_at
						,updated_at
						)
						VALUES (
						?, ?, ?, ?,
						?, ?, ?
						)"
					, array(
						$getcodeSE[0] . "_B_" . str_pad($nextcode, 6, "0", STR_PAD_LEFT),
						$_POST['qty_planted'],
						$_POST['block'],
						$_POST['planting_date'],
						$getMotherplant,
						$timestamp,
						$timestamp
					)
				);

				$setID = $query::$lastInsertId;
				$rowCount = intval($query::$rowCount);

				if ($query::$rowCount > 0){
					$updateParentCount = 0;
					$parentChildCount = 0;
					foreach ($_POST['dataParent'] as $key => $value) {
						$updateParent = new Database("UPDATE karet_exvitro_nursery SET 
							end_date = ?,
							deactivated = ?,
							qty_remaining = ?,
							updated_at = ?
							WHERE id = ?"
							,array(
								$value['end_date'],
								$value['deactivated'],
								$value['qty_remaining'],
								$timestamp,
								$value['id']
							)
						);
						
						if ($updateParent::$rowCount > 0){
							$updateParentCount += $updateParent::$rowCount;
						}

						$parentTable = new Database("INSERT INTO 
							karet_exvitro_budwood_garden_parent_child (
									parent,
									child,
									created_at,
									updated_at)
									VALUES (?,?,?,?)"
								,array(
									$value['id'],
									$setID,
									$timestamp,
									$timestamp
							)	
						);

						if ($parentTable::$rowCount > 0){
							$parentChildCount += $parentTable::$rowCount;
						}
						//}
					}

						$result = array("id"=>$setID,"rowcount"=>$rowCount);

						if ($parentTable::$rowCount > 0){
							$result["parent_update"] = $updateParentCount;
							$result["parent_table"] = $parentChildCount;
						}

				} else {
					$result = $query::$result;
				}

				print_r(json_encode($result));

				break;

			case 'update-budwood':
				$timestamp = timeStamp();

				$quantityStands = NULL;
				if ($_POST['qty_stands'] != ''){
					$quantityStands = $_POST['qty_stands'];
				}

				$quantityRejected = NULL;
				if ($_POST['qty_rejected'] != ''){
					$quantityRejected = $_POST['qty_rejected'];
				}

				$query = new Database("UPDATE karet_exvitro_budwood_garden SET
						block = ?
						,planting_date = ?
						,qty_planted = ?
						,qty_stands = ?
						,qty_rejected = ?
						,updated_at = ?
						WHERE id = ?"
						, array(
							$_POST['block'],
							$_POST['planting_date'],
							$_POST['qty_planted'],
							$quantityStands,
							$quantityRejected,
							$timestamp,
							$_POST['selectedID']
						)
					);

				if ($query::$rowCount > 0){
					$result = array("id"=>$_POST['selectedID'],"rowcount"=>intval($query::$rowCount));
				} else {
					$result = $query::$result;
				}

				print_r(json_encode($result));
				break;

			case "delete-budwood":
				$timestamp = timeStamp();
				
				$query1 = new Database("UPDATE karet_exvitro_nursery SET deleted_at = ? WHERE id = ?",array($timestamp, $_POST['id']));

				echo $query1::$rowCount;
				break;

			/*--------------------- PLANTATION FIELD ------------------------*/
			case "add-plantation-field":
				//GET embryocode
				$getcodeSE = "";
				$getMotherplant = "";
				foreach ($_POST['dataParent'] as $key => $value) {
					$codese = new Database("SELECT * FROM karet_exvitro_nursery WHERE id = ?", array($value["id"]));
					$getcodeSE = explode("_", $codese::$result[0]["unique_code"]);
					$getMotherplant = $codese::$result[0]['motherplant_id'];
					if ($getcodeSE != "" && $getMotherplant != "") { 
						break; 
					}
				}
				
				//GET nextcode
				$code = new Database("SELECT MAX(id) max_id FROM karet_exvitro_plantation_field");
				$nextcode = ($code::$rowCount > 0) ? intval($code::$result[0]["max_id"]) + 1 : 1;

				$timestamp = timeStamp();

				$query = new Database("INSERT INTO karet_exvitro_plantation_field (
						unique_code
						,motherplant_id
						,qty_planted
						,panel
						,planting_date
						,created_at
						,updated_at
						)
						VALUES (
						?, ?, ?, ?,
						?, ?, ?
						)"
					, array(
						$getcodeSE[0] . "_F_" . str_pad($nextcode, 6, "0", STR_PAD_LEFT),
						$getMotherplant,
						$_POST['qty_received'],
						$_POST['panel'],
						date('Y-m-d', strtotime($_POST['planting_date'])),
						$timestamp,
						$timestamp
					)
				);

				$setID = $query::$lastInsertId;
				$rowCount = intval($query::$rowCount);

				if ($query::$rowCount > 0){
					$updateParentCount = 0;
					$parentChildCount = 0;
					foreach ($_POST['dataParent'] as $key => $value) {
						$updateParent = new Database("UPDATE karet_exvitro_nursery SET 
							end_date = ?,
							deactivated = ?,
							qty_remaining = ?,
							updated_at = ?
							WHERE id = ?"
							,array(
								$value['end_date'],
								$value['deactivated'],
								$value['qty_remaining'],
								$timestamp,
								$value['id']
							)
						);
						
						if ($updateParent::$rowCount > 0){
							$updateParentCount += $updateParent::$rowCount;
						}

						$parentTable = new Database("INSERT INTO 
							karet_exvitro_plantation_field_parent_child (
									parent,
									child,
									created_at,
									updated_at)
									VALUES (?,?,?,?)"
								,array(
									$value['id'],
									$setID,
									$timestamp,
									$timestamp
							)	
						);

						if ($parentTable::$rowCount > 0){
							$parentChildCount += $parentTable::$rowCount;
						}
						//}
					}

						$result = array("id"=>$setID,"rowcount"=>$rowCount);

						if ($parentTable::$rowCount > 0){
							$result["parent_update"] = $updateParentCount;
							$result["parent_table"] = $parentChildCount;
						}

				} else {
					$result = $query::$result;
				}

				print_r(json_encode($result));
				break;

			case "update-plantation-field":
				$timestamp = timeStamp();

				$scanDate = NULL;
				if ($_POST['scan_date'] != ""){
					$scanDate = $_POST['scan_date'];
				}

				$query = new Database("UPDATE karet_exvitro_plantation_field SET
						qty_planted = ?
						,panel = ?
						,planting_date = ?
						,qty_stands_at_planting = ?
						,qty_stands_after_1_cencus = ?
						,scan_date = ?
						,updated_at = ?
						WHERE id = ?"
						, array(
							$_POST['quantity_planted'],
							$_POST['panel'],
							$_POST['planting_date'],
							$_POST['quantity_stands_planting'],
							$_POST['quantity_stands_1st_cencus'],
							$scanDate,
							$timestamp,
							$_POST['selectedID']
						)
					);

				if ($query::$rowCount > 0){
					$result = array("id"=>$_POST['selectedID'],"rowcount"=>intval($query::$rowCount));
				} else {
					$result = $query::$qStrings;
				}

				print_r(json_encode($result));
				break;
			case "delete-plantation-field":
				$timestamp = timeStamp();
				
				$query1 = new Database("UPDATE karet_exvitro_plantation_field SET deleted_at = ? WHERE id = ?",array($timestamp, $_POST['id']));

				echo $query1::$rowCount;
				break;

			/*--------------------- STOCK FOR CUTTINGS ------------------------*/
			case "add-stock-cutting":
				//GET embryocode
				$getcodeSE = "";
				$getMotherplant = "";
				foreach ($_POST['dataParent'] as $key => $value) {
					$codese = new Database("SELECT * FROM karet_exvitro_nursery WHERE id = ?", array($value["id"]));
					$getcodeSE = explode("_", $codese::$result[0]["unique_code"]);
					$getMotherplant = $codese::$result[0]['motherplant_id'];
					if ($getcodeSE != "" && $getMotherplant != "") { 
						break; 
					}
				}
				
				//GET nextcode
				$code = new Database("SELECT MAX(id) max_id FROM karet_exvitro_stock_cutting");
				$nextcode = ($code::$rowCount > 0) ? intval($code::$result[0]["max_id"]) + 1 : 1;

				$timestamp = timeStamp();

				/* site meaning plantation in karet_exvitro_stock_cutting */
				$query = new Database("INSERT INTO karet_exvitro_stock_cutting (
						unique_code
						,deactivated
						,site
						,date_stock
						,qty
						,qty_remaining
						,table_number
						,start_date
						,motherplant_id
						,created_at
						,updated_at
						)
						VALUES (
						?, ?, ?, ?, ?, ?,
						?, ?, ?, ?, ?
						)"
					, array(
						$getcodeSE[0] . "_S_" . str_pad($nextcode, 6, "0", STR_PAD_LEFT),
						'FALSE',
						$_POST['plantation'],		/*site meaning plantation in karet_exvitro_stock_cutting */
						$_POST['date_stock'],
						$_POST['qty_received'],
						$_POST['qty_received'],
						$_POST['table_number'],
						$_POST['start_date'],
						$getMotherplant,
						$timestamp,
						$timestamp
					)
				);

				$setID = $query::$lastInsertId;
				$rowCount = intval($query::$rowCount);

				if ($query::$rowCount > 0){
					$updateParentCount = 0;
					$parentChildCount = 0;
					foreach ($_POST['dataParent'] as $key => $value) {
						$updateParent = new Database("UPDATE karet_exvitro_nursery SET 
							end_date = ?,
							deactivated = ?,
							qty_remaining = ?,
							updated_at = ?
							WHERE id = ?"
							,array(
								$value['end_date'],
								$value['deactivated'],
								$value['qty_remaining'],
								$timestamp,
								$value['id']
							)
						);
						
						if ($updateParent::$rowCount > 0){
							$updateParentCount += $updateParent::$rowCount;
						}

						$parentTable = new Database("INSERT INTO 
							karet_exvitro_stock_cutting_parent_child (
									parent,
									child,
									created_at,
									updated_at)
									VALUES (?,?,?,?)"
								,array(
									$value['id'],
									$setID,
									$timestamp,
									$timestamp
							)	
						);

						if ($parentTable::$rowCount > 0){
							$parentChildCount += $parentTable::$rowCount;
						}
						//}
					}

						$result = array("id"=>$setID,"rowcount"=>$rowCount);

						if ($parentTable::$rowCount > 0){
							$result["parent_update"] = $updateParentCount;
							$result["parent_table"] = $parentChildCount;
						}

				} else {
					$result = $query::$result;
				}

				print_r(json_encode($result));
				break;

			case "update-stock-cutting":
				$timestamp = timeStamp();

				$query = new Database("UPDATE karet_exvitro_stock_cutting SET
						deactivated = ? 
						,site = ?
						,date_stock = ?
						,qty = ?
						,table_number = ?
						,updated_at = ?
						WHERE id = ?"
						, array(
							$_POST['deactivated'],
							$_POST['plantation'],
							$_POST['date_stock'],
							$_POST['qty'],
							$_POST['table_number'],
							$timestamp,
							$_POST['selectedID']
						)
					);

				if ($query::$rowCount > 0){
					$result = array("id"=>$_POST['selectedID'],"rowcount"=>intval($query::$rowCount));
				} else {
					$result = $query::$qStrings;
				}

				print_r(json_encode($result));
				break;

			case "delete-stock-cutting":
				$timestamp = timeStamp();
				
				$query1 = new Database("UPDATE karet_exvitro_stock_cutting SET deleted_at = ? WHERE id = ?",array($timestamp, $_POST['id']));

				echo $query1::$rowCount;
				break;

			/*--------------------- ROOTING GREEN HOUSE ------------------------*/
			case 'add-rooting':
				//GET embryocode
				$getcodeSE = "";
				$getMotherplant = "";
				foreach ($_POST['dataParent'] as $key => $value) {
					$codese = new Database("SELECT * FROM karet_exvitro_stock_cutting WHERE id = ?", array($value["id"]));
					$getcodeSE = explode("_", $codese::$result[0]["unique_code"]);
					$getMotherplant = $codese::$result[0]['motherplant_id'];
					if ($getcodeSE != "" && $getMotherplant != "") { 
						break; 
					}
				}
				
				//GET nextcode
				$code = new Database("SELECT MAX(id) max_id FROM karet_exvitro_rooting_green_house");
				$nextcode = ($code::$rowCount > 0) ? intval($code::$result[0]["max_id"]) + 1 : 1;

				$timestamp = timeStamp();

				$query = new Database("INSERT INTO karet_exvitro_rooting_green_house (
						unique_code
						,deactivated
						,start_date
						,qty_at_start
						,qty_remaining
						,motherplant_id
						,created_at
						,updated_at
						)
						VALUES (
						?, ?, ?, ?,
						?, ?, ?, ?
						)"
					, array(
						$getcodeSE[0] . "_G_" . str_pad($nextcode, 6, "0", STR_PAD_LEFT),
						'FALSE',
						$_POST['start_date'],
						$_POST['qty_received'],
						$_POST['qty_received'],
						$getMotherplant,
						$timestamp,
						$timestamp
					)
				);

				$setID = $query::$lastInsertId;
				$rowCount = intval($query::$rowCount);

				if ($query::$rowCount > 0){
					$updateParentCount = 0;
					$parentChildCount = 0;
					foreach ($_POST['dataParent'] as $key => $value) {
						$updateParent = new Database("UPDATE karet_exvitro_stock_cutting SET 
							end_date = ?,
							deactivated = ?,
							qty_remaining = ?,
							updated_at = ?
							WHERE id = ?"
							,array(
								$value['end_date'],
								$value['deactivated'],
								$value['qty_remaining'],
								$timestamp,
								$value['id']
							)
						);
						
						if ($updateParent::$rowCount > 0){
							$updateParentCount += $updateParent::$rowCount;
						}

						$parentTable = new Database("INSERT INTO 
							karet_exvitro_rooting_green_house_parent_child (
									parent,
									child,
									created_at,
									updated_at)
									VALUES (?,?,?,?)"
								,array(
									$value['id'],
									$setID,
									$timestamp,
									$timestamp
							)	
						);

						if ($parentTable::$rowCount > 0){
							$parentChildCount += $parentTable::$rowCount;
						}
						//}
					}

						$result = array("id"=>$setID,"rowcount"=>$rowCount);

						if ($parentTable::$rowCount > 0){
							$result["parent_update"] = $updateParentCount;
							$result["parent_table"] = $parentChildCount;
						}

				} else {
					$result = $query::$result;
				}

				print_r(json_encode($result));

				break;

			case 'update-rooting':
				$timestamp = timeStamp();

				$quantityAtEnd = NULL;
				if ($_POST['qty_at_end'] != ''){
					$quantityAtEnd = $_POST['qty_at_end'];
				}

				$query = new Database("UPDATE karet_exvitro_rooting_green_house SET
						qty_at_start = ?
						,start_date = ?
						,qty_at_end = ?
						,deactivated = ?
						,updated_at = ?
						WHERE id = ?"
						, array(
							$_POST['qty_at_start'],
							$_POST['start_date'],
							$quantityAtEnd,
							$_POST['deactivated'],
							$timestamp,
							$_POST['selectedID']
						)
					);

				if ($query::$rowCount > 0){
					$result = array("id"=>$_POST['selectedID'],"rowcount"=>intval($query::$rowCount));
				} else {
					$result = $query::$result;
				}
					
				//$result = $query::$qStrings;

				print_r(json_encode($result));
				break;

			case "delete-rooting":
				$timestamp = timeStamp();
				
				$query1 = new Database("UPDATE karet_exvitro_nursery SET deleted_at = ? WHERE id = ?",array($timestamp, $_POST['id']));

				echo $query1::$rowCount;
				break;

			default:
				# code...
			break;
		}
		$connection = null;
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	
?>
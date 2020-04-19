<?php 
require "../config.php";
require "../database.php";

$jumlah = 20;

				$data = new Database("SELECT * FROM karet_media_pembuatan WHERE id = ?",array("1"));

				//insert to a temp variabel
				foreach ($data::$result as $key => $value) {

					//check the stok value will input is same with data stok from database
					if ($jumlah == $value['jumlah']) {
						//if same, execute
						$query = new Database("UPDATE karet_media_pembuatan SET idworker = ?, volume = ?, idvessel = ?, lamakerja = ? WHERE id = ?"
							,array(
								"4",
								"2",
								"1",
								"2",
								"1"
							)
						);
					} else {	//if not same, execute

						//first, get stok value from karet_media 
						$stokmedia = new Database("SELECT stok FROM karet_media WHERE id = ?",array("1"));

						foreach ($stokmedia::$result as $key => $items) {
							$jumlahstok = "";

							//echo $items['stok'];
							echo " ";
							//echo $value['jumlah'];
							echo " ";
							
							//then, get back up stok value before adding this log stok. The way is = karet_media.stok - karet_media_pembuatan.jumlah 
							$jumlahstok = ($items['stok'] - $value['jumlah']);

							echo $jumlahstok;
							echo " ";
							//then execute the query
							$query = new Database("UPDATE karet_media_pembuatan SET  idworker = ?, volume = ?, idvessel = ?, jumlah = ?, lamakerja = ? WHERE id = ?"
								,array(
									"4",
									"2",
									"1",
									$jumlah,
									"1",
									"1"
								)
							);

							$addmedia = new Database("UPDATE karet_media SET stok = ? WHERE id = ?"
								,array(
									$jumlahstok + $jumlah,
									"1"
								)
							);
						}
					}
				}

echo $query::$rowCount;


//print_r($media);
<!-- <div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
		    <div style="padding: 2% 5% 0 5%;" class="block-header">
		        <h2>WELCOME TO RUBBER TISSUE CULTURE</h2>
		    </div>
		 </div>
	</div>
</div> -->
<?php 
	$reception = new Database("SELECT * FROM karet_reception WHERE isactive = ?",array(1));
	$recep_length = count($reception::$result);

	$initiation = new Database("SELECT * FROM karet_initiation WHERE remaining_sample > ?",array(0));
	$init_length = count($initiation::$result);

	$em_screen = new Database("SELECT * FROM karet_initiation_embryo_grow WHERE remaining_embryo > ?",array(0));
	$em_total = 0;
	foreach($em_screen::$result as $key => $value){
		$em_total += intval($value['remaining_embryo']);
	}

	$mat1 = new Database("SELECT * FROM karet_embryo_maturation_1 WHERE isactive = ? AND is_available = ?",array(1,1));
	$mat1_length = count($mat1::$result);

	$mat2 = new Database("SELECT * FROM karet_embryo_maturation_2 WHERE isactive = ? AND is_available = ?",array(1,1));
	$mat2_length = count($mat2::$result);

	$germ = new Database("SELECT * FROM karet_embryo_germination WHERE isactive = ? AND is_available = ?",array(1,1));
	$germ_length = count($germ::$result);

?>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
		    <!-- <div style="padding: 2% 5% 0 5%;" class="block-header">
		        <h2><b>WELCOME TO RUBBER TISSUE CULTURE</b></h2>
		    </div> -->

		    <div class="body">
			    <div class="row clearfix">
					<center><h4>REJUVINATION</h4></center>
					<br />
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a href="reception" style="text-decoration:none;">
							<div class="info-box bg-cyan hover-expand-effect">
								<div class="icon">
									<i class="material-icons">playlist_add_check</i>
								</div>
								<div class="content">
									<div class="text"><b>RECEPTION</b></div>
									<span class="number count-to" data-from="0" data-to="<?= $recep_length; ?>" data-speed="1000" data-fresh-interval="20">
										
									</span>
									&nbsp;
									<span style="font-size: 12pt;">Sample</span>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a href="initiation" style="text-decoration:none;">
							<div class="info-box bg-orange hover-expand-effect">
								<div class="icon">
									<i class="material-icons">assignment</i>
								</div>
								<div class="content">
									<div class="text"><b>INITIATION</b></div>
									<span class="number count-to" data-from="0" data-to="<?= $init_length; ?>" data-speed="1000" data-fresh-interval="20">
									</span>
									&nbsp;
									<span style="font-size: 12pt;">has sample</span>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a href="embryoscreening" style="text-decoration:none;">
							<div class="info-box bg-cyan hover-expand-effect">
								<div class="icon">
									<i class="material-icons">group_work</i>
								</div>
								<div class="content">
									<div class="text"><b>EMBRYO</b></div>
									<span class="number count-to" data-from="0" data-to="<?= $em_total; ?>" data-speed="1000" data-fresh-interval="20">
									</span>
									&nbsp;
									<span style="font-size: 8pt;">ready for transfer</span>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a href="maturation1" style="text-decoration:none;">
							<div class="info-box bg-orange hover-expand-effect">
								<div class="icon">
									<i class="material-icons">blur_circular</i>
								</div>
								<div class="content">
									<div class="text"><b>MATURATION I</b></div>
									<span class="number count-to" data-from="0" data-to="<?= $mat1_length; ?>" data-speed="1000" data-fresh-interval="20">
									</span>
									&nbsp;
									<span style="font-size: 8pt;">embryo is available</span>
								</div>
							</div>
						</a>
					</div>
			       
			    </div>

				<div class="row clearfix">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a href="maturation2" style="text-decoration:none;">
							<div class="info-box bg-orange hover-expand-effect">
								<div class="icon">
									<i class="material-icons">blur_on</i>
								</div>
								<div class="content">
									<div class="text"><b>MATURATION II</b></div>
									<span class="number count-to" data-from="0" data-to="<?= $mat2_length; ?>" data-speed="1000" data-fresh-interval="20">
									</span>
									&nbsp;
									<span style="font-size: 8pt;">embryo is available</span>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<a href="germination" style="text-decoration:none;">
							<div class="info-box bg-cyan hover-expand-effect">
								<div class="icon">
									<i class="material-icons">camera</i>
								</div>
								<div class="content">
									<div class="text"><b>GERMINATION</b></div>
									<span class="number count-to" data-from="0" data-to="<?= $germ_length; ?>" data-speed="1000" data-fresh-interval="20">
										
									</span>
									&nbsp;
									<span style="font-size: 8pt;">embryo is available</span>
								</div>
							</div>
						</a>
					</div>
			    </div>
				<hr />

			    <!-- <div class="row clearfix">
			        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			            <div class="card">
			                <div class="header">
			                    <h2>PENJUALAN & PEMBELIAN - LINE CHART</h2>
			                    <ul class="header-dropdown m-r--5">
			                        <li class="dropdown">
			                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			                                <i class="material-icons">more_vert</i>
			                            </a>
			                            <ul class="dropdown-menu pull-right">
			                                <li><a href="javascript:void(0);">Action</a></li>
			                                <li><a href="javascript:void(0);">Another action</a></li>
			                                <li><a href="javascript:void(0);">Something else here</a></li>
			                            </ul>
			                        </li>
			                    </ul>
			                </div>
			                <div class="body">
			                    <canvas id="line_chart" height="150"></canvas>
			                </div>
			            </div>
			        </div>
			        
			        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			            <div class="card">
			                <div class="header">
			                    <h2>PENJUALAN & PEMBELIAN - BAR CHART</h2>
			                    <ul class="header-dropdown m-r--5">
			                        <li class="dropdown">
			                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			                                <i class="material-icons">more_vert</i>
			                            </a>
			                            <ul class="dropdown-menu pull-right">
			                                <li><a href="javascript:void(0);">Action</a></li>
			                                <li><a href="javascript:void(0);">Another action</a></li>
			                                <li><a href="javascript:void(0);">Something else here</a></li>
			                            </ul>
			                        </li>
			                    </ul>
			                </div>
			                <div class="body">
			                    <canvas id="bar_chart" height="150"></canvas>
			                </div>
			            </div>
			        </div>
			    </div> -->

			    <div class="row clearfix">
			        <!-- Visitors -->
			        <!-- <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			            <div class="card">
			                <div class="body bg-pink">
			                    <div class="m-b--35 font-bold">Jumlah Pengunjung</div>
			                    <ul class="dashboard-stat-list">
			                        <li>
			                            HARI INI
			                            <span class="pull-right"><b>1 200</b> <small>pengunjung</small></span>
			                        </li>
			                        <li>
			                            KEMARIN
			                            <span class="pull-right"><b>3 872</b> <small>pengunjung</small></span>
			                        </li>
			                        <li>
			                            1 MINGGU TERAKHIR
			                            <span class="pull-right"><b>26 582</b> <small>pengunjung</small></span>
			                        </li>
			                    </ul>
			                </div>
			            </div>
			        </div> -->
			        <!-- #END# Visitors -->
			        <!-- Latest Social Trends 
			        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			            <div class="card">
			                <div class="body bg-cyan">
			                    <div class="m-b--35 font-bold"> Minuman Favorite</div>
			                    <ul class="dashboard-stat-list">
			                        <li>
			                            Jus Mix Jeruk & Wortel
			                            <span class="pull-right"><b>10.892</b> <small>TICKETS</small></span>
			                        </li>
			                        <li>
			                            Cappucino Coffee
			                            <span class="pull-right"><b>9.198</b> <small>TICKETS</small></span>
			                        </li>
			                        <li>
			                            Teh Manis
			                            <span class="pull-right"><b>8.921</b> <small>TICKETS</small></span>
			                        </li>
			                        <li>
			                            Teh Pahit
			                            <span class="pull-right"><b>7.923</b> <small>TICKETS</small></span>
			                        </li>
			                        <li>
			                            TST
			                            <span class="pull-right"><b>7.246</b> <small>TICKETS</small></span>
			                        </li>
			                    </ul>
			                </div>
			            </div>
			        </div> -->

			        <!-- Answered Tickets 
			        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			            <div class="card">
			                <div class="body bg-teal">
			                    <div class="font-bold m-b--35">Makanan Favorite</div>
			                    <ul class="dashboard-stat-list">
			                        <li>
			                            Nasi Goreng Ayam Cabe Ijo
			                            <span class="pull-right"><b>11.902</b> <small>TICKETS</small></span>
			                        </li>
			                        <li>
			                            Otak-Otak
			                            <span class="pull-right"><b>10.198</b> <small>TICKETS</small></span>
			                        </li>
			                        <li>
			                            Mie Ayam Special
			                            <span class="pull-right"><b>7.901</b> <small>TICKETS</small></span>
			                        </li>
			                        <li>
			                            Nasi Ayam Penyet Cabe Ijo
			                            <span class="pull-right"><b>6.930</b> <small>TICKETS</small></span>
			                        </li>
			                        <li>
			                            Nasi Goreng Seafood
			                            <span class="pull-right"><b>4.225</b> <small>TICKETS</small></span>
			                        </li>
			                    </ul>
			                </div>
			            </div>
			        </div>
			        <!-- #END# Answered Tickets -->
			    </div>
			</div>
	    </div>
	</div>
</div>
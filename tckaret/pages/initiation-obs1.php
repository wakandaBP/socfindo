
	<!--- Modal for View Detail -->
	<div class="modal fade" tabindex="-1" role="dialog" id="view-description">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5> Details for ID Treatment : <span id="title"></span>  <button class="btn btn-warning right" data-dismiss="modal">Back</button> </h5> </div> 
                <div class="modal-body">
                	<div class="col-sm-6">
	                	<table class="table">
	                		<tbody>
	                			<tr>
	                				<td> ID Treatment </td>
	                				<td> : </td>
	                				<td id="idtreatment">  </td>
	                			</tr>
	                			<tr>
	                				<td> ID Reception </td>
	                				<td> : </td>
	                				<td id="idreception">  </td>
	                			</tr>
	                			<tr>
	                				<td> No. Box </td>
	                				<td> : </td>
	                				<td id="nobox">  </td>
	                			</tr>
	                			<tr>
	                				<td> Clone </td>
	                				<td> : </td>
	                				<td id="clone">  </td>
	                			</tr>
	                			<tr>
	                				<td> Sample </td>
	                				<td> : </td>
	                				<td id="sample">  </td>
	                			</tr>
	                			<tr>
	                				<td> Observation Date </td>
	                				<td> : </td>
	                				<td id="obsdate">  </td>
	                			</tr>
	                			<tr>
	                				<td> Observation Worker </td>
	                				<td> : </td>
	                				<td id="obsworker">  </td>
	                			</tr>
	                			<tr>
	                				<td> Cont. By Fungi </td>
	                				<td> : </td>
	                				<td id="contfungi">  </td>
	                			</tr>
	                			<tr>
	                				<td> Cont. By Bacteri </td>
	                				<td> : </td>
	                				<td id="contbact">  </td>
	                			</tr>
	                			<tr>
	                				<td> Pieces Not Reacted </td>
	                				<td> : </td>
	                				<td id="notreact">  </td>
	                			</tr>
	                			<tr>
	                				<td> A Lot of Callus </td>
	                				<td> : </td>
	                				<td id="alotof">  </td>
	                			</tr>
	                			<tr>
	                				<td> Little Bit of Callus </td>
	                				<td> : </td>
	                				<td id="littlebit">  </td>
	                			</tr>
	                		</tbody>
	                	</table>
	                </div>
	                <div class="col-sm-6">
	                	<table class="table">
	                		<tbody>
	                			<tr>
	                				<td> Yellow </td>
	                				<td> : </td>
	                				<td id="yellow">  </td>
	                			</tr>
	                			<tr>
	                				<td> White </td>
	                				<td> : </td>
	                				<td id="white">  </td>
	                			</tr>
	                			<tr>
	                				<td> Orange </td>
	                				<td> : </td>
	                				<td id="orange">  </td>
	                			</tr>
	                			<tr>
	                				<td> Brown </td>
	                				<td> : </td>
	                				<td id="brown">  </td>
	                			</tr>
	                			<tr>
	                				<td> Dead </td>
	                				<td> : </td>
	                				<td id="dead">  </td>
	                			</tr>
	                			<tr>
	                				<td> Petridish </td>
	                				<td> : </td>
	                				<td id="petridish">  </td>
	                			</tr>
	                			<tr>
	                				<td> Laminar </td>
	                				<td> : </td>
	                				<td id="laminar">  </td>
	                			</tr>
	                			<tr>
	                				<td> Treatment Comment </td>
	                				<td> : </td>
	                				<td id="treatcomment">  </td>
	                			</tr>
	                			<tr>
	                				<td> Media </td>
	                				<td> : </td>
	                				<td id="media">  </td>
	                			</tr>
	                			<tr>
	                				<td> Preparation Medium Date </td>
	                				<td> : </td>
	                				<td id="preparedate">  </td>
	                			</tr>
	                			<tr>
	                				<td> Media Worker </td>
	                				<td> : </td>
	                				<td id="mediaworker">  </td>
	                			</tr>
	                		</tbody>
	                	</table>
	                </div>
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>


   <!--  <div class="modal fade" tabindex="-1" role="dialog" id="form-updatepetri">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5> Update Petri Number and Media <span id="title"></span>  <button class="btn btn-warning right" data-dismiss="modal">Back</button> </h5> </div> 
                <div class="modal-body">
                	<div class="col-sm-6">
	                	<h6>Insert Petridish number : *</h6>
						<div class="input-group">
							<div class="form-line">
								<input type="text" class="form-control numberonly" id="petrinumber" value="">
							</div>
						</div>
	                </div>  
	                <div class="col-sm-6" id="media-field"> 
	                	<h6>Choose Media : *</h6>
						<div class="input-group">
							<div class="form-line">
								<select class="form-control" id="initmedium">
										<option value="" disabled selected="">--Choose-Initiation-Medium--</option>
										<?php 
											// $media = new Database("SELECT a.id, a.idmedia, a.tglpembuatanmedia,
											// 			b.initial, a.jumlah
											// 			FROM karet_media_pembuatan a 
											// 			JOIN karet_worker b ON a.idworker = b.id 
											// 			WHERE a.idmedia = ? AND a.isactive = ?",array("13","1"));

											// foreach ($media::$result as $key => $value) {
											// 	$jumlahMedia = new Database("SELECT * FROM karet_media_transaction_log WHERE idpembuatanmedia = ? AND isactive = ?",array($value['id'],'1'));

											// 	if (($value['jumlah'] + 1) > $jumlahMedia::$rowCount){

										?>
											<option value="<?php //echo $value['id'];?>"><?php //echo $value['tglpembuatanmedia'] . " - " . $value['initial'];?></option>
										<?php
												//}
											//}
										?>
									</select>
									<input type="text" hidden id="idinitmedium">
							</div>
						</div>
	                </div>   
                </div>
                <div class="modal-footer">
                	<div class="">
	                    <div class="input-group">
	                    	<button id="btnAddPetrinum" class="btn btn-primary">Save</button>
	                	</div>
	                </div>
                </div>
            </div>
        </div>
    </div> -->

	<!-- Widgets -->
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header bg-cyan">
					<h5>
						Observation Callus List
					</h5>
					<ul class="header-dropdown m-r--5">
						<li>
							<a href="obscallus.chooseid" class="btnTambah">
								<i class="material-icons">add</i>
							</a>
						</li>
					</ul>
				</div>
				<div class="body">
					<fieldset>
						<legend>Search By Observation Date</legend>
						<form method="GET" action="">
							<div class="row clearfix">
								<div class="col-sm-2 form-control-label">
									<label>
										From
									</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
									<div class="form-group form-float">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">date_range</i>
											</span>
											<div class="form-line">
												<input type="date" class="form-control" placeholder="Date From" id="datefrom">
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-sm-2 form-control-label">
									<label>
										To
									</label>
								</div>
								
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
									<div class="form-group form-float">
										<div class="input-group">
					
											<span class="input-group-addon">
												<i class="material-icons">date_range</i>
											</span>
											<div class="form-line focused">
												<input type="date" class="form-control" placeholder="Date To" id="dateto" value="">
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									<button type="submit" class="btn btn-primary btn-sm m-l-15 waves-effect"><i class="material-icons">search</i></button>
								</div>
							</div>
						</form>
					</fieldset>

					<!-- <div style="text-align: right;"><button id="updatepetri" class="btn btn-success">Update Petridish</button></div> -->
					<table class="table table-bordered table-striped dataTable" id="list-obscallus">
						<thead>
							<tr>
								<th width="2%"></th>
								<th class="text-center">ID Treatment</th>
								<!-- <th class="text-center">ID Reception</th>
								<th width="30px" class="text-center">No. Box</th>
								<th class="text-center">Clone</th>
								<th class="text-center">Sample</th> -->
								<th class="text-center">Observation Date</th>
								<th class="text-center">Cont. by Fungi</th>
								<th class="text-center">Cont. by Bacteri</th>
								<th class="text-center">Pieces not Reacted</th>
								<th class="text-center">A Lot of Callus</th>
								<th class="text-center">Little Bit of Callus</th>
								<th class="text-center">Yellow</th>
								<th class="text-center">White</th>
								<th class="text-center">Orange</th>
								<th class="text-center">Brown</th>
								<th class="text-center">Dead</th>
								<th width="80px" class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
								
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 	
try {

	if ($page[1] != ""){
		$init = new Database("SELECT * FROM karet_initiation WHERE id_treatment = ?",array($page[1]));

		foreach ($init::$result as $key => $data) {
			$amount = $data['remaining_sample'];
?>
	<form>
		<div class="modal fade" tabindex="-1" role="dialog" id="form-obscallus">
	        <div class="modal-dialog">
	            <div class="modal-content">
	                <div class="modal-header"><h5> Observation Callus from ID Treatment : <span id="title"><?= $page[1] ?></span></h5> </div> 
	                <div class="modal-body">
						<form id="add-obscallus">
							<div class="body" id="form-data" style="padding: 2% 2% 0 2%; padding-bottom: 1%;">
								<fieldset>
									<input type="text" id="id_init_obs" hidden>
									<input type="text" id="obs_samp" hidden>
									<!-- <legend>Data</legend> -->
									<div class="row clearfix">
										<div class="col-sm-6">
											<h6>Observation Date *</h6>
											<div class="input-group">
												<div class="form-line">
													<input type="date" class="form-control" required id="obsdate" value="<?= $now; ?>" max="<?= $now; ?>">
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<h6>Observation Worker *</h6>
											<div class="input-group">
												<div class="form-line">
													<select class="form-control useselect2" id="obsworker" style="width: 100%;">
														<option value="" disabled selected>--Choose-Worker--</option>
														<?php 
															$worker = new Database("SELECT * FROM karet_worker
																		WHERE isactive = ?",array("1"));

															foreach ($worker::$result as $key => $value) {
														?>
															<option value="<?php echo $value['id'];?>"><?php echo $value['initial'];?></option>
														<?php
															}
														?>
													</select>
													<input type="text" hidden id="idobsworker">
												</div>
											</div>
										</div>
									</div>
								</fieldset>

								<fieldset>
									<legend>Data for 25 Day Observation</legend>
									<div class="row clearfix">
										<div class="col-sm-4">
											<h6>Contamination Fungi</h6>
											<div class="input-group">
												<div class="form-line">
													<input type="number" min="0" class="form-control numberonly" id="contfungi" value="0">
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<h6>Contamination Bacteri</h6>
											<div class="input-group">
												<div class="form-line">
													<input type="number" min="0" class="form-control numberonly" id="contbact" value="0">
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<h6>Pieces Not Reacted</h6>
											<div class="input-group">
												<div class="form-line">
													<input type="number"  min="0" readonly class="form-control numberonly" id="notreact" value="0">
												</div>
											</div>
										</div>
									</div>
									<div class="row clearfix">
										<div class="col-sm-6">
											<h6>A Lot of Callus *</h6>
											<div class="input-group">
												<div class="form-line">
													<input type="number"  min="0" class="form-control numberonly" required id="alotofcallus" value="0">
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<h6>Little Bit of Callus *</h6>
											<div class="input-group">
												<div class="form-line">
													<input type="number"  min="0" class="form-control numberonly" required id="littlebitofcallus" value="0">
												</div>
											</div>
										</div>
									</div>
									<div class="row clearfix">
										<div class="col-sm-2">
											<h6>Yellow</h6>
											<div class="input-group">
												<div class="form-line">
													<input type="number" min="0" class="form-control numberonly" id="yellow" value="0">
												</div>
											</div>
										</div>
										<div class="col-sm-2">
											<h6>White</h6>
											<div class="input-group">
												<div class="form-line">
													<input type="number" min="0" class="form-control numberonly" id="white" value="0">
												</div>
											</div>
										</div>
										<div class="col-sm-2">
											<h6>Orange</h6>
											<div class="input-group">
												<div class="form-line">
													<input type="number" min="0" class="form-control numberonly" id="orange" value="0">
												</div>
											</div>
										</div>
										<div class="col-sm-2">
											<h6>Brown</h6>
											<div class="input-group">
												<div class="form-line">
													<input type="number" min="0" class="form-control numberonly" id="brown" value="0">
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<h6>Dead </h6>
											<div class="input-group">
												<div class="form-line">
													<input type="number" min="0" class="form-control numberonly" id="dead" value="0">
												</div>
											</div>
										</div>
									</div>
								</fieldset>
								<fieldset>
									<div class="row clearfix">
										<div class="col-sm-6">
											<h6>Remaining Petridish *</h6>
											<div class="input-group">
												<div class="form-line">
													<input type="number" min="0" class="form-control numberonly" id="remainpetri" value="">
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-">
										
									</div>
								</fieldset>
							</div>	
						</form>
					</div>
					<div class="modal-footer">
	                	<div class="">
		                    <div class="input-group">
		                    	<div class="text-center" style="padding-bottom: 30px">
									<button type="submit"  class="btn btn-primary btn-sm" id="btnSimpanObs">Save Observation Data</button>
									<button class="btn btn-danger" data-dismiss="modal">Back</button>
								</div>
		                	</div>
		                </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</form>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="obs">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Observation Callus from ID Treatment : [ <span style=""><?php echo $page[1];?> ]</span>
				</h5>
				<ul class="header-dropdown m-r--5">
					<li>
						<button class="" id="btnTambahObs" style="background-color: transparent; border-color: #05b40a;">
							<i class="material-icons">add</i>
						</button>
					</li>
				</ul>
			</div>
			<div class="body">
				
				<div style="text-align: right;"><button id="transfer" class="btn btn-success">Transfer</button></div>
				<!-- <div style="text-align: right;"><button id="updatepetri" class="btn btn-success">Update Media</button></div> -->
				<table class="table table-bordered table-striped dataTable" id="list-obs">
					<thead>
						<tr>
							<th width="2%"></th>
							<th class="text-center">No.</th>
							<th class="text-center" width="100px">Obs. Date</th>
							<th class="text-center" width="100px">P. Not Reacted</th>
							<th class="text-center" width="100px">A Lot Of Callus</th>
							<th class="text-center" width="100px">Little Of Callus</th>
							<!-- <th class="text-center">Yellow</th>
							<th class="text-center">White</th>
							<th class="text-center">Brown</th>
							<th class="text-center">Orange</th> -->
							<th width="100px" class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
							
					</tbody>
				</table>
				<button class="btn btn-primary" id="btnAllselect">Select All</button>
				<button class="btn btn-warning" id="btnUnselect">Unselect</button>
				<div class="right"><a href="<?php echo $tckaret;?>/initiation" class="btn btn-danger btn-sm">Back</a></div>
			</div>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Transfer Callus from ID Treatment : [ <span style=""><?php echo $page[1];?> ]</span>
				</h5>
				<ul class="header-dropdown m-r--5" style="margin-top: -1%;">
					<li>
						<button class="btn btn-warning" id="btnCancelTrans">
							Cancel
						</button>
					</li>
				</ul>
			</div>
			<form>	
				<div class="body" id="form-transfer" hidden style="padding: 2% 2% 0 2%; padding-bottom: 2%;">
					<fieldset>
						<!-- <legend>Data</legend> -->
						<div class="row clearfix">
							<div class="col-sm-6">
								<h6>Transfer Date *</h6>
								<div class="input-group">
									<div class="form-line">
										<input type="date" class="form-control" required id="transdate" value="<?= $now; ?>" max="<?= $now; ?>">
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<h6>Transfer Worker *</h6>
								<div class="input-group">
									<div class="form-line">
										<select class="form-control useselect2" id="transworker" style="width: 100%;">
											<option value="" disabled selected="">--Choose-Worker--</option>
											<?php 
												$worker = new Database("SELECT * FROM karet_worker
															WHERE isactive = ?",array("1"));

												foreach ($worker::$result as $key => $value) {
											?>
												<option value="<?php echo $value['id'];?>"><?php echo $value['initial'];?></option>
											<?php
												}
											?>
										</select>
										<input type="text" hidden id="idtransworker">
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset>
						<!-- <legend>Transfer Data</legend> -->
						<div class="row clearfix">
							<div class="col-sm-6">
								<h6>Callus Transfer *</h6>
								<div class="input-group">
									<div class="form-line">
										<b>
											<input type="text" style="color:red; text-decoration-style: solid;" class="form-control numberonly" readonly id="callustrans">
										</b>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<h6>Laminar *</h6>
								<div class="input-group">
									<div class="form-line">
										<select id="laminar" class="form-control useselect2" style="width: 100%;">
											<option value="" disabled selected>--Select-Laminar--</option>
											<?php 
												$laminar = new Database("SELECT * FROM karet_laminar WHERE isactive = ?",array("1"));

												foreach ($laminar::$result as $key => $item) {

											?>
												<option value="<?= $item['id']; ?>"><?= $item['nolaminar']; ?></option>

											<?php
												}
											?>
										</select>
										<input type="text" hidden id="idlaminar">
									</div>
								</div>
							</div>
						</div>
						<div class="row clearfix">
			                <div class="col-sm-5" id="media-field"> 
			                	<h6>Choose Media : *</h6>
								<div class="input-group">
									<div class="form-line">
										<select class="form-control useselect2" id="media" style="width: 100%;">
											<option value="" disabled selected>--Choose-Initiation-Medium--</option>
											<?php 
												$media = new Database("SELECT * FROM karet_media WHERE id_jenis_media = ? AND isactive = ?",array(2,1));

												foreach ($media::$result as $key => $value) {
											?>
												<option value="<?php echo $value['id'];?>"><?= $value['mediacode']?></option>
											<?php
												}
											?>
										</select>
										<input type="text" hidden id="idmedia">
									</div>
								</div>
								<div id="error-media"></div>
							</div>
							<div class="col-sm-3"> 
								<h6>Available Media:</h6>
								<div class="input-group"> 
									<div class="form-line">
										<input type="text" readonly class="form-control numberonly" id="available-media" value="">
									</div>
								</div>
							</div> 
							<div class="col-sm-4">
			                	<h6>Media Amount : *</h6>
								<div class="input-group">
									<div class="form-line">
										<input type="text" class="form-control" id="amountmedia">
									</div>
								</div>
			                </div>
						</div>
						<div class="row clearfix">
							<div class="col-sm-6">
								<h6>Comment</h6>
								<div class="input-group">
									<div class="form-line">
										<textarea class="form-control" id="comment"></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-">
							<div class="text-center" style="padding-bottom: 30px">
								<input type="submit" class="btn btn-primary btn-sm" value="Transfer" id="btnSimpanTrans"/>
							</div>
						</div>
					</fieldset>
				</div>
			</form>		
			<?php ?>
		</div>
	</div>

<?php
		} 
	} 
	// else {
	// 	header('Location :  ' . $tckaret . '/initiation');
	// }

	//}
} 
catch (PDOException $e){
    echo $e->getMessage();
}

?>
<?php 
	if ($page[1] != ""){
		$data = new Database("SELECT * FROM karet_media WHERE id = ?",array($page[1]));

		$mediacode = $data::$result[0]['mediacode'];	
?>

	<div class="modal fade" tabindex="-1" role="dialog" id="form-edit-media-out">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5> <span id="count"></span> Edit Log Media Out for ID Embryo : <?= $page[1]; ?></h5> </div> 
                <form id="edit-media-out">
	                <div class="modal-body">
		            	<fieldset>
							<legend>Data</legend>
							<div class="row clearfix">
								<div class="col-sm-6">
									<h6>Medium Creation Date *</h6>
									<div class="input-group">
										<div class="form-line">
											<input type="date" class="form-control" required id="tglbuatmedia" value="">
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<h6>Worker *</h6>
									<div class="input-group">
										<div class="form-line">
											<select class="listworker form-control useselect2" style="width: 100%;" id="worker">
												<option value="" disabled >--Choose-Worker--</option>
												<?php 
													$worker = new Database("SELECT * FROM karet_worker
																WHERE isactive = ?",array("1"));

													foreach ($worker::$result as $key => $value) {
												?>
													<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
												<?php
													}
												?>
											</select>
											<input hidden type="text" id="idworker" value="" />
										</div>
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-sm-6">
									<h6>Volume (Liter) *</h6>
									<div class="input-group">
										<div class="form-line">
											<input type="number" placeholder="0.00" required id="volume" class="form-control numberwithdot" step=".01" value="" />
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<h6>Vessel *</h6>
									<div class="input-group">
										<div class="form-line">
											<select disabled class="listvessel form- useselect2" style="width: 100%;" id="vessel">
												<option value="" disabled>--Choose-Vessel--</option>
												<?php 
													$vessel = new Database("SELECT * FROM karet_vessel WHERE isactive = ?",array("1"));

													foreach ($vessel::$result as $key => $value) {
												?>
													<option value="<?php echo $value['id'];?>"><?php echo $value['vesselcode'];?></option>
												<?php
													}
												?>
											</select>
											<input hidden type="text" readonly id="idvessel" value="">
										</div>
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-sm-6">
									<h6>Quantity *</h6>
									<div class="input-group">
										<div class="form-line">
											<input type="number" readonly placeholder="0" required class="form-control" id="jumlah" value="" />
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<h6>Length Of Working (in Minutes) *</h6>
									<div class="input-group">
										<div class="form-line">
											<input type="text" placeholder="0" required class="form-control numberwithdot" id="lamakerja" value="" />
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="row clearfix">
								<div class="col-sm-12">
									<h6>Barcode</h6>
									<div class="input-group">
										<div>
											<textarea style="width: 1000px;" id="barcode"></textarea>
										</div>
									</div>
								</div>
							</div> -->
						</fieldset>

		            </div>
	                <div class="modal-footer">
	                	<div class="">
		                    <div class="input-group">
		                    	<button class="btn btn-primary btn-sm" value="Save" id="btnSimpan">Save</button>
		                    	<button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
		                	</div>
		                </div>
	                </div>
	            </form>
            </div>
        </div>
    </div>


<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<h5>
							History Stock Media For Media : <?php echo $mediacode;;?>
						</h5>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
<br />
<div class="row clearfix">
	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Created Media
				</h5>
			</div>
			<div class="body">
				<table class="table table-bordered table-striped dataTable" id="list-media-creation">
					<thead>
						<tr>
							<!-- <th width="20px" class="text-center">No</th> -->
							<th width="100px" class="text-center">Media Creation Date</th>
							<th width="50px" class="text-center">Worker</th>
							<th width="100px" class="text-center">Volume</th>
							<th width="100px" class="text-center">Vessel</th>
							<th width="100px" class="text-center">Qty Add</th>
							<!-- <th width="100px" class="text-center">Barcode</th> -->
							<th width="100px" class="text-center">Length Of Working</th>
							<th width="100px" class="text-center">Status</th>
							<th width="80px" class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
				<div style="text-align: right;">
					<a href="<?php echo $tckaret;?>/media" class="btn btn-primary btn-sm">Back</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Media Out
				</h5>
			</div>
			<div class="body">
				<table class="table table-bordered table-striped dataTable" id="list-media-out" style="text-align: center;">
					<thead>
						<tr>
							<th width="5px">No</th>
							<th width="100px" class="text-center">Date Media Out</th>
							<th width="50px" class="text-center">Qty</th>
							<th width="50px" class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php 
	}
?>
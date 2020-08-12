<form>
    <div class="modal fade" tabindex="-1" role="dialog" id="form-updatemedia">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5><span id="title-media"></span> Update Media for ID Treatment : <b><span id="title-id"></span></b></h5> </div> 
                <div class="modal-body">
	                <div class="col-sm-5" id="media-field"> 
	                	<h6>Choose Media : *</h6>
						<div class="input-group">
							<div class="form-line">
								<select class="form-control useselect2" id="medium" style="width: 100%;">
										<option value="" disabled selected>--Choose-Medium--</option>
										<?php 
											$media = new Database("SELECT * FROM karet_media WHERE id_jenis_media = ? AND isactive = ?",array("2","1"));

											foreach ($media::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>"><?= $value['mediacode']?></option>
										<?php
											}
										?>
								</select>
								<input type="text" hidden id="idmedium">
							</div>
						</div>
						<div id="error-media"></div>
	                </div> 
					<div class="col-sm-3"> 
						<h6>Available Media : <span></span></h6>
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
								<input type="text" class="form-control numberonly" id="amountmedia" value="">
							</div>
						</div>
	                </div>  	                
                </div>
                <div class="modal-footer">
                	<div class="">
	                    <div class="input-group">
	                    	<button id="btnUpdateMedia" class="btn btn-primary">Save</button>
	                    	<button class="btn btn-danger right" data-dismiss="modal">Back</button>
	                	</div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form id="edit-embryoscreen">
	<div class="modal fade" tabindex="-1" role="dialog" id="form-edit-embryoscreen">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5><span id="title-media"></span> Edit Embryoscreening data for ID Treatment : <b><span id="title-treat"></span></b></h5> </div> 
                <div class="modal-body">
                	<div class="body style="padding: 2% 2% 0 2%; padding-bottom: 2%;">
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
								<div class="col-sm-6">
									<h6>Comment</h6>
									<div class="input-group">
										<div class="form-line">
											<textarea class="form-control" id="comment"></textarea>
										</div>
									</div>
								</div>
							</div>
						</fieldset>
					</div>
                </div>
                <div class="modal-footer">
                	<div class="">
	                    <div class="input-group">
	                    	<button id="btnUpdateEmscreen" class="btn btn-primary">Save</button>
	                    	<button type="reset" class="btn btn-warning" data-dismiss="modal">Cancel</button>
	                	</div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</form>

	<!-- Widgets -->
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header bg-cyan">
					<h5>
						Embryo Screening List
					</h5>
					<ul class="header-dropdown m-r--5">
						<li>
							<a href="embryoscreening.chooseid" class="btnTambah">
								<i class="material-icons">add</i>
							</a>
						</li>
					</ul>
				</div>
				<div class="body">
					<fieldset>
						<legend>Search By Screening Date</legend>
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
												<input type="date" class="form-control" placeholder="Date From" id="datefrom" value="<?= $awal; ?>">
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
												<input type="date" class="form-control" placeholder="Date To" id="dateto" value="<?= $now; ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									<button id="btnCari" class="btn btn-primary btn-sm m-l-15 waves-effect"><i class="material-icons">search</i></button>
								</div>
							</div>
						</form>
					</fieldset>
					<div style="text-align: left;"><button id="editupdatemedia" class="btn btn-warning">Edit Update Media</button></div>

					<div style="text-align: right;"><button id="updatemedia" class="btn btn-success">Update Media</button></div>
					<table class="table table-bordered table-striped dataTable" id="list-embryoscreen" style="text-align: center;">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">ID Treatment</th>
								<th class="text-center">Transfer Date</th>
								<th class="text-center">Callus Transfer</th>
								<th class="text-center">Laminar</th>
								<th class="text-center">Last Screening</th>
								<th class="text-center">Last Checkpoint</th>
								<th class="text-center">Growing Embryo (Until Now)</th>
								<th class="text-center">Remaining Embryo</th>
								<th class="text-center">Last Media Updated</th>
								<!-- <th class="text-center">Media</th>
								<th class="text-center">Preparation Medium Date</th> -->
								<th width="100px" class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
								
						</tbody>
					</table>
					<button class="btn btn-warning" id="btnUnselect">Unselect</button>
				</div>
			</div>
		</div>
	</div>
</div>
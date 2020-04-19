<form>
    <div class="modal fade" tabindex="-1" role="dialog" id="form-edit-germ">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header"><h5></span> Edit Germination Data for ID Embryo : <b><span id="title-edit"></span></b>  </h5> </div> 
                <div class="modal-body">
                	<input type="text" hidden id="iddata">
                	<div class="row">
						<div class="col-md-6">
							<fieldset>
								<legend>Transfer Data</legend>
								<div class="row">
									<div class="col-sm-6">
										<h6>Transfer Date for Germination *</h6>
										<div class="input-group">
											<div class="form-line">
												<input type="date" class="form-control" required id="transdate" value="" max="<?= $now ?>">
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<h6>Transfer Worker *</h6>
										<div class="input-group">
											<div class="form-line">
												<select class="form-control useselect2" id="worker" style="width : 100%">
													<option value="" disabled selected="">--Select-Worker--</option>
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
												<input type="text" hidden id="idworker">
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-sm-4">
										<h6>No. Box *</h6>
										<div class="input-group">
											<div class="form-line">
												<input type="text" class="form-control numberonly" required id="nobox" value="">
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<h6>Culture Room * </h6>
										<div class="input-group">
											<div class="form-line">
												<input type="text" class="form-control" required id="cultureroom" value="">
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<h6>Laminar *</h6>
										<div class="input-group">
											<div class="form-line">
												<select class="form-control useselect2" id="laminar" style="width : 100%">
													<option value="" disabled selected>--Select-Laminar--</option>
													<?php 
														$laminar = new Database("SELECT * FROM karet_laminar 
																	WHERE isactive = ?",array("1"));

														foreach ($laminar::$result as $key => $value) {
													?>
														<option value="<?php echo $value['id'];?>"><?php echo $value['nolaminar'];?></option>
													<?php
														}
													?>
												</select>
												<input type="text" hidden id="idlaminar">
											</div>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="col-md-6">
							<fieldset>
								<legend>Embryo</legend>
								<div class="row">
									<div class="col-sm-6">
										<h6>Connected to Other Embryo *</h6>
										<div class="input-group">
											<div class="form-line">
												<select id="connect-to-other" class="form-control">
													<option selected disabled value="">--Select-Option--</option>
													<option value="No">No</option>
													<option value="Yes">Yes</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<h6>Size of Embryo *</h6>
										<div class="input-group">
											<div class="form-line">
												<select class="form-control" id="sizeofembryo">
													<option selected disabled value="">--Select-Size--</option>
													<option value="S">S</option>
													<option value="M">M</option>
													<option value="L">L</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-sm-6">
										<h6>Shape of Embryo *</h6>
										<div class="input-group">
											<div class="form-line">
												<select class="form-control useselect2" id="shapeofembryo" style="width : 100%">
													<option value="" selected="">--Select-Shape--</option>
													<?php 
														foreach ($shape_embryo as $key => $value) {
													?>
														<option value="<?= $value ?>"><?= $value ?></option>
													<?php
														}
													?>
												</select>
												<input type="text" id="select-shapeofembryo" hidden>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<h6>Comment  </h6>
										<div class="input-group">
											<div class="form-line">
												<textarea class="form-control" id="comment_embryo"></textarea>
											</div>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<fieldset>
								<legend>Callus under Embryo</legend>
								<div class="row clearfix">
									<div class="col-sm-6">
										<h6>Type of Callus *</h6>
										<div class="input-group">
											<div class="form-line">
												<select class="form-control" id="typeofcallus">
													<option selected disabled value="">--Select-Type--</option>
													<option value="Loose">Loose</option>
													<option value="Compact">Compact</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<h6>Colour of Callus *</h6>
										<div class="input-group">
											<div class="form-line">
												<select class="form-control" id="colorofcallus">
													<option selected disabled value="">--Select-Color--</option>
													<option value="Yellow">Yellow</option>
													<option value="Brown">Brown</option>
													<option value="White">White</option>
													<option value="Orange">Orange</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<h6>Comment </h6>
									<div class="input-group">
										<div class="form-line">
											<textarea class="form-control" id="calluscomment"></textarea>
										</div>
									</div>
								</div>
							</fieldset>
						</div>  
					</div>
					
                </div>
                <div class="modal-footer">
                	<div class="">
	                    <div class="input-group">
	                    	<button id="btnUpdateData" class="btn btn-primary">Save</button>
	                    	<button class="btn btn-danger" data-dismiss="modal">Back</button> 
	                	</div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form>
    <div class="modal fade" tabindex="-1" role="dialog" id="form-updatemedia">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5><span id="title-media"></span> Update Media for ID Embryo : <b><span id="title-id"></span></b> </div> 
                <div class="modal-body">
	                <div class="col-sm-6" id="media-field"> 
	                	<h6>Choose Media : *</h6>
						<div class="input-group">
						 	<div class="form-line">
								<select class="form-control useselect2" id="medium" style="width: 100%;">
										<option value="" disabled selected>--Choose-Medium--</option>
										<?php 
											$media = new Database("SELECT * FROM karet_media WHERE id_jenis_media = ? AND isactive = ?",array("5","1"));

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
                	<div class="col-sm-6">
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
	                    	<button type="reset" data-dismiss="modal" class="btn btn-danger">Cancel</button>
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
						Germination List
					</h5>
				</div>
				<div class="body">
					<fieldset>
						<legend>Search by Transfer Date</legend>
						<form action="">
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
					<div style="text-align: right;"><button id="updatemedia" class="btn btn-success">Update Media</button></div>
					<table class="table table-bordered table-striped dataTable" id="list-germ" style="text-align:center;">
						<thead>
							<tr>
								<th width="10px" class="text-center"></th>
								<th class="text-center">ID Embryo</th>
								<th class="text-center">ID Treatment</th>
								<th class="text-center">Transfer Date</th>
								<th class="text-center">No. Box</th>
								<th class="text-center">Culture Room</th>
								<th class="text-center">Laminar</th>
								<th class="text-center">Media</th>
								<th class="text-center">LastScreening</th>
								<th class="text-center">Last Checkpoint</th>
								<!-- <th class="text-center">Status</th> -->
								<th width="100px" class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
					<button class="btn btn-warning" id="btnUnselect">Unselect</button> &nbsp;&nbsp;
				</div>
			</div>
		</div>
	</div>
</div>
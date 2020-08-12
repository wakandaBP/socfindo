<form>
    <div class="modal fade" tabindex="-1" role="dialog" id="form-updatemedia">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5><span id="title-media"></span> Update Media for ID Embryo : <b><span id="title-id-embryo"></span></b>  </h5> </div> 
                <div class="modal-body">
	                <div class="col-sm-6" id="media-field"> 
	                	<h6>Choose Media : *</h6>
						<div class="input-group">
							<div class="form-line">
								<select class="form-control useselect2" id="medium" style="width: 100%;">
										<option value="" disabled selected>--Choose-Medium--</option>
										<?php 
											$media = new Database("SELECT * FROM karet_media WHERE id_jenis_media = ? AND isactive = ?",array("3","1"));

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
                	<div class="col-sm-3">
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
	                    	<button id="btnUpdateMedia" class="btn btn-primary">&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;</button>
							&nbsp;
							<span style="text-align:center;"><button class="btn btn-warning" data-dismiss="modal">Cancel</button></span>
	                	</div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form>
    <div class="modal fade" tabindex="-1" role="dialog" id="form-edit-mat1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5></span> Edit Maturation I Data for ID Embryo : <b><span id="title-edit"></span></b>  </h5> </div> 
                <div class="modal-body">
                	<input type="text" hidden id="iddata">
	                <fieldset>
						<div class="row">
							<div class="col-sm-6">
								<h6>Transfer Date for Maturation I *</h6>
								<div class="input-group">
									<div class="form-line">
										<input type="date" class="form-control" required id="mat1transdate" value="<?= $now; ?>" max="<?= $now ?>">
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<h6>Transfer Worker *</h6>
								<div class="">
									<div class="form-line">
										<select class="form-control useselect2" id="mat1worker" style="width: 100%;">
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
										<input type="text" hidden id="idmat1worker">
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
								<div class="">
									<div class="form-line">
										<select class="form-control useselect2" id="laminar" style="width: 100%;">
											<option value="" disabled selected="">--Choose-Laminar--</option>
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
							<div class="col-sm-6">
								<h6>Comment </h6>
								<div class="input-group">
									<div class="form-line">
										<textarea class="form-control" id="seedcomment"></textarea>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset>
						<div class="row clearfix">
							<!-- <div class="col-sm-4">
								<h6>Embryo for Transfer *</h6>
								<div class="input-group">
									<div class="form-line">
										<input type="number" class="form-control numberonly" required id="embryo" value="0" min="1">
									</div>
								</div>
								<div id="error-embryo"></div>
							</div>
							<div class="col-sm-4">
			                	<h6>Media Amount : *</h6>
								<div class="input-group">
									<div class="form-line">
										<input type="text" class="form-control numberonly" id="amountmedia" value="">
									</div>
								</div>
			                </div>
			                <div class="col-sm-4" id="media-field"> 
			                	<h6>Choose Media : *</h6>
								<div class="input-group">
									<div class="form-line">
										<select class="form-control useselect2" id="media">
												<option value="" disabled selected>--Choose-Initiation-Medium--</option>
												<?php 
													/*$media = new Database("SELECT * FROM karet_media WHERE id_jenis_media = ? AND isactive = ?",array("3","1"));

													foreach ($media::$result as $key => $value) {*/
												?>
													<option value="<?php //echo $value['id'];?>"><?= $value['mediacode']?></option>
												<?php
													//}
												?>
										</select>
										<input type="text" hidden id="idmedia">
									</div>
								</div>
								<div id="error-media"></div>
							</div> -->
						</div>
						<div class="row clearfix">
					
						</div>
					</fieldset>        
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
    <div class="modal fade" tabindex="-1" role="dialog" id="form-multitrans">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5> Multiple Embryo Transfer for ID :  <span id="title2"></span> </h5> </div> 
                <div class="modal-body">
	                <fieldset>
						<div class="row">
							<div class="col-sm-6">
								<h6>Transfer Date for Maturation II *</h6>
								<div class="input-group">
									<div class="form-line">
										<input type="date" class="form-control" required id="mat2transdate" value="<?= $now; ?>" max="<?= $now ?>">
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<h6>Transfer Worker *</h6>
								<div class="">
									<div class="form-line">
										<select class="form-control useselect2" id="mat2worker" style="width: 100%;">
											<option value="" disabled selected="">--Choose-Worker--</option>
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
										<input type="text" hidden id="idmat2worker">
									</div>
								</div>
							</div>
						</div>
						<div class="row clearfix">
							<div class="col-sm-4">
								<h6>No. Box *</h6>
								<div class="input-group">
									<div class="form-line">
										<input type="text" class="form-control numberonly" required id="mat2nobox" value="">
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<h6>Culture Room * </h6>
								<div class="input-group">
									<div class="form-line">
										<input type="text" class="form-control" required id="mat2cultureroom" value="">
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<h6>Laminar *</h6>
								<div class="">
									<div class="form-line">
										<select class="form-control useselect2" id="mat2laminar" style="width: 100%;">
											<option value="" disabled selected="">--Choose-Laminar--</option>
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
										<input type="text" hidden id="mat2idlaminar">
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset>
						<div class="row clearfix">
							<div class="col-sm-4">
			                	<h6>Media Amount : *</h6>
								<div class="input-group">
									<div class="form-line">
										<input type="text" class="form-control numberonly" id="mat2amountmedia" value="">
									</div>
								</div>
			                </div>
			                <div class="col-sm-4" id="media-field"> 
			                	<h6>Choose Media : *</h6>
								<div class="input-group">
									<div class="form-line">
										<select class="form-control useselect2" id="mat2medium" style="width: 100%;">
												<option value="" disabled selected>--Choose-Initiation-Medium--</option>
												<?php 
													$media = new Database("SELECT * FROM karet_media WHERE id_jenis_media = ? AND isactive = ?",array("4","1"));

													foreach ($media::$result as $key => $value) {
												?>
													<option value="<?php echo $value['id'];?>"><?= $value['mediacode']?></option>
												<?php
													}
												?>
										</select>
										<input type="text" hidden id="mat2idmedium">
									</div>
								</div>
								<div id="mat2-error-media"></div>
							</div>
							<div class="col-sm-4">
								<h6>Comment </h6>
								<div class="input-group">
									<div class="form-line">
										<textarea class="form-control" id="mat2seedcomment"></textarea>
									</div>
								</div>
							</div>
						</div>
					</fieldset> 	                
                </div>
                <div class="modal-footer">
                	<div class="">
	                    <div class="input-group">
	                    	<button id="btnMultiTrans" class="btn btn-primary">Save</button>
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
						Invitro
					</h5>
					<ul class="header-dropdown" style="">
					<!-- <li>
						<a href="<?php echo $tckaret;?>/">
							<i class="material-icons">add</i> From SE
						</a>
					</li> -->
				</ul>
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
					<div style="text-align: right;">
						<a href="<?php echo $tckaret;?>/invitro.from-se" class="btn btn-primary">+ From SE</a> &nbsp;&nbsp;
						<a href="<?php echo $tckaret;?>/invitro.from-invitro" class="btn btn-primary">+ From In Vitro</a>
					</div>
					<div class="body" style="overflow-x: scroll;"> 
						<table class="table table-bordered table-striped dataTable" id="list-invitro" style="text-align:center;">
							<thead>
								<tr>
									<th width="30px" class="text-center">#</th>
									<th class="text-center">Unique Code</th>
									<th class="text-center">Mother Embryo</th>
									<th class="text-center">Deactivated</th>
									<th class="text-center">Start Date</th>
									<th class="text-center">Medium</th>
									<th class="text-center">Recipient</th>
									<th class="text-center">Number of Plants</th>
									<th class="text-center">Number of Alive</th>
									<th class="text-center">Number of Dead</th>
									<th class="text-center">Number of Contaminated</th>
									<th class="text-center">New Shoots for R</th>
									<th class="text-center">New Shoots on M</th>
									<th class="text-center">Laminar Flow</th>
									<th class="text-center">Action</th>
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
</div>
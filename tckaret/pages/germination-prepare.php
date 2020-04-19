<form>
    <div class="modal fade" tabindex="-1" role="dialog" id="form-edit-germ-prepare">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5></span> Edit Germination Prepare Data for ID Embryo : <b><span id="title-edit"></span></b>  </h5> </div> 
                <div class="modal-body">
                	<input type="text" hidden id="iddata">
                	<div class="col-md-12">
						<fieldset>
							<legend>Germination Data</legend>
							<div class="row">
								<div class="col-sm-6">
									<h6>Germination Date *</h6>
									<div class="input-group">
										<div class="form-line">
											<input type="date" class="form-control" required id="germdate" value="" max="<?= $now ?>">
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<h6>Germination Worker *</h6>
									<div class="input-group">
										<div class="form-line">
											<select class="form-control useselect2" id="worker" style="width: 100%;">
												<option value="" disabled selected="">--Select-Worker--</option>
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
											<input type="text" hidden id="idworker">
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-6">
									<h6>Shoot *</h6>
									<div class="input-group">
										<div class="form-line">
											<select class="form-control" id="shoot">
												<option value="No">No</option>
												<option value="Yes">Yes</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<h6>Germinated *</h6>
									<div class="input-group">
										<div class="form-line">
											<select class="form-control" id="germinated">
												<option value="SE">Somatic Embryo</option>
												<option value="ZE">Zygotic Embryo</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<h6>Comment </h6>
									<div class="input-group">
										<div class="form-line">
											<textarea id="comment" class="form-control"></textarea>
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
	                    	<button id="btnUpdateData" class="btn btn-primary">Save</button>
	                    	<button class="btn btn-danger" data-dismiss="modal">Back</button> 
	                	</div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</form>

	<div class="modal fade" tabindex="-1" role="dialog" id="view-description">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5> Details for ID Embryo : <span id="title"></span>  <button class="btn btn-warning right" data-dismiss="modal">Back</button> </h5> </div> 
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
	                				<td> </td>
	                			</tr>

	                			<tr>
	                				<td> Transfer Date </td>
	                				<td> : </td>
	                				<td id="transdate">  </td>
	                			</tr>

	                			<tr>
	                				<td> </td>
	                			</tr>

	                			<tr>
	                				<td> Laminar </td>
	                				<td> : </td>
	                				<td id="laminar">  </td>
	                			</tr>
	                			<tr>
	                				<td> No. Box </td>
	                				<td> : </td>
	                				<td id="nobox">  </td>
	                			</tr>
	                			<tr>
	                				<td> Culture Room </td>
	                				<td> : </td>
	                				<td id="culroom">  </td>
	                			</tr>
	                			<tr>
	                				<td> Media </td>
	                				<td> : </td>
	                				<td id="media">  </td>
	                			</tr>
	                			
	                		</tbody>
	                	</table>
	                </div>
	                <div class="col-sm-6">
	                	<table class="table">
	                		<tbody>
	                			<tr>
	                				<td> Connected to Other </td>
	                				<td> : </td>
	                				<td id="connect">  </td>
	                			</tr>
	                			<tr>
	                				<td> Shape of Embryo </td>
	                				<td> : </td>
	                				<td id="shapeof">  </td>
	                			</tr>
	                			<tr>
	                				<td> Size of Embryo </td>
	                				<td> : </td>
	                				<td id="sizeof">  </td>
	                			</tr>
	                			<tr>
	                				<td> Comment for Embryo</td>
	                				<td> : </td>
	                				<td id="comment_em">  </td>
	                			</tr>

	                			<tr>
	                				<td> </td>
	                			</tr>

	                			<tr>
	                				<td> Type of Callus </td>
	                				<td> : </td>
	                				<td id="typecallus">  </td>
	                			</tr>
	                			<tr>
	                				<td> Color of Callus </td>
	                				<td> : </td>
	                				<td id="colorcallus">  </td>
	                			</tr>
	                			<tr>
	                				<td> Comment for Callus </td>
	                				<td> : </td>
	                				<td id="comment_callus">  </td>
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

	<!-- Widgets -->
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header bg-cyan">
					<h5>
						Germination Prepare List
					</h5>
				</div>
				<div class="body">
					<fieldset>
						<legend>Search by Germination Date</legend>
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
					<table class="table table-bordered table-striped dataTable" id="list-germ-prepare" style="text-align:center;">
						<thead>
							<tr>
								<th width="10px" class="text-center"></th>
								<th class="text-center">ID Embryo</th>
								<th class="text-center">ID Treatment</th>
								<th class="text-center">Germination Date</th>
								<th class="text-center">Shoot</th>
								<th class="text-center">Germinated</th>
								<th class="text-center">Media</th>
								<th class="text-center">LastScreening</th>
								<th class="text-center">Last Checkpoint</th>
								<th width="100px" class="text-center">Action</th>
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
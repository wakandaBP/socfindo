<!--- Modal for Trace Children Parent -->
<div class="modal fade" tabindex="-1" role="dialog" id="view-tracing">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"><h5> Trace detail : <span id="title"></span>   </h5> </div> 
            <div class="modal-body">
                <div class="col-sm-6">
            		<div style="text-align: center; text-decoration: underline;"><h5>Parent</h5></div>
                	<table class="table table-bordered" id="table_parent">
                		<thead>
                			<tr>
                				<th width="40%">Code SE</th>
                				<th>Quantity</th>
                				<th>Invitro Ending</th>
                			</tr>
                		</thead>
                		<tbody>
                			
                		</tbody>
                	</table>
                </div>
            	<div class="col-sm-6">
            		<div style="text-align: center; text-decoration: underline;"><h5>Children</h5></div>
                	<table class="table table-bordered" id="table_child">
                		<thead>
                			<tr>
                				<th width="40%">Code SE</th>
                				<th>Quantity At Start</th>
                			</tr>
                		</thead>
                		<tbody>
                			
                		</tbody>
                	</table>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button class="btn btn-danger" data-dismiss="modal">Close</button> -->
            </div>
        </div>
    </div>
</div>

<!-- Widgets -->
<div>
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header bg-cyan">
					<h5>
						Reception - Acclimatization
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
						<a href="<?php echo $tckaret;?>/acclimatization.add" class="btn btn-primary">+ Add</a> &nbsp;&nbsp;
					</div>
					<div class="body" style="overflow-x: scroll;"> 
						<table class="table table-bordered table-striped dataTable" id="list-acclimatization" style="text-align:center;">
							<thead>
								<tr>
									<th width="30px" class="text-center">#</th>
									<th class="text-center">Unique Code</th>
									<th class="text-center">Mother Embryo</th>
									<th class="text-center">Deactivated</th>
									<th class="text-center">Plantation</th>
									<th class="text-center">Start Date</th>
									<th class="text-center">Green House Number</th>
									<th class="text-center">Quantity Received</th>
									<th class="text-center">Quantity Rejected</th>
									<th class="text-center">Quantity At End</th>
									<th class="text-center">Dead Plant</th>
									<th class="text-center">Plantation Arrival Date</th>
									<th class="text-center">Supplier</th>
									<th class="text-center">Country Arrival Date</th>
									<th class="text-center">Date of Shipment</th>
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
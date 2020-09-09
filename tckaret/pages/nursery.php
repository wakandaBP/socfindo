<!--- Modal for Trace Children Parent -->
<div class="modal fade" tabindex="-1" role="dialog" id="view-tracing">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"><h5> Trace detail : <span id="title"></span>   </h5> </div> 
            <div class="modal-body">
                <div class="col-sm-12">
            		<div style="text-align: ; text-decoration: underline;"><h5>Parent Hardening</h5></div>
                	<table class="table table-bordered" id="table_parent">
                		<thead>
                			<tr>
                				<th width="20%">Code SE</th>
                				<th>Quantity at Start</th>
                				<th>Hardening Start</th>
                				<th>Hardening Ending</th>
                			</tr>
                		</thead>
                		<tbody>
                			
                		</tbody>
                	</table>
                </div>
                <hr />
                <div class="col-sm-12">
            		<div style="text-align: ; text-decoration: underline;"><h5>Children Plantation Field</h5></div>
                	<table class="table table-bordered" id="table_child_plantation">
                		<thead>
                			<tr>
                				<th width="15%">Code SE</th>
                				<th>Quantity Planted</th>
                				<th>Quantity StandBy</th>
                				<th>Quantity Stands After 1st Cencus</th>
                				<th>Panel</th>
                				<th>Block</th>
                				<th>Plantation</th>
                				<th>Region</th>
                				<th>Scan Date</th>
                			</tr>
                		</thead>
                		<tbody>
                			
                		</tbody>
                	</table>
                </div>
                <hr />
                <div class="col-sm-12">
            		<div style="text-align: ; text-decoration: underline;"><h5>Children Budwood Garden</h5></div>
                	<table class="table table-bordered" id="table_child_budwood">
                		<thead>
                			<tr>
                				<th width="20%">Code SE</th>
                				<th>Quantity Planted</th>
                				<th>Quantity Stands</th>
                				<th>Quantity Rejected</th>
                				<th>Block</th>
                				<th>Plantation</th>
                				<th>Region</th>
                			</tr>
                		</thead>
                		<tbody>
                			
                		</tbody>
                	</table>
                </div>
                <hr />
                 <div class="col-sm-12">
            		<div style="text-align: ; text-decoration: underline;"><h5>Children Stock for Cuttings</h5></div>
                	<table class="table table-bordered" id="table_child_cutting">
                		<thead>
                			<tr>
                				<th width="20%">Code SE</th>
                				<th>Quantity</th>
                				<th>Table Number</th>
                				<th>Plantation</th>
                				<th>Region</th>
                				<th>Date Stock</th>
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
						Nursery
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
						<a href="<?php echo $tckaret;?>/nursery.add" class="btn btn-primary">+ Add</a>
					</div>
					<div class="body" style="overflow-x: scroll;"> 
						<table class="table table-bordered table-striped dataTable" id="list-nursery" style="text-align:center;">
							<thead>
								<tr>
									<th width="30px" class="text-center">#</th>
									<th class="text-center">Unique Code</th>
									<th class="text-center">Mother Embryo</th>
									<th class="text-center">Deactivated</th>
									<th class="text-center">Quantity At Start</th>
									<th class="text-center">Start Date</th>
									<th class="text-center">Quantity Remaining</th>
									<th class="text-center">Quantity At End</th>
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
	</div>
</div>
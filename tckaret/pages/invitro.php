<!--- Modal for Trace Children Parent -->
<div class="modal fade" tabindex="-1" role="dialog" id="view-tracing">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header"><h5> Trace detail : <span id="title"></span>   </h5> </div> 
            <div class="modal-body">
            	<div class="col-sm-4">
            		<div style="text-align: center; text-decoration: underline;"><h5>Parent</h5></div>
                	<table class="table table-bordered" id="table_parent">
                		<thead>
                			<tr>
                				<th width="40%">Code SE</th>
                				<th>Number of Alive</th>
                				<th>Number of Dead</th>
                			</tr>
                		</thead>
                		<tbody>
                			
                		</tbody>
                	</table>
                </div>
                <div class="col-sm-4">
            		<div style="text-align: center; text-decoration: underline;"><h5>Children in Invitro</h5></div>
                	<table class="table table-bordered" id="table_child">
                		<thead>
                			<tr>
                				<th width="50%">Code SE</th>
                				<th>Number of Plants</th>
                			</tr>
                		</thead>
                		<tbody>
                			
                		</tbody>
                	</table>
                </div>
                <div class="col-sm-4">
            		<div style="text-align: center; text-decoration: underline;"><h5>Children in Acclimatization</h5></div>
                	<table class="table table-bordered" id="table_child_aklim">
                		<thead>
                			<tr>
                				<th width="40%">Code SE</th>
                				<th >Quantity</th>
                				<th>Invitro Ending</th>
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
					<div class="body" style="overflow-x: scroll; width: 100%;"> 
						<table class="table table-bordered table-striped dataTable" id="list-invitro" style="text-align:center;">
							<thead>
								<tr>
									<th class="text-center">#</th>
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
									<th style="width: 20%;" class="">Action</th>
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

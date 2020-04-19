	<!-- Widgets -->
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">					
				<div class="header bg-cyan">
					<h5>
						Motherplant from Rejuvination list
					</h5>
				</div>
				<div class="body">
					<fieldset>
						<legend>Search By Germination Date</legend>
						<form method="GET" action="">
							<div class="row clearfix">
								<div class="col-sm-2 form-control-label">
									<label>
										From
									</label>
								</div>
								<?php 
									//$date = strtotime($now,'-1 year');
								?>
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
												<input type="date" class="form-control" placeholder="Date To" id="dateto" value="<?= $now ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									<button type="submit" class="btn btn-primary btn-sm m-l-15 waves-effect" id="btnCari"><i class="material-icons">search</i></button>
								</div>
							</div>
						</form>
					</fieldset>
					
					<table class="table table-bordered table-striped dataTable" id="list-mplant">
						<thead>
							<tr>
								<th width="30px" class="text-center">Year</th>
								<th class="text-center">Season</th>
								<th class="text-center">ID Embryo</th>
								<th class="text-center">ID Treatment</th>
								<th class="text-center">ID Reception</th>
								<th class="text-center">Clone</th>
								<th class="text-center">Germination Date</th>
								<th class="text-center">Code SE</th>
								<th class="text-center">Leaf Sample for Identification</th>
								<th class="text-center">Result of Identification</th>
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
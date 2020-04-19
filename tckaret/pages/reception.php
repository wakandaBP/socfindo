	<!-- Widgets -->
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">					
				<div class="header bg-cyan">
					<h5>
						Reception list
					</h5>
					 <ul class="header-dropdown">
						<li>
							<a href="<?php echo $tckaret;?>/reception.add" class="btnTambah">
								<i class="material-icons">add</i>
							</a>
						</li>
					</ul>
				</div>
				<div class="body">
					<fieldset>
						<legend>Search By Reception Date</legend>
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
					<!--<div class="modal-body">
						 <fieldset>
							<legend>Search By Reception Date</legend>
							<div class="row clearfix">
								<div class="col-md-offset-1 col-md-4 row">
									<div class="col-md-2">
										<label>From</label>
									</div>
									<div class="col-md-8 input-group">
										<div class="form-line">
											<input type="date" class="form-control" id="datefrom" required="required">
										</div>
									</div>
								</div>
								<div class="row col-md-4">
									<div class="col-md-2 col-md-2">
										<label>To</label>
									</div>
									<div class="col-md-10 form-line">
										<input type="date" class="form-control" id="dateto" required="required">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-line">
										<button href="" class="btn btn-info btn-sm"><i class="material-icons">search</i></button>
									</div>
								</div>
							</div>	
						</fieldset> 
					</div>-->
					
					<table class="table table-bordered table-striped dataTable" id="list-reception">
						<thead>
							<tr>
								<th width="30px" class="text-center">ID Reception</th>
								<th class="text-center">Receipt Date</th>
								<th class="text-center">Clone</th>
								<th class="text-center">Plantation</th>
								<th class="text-center">Harvest Date</th>
								<!-- <th class="text-center">Send Date</th> -->
								<th class="text-center">Tree Code</th>
								<!-- <th class="text-center">Line</th>
								<th class="text-center">Certified</th> -->
								<th class="text-center">Flowers Harvested</th>
								<th class="text-center">Fruits Harvested</th>
								<th class="text-center">Tree Part</th>
								<th class="text-center">Comment</th>
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
<form id="parent-form">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Add Reception - Acclimatization
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 5% 2% 5%";>
				<fieldset>
					<div class="row clearfix">
						<div class="col-sm-8">
							<h6>Parent In Vitro *</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="parent_invitro" class="form-control useselect2 parent_form parent_invitro" required>
										<option value="">Choose Parent</option>
										
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-3">
							<h6>End Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control parent_form" required id="end_date">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Quantity *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly parent_form" required id="quantity" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-2" style="text-align: center;">
							<h6>Deactivated</h6>
							<div class="input-group">
								<div>
									<input type="checkbox" class="form-control parent_form" id="deactivated">
								</div>
							</div>
						</div>
					</div>
					<div style="text-align: left;"><button id="btnAddtoList" class="btn btn-primary">Add to List</button></div>
					<br />
					<div class="" style="overflow-x: scroll; overflow-y: scroll"> 
						<h6>Parent List:</h6>
						<table class="table table-bordered table-striped dataTable" id="list-parent" style="text-align:center;">
							<thead>
								<tr>
									<th width="30px" class="text-center">#</th>
									<th class="text-center">Unique Code</th>
									<th class="text-center">Base SE</th>
									<th class="text-center">Invitro End</th>
									<th class="text-center">Quantity</th>
									<th class="text-center">Deactivated</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</fieldset>
</form>
<form id="add-acclimatization">
				<fieldset>
					<!-- <legend>Data</legend> -->
					<div class="row clearfix">
						<div class="col-sm-4">
							<h6>Region *</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="region" class="form-control useselect2" >
										<option value="">Choose Region</option>
										<?php 
											$region = new Database("SELECT id, name FROM karet_plantation_region
														WHERE isactive = ?",array(1));

											foreach ($region::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Supplier *</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="supplier" class="form-control useselect2" >
										<option value="">Choose Supplier</option>
										<?php 
											$supplier = new Database("SELECT id, name FROM karet_supplier
														WHERE isactive = ?",array(1));

											foreach ($supplier::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Country Arrival Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" required id="country_arrival_date">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Date of Shipment *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" required id="date_of_shipment">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Plantation Arrival Date</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" id="plantation_arrival_date">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Start Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" id="start_date">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Green House Number *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" required id="green_house_number" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Quantity Received *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" required id="quantity_received" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Quantity Rejected *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" required id="quantity_rejected" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Quantity At End *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" required id="quantity_at_end" value="0">
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/acclimatization" class="btn btn-danger btn-sm">Cancel</a>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
</form>
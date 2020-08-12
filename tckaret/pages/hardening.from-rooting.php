<form id="parent-form">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Add Hardening from Rooting Green House
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 5% 2% 5%";>
				<fieldset>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Parent Rooting *</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="parent_invitro" class="form-control useselect2 parent_form" required>
										<option value="">Choose Parent</option>
										
									</select>
								</div>
							</div>
						</div>
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
									<th class="text-center">Rooting Ending</th>
									<th class="text-center">Quantity At Start</th>
									<th class="text-center">Quantity At End</th>
									<th class="text-center">Starting Date</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</fieldset>
</form>
<form id="add-hardening">
				<fieldset>
					<!-- <legend>Data</legend> -->
					<div class="row clearfix">
						<div class="col-sm-3">
							<h6>Start Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" id="start_date">
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/hardening" class="btn btn-danger btn-sm">Cancel</a>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
</form>
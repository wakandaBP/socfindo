<form id="parent-form">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Add Budwood Garden
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 5% 2% 5%";>
				<fieldset>
					<div class="row clearfix">
						<div class="col-sm-10">
							<h6>Parent Nursery *</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="parent_nursery" class="form-control useselect2 parent_form parent_nursery" required>
										<option value="">Choose Parent</option>
										
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-2">
							<h6>End Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control parent_form" required id="end_date">
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6>Quantity Start</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" disabled  id="quantity_start" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6>Quantity Remaining</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" disabled id="quantity_remaining" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6>Quantity Used *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly parent_form" min="0" required id="quantity_used" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-2" style="text-align: center;">
							<h6>Deactivated</h6>
							<div class="input-group">
								<div class="" style="">
									<input <?php echo ("TRUE" == $data['deactivated']) ? 'checked' : ''; ?> type="checkbox" class="form-control parent_form" id="deactivated">
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
									<th class="text-center">Nursery Ending</th>
									<th class="text-center">Quantity Start</th>
									<th class="text-center">Quantity Remaining</th>
									<th class="text-center">Quantity Used</th>
									<th class="text-center">Deactivated</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</fieldset>
</form>
<form id="add-budwood">
				<fieldset>
					<!-- <legend>Data</legend> -->
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Block *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control useselect2" id="block" required>
										<option value="">Choose Block</option>
										<?php 
											$block = new Database("SELECT a.id, a.blocknumber, b.name as plantation, 
														c.name as region FROM karet_plantation_block a 
														JOIN karet_plantation b ON b.id = a.idplantation
														JOIN karet_plantation_region c ON c.id = b.region
														WHERE a.isactive = ?", array(1));

												foreach ($block::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['blocknumber'];?> ;  <?= $value['plantation'] ?> ;  <?= $value['region'] ?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Planting Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" id="planting_date" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/budwood_garden" class="btn btn-danger btn-sm">Cancel</a>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
</form>
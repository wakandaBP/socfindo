<form id="parent-form">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Add In Vitro From In Vitro
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 5% 2% 5%";>
				<fieldset>
					<div class="row clearfix">
						<div class="col-sm-12">
							<h6>Parent In Vitro *</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="parent_invitro" class="form-control useselect2 parent_form parent_invitro" required>
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
							<h6>Number of Alive</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly parent_form" id="number_of_alive" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Number of Dead</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly parent_form" id="number_of_dead" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Contaminated</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly parent_form" id="contaminated" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>New Shoots for R</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly parent_form" id="new_shoots_for_r" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>New Shoots on M</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly parent_form" id="new_shoots_on_m" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-3" style="text-align: center;">
							<h6>Deactivated</h6>
							<div class="input-group">
								<div>
									<input type="checkbox" class="form-control parent_form" id="deactivated">
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
									<th class="text-center">Invitro End</th>
									<th class="text-center">Quantity</th>
									<th class="text-center">Alive</th>
									<th class="text-center">Dead</th>
									<th class="text-center">Contaminated</th>
									<th class="text-center">New Rooted</th>
									<th class="text-center">New Shooted</th>
									<th class="text-center">Deactivated</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</fieldset>
</form>
<form id="invitro-from-invitro">
				<fieldset>
					<!-- <legend>Data</legend> -->
					<div class="row clearfix">
						<div class="col-sm-3">
							<h6>Start Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" required id="startdate">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Medium *</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="medium" class="form-control useselect2" required>
										<option value="">Choose</option>
										<?php 
											$medium = new Database("SELECT id, mediacode FROM karet_media
														WHERE isactive = ?",array(1));

											foreach ($medium::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['mediacode'];?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Recipient *</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="recipient" class="form-control useselect2" required>
										<option value="">Choose</option>
										<?php 
											$recipient = new Database("SELECT id, vesselcode FROM karet_vessel
														WHERE isactive = ?",array(1));

											foreach ($recipient::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['vesselcode'];?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6>Stock Medium:</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" disabled id="stok_available">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Number of Plants *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" required id="number_of_plants" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Laminar Flow *</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="laminar_flow" class="form-control useselect2" required>
										<option value="">Choose</option>
										<?php 
											$laminar = new Database("SELECT id, nolaminar FROM karet_laminar
														WHERE isactive = ?",array(1));

											foreach ($laminar::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['nolaminar'];?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Worker *</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="worker" class="form-control useselect2" required>
										<option value="">Choose</option>
										<?php 
											$worker = new Database("SELECT id, initial FROM karet_worker
														WHERE isactive = ?",array(1));

											foreach ($worker::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['initial'];?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/invitro" class="btn btn-danger btn-sm">Cancel</a>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
</form>
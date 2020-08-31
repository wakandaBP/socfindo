<style type="text/css">
	.mplant .select2-results__option {
	 	padding: 0px 4px;
	}
</style>

<form id="invitro-from-se">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Add In Vitro From SE
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 10% 2% 10%";>
				<fieldset>
					<legend>Data</legend>
					<div class="row clearfix">
						<div class="col-sm-8">
							<h6>Mother Plant *</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="motherplant" class="form-control useselect2 motherplant" required>
										<option value="">Choose Motherplant</option>
										<!-- 
										<?php 
										/*	$motherplant = new Database("SELECT id, code_se FROM karet_motherplant
														WHERE deleted_at IS NULL",array());

											foreach ($motherplant::$result as $key => $value) {*/
										?>
											<option value="<?php// echo $value['id'];?>"><?php //echo $value['code_se'];?></option>
										<?php
											//}
										?> -->
									</select>
									<!-- <input class="form-control" id="motherplant" value="" /> -->
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Start Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" required id="startdate">
								</div>
							</div>
						</div>
						<div class="col-sm-5">
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
						<div class="col-sm-5">
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
							<h6>Stock Available:</h6>
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
									<input type="number" class="form-control" required id="number_of_plants" placeholder="0">
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
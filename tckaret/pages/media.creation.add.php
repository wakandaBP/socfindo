<?php 	
try {
	$media = new Database("SELECT * FROM karet_media WHERE id = ?",array($page[1]));

	foreach ($media::$result as $key => $value) {
?>

<form id="add-creation">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Add Stock Media of : [ <span style=""><?php echo $value["mediacode"] . " - ". $value["media"];?> ]</span>
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 15% 0 15%; padding-bottom: 2%;">
				<fieldset>
					<legend>Data</legend>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Medium Creation Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" required id="tglbuatmedia" value="<?= $now; ?>" max="<?= $now; ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Worker *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="listworker form-control useselect2" id="worker" style="width:100%;">
										<option value="" disabled selected="">--Choose-Worker--</option>
										<?php 
											$worker = new Database("SELECT * FROM karet_worker
														WHERE isactive = ?",array("1"));

											foreach ($worker::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['initial'];?></option>
										<?php
											}
										?>
									</select>
									<input hidden type="text" id="idworker" />
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Volume (Liter) *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" placeholder="0.00" id="volume" class="form-control numberwithdot" style="border-color: #cc0000;" step=".01" />
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Vessel *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="listvessel form-control useselect2" id="vessel" style="width:100%;">
										<option value="" disabled selected>--Choose-Vessel--</option>
										<?php 
											$vessel = new Database("SELECT * FROM karet_vessel WHERE isactive = ?",array("1"));

											foreach ($vessel::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['vesselcode'];?></option>
										<?php
											}
										?>
									</select>
									<input hidden type="text" id="idvessel">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Quantity *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" placeholder="0" required class="form-control" id="jumlah" />
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Length Of Working (in Minutes) *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" placeholder="0" required class="form-control numberwithdot" id="lamakerja" />
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/media" class="btn btn-danger btn-sm">Cancel</a>
					</div>
				</fieldset>
			</div>	
		</div>
	</div>
</form>

<?php 

	}
} 
catch (PDOException $e){
    echo $e->getMessage();
}

?>
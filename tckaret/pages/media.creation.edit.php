<?php 	
try {
	$mediabuat = new Database("SELECT * FROM karet_media_pembuatan WHERE id = ?",array($page[1]));

	$idmedia = "";
	foreach ($mediabuat::$result as $key => $data) {
		$idmedia = $data['idmedia'];

		$disabledMedia = "";
		if ($data['jumlah'] != $data['remaining_media']){
			$disabledMedia = "readonly";
		}

		$media = new Database("SELECT mediacode FROM karet_media WHERE id = ?",array($idmedia));
?>

<form id="edit-creation">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<?php 
					foreach ($media::$result as $key => $values) {
				?>
				<h5>
					Edit Stock Media : [ <span style=""><?php echo $values['mediacode'] . " - " . $data['tglpembuatanmedia'];?> ]</span>
				</h5>
				<?php 
					}
				?>
			</div>
			<div class="body" id="form-data" style="padding: 2% 15% 0 15%; padding-bottom: 2%;">
				<fieldset>
					<legend>Data</legend>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Medium Creation Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" required id="tglbuatmedia" value="<?php echo $data['tglpembuatanmedia']?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Worker *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="listworker form-control useselect2" style="width: 100%;" id="worker">
										<option value="" disabled >--Choose-Worker--</option>
										<?php 
											$worker = new Database("SELECT * FROM karet_worker
														WHERE isactive = ?",array("1"));

											foreach ($worker::$result as $key => $value) {
												$selected = "";
												if ($value['id'] == $data['idworker']){
													$selected = "selected";
												}
										?>
											<option <?php echo $selected;?> value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
										<?php
											}
										?>
									</select>
									<input hidden type="text" id="idworker" value="<?php echo $data['idworker']?>" />
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Volume (Liter) *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" placeholder="0.00" required id="volume" class="form-control numberwithdot" step=".01" value="<?php echo $data['volume'] ?>" />
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Vessel *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="listvessel form- useselect2" style="width: 100%;" id="vessel">
										<option value="" disabled>--Choose-Vessel--</option>
										<?php 
											$vessel = new Database("SELECT * FROM karet_vessel WHERE isactive = ?",array("1"));

											foreach ($vessel::$result as $key => $value) {
												$selected = "";
												if ($value['id'] == $data['idvessel']){
													$selected = "selected";
												}
										?>
											<option value="<?php echo $value['id'];?>" <?php echo $selected;?> ><?php echo $value['vesselcode'];?></option>
										<?php
											}
										?>
									</select>
									<input hidden type="text" readonly id="idvessel" value="<?php echo $data['idvessel']?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Quantity *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" <?= $disabledMedia; ?> placeholder="0" required class="form-control" id="jumlah" value="<?php echo $data['jumlah'];?>" />
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Length Of Working (in Minutes) *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" placeholder="0" required class="form-control numberwithdot" id="lamakerja" value="<?php echo $data['lamakerja'];?>" />
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="row clearfix">
						<div class="col-sm-12">
							<h6>Barcode</h6>
							<div class="input-group">
								<div>
									<textarea style="width: 1000px;" id="barcode"></textarea>
								</div>
							</div>
						</div>
					</div> -->
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/media.creation.log/<?php echo $data['idmedia']?>" class="btn btn-danger btn-sm">Cancel</a>
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
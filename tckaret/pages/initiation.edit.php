<?php 	
try {
	$init = new Database("SELECT * FROM karet_initiation WHERE id_treatment = ?",array($page[1]));

	$disabled = "";
	foreach ($init::$result as $key => $data) {
		if ( (intval($data['se']) + intval($data['ze'])) != intval($data['remaining_sample']) ){
			$disabled = "readonly";
		}
?>

<form id="edit-initiation">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Edit Initiation for ID Treatment : [ <span style=""><?php echo $page[1];?> ]</span>
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 15% 0 15%; padding-bottom: 2%;">
				<fieldset>
					<legend>Data</legend>
					<div class="row clearfix">
						<div class="col-sm-4">
							<h6>No. Box *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control numberonly" required id="nobox" value="<?php echo $data['nobox'];?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Sample *</h6>
							<div class="">
								<div class="form-line">
									<select class="form-control" <?= $disabled; ?> id="sample">
										<option value="" disabled>--Choose-Sample--</option>
										<?php 
											if ($data['sample'] == "FRUITS"){
												echo "<option selected value='FRUITS'>Fruits</option>
														<option value='FLOWERS'>Flowers</option>";
											} else {
												echo "<option value='FRUITS'>Fruits</option>
														<option selected value='FLOWERS'>Flowers</option>";
											}
										?>
									</select>
									<input hidden type="text" id="samplefield" value="<?php echo $data['sample'];?>"/>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Initiation Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" required id="initdate" value="<?php echo $data['initiation_date'];?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-4">
							<h6>Width Seed (mm)*</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control numberonly" id="widthseed" value="<?php echo $data['widthseed'];?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Total Seeds </h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control numberonly" id="totalseeds" value="<?php echo $data['numberofseeds'];?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Comment </h6>
							<div class="input-group">
								<div class="form-line">
									<textarea class="form-control" id="seedcomment"><?php echo $data['seedcomments'];?></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-2">
							<h6>ZE </h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" <?= $disabled; ?> class="form-control" id="ze" value="<?php echo $data['ze'];?>">
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6>SE </h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" <?= $disabled; ?> class="form-control" id="se" value="<?php echo $data['se'];?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Initiation Worker *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control useselect2" id="initworker" style="width: 100%;">
										<option value="" disabled>--Choose-Worker--</option>
										<?php 
											$worker = new Database("SELECT * FROM karet_worker
														WHERE isactive = ?",array("1"));

											foreach ($worker::$result as $key => $value) {
												$selected = "";
												if ($value['id'] == $data['initiation_worker']){
													$selected = "selected";
												}
										?>
											<option <?= $selected; ?> value="<?php echo $value['id'];?>"><?php echo $value['initial'];?></option>
										<?php
											}
										?>
										
									</select>
									<input type="text" hidden id="idinitworker" value="<?php echo $data['initiation_worker'];?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Laminar *</h6>
							<div class="">
								<div class="form-line">
									<select class="form-control useselect2" id="laminar" style="width: 100%;">
										<option value="" disabled selected="">--Choose-Laminar--</option>
										<?php 
											$laminar = new Database("SELECT * FROM karet_laminar 
														WHERE isactive = ?",array("1"));

											foreach ($laminar::$result as $key => $value) {
												$selected = "";
												if ($value['id'] == $data['laminar']){
													$selected = "selected";
												}
										?>
											<option <?= $selected; ?> value="<?php echo $value['id'];?>"><?php echo $value['nolaminar'];?></option>
										<?php
											}
										?>
									</select>
									<input type="text" hidden id="idlaminar" value="<?php echo $data['laminar'];?>">
								</div>
							</div>
						</div>
					</div>
					<?php
						$mediaLog = new Database("SELECT * FROM karet_media_pengeluaran WHERE id = ?",array($data['idpengeluaranmedia']));
						/*
						$idmed = $mediaLog::$result[0]['id_media'];*/

					?>
					<div class="row clearfix">
						<input type="text" hidden id="idpengeluaranmedia" value="<?= $data['idpengeluaranmedia'] ?>">
						<div class="col-sm-4">
		                	<h6>Media Amount : *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" <?= $disabled ?> class="form-control numberonly" id="amountpetri" value="<?= $mediaLog::$result[0]['jumlah_keluar']?>">
								</div>
							</div>
		                </div>
		                <div class="col-sm-4" id="media-field"> 
		                	<h6>Choose Media : *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control useselect2" id="media">
											<option value="" disabled selected>--Choose-Initiation-Medium--</option>
											<?php 
												$media = new Database("SELECT * FROM karet_media WHERE id_jenis_media = ? AND isactive = ?",array("1","1"));

												foreach ($media::$result as $key => $value) {
													$selected = "";
													if ($value['id'] == $data['idmedia']) {
														$selected = "selected";
													}
											?>
												<option value="<?php echo $value['id'];?>" <?= $selected; ?>><?= $value['mediacode']?></option>
											<?php
												}
											?>
									</select>
									<input type="text" hidden id="idmedia" value="<?= $data['idmedia']; ?>">
								</div>
							</div>
							<div id="error-media"></div>
						</div>	
						<div class="col-sm-4">
							<h6>Treatment Remarks Comment </h6>
							<div class="input-group">
								<div class="form-line">
									<textarea class="form-control" id="treatmentcomment"><?php echo $data['treatmentcomment'];?></textarea>
								</div>
							</div>
						</div>	
					</div>
					
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/initiation" class="btn btn-danger btn-sm">Cancel</a>
					</div>
				</fieldset>
			</div>	
		</div>
	</div>
</form>

<?php 
	} 
	// else {
	// 	header('Location :  ' . $tckaret . '/initiation');
	// }

	//}
} 
catch (PDOException $e){
    echo $e->getMessage();
}

?>
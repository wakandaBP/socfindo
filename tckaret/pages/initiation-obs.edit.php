<?php 	
try {

	$obs = new Database("SELECT * FROM karet_obscallus WHERE id_treatment = ?",array($page[1]));

	foreach ($obs::$result as $key => $data) {

?>

<form id="edit-obscallus">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Edit Observation Callus for ID Treatment : [ <span style=""><?php echo $page[1];?> ]</span>
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 15% 0 15%; padding-bottom: 2%;">
				<fieldset>
					<!-- <legend>Data</legend> -->
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Observation Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" required id="obsdate" value="<?= $data['obsdate'];?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Observation Worker *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control useselect2" id="obsworker">
										<option value="" disabled selected="">--Choose-Worker--</option>
										<?php 
											$worker = new Database("SELECT a.id, b.nama FROM karet_worker a 
														JOIN master_pegawai b ON  a.id_pegawaimaster = b.id
														WHERE a.isactive = ?",array("1"));

											foreach ($worker::$result as $key => $value) {
												$selected = "";
												if ($value['id'] == $data['obsworker']){
													$selected = "selected";
												}
										?>
											<option <?= $selected; ?> value="<?php echo $value['id'];?>"><?php echo $value['nama'];?></option>
										<?php
											}
										?>
									</select>
									<input type="text" hidden id="idobsworker" value="<?= $data['obsworker']?>">
								</div>
							</div>
						</div>
					</div>
				</fieldset>

				<fieldset>
					<legend>Data for 25 Day Observation</legend>
					<div class="row clearfix">
						<div class="col-sm-4">
							<h6>Contamination Fungi</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="contfungi" value="<?= $data['contaminationfungi']?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Contamination Bacteri</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="contbact" value="<?= $data['contaminationbact']?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Pieces Not Reacted</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="notreact" value="<?= $data['piecesnotreact']?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>A Lot of Callus *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" required id="alotofcallus" value="<?= $data['alotofcallus']?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Little Bit of Callus *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" required id="littlebitofcallus" value="<?= $data['littlebitofcallus']?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-2">
							<h6>Yellow</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="yellow" value="<?= $data['yellow']?>">
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6>White</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="white" value="<?= $data['white']?>">
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6>Orange</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="orange" value="<?= $data['orange']?>">
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6>Brown</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="brown" value="<?= $data['brown']?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Dead </h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="dead" value="<?= $data['dead']?>">
								</div>
							</div>
						</div>
					</div>
					
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/initiation-obs" class="btn btn-danger btn-sm">Cancel</a>
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
<?php 	
try {

	if ($page[1] != ""){
		//$init = new Database("SELECT * FROM karet_transcallus WHERE id_treatment = ?",array($page[1]));

		$screen = new Database("SELECT * FROM karet_embryo_maturation1_screening 
										WHERE id = ?",array($page[1]));

		foreach ($screen::$result as $key => $data) {
			$r = $data['screening_checkpoint'];

			if ($r == 1){
				$r = $r . "st";
			} elseif ($r == 2){
				$r = $r . "nd";
			} elseif ($r == 3) {
				$r = $r . "rd";
			} else {
				$r = $r . "th";
			}

?>

<form id="edit-mat1screening">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Edit <?= $r;?> Maturation I Screening for ID Embryo : [ <span style=""><?= $data['id_embryo'];?> ]</span>
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 15% 0 15%; padding-bottom: 2%;">
				<input type="text" hidden id="idembryo" value="<?= $data['id_embryo']; ?>">
				<fieldset>
					<legend><?= $r; ?> Maturation I Screening</legend>
					<div class="row clearfix">
						<div class="col-sm-4">
							<h6>Screening Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" required id="screendate" value="<?= $data['screening_date'] ?>" max="<?= $now; ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Screening Worker *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control useselect2" id="screenworker">
										<option value="" disabled selected="">--Choose-Worker--</option>
										<?php 
											$worker = new Database("SELECT * FROM karet_worker
														WHERE isactive = ?",array("1"));

											foreach ($worker::$result as $key => $value) {
												$selected = "";
												if ($value['id'] == $data['screening_worker']){
													$selected = "selected";	
												}
										?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
										<?php
												}
											}
										?>
									</select>
									<input type="text" hidden id="idscreenworker" value="<?= $data['screening_worker']; ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Comment</h6>
							<div class="input-group">
								<div class="form-line">
									<textarea class="form-control" id="comment"><?= $data['comment']; ?></textarea>
								</div>
							</div>
						</div>
					</div>
				</fieldset>

				<input hidden type="text" id="idcont" value="<?= $data['idcontaminationrecord']; ?>">
				<?php 
					$cont = new Database("SELECT * FROM karet_contamination_record WHERE id = ?",array($data['idcontaminationrecord']));

					foreach ($cont::$result as $key => $items) {
						
				?>
				<fieldset>
					<legend>Contamination</legend>
					<div class="row clearfix">
						<div class="col-sm-3">
							<h6>Contamination By Fungi</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="fungi" value="<?= $items['contamination_fungi'];?>">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Contamination By Bacteri</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="bact" value="<?= $items['contamination_bact'];?>">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Pink</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="pink" value="<?= $items['pink'];?>">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Dead</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="dead" value="<?= $items['dead'];?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Contamination Comment</h6>
							<div class="input-group">
								<div class="form-line">
									<textarea id="contcomment" class="form-control"><?= $items['comments'];?></textarea>
								</div>
							</div>
						</div>
					</div>
				<?php 
					}
				?>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/maturation1.screen.log/<?= $data['id_embryo'] ?>" class="btn btn-danger btn-sm">Cancel</a>
					</div>
				</fieldset>
			</div>	
		</div>
	</div>
</form>

<?php 
		}
	} 
} 
catch (PDOException $e){
    echo $e->getMessage();
}

?>
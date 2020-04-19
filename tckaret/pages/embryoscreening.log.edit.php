<?php 	
try {

	if ($page[1] != ""){
		//$init = new Database("SELECT * FROM karet_transcallus WHERE id_treatment = ?",array($page[1]));

		$query = new Database("SELECT * FROM karet_initiation_embryo_screening WHERE id = ?",array($page[1]));
		$screen = $query::$result[0];

		$r = $screen['screening_checkpoint'];

		if ($r == 1){
			$r = $r . "st";
		} elseif ($r == 2){
			$r = $r . "nd";
		} elseif ($r == 3) {
			$r = $r . "rd";
		} else {
			$r = $r . "th";
		}

		$trans = new Database("SELECT * FROM karet_initiation_trans WHERE id = ?",array($screen['id_initiation_trans']));
?>

<form id="edit-emscreening">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Edit <?= $r;?> Embryo Screening for ID Treatment : [ <span style=""><?php echo $trans::$result[0]['id_treatment'];?> / <?php echo DateToIndo($trans::$result[0]['transferdate']);?> ]</span>
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 15% 0 15%; padding-bottom: 2%;">
				<fieldset>
					<input type="text" hidden id="id_init_trans" value="<?= $screen['id_initiation_trans']; ?>">
					<legend><?= $r; ?> Embryo Screening</legend>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Screening Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" required id="screendate" value="<?= $screen['screening_date']; ?>" max="<?= $now; ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
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
												if ($value['id'] == $screen['screening_worker']){
													$selected = "selected";
												}
										?>
											<option <?= $selected; ?> value="<?php echo $value['id'];?>"><?php echo $value['initial'];?></option>
										<?php
											}
										?>
									</select>
									<input type="text" hidden id="idscreenworker" value="<?= $screen['screening_worker']; ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Growing Embryo *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" required id="embryo" value="<?= $screen['grow_embryo']; ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Comment</h6>
							<div class="input-group">
								<div class="form-line">
									<textarea class="form-control" id="comment"><?= $screen['comment']; ?></textarea>
								</div>
							</div>
						</div>
					</div>
				</fieldset>

				<?php 
					$query2 = new Database("SELECT * FROM karet_contamination_record WHERE id = ?",array($screen['idcontaminationrecord']));

					$cont = $query2::$result[0];
				?>

				<fieldset>
					<legend>Contamination</legend>
					<div class="row clearfix">
						<div class="col-sm-3">
							<h6>Contamination By Fungi</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="fungi" value="<?= $cont['contamination_fungi']; ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Contamination By Bacteri</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="bact" value="<?= $cont['contamination_bact']; ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Pink</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="pink" value="<?= $cont['pink']; ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Dead</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="dead" value="<?= $cont['dead']; ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Contamination Comment</h6>
							<div class="input-group">
								<div class="form-line">
									<textarea id="contcomment" class="form-control"><?= $cont['comments']; ?></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/embryoscreening" class="btn btn-danger btn-sm">Cancel</a>
					</div>
				</fieldset>
			</div>	
		</div>
	</div>
</form>

<?php 
	//	}
	} 
} 
catch (PDOException $e){
    echo $e->getMessage();
}

?>
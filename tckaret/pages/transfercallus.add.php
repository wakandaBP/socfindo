<?php 	
try {

	if ($page[1] != ""){
		$init = new Database("SELECT * FROM karet_obscallus WHERE id_treatment = ?",array($page[1]));

		foreach ($init::$result as $key => $value) {
			$callustrans = intval($value['alotofcallus']) + intval($value['littlebitofcallus']); 
?>

<form id="add-obscallus">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Transfer Callus for ID Treatment : [ <span style=""><?php echo $page[1];?> ]</span>
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 15% 0 15%; padding-bottom: 2%;">
				<fieldset>
					<legend>Data</legend>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Transfer Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" required id="transdate" value="">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Transfer Worker *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control useselect2" id="transworker">
										<option value="" disabled selected="">--Choose-Worker--</option>
										<?php 
											$worker = new Database("SELECT a.id, b.nama FROM karet_worker a 
														JOIN master_pegawai b ON  a.id_pegawaimaster = b.id
														WHERE a.isactive = ?",array("1"));

											foreach ($worker::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['nama'];?></option>
										<?php
											}
										?>
									</select>
									<input type="text" hidden id="idtransworker">
								</div>
							</div>
						</div>
					</div>
				</fieldset>

				<fieldset>
					<legend>Data for Transfer Callus</legend>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Callus Transfer * <span style="color:red">(Automatic Field)</span></h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control numberonly" readonly id="callustransfer" value="<?= $callustrans; ?>">
								</div>
							</div>

						</div>
						<div class="col-sm-6">
							<h6>Laminar *</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="laminar" class="form-control useselect2">
										<option value="" disabled selected>--Select-Laminar--</option>
										<?php 
											$laminar = new Database("SELECT * FROM karet_laminar WHERE isactive = ?",array("1"));

											foreach ($laminar::$result as $key => $item) {

										?>
											<option value="<?= $item['id']; ?>"><?= $item['nolaminar']; ?></option>

										<?php
											}
										?>
									</select>
									<input type="text" hidden id="idlaminar">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Contamination</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="contamination" value="">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Comment</h6>
							<div class="input-group">
								<div class="form-line">
									<textarea class="form-control" id="comment"></textarea>
								</div>
							</div>
						</div>
					</div>
					
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/transfercallus.chooseid" class="btn btn-danger btn-sm">Cancel</a>
					</div>
				</fieldset>
			</div>	
		</div>
	</div>
</form>

<?php 
		}
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
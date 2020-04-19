<?php 	
try {
	
	if ($page[1] != ""){

?>

<form id="add-initiation">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Add Initiation for ID Reception : [ <span style=""><?php echo $page[1];?> ]</span>
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 15% 0 15%; padding-bottom: 2%;">
				<fieldset>
					<legend>Data</legend>
					<div class="row">
						<div class="col-sm-4">
							<h6>No. Box *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control numberonly" required id="nobox" value="">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Sample *</h6>
							<div class="">
								<div class="form-line">
									<select class="form-control" id="sample">
										<option value="" disabled selected="">--Choose-Sample--</option>
										<option value="FRUITS">Fruits</option>
										<option value="FLOWERS">Flowers</option>
									</select>
									<input hidden type="text" id="samplefield" />
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Initiation Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" required id="initdate" value="<?= $now; ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-4">
							<h6>Width Seed (mm)*</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control numberonly" required id="widthseed" value="">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Total Seeds </h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control numberonly" id="totalseeds" value="">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Comment </h6>
							<div class="input-group">
								<div class="form-line">
									<textarea class="form-control" id="seedcomment"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-2">
							<h6>ZE </h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="ze" value="">
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6>SE </h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="se" value="">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Initiation Worker *</h6>
							<div class="">
								<div class="form-line">
									<select class="form-control useselect2" id="initworker">
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
									<input type="text" hidden id="idinitworker">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Laminar *</h6>
							<div class="">
								<div class="form-line">
									<select class="form-control useselect2" id="laminar">
										<option value="" disabled selected="">--Choose-Laminar--</option>
										<?php 
											$laminar = new Database("SELECT * FROM karet_laminar 
														WHERE isactive = ?",array("1"));

											foreach ($laminar::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['nolaminar'];?></option>
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
						<div class="col-sm-6" id="media-field"> 
		                	<h6>Choose Media : *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control useselect2" id="media">
											<option value="" disabled selected>--Choose-Initiation-Medium--</option>
											<?php 
												$media = new Database("SELECT * FROM karet_media WHERE id_jenis_media = ? AND isactive = ?",array("1","1"));

												foreach ($media::$result as $key => $value) {
											?>
												<option value="<?php echo $value['id'];?>"><?= $value['mediacode']?></option>
											<?php
												}
											?>
									</select>
									<input type="text" hidden id="idmedia">
								</div>
							</div>
							<div id="error-media"></div>
						</div>
						<div class="col-sm-3"> 
								<h6>Available Media:</h6>
								<div class="input-group"> 
									<div class="form-line">
										<input type="text" readonly class="form-control numberonly" id="available-media" value="">
									</div>
								</div>
							</div> 
						<div class="col-sm-3">
		                	<h6>Media Amount : *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control numberonly" id="amountpetri" value="">
								</div>
							</div>
		                </div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Treatment Remarks Comment </h6>
							<div class="input-group">
								<div class="form-line">
									<textarea class="form-control" id="treatmentcomment"></textarea>
								</div>
							</div>
						</div>
					</div>							
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/initiation.chooseid" class="btn btn-danger btn-sm">Cancel</a>
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
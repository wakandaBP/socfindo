<?php 	
try {
	
	if ($page[1] != ""){

?>

<form id="add-mplant">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Germination Prepare for ID Embryo : [ <span style=""><?php echo $page[1];?> ]</span>
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 25% 0 25%; padding-bottom: 2%;">
				<div class="row">
					<div class="col-md-12">
						<fieldset>
							<legend>Germination Data</legend>
							<div class="row">
								<div class="col-sm-6">
									<h6>Germination Date *</h6>
									<div class="input-group">
										<div class="form-line">
											<input type="date" class="form-control" required id="germdate" value="<?= $now; ?>" max="<?= $now ?>">
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<h6>Germination Worker *</h6>
									<div class="input-group">
										<div class="form-line">
											<select class="form-control useselect2" id="worker">
												<option value="" disabled selected="">--Select-Worker--</option>
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
											<input type="text" hidden id="idworker">
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-6">
									<h6>Shoot *</h6>
									<div class="input-group">
										<div class="form-line">
											<select class="form-control" id="shoot">
												<option value="No">No</option>
												<option value="Yes">Yes</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<h6>Germinated *</h6>
									<div class="input-group">
										<div class="form-line">
											<select class="form-control" id="germinated">
												<option value="SE">Somatic Embryo</option>
												<option value="ZE">Zygotic Embryo</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<h6>Comment </h6>
									<div class="input-group">
										<div class="form-line">
											<textarea id="comment" class="form-control"></textarea>
										</div>
									</div>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
				<div class="text-center" style="padding-bottom: 30px">
					<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
					<a href="<?php echo $tckaret;?>/germination-prepare" class="btn btn-danger btn-sm">Cancel</a>
				</div>
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
<?php 	
try {
	// $media = new Database("SELECT * FROM karet_media WHERE id = ?",array($page[1]));

	// foreach ($media::$result as $key => $value) {
	if ($page[1] != ""){

?>

<form id="add-mplant">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Transfer to Motherplant for ID Embryo : [ <span style=""><?php echo $page[1];?> ]</span>
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 20% 0 20%; padding-bottom: 2%;">
				<div class="row">
					<div class="col-md-12">
						<fieldset>
							<legend>Transfer Data</legend>
							<div class="row">
								<div class="col-sm-6">
									<h6>Transfer Date *</h6>
									<div class="input-group">
										<div class="form-line">
											<input type="date" class="form-control" required id="transdate" value="<?= $now; ?>" max="<?= $now ?>">
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-sm-3 form-control-label">
										<label>SE :*</label>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<div class="form-line">
												<input type="text" name="se" class="form-control" value="" id="se" required>
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-sm-3 form-control-label">
										<label>Deactivated:</label>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<div class="">
												<input type="checkbox" name="" class="form-control" value="" id="deactive">
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<h6>Leaf Sample for Identification * </h6>
									<div class="input-group">
										<div class="form-line">
											<input type="text" class="form-control" required id="leafsample" value="">
										</div>
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-sm-12">
									<h6>Result of Identification *</h6>
									<div class="input-group">
										<div class="form-line">
											<input type="text" class="form-control" required id="resultofident" value="">
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="row">
								<div class="col-sm-6">
									<h6>Comment *</h6>
									<div class="input-group">
										<div class="form-line">
											<textarea id="transcomment" class="form-control"></textarea>
										</div>
									</div>
								</div>
							</div> -->
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
	// else {
	// 	header('Location :  ' . $tckaret . '/initiation');
	// }

	//}
} 
catch (PDOException $e){
    echo $e->getMessage();
}

?>
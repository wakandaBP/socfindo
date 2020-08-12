<?php 	
try {
	// $media = new Database("SELECT * FROM karet_media WHERE id = ?",array($page[1]));

	// foreach ($media::$result as $key => $value) {
	if ($page[1] != ""){

?>

<form id="add-mat2">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Transfer to Maturation II for ID Embryo : [ <span style=""><?php echo $page[1];?> ]</span>
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 15% 0 15%; padding-bottom: 2%;">
				<fieldset>
					<div class="row">
						<div class="col-sm-6">
							<h6>Transfer Date for Maturation II *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" required id="mat2transdate" value="<?= $now; ?>" max="<?= $now ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Transfer Worker *</h6>
							<div class="">
								<div class="form-line">
									<select class="form-control useselect2" id="mat2worker">
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
									<input type="text" hidden id="idmat2worker">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-4">
							<h6>No. Box *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control numberonly" required id="nobox" value="">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Culture Room * </h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" required id="cultureroom" value="">
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
				</fieldset>
				<fieldset>
					<div class="row clearfix">
		                <div class="col-sm-5" id="media-field"> 
		                	<h6>Choose Media: *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control useselect2" id="media">
											<option value="" disabled selected>--Choose-Initiation-Medium--</option>
											<?php 
												$media = new Database("SELECT * FROM karet_media WHERE id_jenis_media = ? AND isactive = ?",array("4","1"));

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
							<h6>Available Media : <span></span></h6>
							<div class="input-group"> 
								<div class="form-line">
									<input type="text" readonly class="form-control numberonly" id="available-media" value="">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
		                	<h6>Media Amount : *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" readonly class="form-control numberonly" id="amountmedia" value="1">
								</div>
							</div>
		                </div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Comment </h6>
							<div class="input-group">
								<div class="form-line">
									<textarea class="form-control" id="comment"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/maturation1" class="btn btn-danger btn-sm">Cancel</a>
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
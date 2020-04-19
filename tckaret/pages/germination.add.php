<?php 	
try {
	// $media = new Database("SELECT * FROM karet_media WHERE id = ?",array($page[1]));

	// foreach ($media::$result as $key => $value) {
	if ($page[1] != ""){

?>

<form id="add-germ">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Transfer to Germination for ID Embryo : [ <span style=""><?php echo $page[1];?> ]</span>
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 5% 0 5%; padding-bottom: 2%;">
				<div class="row">
					<div class="col-md-6">
						<fieldset>
							<legend>Transfer Data</legend>
							<div class="row">
								<div class="col-sm-6">
									<h6>Transfer Date for Germination *</h6>
									<div class="input-group">
										<div class="form-line">
											<input type="date" class="form-control" required id="transdate" value="<?= $now; ?>" max="<?= $now ?>">
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<h6>Transfer Worker *</h6>
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
									<div class="input-group">
										<div class="form-line">
											<select class="form-control useselect2" id="laminar">
												<option value="" disabled selected>--Select-Laminar--</option>
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
					<div class="col-md-6">
						<fieldset>
							<legend>Embryo</legend>
							<div class="row">
								<div class="col-sm-6">
									<h6>Connected to Other Embryo *</h6>
									<div class="input-group">
										<div class="form-line">
											<select id="connect-to-other" class="form-control">
												<option value="No">No</option>
												<option value="Yes">Yes</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<h6>Size of Embryo *</h6>
									<div class="input-group">
										<div class="form-line">
											<select class="form-control" id="sizeofembryo">
												<option value="S">S</option>
												<option value="M">M</option>
												<option value="L">L</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-sm-6">
									<h6>Shape of Embryo *</h6>
									<div class="input-group">
										<div class="form-line">
											<select class="form-control useselect2" id="shapeofembryo">
												<option value="" selected="">--Select-Shape--</option>
												<?php 
													foreach ($shape_embryo as $key => $value) {
												?>
													<option value="<?= $value ?>"><?= $value ?></option>
												<?php
													}
												?>
											</select>
											<input type="text" id="select-shapeofembryo" hidden>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<h6>Comment  </h6>
									<div class="input-group">
										<div class="form-line">
											<textarea class="form-control" id="comment_embryo"></textarea>
										</div>
									</div>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<fieldset>
							<legend>Callus under Embryo</legend>
							<div class="row clearfix">
								<div class="col-sm-6">
									<h6>Type of Callus *</h6>
									<div class="input-group">
										<div class="form-line">
											<select class="form-control" id="typeofcallus">
												<option value="Loose">Loose</option>
												<option value="Compact">Compact</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<h6>Colour of Callus *</h6>
									<div class="input-group">
										<div class="form-line">
											<select class="form-control" id="colorofcallus">
												<option value="Yellow">Yellow</option>
												<option value="Brown">Brown</option>
												<option value="White">White</option>
												<option value="Orange">Orange</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<h6>Comment </h6>
								<div class="input-group">
									<div class="form-line">
										<textarea class="form-control" id="calluscomment"></textarea>
									</div>
								</div>
							</div>
						</fieldset>
					</div>
					<div class="col-md-6">
						<fieldset>
							<legend>Media</legend>
							<div class="row clearfix">
								<div class="col-sm-6">
				                	<h6>Media Amount : *</h6>
									<div class="input-group">
										<div class="form-line">
											<input type="text" readonly class="form-control numberonly" id="amountmedia" value="1">
										</div>
									</div>
				                </div>
				                <div class="col-sm-6" id="media-field"> 
				                	<h6>Choose Media : *</h6>
									<div class="input-group">
										<div class="form-line">
											<select class="form-control useselect2" id="media">
													<option value="" disabled selected>--Choose-Initiation-Medium--</option>
													<?php 
														$media = new Database("SELECT * FROM karet_media WHERE id_jenis_media = ? AND isactive = ?",array("5","1"));

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
							</div>
						</fieldset>
					</div>
				</div>
				<div class="text-center" style="padding-bottom: 30px">
					<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
					<a href="<?php echo $tckaret;?>/germination" class="btn btn-danger btn-sm">Cancel</a>
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
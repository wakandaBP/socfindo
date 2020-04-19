
<form id="choose-initiation">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Select ID Reception
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 15% 0 15%; padding-bottom: 2%;">
				<div>
					<fieldset>
						<!-- <legend>Select ID Reception</legend> -->
						<div class="row clearfix">
							<div class="col-sm-12">
								<h6>ID Reception *</h6>
								<div class="input-group">
									<div class="form-line">
										<select id="idreception" class="form-control useselect2">
											<option value="">--Select-ID-Reception-/-Reception-Date--</option>
											<?php 
												$IDRecep = new Database("SELECT id,receiptdate FROM karet_reception WHERE isactive = ?",array("1"));

												foreach ($IDRecep::$result as $key => $value) {
													$date = DateToIndo($value['receiptdate']);
											?>
												<option value="<?php echo $value['id']?>"><?php echo $value['id'] . " &nbsp; - &nbsp; " . $date;?></option>
											<?php 
												}

											?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="text-center" style="padding-bottom: 30px">
							<a id="url" class="btn btn-primary btn-sm" id="btnSelect">Select</a>
							<a href="<?php echo $tckaret;?>/initiation" class="btn btn-danger btn-sm">Back</a>
						</div>
					</fieldset>
				</div>
			</div>	
		</div>
	</div>
</form>
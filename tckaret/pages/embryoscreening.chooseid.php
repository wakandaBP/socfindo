
<form id="choose-initiation">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Select ID Treatment for Embryo Screening
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
										<select id="treatment" class="form-control useselect2">
											<option value="">--ID-Treatment-/-Transfer-Date--</option>
											<?php 
												$IDTreat = new Database("SELECT id_treatment, transferdate FROM karet_initiation_trans WHERE isactive = ?",array("1"));

												foreach ($IDTreat::$result as $key => $value) {
													$date = DateToIndo($value['transferdate']);
											?>
												<option value="<?php echo $value['id_treatment']?>"><?php echo $value['id_treatment'] . " &nbsp; - &nbsp; " . $date;?></option>
											<?php 
												}

											?>
										</select>
										<input type="text" hidden id="idtreatment">
									</div>
								</div>
							</div>
						</div>
						<div class="text-center" style="padding-bottom: 30px">
							<a id="url" class="btn btn-primary btn-sm" id="btnSelect">Select</a>
							<a href="<?php echo $tckaret;?>/embryoscreening" class="btn btn-danger btn-sm">Cancel</a>
						</div>
					</fieldset>
				</div>
			</div>	
		</div>
	</div>
</form>
<form id="add-obscallus">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Select ID Treatment
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 15% 0 15%; padding-bottom: 2%;">
				<div>
					<fieldset>
						<!-- <legend>Select ID Reception</legend> -->
						<div class="row clearfix">
							<div class="col-sm-12">
								<h6>ID Treatment *</h6>
								<div class="input-group">
									<div class="form-line">
										<select id="idtreatment" class="form-control useselect2">
											<option value="">--ID-Treatment-/-Initiation-Date--</option>
											<?php 
													

												$IDInit = new Database("SELECT a.id_treatment, a.initiation_date FROM karet_initiation a
													WHERE a.isactive = ?",array("1"));

												foreach ($IDInit::$result as $key => $value) {
											?>
												<option value="<?php echo $value['id_treatment']?>"><?php echo $value['id_treatment'] . " / " . $value["initiation_date"]?> </option>
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
						</div>
					</fieldset>
				</div>
			</div>	
		</div>
	</div>
</form>
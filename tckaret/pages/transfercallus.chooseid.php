<form id="add-transfercallus">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Select ID Treatment for Transfer Callus
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 15% 0 15%; padding-bottom: 2%;">
				<div>
					<fieldset>
						<!-- <legend>Select ID Treatment</legend> -->
						<div class="row clearfix">
							<div class="col-sm-12">
								<h6>ID Treatment *</h6>
								<div class="input-group">
									<div class="form-line">
										<select id="idtreatment" class="form-control useselect2">
											<option selected disabled value="">--ID-Treatment-/-Observation-Date--</option>
											<?php 
												
												$IDTreat = new Database("SELECT a.id_treatment, a.obsdate FROM karet_obscallus a
													WHERE a.isactive = ?",array("1"));

												foreach ($IDTreat::$result as $key => $value) {
											?>
												<option value="<?php echo $value['id_treatment']?>"><?php echo $value['id_treatment'] . " / " . DateToIndo($value["obsdate"]);?> </option>
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
							<a href="<?php echo $tckaret;?>/transfercallus" class="btn btn-danger btn-sm">Back</a>
						</div>
					</fieldset>
				</div>
			</div>	
		</div>
	</div>
</form>
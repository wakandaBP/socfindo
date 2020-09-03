
<form>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Add Plantation
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 15% 0 15%";>
				<fieldset>
					<legend>Data</legend>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Name *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="name">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Region *</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="region" class="form-control useselect2" required>
										<option value="">Choose Region</option>
										<?php 
											$region = new Database("SELECT id, name FROM karet_plantation_region
														WHERE isactive = ?",array(1));

											foreach ($region::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-12">
							<h6 style="padding-bottom: 2px">Description</h6>
							<div class="input-group">
								<div class="form-line">
									<textarea class="form-control" id="description"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/plantation" class="btn btn-danger btn-sm">Cancel</a>
					</div>
				</fieldset>
			</div>
		</div>
	</div>
</form>
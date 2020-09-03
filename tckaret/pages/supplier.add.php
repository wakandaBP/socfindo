
<form>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Add Supplier
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 15% 0 15%";>
				<fieldset>
					<legend>Data</legend>
					<div class="row clearfix">
						<div class="col-sm-12">
							<h6>Supplier Name *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="name">
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/supplier" class="btn btn-danger btn-sm">Cancel</a>
					</div>
				</fieldset>
			</div>
		</div>
	</div>
</form>
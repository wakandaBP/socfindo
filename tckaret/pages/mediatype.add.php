<form>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Add Media Type
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 15% 0 15%; padding-bottom: 2%;">
				<fieldset>
					<legend>Data</legend>
					<div class="row">
						<div class="col-sm-6">
							<h6>Media Type *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" required id="type">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6 style="padding-bottom: 2px">Description</h6>
							<div class="input-group">
								<div class="form-line">
									<textarea class="form-control" id="keterangan"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 2%">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/mediatype" class="btn btn-danger btn-sm">Batal</a>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
</form>
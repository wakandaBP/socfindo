<form>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Add Media
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 15% 0 15%; padding-bottom: 2%;">
				<fieldset>
					<legend>Data</legend>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Media Code *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" required id="mediacode">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Media Type *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control" id="media">
										<?php 
											$type = new Database("SELECT * FROM karet_media_type WHERE isactive = ?",array(1));

											foreach ($type::$result as $key => $items) {
										?>		
											<option value="<?= $items['id']?>"><?= $items['nama_jenis'] ?></option>
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
					<div class="text-center" style="padding-bottom: 2%">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/media" class="btn btn-danger btn-sm">Batal</a>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
</form>
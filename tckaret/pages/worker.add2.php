<form id="tambah-worker">	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Add Worker for Rubber Tissue Culture
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 5% 0 5%";>
				<fieldset>
					<legend>Data</legend>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Employee Code *</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="listpegawai" class="form-control useselect2">	
										<?php 
											$Worker = new Database("SELECT * FROM master_pegawai WHERE statusHapus = ?",array('N'));

											foreach ($Worker::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['kode_employee'] . " - " . $value['nama'];?></option>
										<?php
											}
										?>
									</select>
									<input hidden type="text" id="idpegawai">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Initial *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="initial">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6 style="padding-bottom: 2px">Description</h6>
							<div class="input-group">
								<div class="form-line">
									<textarea class="form-control" id="description"></textarea>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Status *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="status">
								</div>
							</div>	
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						&nbsp;&nbsp;<a href="<?php echo $tckaret;?>/worker" class="btn btn-danger btn-sm">Cancel</a>
					</div>
				</fieldset>
			</div>
		</div>	
	</div>
</form>
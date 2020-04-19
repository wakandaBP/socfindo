<?php 	
try {
	$worker = new Database("SELECT * FROM karet_worker WHERE id = ?",array($page[1]));

	//print_r($worker::$result);

	foreach ($worker::$result as $key => $data) {
		
?>

<form id="edit-worker">	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Edit Worker for Rubber Tissue Culture
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 5% 2% 5%";>
				<fieldset>
					<legend>Data</legend>
					<div class="row clearfix">
						<div class="col-sm-3">
							<h6>Employee Code *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" id="kode" class="form-control" value="<?= $data['kode_employee']; ?>">
								</div>
							</div>
							<div id="error-kode"></div>
						</div>
						<div class="col-sm-6">
							<h6>Name *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="name" value="<?= $data['name'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Initial *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="initial" value="<?= $data['initial'] ?>">
								</div>
							</div>
							<div id="error-initial"></div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6 style="padding-bottom: 2px">Description</h6>
							<div class="input-group">
								<div class="form-line">
									<textarea class="form-control" id="description"><?= $data['description'] ?></textarea>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Status *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="status" value="<?= $data['status'] ?>">
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

<?php 

	}
} 
catch (PDOException $e){
    echo $e->getMessage();
}

?>
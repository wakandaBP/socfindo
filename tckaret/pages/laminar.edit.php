<?php 	
try {
	$laminar = new Database("SELECT * FROM karet_laminar WHERE id = ?",array($page[1]));

	foreach ($laminar::$result as $key => $value) {
?>

<form>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Laminar Edit
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 15% 3% 15%";>
				<fieldset>
					<legend>Data</legend>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>No Laminar *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" required class="form-control" id="nolaminar" value="<?php echo $value['nolaminar']?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Cleaning Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" required id="cleaningdate" value="<?php echo $value['cleaningdate']; ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6 style="padding-bottom: 2px">Description</h6>
							<div class="input-group">
								<div class="form-line">
									<textarea class="form-control" id="description"><?php echo $value['description']; ?></textarea>
								</div>
							</div>
						</div>	
						<div class="col-sm-6">
							<h6>Date to Clean *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" required class="form-control" id="datetoclean" value="<?php echo $value['datetoclean']; ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 2%">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/laminar" class="btn btn-danger btn-sm">Cancel</a>
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
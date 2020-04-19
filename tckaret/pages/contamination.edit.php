<?php 	
try {
	$contamination = new Database("SELECT * FROM karet_contamination WHERE id = ?",array($page[1]));

	foreach ($contamination::$result as $key => $value) {
?>

<form id="edit-contamination">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Edit Contamination
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 30% 3% 30%";>
				<fieldset>
					<legend>Data</legend>
					<div class="row clearfix">
						<div class="col-sm-12">
							<h6>Species *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="species" value="<?php echo $value['species']; ?>">
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="row clearfix">
						<div class="col-sm-12">
							<h5>Description</h5>
							<div class="input-group">
								<div>
									<textarea class="input-group" id="description"></textarea>
								</div>
							</div>
						</div>
					</div> -->
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						&nbsp;&nbsp;<a href="<?php echo $tckaret;?>/contamination" class="btn btn-danger btn-sm">Cancel</a>
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
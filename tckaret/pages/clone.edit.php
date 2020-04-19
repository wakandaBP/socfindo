<?php 	
try {
	$clone= new Database("SELECT * FROM karet_clone WHERE id = ?",array($page[1]));

	foreach ($clone::$result as $key => $value) {
?>

<form>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Edit Clone
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 15% 2% 15%";>
				<fieldset>
					<legend>Data</legend>
					<div class="row clearfix">
						<div class="col-sm-12">
							<h6>Clone Name *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" required id="clonename" value="<?php echo $value['clonename']; ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-12">
							<h6 style="padding-bottom: 2px">Description</h6>
							<div class="input-group">
								<div class="form-line">
									<textarea class="form-control" id="description"><?php echo $value["description"]?></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/clone" class="btn btn-danger btn-sm">Cancel</a>
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
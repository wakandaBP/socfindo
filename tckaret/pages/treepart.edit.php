<?php 	
try {
	$treepart = new Database("SELECT * FROM karet_treepart WHERE id = ?",array($page[1]));

	foreach ($treepart::$result as $key => $value) {
?>

<form>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h1 style="font-size: 12pt; padding-bottom: 5px" >
					Treepart Edit
				</h1>
			</div>
			<div class="body" id="form-data" style="padding: 2% 15% 2% 15%";>
				<fieldset>
					<legend>Data</legend>
					<div class="row clearfix">
						<div class="col-sm-12">
							<h5>Treepart Name *</h5>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="partname" value="<?php echo $value['partname'];?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-12">
							<h5 style="padding-bottom: 2px">Description</h5>
							<div class="input-group">
								<div class="form-line">
									<textarea class="form-control" id="description"><?php echo $value['description'];?></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan" />
						<a href="<?php echo $tckaret; ?>/treepart" class="btn btn-danger btn-sm">Cancel</a>
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
<?php 
try {
	$plantation_field = new Database("SELECT
		id
		,unique_code
		,panel
		,planting_date
		,qty_planted
		,qty_stands_at_planting
		,qty_stands_after_1_celcius
		,scan_date
		,motherplant_id
		,created_at
		,updated_at
		,deleted_at
		
		FROM karet_exvitro_plantation_field
		WHERE deleted_at IS NULL AND id = ?",array($page[1]));

	$PFData = $plantation_field::$result[0];

	$get_mother = new Database("SELECT code_se FROM karet_motherplant WHERE id = ?", array($PFData['motherplant_id']));
	$motherplant = $get_mother::$result[0]['code_se'];
	
?>

<form id="plantation-field-edit">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Modify Plantation Field
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 5% 2% 5%";>
				<fieldset>
					<legend>Data</legend>
					<div class="row clearfix">
						<div class="col-sm-6">
							<h6>Unique Code</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" disabled name="unique_code" id="unicue_code"  value="<?= $PFData['unique_code'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Motherplant</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" disabled name="motherplant" id="motherplant"  value="<?= $motherplant ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Panel *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control useselect2" id="panel" required>
										<option value="">Choose Panel</option>
										<?php
											$query = new Database("
												SELECT
													a.id, a.idblock,
													a.panelname,
													a.description,
													b.blocknumber,
													b.description,
													c.name as plantation_name,
													d.name as region_name
													FROM karet_plantation_panel a
													JOIN
													karet_plantation_block b ON a.idblock = b.id
													JOIN
													karet_plantation c ON b.idplantation = c.id
													JOIN
													karet_plantation_region d ON c.region = d.id
												WHERE c.isactive = ?",array("1"));

											foreach ($query::$result as $key => $value) {
										?>
										<option <?php echo ($value['id'] == $PFData['panel']) ? "selected=\"selected\"":""; ?> value="<?php echo $value['id']; ?>"><?php echo $value['panelname']; ?> - <?php echo $value['blocknumber']; ?> - <?php echo $value['plantation_name']; ?> - <?php echo $value['region_name']; ?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Planting Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" id="planting_date" value="<?php echo $PFData['planting_date'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Quantity Planted *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" required id="quantity_planted" value="<?php echo $PFData['qty_planted'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Quantity Stands At Planting</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" id="quantity_stands_planting" value="<?php echo intval($PFData['qty_stands_at_planting']) ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Quantity Stands After 1st Cencus</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" id="quantity_stands_1st_celcius" value="<?php echo intval($PFData['qty_stands_after_1_celcius']) ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Scan Date</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" id="scan_date" value="<?php echo $PFData['scan_date'] ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/plantation_field" class="btn btn-danger btn-sm">Cancel</a>
					</div>
				</div>
			</fieldset>
		</div>
	</div>
</form>

<?php 
} 
catch (PDOException $e){
    echo $e->getMessage();
}
?>
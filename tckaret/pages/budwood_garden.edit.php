<?php 
try {
	$budwood = new Database("SELECT 
		[id]
		,[unique_code]
		,[block]
		,[planting_date]
		,[qty_planted]
		,[qty_stands]
		,[qty_rejected]
		,[motherplant_id]
		,[created_at]
		,[updated_at]
		,[deleted_at]
		FROM karet_exvitro_budwood_garden
		WHERE id = ? AND deleted_at IS NULL"
		, array($page[1])
	);

	$data = $budwood::$result[0];

	$get_mother = new Database("SELECT code_se FROM karet_motherplant WHERE id = ?", array($data['motherplant_id']));
	$motherplant = $get_mother::$result[0]['code_se'];

	$get_block = new Database("SELECT blocknumber FROM karet_plantation_block WHERE id = ?",array($data['block']));
	$block = $get_block::$result[0]["blocknumber"];

?>

<form id="edit-budwood">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Modify Budwood Garden
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
									<input type="text" class="form-control" disabled name="unique_code" id="unique_code" value="<?= $data['unique_code'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Motherplant</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" disabled name="motherplant" id="motherplant" value="<?= $motherplant ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Block *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control useselect2" id="block" required>
										<option value="">Choose Block</option>
										<?php 
											$block = new Database("SELECT a.id, a.blocknumber, b.name as plantation, 
														c.name as region FROM karet_plantation_block a 
														JOIN karet_plantation b ON b.id = a.idplantation
														JOIN karet_plantation_region c ON c.id = b.region
														WHERE a.isactive = ?", array(1));

												foreach ($block::$result as $key => $value) {
												$select = "";
												if ($value['id'] == $data['block']){
													$select = "selected"; 
												}
										?>
											<option value="<?php echo $value['id'];?>" <?= $select ?>><?php echo $value['blocknumber'];?> ;  <?= $value['plantation'] ?> ;  <?= $value['region'] ?></option>
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
									<input type="date" class="form-control" id="planting_date" value="<?= $data['planting_date'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Quantity Planted *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" required id="quantity_planted" value="<?= $data['qty_planted'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Quantity Stands</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" id="quantity_stands" value="<?= $data['qty_stands'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Quantity Rejected</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" id="quantity_rejected" value="<?= $data['qty_rejected'] ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/budwood_garden" class="btn btn-danger btn-sm">Cancel</a>
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
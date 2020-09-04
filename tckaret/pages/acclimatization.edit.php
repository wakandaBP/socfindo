<?php 
try {
	
	$acc = new Database("SELECT 
		[id]
		,[unique_code]
		,[deactivated]
		,[plantation]
		,[country_arrival_date]
		,[supplier]
		,[date_of_shipment]
		,[plantation_arrival_date]
		,[start_date]
		,[green_house_number]
		,[qty_received]
		,[qty_rejected]
		,[qty_at_end]
		,[dead_plant]
		,[motherplant_id]
		FROM karet_acclimatization 
		WHERE id = ? AND deleted_at IS NULL", array($page[1]));

	$data = $acc::$result[0];

	$get_mother = new Database("SELECT code_se FROM karet_motherplant WHERE id = ?", array($data['motherplant_id']));
	$motherplant = $get_mother::$result[0]['code_se'];
?>

<form id="edit-acclimatization">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Modify Acclimatization
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 5% 2% 5%";>
				<fieldset>
					<legend>Data</legend>
					<div class="row clearfix">
						<div class="col-sm-4">
							<h6>Unique Code</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" disabled name="unique_code" id="unique_code" value="<?= $data['unique_code'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Motherplant</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" disabled name="motherplant" id="motherplant" value="<?= $motherplant ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Country Arrival Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" required id="country_arrival_date" value="<?= $data['country_arrival_date'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Supplier *</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="supplier" class="form-control useselect2" >
										<option value="">Choose Supplier</option>
										<?php 
											$supplier = new Database("SELECT id, name FROM karet_supplier
														WHERE isactive = ?",array(1));

											foreach ($supplier::$result as $key => $value) {
												$select = "";
												if ($value['id'] == $data['supplier']){
													$select = "selected"; 
												}
										?>
											<option value="<?php echo $value['id'];?>" <?= $select ?> ><?php echo $value['name'];?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Date of Shipment *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" required id="date_of_shipment" value="<?= $data['date_of_shipment'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Plantation Arrival Date</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" id="plantation_arrival_date" value="<?= $data['plantation_arrival_date'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Start Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" id="start_date" value="<?= $data['start_date'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Green House Number *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" required id="green_house_number" value="<?= $data['green_house_number'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Quantity Received *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" required id="quantity_received" value="<?= ($data['qty_received'] == NULL) ? 0 : $data['qty_received'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Quantity Rejected *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" required id="quantity_rejected" value="<?= ($data['qty_rejected'] == NULL) ? 0 : $data['qty_rejected'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Quantity At End </h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" id="quantity_at_end" value="<?= ($data['qty_at_end'] == NULL) ? 0 : $data['qty_at_end'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Dead Plant </h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="dead_plant" value="<?= $data['dead_plant'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-3" style="text-align: center;">
							<h6>Deactivated</h6>
							<div class="input-group">
								<div class="" style="">
									<input <?php echo ("TRUE" == $data['deactivated']) ? 'checked' : ''; ?> type="checkbox" class="form-control parent_form" id="deactivated">
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/acclimatization" class="btn btn-danger btn-sm">Cancel</a>
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
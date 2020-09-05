<?php 
try {
	$cuttings = new Database("SELECT 
		[id]
		,[unique_code]
		,[deactivated]
		,[site]
		,[date_stock]
		,[qty]
		,[qty_remaining]
		,[table_number]
		,[motherplant_id]
		,[created_at]
		,[updated_at]
		,[deleted_at]
		,[end_date]
		,[start_date]
		FROM [TCKARET].[dbo].[karet_exvitro_stock_cutting]
		WHERE id = ?"
		, array($page[1])
	);

	$data = $cuttings::$result[0];
	
	$get_motherembryo = new Database("SELECT code_se FROM karet_motherplant WHERE id = ?",array($data['motherplant_id']));
	$mother_embryo = $get_motherembryo::$result[0]["code_se"];
?>

<form id="edit-stock-cuttings">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Modify Stock For Cuttings
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
									<input type="text" class="form-control" disabled name="motherplant" id="motherplant" value="<?= $mother_embryo ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Date Stock *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" required class="form-control" id="date_stock" value="<?= $data['date_stock'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Plantation *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control useselect2" id="plantation" required>
										<option value="">Choose Plantation</option>
										<?php 
											$plantation = new Database("SELECT a.id, a.name as plantation, 
														c.name as region FROM karet_plantation a 
														JOIN karet_plantation_region c ON c.id = a.region
														WHERE a.isactive = ?", array(1));

											foreach ($plantation::$result as $key => $value) {
												$select = "";
												if ($data['site'] == $value['id']){
													$select = "selected"; 
												}
										?>
											<option value="<?= $value['id']?>" <?= $select ?> > <?= $value['plantation'] ?> ;  <?= $value['region'] ?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Quantity</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" id="quantity" value="<?= $data['qty'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Table Number</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="table_number" value="<?= $data['table_number'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6>Deactivated</h6>
							<div class="input-group">
								<div class="" style="margin-left: -40%;">
									<input <?php echo ("TRUE" == $data['deactivated']) ? 'checked' : ''; ?> type="checkbox" class="form-control" id="deactivated">
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/stock_cuttings" class="btn btn-danger btn-sm">Cancel</a>
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
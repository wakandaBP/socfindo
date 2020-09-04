<?php 
try {
	$hardening = new Database("SELECT [id]
	    ,[unique_code]
		,[qty_at_start]
		,[start_date]
		,[deactivated]
		,[motherplant_id]
		,[created_at]
		,[updated_at]
		,[deleted_at]
		,[end_date]
		,[qty_remaining]
		,[qty_at_end]
		FROM karet_exvitro_hardening 
		WHERE deleted_at IS NULL AND id = ?",array($page[1]));

	$hardeningData = $hardening::$result[0];

	$get_mother = new Database("SELECT code_se FROM karet_motherplant WHERE id = ?", array($hardeningData['motherplant_id']));
	$motherplant = $get_mother::$result[0]['code_se'];

?>

<form id="edit-hardening">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Modify Hardening
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
									<input type="text" class="form-control" disabled name="unique_code" id="unicue_code" value="<?= $hardeningData['unique_code'] ?>">
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
							<h6>Quantity At Start *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" required id="quantity_at_start" value="<?= $hardeningData['qty_at_start'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Start Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" id="start_date" value="<?= $hardeningData['start_date'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Quantity At End </h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" id="quantity_at_end" value="<?= $hardeningData['quantity_at_end'] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6>Deactivated</h6>
							<div class="input-group">
								<div class="" style="margin-left: -40%;">
									<input <?php echo ("TRUE" == $invitroData['deactivated']) ? 'checked' : ''; ?> type="checkbox" class="form-control parent_form" id="deactivated">
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/hardening" class="btn btn-danger btn-sm">Cancel</a>
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
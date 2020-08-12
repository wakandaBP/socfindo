<?php 
try {
	
?>

<form id="nursery-edit">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Modify Rooting Green House
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
									<input type="text" class="form-control" disabled name="unique_code" id="unicue_code" value="">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Motherplant</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" disabled name="motherplant" id="motherplant" value="">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Starting Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" id="start_date">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Quantity At Start *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" required id="quantity_at_start" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Quantity At End *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" required id="quantity_at_end" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6>Deactivated</h6>
							<div class="input-group">
								<div class="" style="margin-left: -40%;">
									<input <?php //echo ("TRUE" == $invitroData['deactivated']) ? 'checked' : ''; ?> type="checkbox" class="form-control" id="deactivated">
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/nursery" class="btn btn-danger btn-sm">Cancel</a>
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
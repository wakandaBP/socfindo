<?php 
try {
	
?>

<form id="plantation-field-edit">
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
							<h6>Date Stock *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" id="date_stock">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Plantation *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control useselect2" id="plantation" required>
										<option value="">Choose Panel</option>
										
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Quantity</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" id="quantity" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Table Number</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="table_number" value="0">
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
<?php 
try {
	
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
									<input type="text" class="form-control" disabled name="unique_code" id="unicue_code" value="">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<h6>Motherplant</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" disabled name="motherplant" id="motherplant" value="">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Panel *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control useselect2" id="panel" required>
										<option value="">Choose Panel</option>
										
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Planting Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" id="planting_date">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Quantity Planted *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" required id="quantity_planted" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Quantity Stands At Planting</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" id="quantity_stands_planting" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Quantity Stands After 1st Cencus</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" id="quantity_stands_1st_cencus" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Scan Date</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" id="scan_date">
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
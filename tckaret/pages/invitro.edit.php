<?php 
try {
	$invitro = new Database("SELECT [id]
						      ,[unique_code]
						      ,[deactivated]
						      ,[start_date]
						      ,[medium]
						      ,[recipient]
						      ,[number_of_plants]
						      ,[number_of_alive]
						      ,[number_of_dead]
						      ,[number_of_contaminated]
						      ,[new_shoots_for_r]
						      ,[new_shoots_on_m]
						      ,[laminar_flow]
						      ,[end_date]
						      ,[worker]
						      ,[created_at]
						      ,[updated_at]
						      ,[deleted_at] 
						      FROM karet_invitro WHERE id = ? AND deleted_at IS NULL",array($page[1]));

	$invitroData = $invitro::$result[0];

	/*$get_parent_child = new Database("SELECT parent, child, parent_option FROM karet_invitro_parent_child WHERE child = ?", array($invitroData['id']));*/

	$get_mother = new Database("SELECT code_se FROM karet_motherplant WHERE id = ?", array($data['motherplant_id']));
	$motherplant = $get_mother::$result[0]['code_se'];
/*
	if ($get_parent_child::$result[0]['parent_option'] == "motherplant") {
		$get_motherembryo = new Database("SELECT a.parent, b.code_se FROM karet_invitro_parent_child a JOIN karet_motherplant b ON a.parent = b.id WHERE a.child = ?",array($invitroData['id']));
		$mother_embryo = $get_motherembryo::$result[0]["code_se"];
	} else {
		$get_parent = new Database("SELECT parent, parent_option FROM karet_invitro_parent_child WHERE child = ?",array($invitroData['id']));
		
		$get_motherembryo = new Database("SELECT a.parent, b.code_se FROM karet_invitro_parent_child a JOIN karet_motherplant b ON a.parent = b.id WHERE a.child = ?",array($get_parent::$result[0]['parent']));
		$mother_embryo = $get_motherembryo::$result[0]["code_se"];
	}*/
?>

<form id="invitro-edit">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Add In Vitro From SE
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
									<input type="text" class="form-control" disabled name="unique_code" id="unicue_code" value="<?= $invitroData[unique_code]; ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Motherplant</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" disabled name="motherplant" id="motherplant" value="<?= $mother_embryo; ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Start Date *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" required id="startdate" value="<?= $invitroData[start_date] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>End Date </h6>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" id="end_date" value="<?= $invitroData[end_date] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Medium *</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="medium" class="form-control useselect2" required>
										<option value="">Choose</option>
										<?php 
											$medium = new Database("SELECT id, mediacode FROM karet_media
														WHERE isactive = ?",array(1));

											foreach ($medium::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>" <?php echo ($value['id'] == $invitroData['medium']) ? 'selected' : ''; ?>><?php echo $value['mediacode'];?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Recipient *</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="recipient" class="form-control useselect2" required>
										<option value="">Choose</option>
										<?php 
											$recipient = new Database("SELECT id, vesselcode FROM karet_vessel
														WHERE isactive = ?",array(1));

											foreach ($recipient::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>" <?php echo ($value['id'] == $invitroData['recipient']) ? 'selected' : ''; ?>><?php echo $value['vesselcode'];?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6>Stock Available:</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" disabled id="stok_available">
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6>Number of Plants *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control" required id="number_of_plants" placeholder="0" value="<?= $invitroData[number_of_plants] ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6>Number of Alive</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly parent_form" id="number_of_alive" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6>Number of Dead</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly parent_form" id="number_of_dead" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6>Contaminated</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly parent_form" id="contaminated" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6>New Shoots for R</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly parent_form" id="new_shoots_for_r" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<h6>New Shoots on M</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly parent_form" id="new_shoots_on_m" value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<h6>Laminar Flow *</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="laminar_flow" class="form-control useselect2" required>
										<option value="">Choose</option>
										<?php 
											$laminar = new Database("SELECT id, nolaminar FROM karet_laminar
														WHERE isactive = ?",array(1));

											foreach ($laminar::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>" <?php echo ($value['id'] == $invitroData['laminar_flow']) ? 'selected' : ''; ?>><?php echo $value['nolaminar'];?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Worker *</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="worker" class="form-control useselect2" required>
										<option value="">Choose</option>
										<?php 
											$worker = new Database("SELECT id, initial FROM karet_worker
														WHERE isactive = ?",array(1));

											foreach ($worker::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>" <?php echo ($value['id'] == $invitroData['worker']) ? 'selected' : ''; ?>><?php echo $value['initial'];?></option>
										<?php
											}
										?>
									</select>
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
						<div class="col-sm-3">
							<h6>Contamination Type</h6>
							<div class="input-group">
								<div class="form-line">
									<select id="contamination_type" class="form-control useselect2">
										<option value="">Choose</option>
										<?php 
											$contamination = new Database("SELECT id, species FROM karet_contamination
														WHERE isactive = ?",array(1));

											foreach ($contamination::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>" <?php echo ($value['id'] == $invitroData['contamination_type']) ? 'selected' : ''; ?>><?php echo $value['species'];?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 30px">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/invitro" class="btn btn-danger btn-sm">Cancel</a>
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
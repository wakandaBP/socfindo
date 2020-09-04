<?php 	
try {
	$tree = new Database("SELECT * FROM karet_tree WHERE id = ?",array($page[1]));

	foreach ($tree::$result as $key => $data) {
?>

<form id="form-tree">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Edit Data Tree
				</h5>
			</div>
			<div class="body" id="form-data" style="padding: 2% 10% 0 10%;padding-bottom: 30px">
				<fieldset>
					<legend>Data</legend>
					<div class="row clearfix">
						<div class="col-sm-4">
							<h6>Num Tree *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="num_tree" value="<?= $data['num_tree'] ?>">
								</div>
							</div>	
						</div>
						<div class="col-sm-4">
							<h6>Tree Code *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="treecode" value="<?php echo $data['treecode'];?>">
								</div>
							</div>	
						</div>
						
						<div class="col-sm-4">
							<h6>Year of Planting *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="yearplanting" value="<?php echo $data['yearofplanting']?>">
								</div>
							</div>	
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-4">
							<h6>Clone *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control useselect2" id="clone">
										<option selected disabled>--Choose-clone--</option>
										<?php 
											$clone = new Database("SELECT * FROM karet_clone WHERE isactive = ?",array("1"));

											foreach ($clone::$result as $key => $value) {
												$select = "";
												if ($data['clonename'] == $value['id']){
													$select = "selected"; 
												}
										?>
												<option value="<?php echo $value['id'];?>" <?php echo $select;?>><?php echo $value['clonename']?></option>
										<?php		

											}
										?>
									</select>
									<input hidden type="text" id="idclone" value="<?php echo $data['clonename'];?>">
								</div>
							</div>	
						</div>
						<div class="col-sm-4">
							<h6>Certified *</h6>
							<?php 
								$yes = "";
								$no = "";
								$null = "";
								$certinumberstats = "disabled";

								if ($data['certified'] == "Yes"){
									$yes = "checked";
									$certinumberstats = "";
								} elseif ($data['certified'] == "No"){
									$no = "checked";
								} else {
									$null ="checked";
								}

							?>
							<input name="certified" type="radio" id="NULL" value="NULL" class="with-gap" onclick="document.getElementById('certinumber').disabled=true" checked="true" <?php echo $null;?> />
	                        <label for="NULL">Not Defined</label> | 
							<input name="certified" type="radio" class="with-gap" id="Yes" value="Yes" onclick="document.getElementById('certinumber').disabled=false" <?php echo $yes;?>/>
	                        <label for="Yes">Yes</label> | 
	                        <input name="certified" type="radio" id="No" value="No" class="with-gap" onclick="document.getElementById('certinumber').disabled=true;" <?php echo $no;?> />
	                        <label for="No">No</label>
						</div>
						<div class="col-sm-4">
							<h6>Certificate Number</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="certinumber" value="<?php if($data['certificatenumber'] > 0 OR $data['certificatenumber'] != NULL){echo $data['certificatenumber'];}?>" <?php echo $certinumberstats; ?>>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-3">
							<h6>Plantation *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control" id="plantation">
										<option value="" selected disabled>--Choose-plantation--</option>
										<?php 
											$plantation = new Database("SELECT * FROM karet_plantation WHERE isactive = ?",array("1"));

											foreach ($plantation::$result as $key => $value) {
												$select = "";
												if ($data['idplantation'] == $value['id']){
													$select = "selected"; 
													$selectedplant = $data['idplantation'];
												}
										?>
												<option value="<?php echo $value['id'];?>" <?php echo $select;?>><?php echo $value['name']?></option>
										<?php		

											}
										?>
									</select>
									<input hidden type="text" id="idplantation" value="<?php echo $data['idplantation'];?>">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Block *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control" id="block">
										<option value="" disabled>--Choose-block--</option>
										<?php 
											$block = new Database("SELECT * FROM karet_plantation_block WHERE idplantation = ? AND isactive = ?",array($data['idplantation'],"1"));

											foreach ($block::$result as $key => $value) {
												$select = "";
												if ($data['block'] == $value['id']){
													$select = "selected"; 
												}
										?>
												<option value="<?php echo $value['id'];?>" <?php echo $select;?>><?php echo $value['name']?></option>
										<?php		

											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Line</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="line" value="<?php echo $data['line'];?>">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>GPS</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="gps" value="<?php echo $data['gps'];?>">
								</div>
							</div>
						</div>
					</div>
					<div class="text-center" style="padding-bottom: 2%">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/tree" class="btn btn-danger btn-sm">Cancel</a>
					</div>
				</div> 
			</fieldset>
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
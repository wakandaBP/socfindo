<?php 
try {
	$reception = new Database("SELECT * FROM karet_reception WHERE id = ?",array($page[1]));

	foreach ($reception::$result as $key => $data) {

?>

<!-- Bootstrap Select Css -->
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
			<div class="header bg-cyan">
				<h5>Edit Reception</h5>
			</div>
			<br>
			<div class="body" id="form-data" style="padding: 1% 15% 0 15%; padding-bottom: 1%;">
				<fieldset>
					<legend>Data</legend>
					<div class="row clearfix">
						<div class="col-sm-6">
							<b>Receipt Date *</b>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" id="receiptdate" required="required" value="<?php echo $data['receiptdate']?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<b>Harvest Date *</b>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" id="harvestdate" required="required" value="<?php echo $data['harvestdate'];?>">
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="row clearfix">
						<div class="col-sm-12">
							<b>Send Date:</b>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" name="nama" required="required">
								</div>
							</div>
						</div>
					</div> -->
					<div class="row clearfix">
						<div class="col-sm-6">
							<b>Clone *</b>
							<div class="">
								<div class="form-line">
									<select id="clone" class="form-control show-tick useselect2">
										<option disabled>--Choose-Clone--</option>
										<?php 
											$clone = new Database("SELECT * FROM karet_clone WHERE isactive = ?",array("1"));

											foreach ($clone::$result as $key => $value) {
												$selected = "";
												if ($data['clone'] == $value['id']){
													$selected = "selected";
												}
										?>
											<option value="<?php echo $value['id'];?>" <?php echo $selected;?> ><?php echo $value['clonename'];?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
							<input hidden type="text" id="idclone" value="<?= $data['clone']; ?>">
						</div>
						<div class="col-sm-6">
							<b>Plantation *</b>
							<div class="">
								<div class="form-line">
									<select id="plantation" class="form-control show-tick useselect2">
										<option disabled selected>--Choose-Plantation--</option>
										<?php 
											$plantation = new Database("SELECT * FROM karet_plantation WHERE isactive = ?",array("1"));

											foreach ($plantation::$result as $key => $value) {
												$selected = "";
												if ($data['plantation'] == $value['id']){
													$selected = "selected";
												}
										?>
											<option value="<?php echo $value['id'];?>" <?php echo $selected;?> ><?php echo $value['name'];?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
								<input hidden type="text" id="idplantation" value="<?php echo $data['plantation']?>">
						</div>	
					</div>
					<div class="row clearfix">
						<div class="col-sm-6">
							<b>Tree Code *</b>
							<div class="">
								<div class="form-line">
									<select id="tree" class="form-control show-tick useselect2">
										<option disabled selected>--Choose-Tree-Code-/-Planting-Year-</option>
										<?php 
											$tree = new Database("SELECT * FROM karet_tree WHERE isactive = ?",array("1"));

											foreach ($tree::$result as $key => $value) {
												$selected = "";
												if ($data['idtree'] == $value['id']){
													$selected = "selected";
												}
										?>
											<option value="<?php echo $value['id'];?>" <?php echo $selected;?> ><?php echo $value['treecode'];?> - <?php echo $value['yearofplanting']?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
							<input hidden type="text" id="idtree" value="<?php echo $data['idtree']?>">
						</div>
						<div class="col-sm-6">
							<b>Tree Part *</b>
							<div class="">
								<div class="form-line">
									<select id="treepart" class="form-control show-tick useselect2">
										<option disabled selected>--Choose-Tree-Part--</option>
										<?php 
											$treepart = new Database("SELECT * FROM karet_treepart WHERE isactive = ?",array("1"));

											foreach ($treepart::$result as $key => $value) {
												$selected = "";
												if ($data['treepart'] == $value['id']){
													$selected = "selected";
												}
										?>
											<option value="<?php echo $value['id'];?>" <?php echo $selected;?> ><?php echo $value['partname'];?></option>
										<?php
											}
										?>
									</select>
								</div>
								<input hidden type="text" id="idtreepart" value="<?php echo $data['treepart']?>">
							</div>
						</div>
					</div>
					<!-- <div class="row clearfix">
						<div class="col-sm-6">
							<b>Block *</b>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="block" required="required" value="<?php// echo $data['block']?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<b>Line </b>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="line" required="required" value="<?php //echo $data['line']?>">
								</div>
							</div>
						</div>
					</div> -->
					<!-- <div class="row clearfix">
						<div class="col-sm-6">
							<h5>Certified:</h5>
							<div class="input-group">
									<input type="checkbox">
							</div>
						</div>
						<div class="col-sm-6">
							<b>Certificate Number:</b>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" name="nama" required="required">
								</div>
							</div>
						</div>
					</div> -->
					<div class="row clearfix">
						<div class="col-sm-6">
							<b>Flower Harvested *</b>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="flowers" required value="<?php echo $data['flowersharvested']?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<b>Fruit Harvested *</b>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="fruits" required value="<?php echo $data['fruitsharvested']?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						
						<div class="col-sm-6">
							<b>Comment </b>
							<div class="input-group">
								<div class="form-line">
									<textarea id="comment" class="form-control"><?php echo $data['comment']?></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer" style="text-align:center;">
						<input type="submit" class="btn btn-primary btn-sm" value="Save" id="btnSimpan"/>
						<a href="<?php echo $tckaret;?>/reception" type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</a>
					</div>
				</fieldset>
			</div> 
		</div>
	</div>
</div>

<?php 

	}
} 
catch (PDOException $e){
    echo $e->getMessage();
}

?>
<!-- Bootstrap Select Css -->
<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
			<div class="header bg-cyan">
				<h5 >Add Reception</h5>
			</div>
			<br>
			<div class="body" id="form-data" style="padding: 1% 15% 0 15%; padding-bottom: 1%;">
				<fieldset>
					<legend>Data</legend>
					<div class="row clearfix">
						<!-- <div class="col-sm-12">
							<b>Estete:</b>
							<select name="" class="form-control show-tick">
							</select>	
						</div>		 -->
						<div class="col-sm-6">
							<b>Receipt Date *</b>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" id="receiptdate" required="required" value="<?= $now ?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<b>Harvest Date *</b>
							<div class="input-group">
								<div class="form-line">
									<input type="date" class="form-control" id="harvestdate" required="required">
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
									<select id="clone" class="form-control show-tick ini-list useselect2">
										<option disabled selected>--Choose-Clone--</option>
										<?php 
											$clone = new Database("SELECT * FROM karet_clone WHERE isactive = ?",array("1"));

											foreach ($clone::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['clonename'];?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
							<input hidden type="text" id="idclone">
						</div>
						<div class="col-sm-6">
							<b>Plantation *</b>
							<div class="">
								<div class="form-line">
									<select id="plantation" class="form-control show-tick ini-list useselect2">
										<option disabled selected>--Choose-Plantation--</option>
										<?php 
											$plantation = new Database("SELECT * FROM karet_plantation WHERE isactive = ?",array("1"));

											foreach ($plantation::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
								<input hidden type="text" id="idplantation">
						</div>	
					</div>
					<div class="row clearfix">
						<div class="col-sm-6">
							<b>Tree Code *</b>
							<div class="">
								<div class="form-line">
									<select id="tree" class="form-control show-tick ini-list useselect2">
										<option disabled selected>--Choose-Tree-Code-/-Planting-Year-</option>
										<?php 
											$tree = new Database("SELECT * FROM karet_tree WHERE isactive = ?",array("1"));

											foreach ($tree::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['treecode'];?> - <?php echo $value['yearofplanting']?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
							<input hidden type="text" id="idtree">
						</div>
						<div class="col-sm-6">
							<b>Tree Part *</b>
							<div class="">
								<div class="form-line">
									<select id="treepart" class="form-control show-tick ini-list">
										<option disabled selected>--Choose-Tree-Part--</option>
										<?php 
											$treepart = new Database("SELECT * FROM karet_treepart WHERE isactive = ?",array("1"));

											foreach ($treepart::$result as $key => $value) {
										?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['partname'];?></option>
										<?php
											}
										?>
									</select>
								</div>
								<input hidden type="text" id="idtreepart">
							</div>
						</div>
					</div>
					<!-- <div class="row clearfix">
						<div class="col-sm-6">
							<b>Block *</b>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="block" required="required">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<b>Line </b>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="line" required="required">
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
									<input type="number" class="form-control numberonly" id="flowers" required value="0">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<b>Fruit Harvested *</b>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="fruits" required value="0">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-6">
							<b>Comment </b>
							<div class="input-group">
								<div class="form-line">
									<textarea id="comment" class="form-control" style=""></textarea>
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
</div>

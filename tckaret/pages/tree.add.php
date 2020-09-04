<form id="form-tree">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style="" >
					Add Tree
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
									<input type="text" class="form-control" id="num_tree">
								</div>
							</div>	
						</div>
						<div class="col-sm-4">
							<h6>Tree Code *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="treecode">
								</div>
							</div>	
						</div>
						
						<div class="col-sm-4">
							<h6>Year of Planting *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="yearplanting">
								</div>
							</div>	
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-4">
							<h6>Clone *</h6>
							<div class="">
								<div class="form-line">
									<select class="form-control useselect2" id="clone" style="
									width: 100%;">
										<option selected disabled>--Choose-clone--</option>
										<?php 
											$clone= new Database("SELECT * FROM karet_clone WHERE isactive = ?",array("1"));

											foreach ($clone::$result as $key => $value) {
										?>
												<option value="<?php echo $value['id']?>"><?php echo $value['clonename']?></option>
										<?php		

											}
										?>
									</select>
									<input hidden type="text" id="idclone">
								</div>
							</div>	
						</div>
						<div class="col-sm-4">
							<h6>Certified *</h6>
							<input name="certified" type="radio" id="NULL" value="NULL" class="with-gap" onclick="document.getElementById('certinumber').disabled=true" checked="true" />
	                        <label for="NULL">Not Defined</label> | 
							<input name="certified" type="radio" class="with-gap" id="Yes" value="Yes" onclick="document.getElementById('certinumber').disabled=false"/>
	                        <label for="Yes">Yes</label> | 
	                        <input name="certified" type="radio" id="No" value="No" class="with-gap" onclick="document.getElementById('certinumber').disabled=true" />
	                        <label for="No">No</label>
						</div>
						<div class="col-sm-4">
							<h6>Certified Number</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="certinumber" disabled="true">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-3">
							<h6>Plantation *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control useselect2" id="plantation" style="
									width: 100%;">
										<option value="" selected disabled>--Choose-plantation--</option>
										<?php 
											$plantation = new Database("SELECT * FROM karet_plantation WHERE isactive = ?",array("1"));

											foreach ($plantation::$result as $key => $value) {
										?>
												<option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
										<?php		

											}
										?>
									</select>
									<input hidden type="text" id="idplantation">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Block *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control useselect2" id="block" style="width: 100%">
										<option value="">--Choose-block--</option>
									</select>
									<input hidden type="text" id="idblock">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>Line</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="line">
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<h6>GPS</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control" id="gps">
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						
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

<script type="text/javascript">
	function refreshBlock(plantation){
		var selectedPlant;
		//alert(plantation);
		
		$("#block option").remove();
		
		$.ajax({
			url: hostname + "/api/loader.tree.select.block.php",
			async: true,
			type: "POST",
			data: {
				idplantation:plantation
			},
			success: function(resp){
				var MetaData = JSON.parse(resp);

				//console.log(MetaData);
				for(i=0;i<MetaData.length;i++){
					var selection = document.createElement("OPTION");

					$(selection).attr("value", MetaData[i].id).html(MetaData[i].blocknumber);
					$("#block").append(selection);
				}
			}
		});

		selectedPlant = $("#block").val();
		return selectedPlant;
	}
</script>
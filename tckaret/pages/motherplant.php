<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5 style=""> 
				Motherplant list
				</h5>
			</div>
			<div class="body" style="overflow-x: scroll;"> 
				<table class="table table-bordered table-striped dataTable columnEditor" id="list-motherplant">
					<thead>
						<tr>
							<!-- <th width="30px" class="text-center">#</th> -->
							<th class="text-center">Code SE</th>
							<th class="text-center">SE</th>
							<th class="text-center">Is Certified</th>
							<th class="text-center">Deactived</th>
							<th class="text-center">Initiation Year</th>
							<th class="text-center">Tree</th>
							<th class="text-center">Tree Part</th>
							<th class="text-center">Reception UG</th>
							<th class="text-center">Usage Of Seeds</th>
							<th class="text-center">Harvest Date</th>
							<th class="text-center">Start Medium</th>
							<th class="text-center">Germination</th>
							<th class="text-center">Germination<br />Medium</th>
							<th class="text-center" style="width: 15px !important">Leaf Sample -80A*C</th>
							<th class="text-center" style="width: 15px !important">Leaf Sample -80A*C Location</th>
							<th class="text-center">Leaf Sample Cirad</th>
							<th class="text-center">Germinated SE</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!----------------------------------------------Input Data----------------------------------------------------->
<br>
<div class="row clearfix">
	
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<div class="card">
				<div class="header bg-cyan">
					<h6 style="" >
					Data
					</h6>
				</div>
				<div class="body">
					<div class="row">
						<div class="col-lg-12">
							<div>
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#biasa" aria-controls="home" role="tab" data-toggle="tab">Tambah</a></li>
									<li role="presentation"><a href="#shipment" aria-controls="profile" role="tab" data-toggle="tab">From Shipment</a></li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="biasa">
										<form id="prosesData">
											<div class="custom-form" id="form-data">
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>CodeSe:</label>
													</div>
													<div class="col-sm-9">
														<div class="form-group">
															<div class="form-line">
																<input type="text" name="nomor" class="form-control" value="" id="nomor" readonly>
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>SE:*</label>
													</div>
													<div class="col-sm-9">
														<div class="form-group">
															<div class="form-line">
																<input type="text" name="se" class="form-control" value="" id="se" required>
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Certified:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="">
																<input type="checkbox" name="certified" class="form-control" value="" id="certified">
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Deactivated:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="">
																<input type="checkbox" name="" class="form-control" value="" id="deactive">
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Initiation Year:*</label>
													</div>
													<div class="col-sm-4"> 
														<div class="form-group">
															<div class="form-line">
																<input type="text" name="" maxlength="4" class="form-control" value="" id="initiationyear" required>
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Tree:*</label>
													</div>
													<div class="col-sm-7"> 
														<div class="form-group">
															<div class="form-line">
																<!-- <input type="text" name="" class="form-control" value="" id="tree" required> -->
																<select id="tree" class="form-control useselect2" required>
																	<option value="">Choose Tree</option>
																	<?php 
																		$tree = new Database("SELECT id, treecode FROM karet_tree
																					WHERE isactive = ?",array(1));

																		foreach ($tree::$result as $key => $value) {
																	?>
																		<option value="<?php echo $value['id'];?>"><?php echo $value['treecode'];?></option>
																	<?php
																		}
																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-sm-2">
														<i class="glyphicon glyphicon-chevron-down getData" parent="tree" 
															getUnique="0"
															indexID="id"
															columnCaption="ID,Clone Name,Plantation,Block,Tree Code,Year Of Planting,Line,Certified" 
															columnSet="clone,plantation,year"
															columnGet="id,clone,plantation,block,treecode,year,line,certified" 
															target="loader.tree">	
														</i>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Tree Part:</label>
													</div>
													<div class="col-sm-7">
														<div class="form-group">
															<div class="form-line">
																<!-- <input type="text" name="" class="form-control" value="" id="treepart"> -->
																<select id="treepart" class="form-control useselect2" required>
																	<option value="">Choose Treepart</option>
																	<?php 
																		$treepart = new Database("SELECT id, partname FROM karet_treepart
																					WHERE isactive = ?",array(1));

																		foreach ($treepart::$result as $key => $value) {
																	?>
																		<option value="<?php echo $value['id'];?>"><?php echo $value['partname'];?></option>
																	<?php
																		}
																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-sm-2">
														<i class="glyphicon glyphicon-chevron-down getData" parent="treepart"
															getUnique="0" 
															columnCaption="ID,Tree Part Name"
															columnSet="partname"
															columnGet="id,partname" 
															target="loader.treepart">	
														</i>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Harvest Date:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="form-line">
																<input type="date" name="" class="form-control setDatePicker" id="harvestdate" >
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Reception UG:*</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="form-line">
																<input type="date" name="" class="form-control setDatePicker" value="" id="receptionug" required>
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Usage Of Seeds:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="form-line">
																<input type="date" name="" class="form-control setDatePicker" value="" id="usageofseeds">
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Start Medium:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="form-line">
																<!-- <input type="text" name="" class="form-control" value="" id="startmedium"> -->
																<select id="startmedium" class="form-control useselect2" required>
																	<option value="">Choose Medium</option>
																	<?php 
																		$medium = new Database("SELECT id, mediacode FROM karet_media
																					WHERE isactive = ?",array(1));

																		foreach ($medium::$result as $key => $value) {
																	?>
																		<option value="<?php echo $value['id'];?>"><?php echo $value['mediacode'];?></option>
																	<?php
																		}
																	?>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Germination Date:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="form-line">
																<input type="date" name="" class="form-control setDatePicker" value="" id="germinationdate">
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Germination Medium:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="form-line">
																<!-- <input type="text" name="" class="form-control" value="" id="germinationmedium"> -->
																<select id="germinationmedium" class="form-control useselect2" required>
																	<option value="">Choose Medium</option>
																	<?php 
																		$medium = new Database("SELECT id, mediacode FROM karet_media
																					WHERE isactive = ?",array(1));

																		foreach ($medium::$result as $key => $value) {
																	?>
																		<option value="<?php echo $value['id'];?>"><?php echo $value['mediacode'];?></option>
																	<?php
																		}
																	?>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Leaf Sample -80 Â°C:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="">
																<input type="checkbox" name="" class="form-control" value="" id="leafsample">
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Leaf Sample -80 Â°C Location:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="form-line">
																<input type="text" name="" class="form-control" value="" id="leafsamplelocation">
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Leaf Sample Cirad:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="">
																<input type="checkbox" name="" class="form-control" value="" id="leafsamplecirad">
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Germinated SE:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="form-line">
																<input type="text" name="" class="form-control" value="" id="germinationse">
															</div>
														</div>
													</div>
												</div>
												
												<div class="text-left" style="padding-bottom: 30px; margin-top: 50px;">
													<input type="submit" class="btn btn-success btn-sm" value="Create" id="btnSimpan"/>
													<input type="reset" class="btn btn-primary btn-sm" value="Clear Form" id="btnReset"/>
													<input type="submit" class="btn btn-warning btn-sm" value="Modify" id="btnEdit"/>
												</div>
											</div>
										</form>
									</div>
									<div role="tabpanel" class="tab-pane active" id="shipment">
										<form id="prosesData2">
											<div class="custom-form" id="form-data">
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Shipment - Mother Plant:</label>
													</div>
													<div class="col-sm-9">
														<div class="form-group">
															<div class="form-line">
																<input type="text" placeholder="Nomor Mother Plant dari Shipment" name="shipment_mother" class="form-control" value="" id="shipment_mother">
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Shipment - Invitro:</label>
													</div>
													<div class="col-sm-9">
														<div class="form-group">
															<div class="form-line">
																<input type="text" placeholder="Nomor Invitro dari Shipment" name="shipment_invitro" class="form-control" value="" id="shipment_invitro">
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>CodeSe:</label>
													</div>
													<div class="col-sm-8">
														<div class="form-group">
															<div class="form-line">
																<input type="text" name="nomor" class="form-control" value="" id="nomor2" readonly>
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Se:*</label>
													</div>
													<div class="col-sm-8">
														<div class="form-group">
															<div class="form-line">
																<input type="text" name="se" class="form-control" value="" id="se2" required>
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Certified:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="">
																<input type="checkbox" name="certified" class="form-control" value="" id="certified2">
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Deactivated:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="">
																<input type="checkbox" name="" class="form-control" value="" id="deactive2">
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Initiation Year:*</label>
													</div>
													<div class="col-sm-4"> 
														<div class="form-group">
															<div class="form-line">
																<input type="text" name="" maxlength="4" class="form-control" value="" id="initiationyear2" required>
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Tree:*</label>
													</div>
													<div class="col-sm-7"> 
														<div class="form-group">
															<div class="form-line">
																<!-- <input type="text" name="" class="form-control" value="" id="tree" required> -->
																<select id="tree2" class="form-control useselect2" required>
																	<option value="">Choose Tree</option>
																	<?php 
																		$tree = new Database("SELECT id, treecode FROM karet_tree
																					WHERE isactive = ?",array(1));

																		foreach ($tree::$result as $key => $value) {
																	?>
																		<option value="<?php echo $value['id'];?>"><?php echo $value['treecode'];?></option>
																	<?php
																		}
																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-sm-2">
														<i class="glyphicon glyphicon-chevron-down getData" parent="tree" 
															getUnique="0"
															indexID="id"
															columnCaption="ID,Clone Name,Plantation,Block,Tree Code,Year Of Planting,Line,Certified" 
															columnSet="clone,plantation,year"
															columnGet="id,clone,plantation,block,treecode,year,line,certified" 
															target="loader.tree">	
														</i>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Tree Part:</label>
													</div>
													<div class="col-sm-7">
														<div class="form-group">
															<div class="form-line">
																<!-- <input type="text" name="" class="form-control" value="" id="treepart"> -->
																<select id="treepart2" class="form-control useselect2" required>
																	<option value="">Choose Treepart</option>
																	<?php 
																		$treepart = new Database("SELECT id, partname FROM karet_treepart
																					WHERE isactive = ?",array(1));

																		foreach ($treepart::$result as $key => $value) {
																	?>
																		<option value="<?php echo $value['id'];?>"><?php echo $value['partname'];?></option>
																	<?php
																		}
																	?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-sm-2">
														<i class="glyphicon glyphicon-chevron-down getData" parent="treepart"
															getUnique="0" 
															columnCaption="ID,Tree Part Name"
															columnSet="partname"
															columnGet="id,partname" 
															target="loader.treepart">	
														</i>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Harvest Date:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="form-line">
																<input type="date" name="" class="form-control setDatePicker" id="harvestdate2" >
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Reception UG:*</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="form-line">
																<input type="date" name="" class="form-control setDatePicker" value="" id="receptionug2" required>
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Usage Of Seeds:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="form-line">
																<input type="date" name="" class="form-control setDatePicker" value="" id="usageofseeds2">
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Start Medium:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="form-line">
																<!-- <input type="text" name="" class="form-control" value="" id="startmedium"> -->
																<select id="startmedium2" class="form-control useselect2" required>
																	<option value="">Choose Medium</option>
																	<?php 
																		$medium = new Database("SELECT id, mediacode FROM karet_media
																					WHERE isactive = ?",array(1));

																		foreach ($medium::$result as $key => $value) {
																	?>
																		<option value="<?php echo $value['id'];?>"><?php echo $value['mediacode'];?></option>
																	<?php
																		}
																	?>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Germination Date:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="form-line">
																<input type="date" name="" class="form-control setDatePicker" value="" id="germinationdate2">
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Germination Medium:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="form-line">
																<!-- <input type="text" name="" class="form-control" value="" id="germinationmedium"> -->
																<select id="germinationmedium2" class="form-control useselect2" required>
																	<option value="">Choose Medium</option>
																	<?php 
																		$medium = new Database("SELECT id, mediacode FROM karet_media
																					WHERE isactive = ?",array(1));

																		foreach ($medium::$result as $key => $value) {
																	?>
																		<option value="<?php echo $value['id'];?>"><?php echo $value['mediacode'];?></option>
																	<?php
																		}
																	?>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Leaf Sample -80 Â°C:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="">
																<input type="checkbox" name="" class="form-control" value="" id="leafsample2">
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Leaf Sample -80 Â°C Location:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="form-line">
																<input type="text" name="" class="form-control" value="" id="leafsamplelocation2">
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Leaf Sample Cirad:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="">
																<input type="checkbox" name="" class="form-control" value="" id="leafsamplecirad2">
															</div>
														</div>
													</div>
												</div>
												<div class="row clearfix">
													<div class="col-sm-3 form-control-label">
														<label>Germinated SE:</label>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="form-line">
																<input type="text" name="" class="form-control" value="" id="germinationse2">
															</div>
														</div>
													</div>
												</div>
												
												<div class="text-left" style="padding-bottom: 30px; margin-top: 50px;">
													<input type="submit" class="btn btn-success btn-sm" value="Create" id="btnSimpanShipment"/>
													<input type="reset" class="btn btn-primary btn-sm" value="Clear Form" id="btnResetShipment"/>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<div class="card" class="col-md-6">
			<div class="header bg-cyan">
				<h6 style="" >
				Images-File-Comments
				</h6>
			</div>
			<div class="body">
				<div class="row">
					<div class="col-lg-12">
						<div>

						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Comment</a></li>
						<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">File</a></li>
						<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Image</a></li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="home">
							<form id="addComment">
								Comment:
								<textarea class="form-control" id="txt_comment"></textarea>
								<br />
								Date:
								<input type="date" name="" class="form-control" id="txt_comment_date" />
								<br />
								<button type="submit" class="btn btn-info">Add</button>
							</form>
							<br />
							<table class="table table-bordered table-striped dataTable autoRow" id="list-comment-motherplant">
								<thead>
									<tr>
										<th></th>
										<th>Comment</th>
										<th>Observation Date</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
						<div role="tabpanel" class="tab-pane" id="profile">
							<form id="addFile">
								Comment:
								<textarea class="form-control" id="txt_comment_file"></textarea>
								<br />
								Date:
								<input type="date" name="" class="form-control" id="txt_comment_date_file" />
								<br />
								File:
								<input type="file" name="" class="form-control" id="txt_comment_file" />
								<br />
								<button type="submit" class="btn btn-info">Add</button>
							</form>
							<br />
							<table class="table table-bordered table-striped dataTable autoRow" id="list-file-motherplant">
								<thead>
									<tr>
										<th></th>
										<th>Comment</th>
										<th>File</th>
										<th>Observation Date</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
						<div role="tabpanel" class="tab-pane" id="messages">...</div>
						</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
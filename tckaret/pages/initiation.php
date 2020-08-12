
	<!--- Modal for View Detail -->
	<div class="modal fade" tabindex="-1" role="dialog" id="view-description">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5> Details for ID Treatment : <span id="title"></span>  <button class="btn btn-warning right" data-dismiss="modal">Back</button> </h5> </div> 
                <div class="modal-body">
                	<div class="col-sm-6">
	                	<table class="table">
	                		<tbody>
	                			<tr>
	                				<td> ID Treatment </td>
	                				<td> : </td>
	                				<td id="idtreatment">  </td>
	                			</tr>
	                			<tr>
	                				<td> ID Reception </td>
	                				<td> : </td>
	                				<td id="idreception">  </td>
	                			</tr>
	                			<tr>
	                				<td> No. Box </td>
	                				<td> : </td>
	                				<td id="nobox">  </td>
	                			</tr>
	                			<tr>
	                				<td> Clone </td>
	                				<td> : </td>
	                				<td id="clone">  </td>
	                			</tr>
	                			<tr>
	                				<td> Sample </td>
	                				<td> : </td>
	                				<td id="sample">  </td>
	                			</tr>
	                			<tr>
	                				<td> Initiation Date </td>
	                				<td> : </td>
	                				<td id="initdate">  </td>
	                			</tr>
	                			<tr>
	                				<td> Width Seed </td>
	                				<td> : </td>
	                				<td id="widthseed">  </td>
	                			</tr>
	                			<tr>
	                				<td> Total Seeds </td>
	                				<td> : </td>
	                				<td id="totalseeds">  </td>
	                			</tr>
	                			<tr>
	                				<td> Seed Comment </td>
	                				<td> : </td>
	                				<td id="seedcomment">  </td>
	                			</tr>
	                			<tr>
	                				<td> ZE </td>
	                				<td> : </td>
	                				<td id="ze">  </td>
	                			</tr>
	                			<tr>
	                				<td> SE </td>
	                				<td> : </td>
	                				<td id="se">  </td>
	                			</tr>
	                			<tr>
	                				<td> Petridish </td>
	                				<td> : </td>
	                				<td id="petridish">  </td>
	                			</tr>
	                			<tr>
	                				<td> Initation Worker </td>
	                				<td> : </td>
	                				<td id="initworker">  </td>
	                			</tr>
	                		</tbody>
	                	</table>
	                </div>
	                <div class="col-sm-6">
	                	<table class="table">
	                		<tbody>
	                			<tr>
	                				<td> Laminar </td>
	                				<td> : </td>
	                				<td id="laminar">  </td>
	                			</tr>
	                			<tr>
	                				<td> Treatment Comment </td>
	                				<td> : </td>
	                				<td id="treatcomment">  </td>
	                			</tr>
	                			<tr>
	                				<td> Media </td>
	                				<td> : </td>
	                				<td id="media">  </td>
	                			</tr>
	                			<tr>
	                				<td> Preparation Medium Date </td>
	                				<td> : </td>
	                				<td id="preparedate">  </td>
	                			</tr>
	                			<tr>
	                				<td> Media Worker </td>
	                				<td> : </td>
	                				<td id="mediaworker">  </td>
	                			</tr>
	                		</tbody>
	                	</table>
	                </div>
                </div>
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade" tabindex="-1" role="dialog" id="form-updatemedia">
    	<form>
	        <div class="modal-dialog">
	            <div class="modal-content">
	                <div class="modal-header"><h5><span id="title-media"></span> Update Media for ID Treatment : <b><span id="title-id"></span></b></h5> </div> 
	                <div class="modal-body">
		                <div class="col-sm-5" id="media-field"> 
		                	<h6>Choose Media : *</h6>
							<div class="input-group">
								<div class="form-line">
									<select class="form-control useselect2" id="medium" style="width:100%;">
											<option value="" disabled selected>--Choose-Initiation-Medium--</option>
											<?php 
												$media = new Database("SELECT * FROM karet_media WHERE id_jenis_media = ? AND isactive = ?",array("1","1"));

												foreach ($media::$result as $key => $value) {
											?>
												<option value="<?php echo $value['id'];?>"><?= $value['mediacode']?></option>
											<?php
												}
											?>
									</select>
									<input type="text" hidden id="idmedium">
								</div>
							</div>
							<div id="error-media"></div>
		                </div> 
						<div class="col-sm-3"> 
		                	<h6>Available Media : <span></span></h6>
							<div class="input-group"> 
								<div class="form-line">
									<input type="text" readonly class="form-control numberonly" id="available-media" value="">
								</div>
							</div>
		                </div> 
	                	<div class="col-sm-4">
		                	<h6>Media Amount : *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" class="form-control numberonly" id="amountmedia" value="">
								</div>
							</div>
		                </div>  	                
	                </div>
	                <div class="modal-footer">
	                	<div class="">
		                    <div class="input-group">
		                    	<button id="btnUpdateMedia" class="btn btn-primary">Save</button>
		                    	<button class="btn btn-danger right" data-dismiss="modal">Back</button> 
		                	</div>
		                </div>
	                </div>
	            </div>
	        </div>
	    </form>
    </div>

	<!-- Widgets -->
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header bg-cyan">
					<h5>
						Initiation List
					</h5>
					<ul class="header-dropdown m-r--5">
						<li>
							<a href="initiation.chooseid" class="btnTambah">
								<i class="material-icons">add</i>
							</a>
						</li>
					</ul>
				</div>
				<div class="body">
					<fieldset>
						<legend>Search By Initiation Date</legend>
						<form method="GET" action="">
							<div class="row clearfix">
								<div class="col-sm-2 form-control-label">
									<label>
										From
									</label>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
									<div class="form-group form-float">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">date_range</i>
											</span>
											<div class="form-line">
												<input type="date" class="form-control" placeholder="Date From" id="datefrom" value="<?= $awal; ?>">
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-sm-2 form-control-label">
									<label>
										To
									</label>
								</div>
								
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
									<div class="form-group form-float">
										<div class="input-group">
					
											<span class="input-group-addon">
												<i class="material-icons">date_range</i>
											</span>
											<div class="form-line focused">
												<input type="date" class="form-control" placeholder="Date To" id="dateto" value="<?= $now; ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									<button id="btnCari" class="btn btn-primary btn-sm m-l-15 waves-effect"><i class="material-icons">search</i></button>
								</div>
							</div>
						</form>
					</fieldset>

					<div style="text-align: left;"><button id="editupdatemedia" class="btn btn-warning">Edit Update Media</button></div>

					<div style="text-align: right;"><button id="updatemedia" class="btn btn-success">Update Media</button></div>
					<table class="table table-bordered table-striped dataTable" id="list-initiation">
						<thead>
							<tr>
								<!-- <th width="2%"></th> -->
								<th class="text-center">ID Treatment</th>
								<th class="text-center">ID Reception</th>
								<th width="30px" class="text-center">No. Box</th>
								<th class="text-center">Clone</th>
								<th class="text-center">Sample</th>
								<th class="text-center">Initiation Date</th>
								<th class="text-center">Widthseed</th>
								<th class="text-center">Total Seeds</th>
								<th class="text-center">ZE</th>
								<th class="text-center">SE</th>
								<!-- <th class="text-center">Petridish Used</th> -->
								<th class="text-center">Sample Remaining (ZE + SE)</th>
								<th class="text-center">Petridish Remaining</th>
								<th class="text-center">Last Media Updated</th>
								<!-- <th class="text-center">Media</th>
								<th class="text-center">Preparation Medium Date</th> -->
								<th width="100px" class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
								
						</tbody>
					</table>
					<!-- <button class="btn btn-warning" id="btnUnselect">Unselect</button> -->
				</div>
			</div>
		</div>
	</div>
</div>
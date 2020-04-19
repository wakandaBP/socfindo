
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
	                				<td> Observation Date </td>
	                				<td> : </td>
	                				<td id="obsdate">  </td>
	                			</tr>
	                			<tr>
	                				<td> Observation Worker </td>
	                				<td> : </td>
	                				<td id="obsworker">  </td>
	                			</tr>
	                			<tr>
	                				<td> Cont. By Fungi </td>
	                				<td> : </td>
	                				<td id="contfungi">  </td>
	                			</tr>
	                			<tr>
	                				<td> Cont. By Bacteri </td>
	                				<td> : </td>
	                				<td id="contbact">  </td>
	                			</tr>
	                			<tr>
	                				<td> Pieces Not Reacted </td>
	                				<td> : </td>
	                				<td id="notreact">  </td>
	                			</tr>
	                			<tr>
	                				<td> A Lot of Callus </td>
	                				<td> : </td>
	                				<td id="alotof">  </td>
	                			</tr>
	                			<tr>
	                				<td> Little Bit of Callus </td>
	                				<td> : </td>
	                				<td id="littlebit">  </td>
	                			</tr>
	                		</tbody>
	                	</table>
	                </div>
	                <div class="col-sm-6">
	                	<table class="table">
	                		<tbody>
	                			<tr>
	                				<td> Yellow </td>
	                				<td> : </td>
	                				<td id="yellow">  </td>
	                			</tr>
	                			<tr>
	                				<td> White </td>
	                				<td> : </td>
	                				<td id="white">  </td>
	                			</tr>
	                			<tr>
	                				<td> Orange </td>
	                				<td> : </td>
	                				<td id="orange">  </td>
	                			</tr>
	                			<tr>
	                				<td> Brown </td>
	                				<td> : </td>
	                				<td id="brown">  </td>
	                			</tr>
	                			<tr>
	                				<td> Dead </td>
	                				<td> : </td>
	                				<td id="dead">  </td>
	                			</tr>
	                			<tr>
	                				<td> Petridish </td>
	                				<td> : </td>
	                				<td id="petridish">  </td>
	                			</tr>
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


   <div class="modal fade" tabindex="-1" role="dialog" id="form-updatepetri">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5> Update Petri Number and Media for Transfer<span id="title"></span>  <button class="btn btn-warning right" data-dismiss="modal">Back</button> </h5> </div> 
                <div class="modal-body">
                	<div class="col-sm-6">
	                	<h6>Insert Petridish number : *</h6>
						<div class="input-group">
							<div class="form-line">
								<input type="text" class="form-control numberonly" id="petrinumber" value="">
							</div>
						</div>
	                </div>
	                <div class="col-sm-6" id="media-field"> 
	                	<h6>Choose Media : *</h6>
						<div class="input-group">
							<div class="form-line">
								<select class="form-control" id="medium">
										<option value="" disabled selected>--Choose-Transfer-Medium--</option>
										<?php 
											$media = new Database("SELECT * FROM karet_media WHERE id_jenis_media = ? AND isactive = ?",array(2,1));

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
	                </div>   
	                <div class="col-sm-6 offset-6" id="date-field"> 
	                	<h6>Choose Date Media Created: *</h6>
						<div class="input-group">
							<div class="form-line">
								<select class="form-control" id="createddate">
										<option value="" disabled selected="">--Choose-Created-Date--</option>
								</select>
								<input type="text" hidden id="idcreateddate">
							</div>
						</div>
	                </div>   
                </div>
                <div class="modal-footer">
                	<div class="">
	                    <div class="input-group">
	                    	<button id="btnAddPetrinum" class="btn btn-primary">Save</button>
	                	</div>
	                </div>
                </div>
            </div>
        </div>
    </div>

	<!-- Widgets -->
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header bg-cyan">
					<h5>
						Transfer Callus List
					</h5>
					<ul class="header-dropdown m-r--5">
						<li>
							<a href="transfercallus.chooseid" class="btnTambah">
								<i class="material-icons">add</i>
							</a>
						</li>
					</ul>
				</div>
				<div class="body">
					<fieldset>
						<legend>Search By Transfer Date</legend>
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
												<input type="date" class="form-control" placeholder="Date From" id="datefrom">
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
												<input type="date" class="form-control" placeholder="Date To" id="dateto" value="">
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
									<button type="submit" class="btn btn-primary btn-sm m-l-15 waves-effect"><i class="material-icons">search</i></button>
								</div>
							</div>
						</form>
					</fieldset>

					<div style="text-align: right;"><button id="updatepetri" class="btn btn-success">Update Media</button></div>
					<table class="table table-bordered table-striped dataTable" id="list-transcallus" style="text-align: center;">
						<thead>
							<tr>
								<th width="2%"></th>
								<th class="text-center">ID Treatment</th>
								<!-- <th class="text-center">ID Reception</th>
								<th width="30px" class="text-center">No. Box</th>
								<th class="text-center">Clone</th>
								<th class="text-center">Sample</th> -->
								<th class="text-center">Callus Transfer</th>
								<th class="text-center">Transfer Date</th>
								<th class="text-center">Flow</th>
								<th class="text-center">Contaminations</th>
								<th class="text-center">Petridish</th>
									<!-- <th class="text-center">Medium</th> -->
								<th width="80px" class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
								
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	if ($page[1] != ""){
	
?>
<form>
	<div class="modal fade" tabindex="-1" role="dialog" id="form-germ-prepare-screen">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5> <span id="count"></span> Germination Prepare Screening for ID Embryo : <?= $page[1]; ?></h5> </div> 
                <form id="addmat2">
	                <div class="modal-body">
	                	<input type="text" id="idlog" hidden>
		                <fieldset>
							<div class="row clearfix">
								<div class="col-sm-4">
									<h6>Screening Date *</h6>
									<div class="input-group">
										<div class="form-line">
											<input type="date" class="form-control" required id="screendate" value="<?= $now; ?>" max="<?= $now; ?>">
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<h6>Screening Worker *</h6>
									<div class="input-group">
										<div class="form-line" style="padding-top: 4%;">
											<select class="form-control useselect2" id="screenworker" style="width:100%;">
												<option value="" disabled selected>--Choose-Worker--</option>
												<?php 
													$worker = new Database("SELECT * FROM karet_worker
																WHERE isactive = ?",array("1"));

													foreach ($worker::$result as $key => $value) {
												?>
													<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
												<?php
													}
												?>
											</select>
											<input type="text" hidden id="idscreenworker">
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<h6>Comment</h6>
									<div class="input-group">
										<div class="form-line">
											<textarea class="form-control" id="comment"></textarea>
										</div>
									</div>
								</div>
							</div>
						</fieldset>

						<fieldset>
							<legend>Contamination</legend>
							<div class="row clearfix">
								<div class="col-sm-3">
									<h6>Contamination By Fungi</h6>
									<div class="input-group">
										<div class="form-line">
											<select class="form-control" id="fungi">
												<option value="0">No</option>
												<option value="1">Yes</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<h6>Contamination By Bacteri</h6>
									<div class="input-group">
										<div class="form-line">
											<select class="form-control" id="bact">
												<option value="0">No</option>
												<option value="1">Yes</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-3" style="padding-top: 2.3%;">
									<h6>Pink</h6>
									<div class="input-group">
										<div class="form-line">
											<select class="form-control" id="pink">
												<option value="0">No</option>
												<option value="1">Yes</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-sm-3" style="padding-top: 2.3%;">
									<h6>Dead</h6>
									<div class="input-group">
										<div class="form-line">
											<select class="form-control" id="dead">
												<option value="0">No</option>
												<option value="1">Yes</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-sm-6">
									<h6>Contamination Comment</h6>
									<div class="input-group">
										<div class="form-line">
											<textarea id="contcomment" class="form-control"></textarea>
										</div>
									</div>
								</div>
							</div>
						</fieldset>                    
	                </div>
	                <div class="modal-footer">
	                	<div class="">
		                    <div class="input-group">
		                    	<button id="btnSaveLog" class="btn btn-primary">Save</button>
		                    	<button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
		                	</div>
		                </div>
	                </div>
	            </form>
            </div>
        </div>
    </div>
</form>


<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h5>
							Germination Prepare Screening Log for ID Embryo : <?= $page[1];?>
						</h5>
						<ul class="header-dropdown m-r--4" style="margin-top: -2%;">
							<li>
								<!-- <a href="<?php // $tckaret;?>/maturation2.screen.add/<?= $page[1];?>" class="btnTambah">
									<i class="material-icons">add</i>
								</a> -->
								<button id="btnAddScreen" class="btn btn-success"><i class="material-icons">add</i></button>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="body">
				<table class="table table-bordered table-striped dataTable" id="list-germ-prepare-log" style="text-align: center;">
					<thead>
						<tr>
							<!-- <th width="20px" class="text-center" rowspan="2">No</th> -->
							<th width="100px" class="text-center" rowspan="2">Screening Date</th>
							<th width="100px" class="text-center" rowspan="2">Screening Worker</th>
							<th width="50px" class="text-center" rowspan="2">Screening Checkpoint</th>
							<th width="100px" class="text-center" colspan="2">Contamination</th>
							<th width="100px" class="text-center" rowspan="2">Dead</th>
							<th width="100px" class="text-center" rowspan="2">Contamination Comment</th>
							<th width="80px" class="text-center" rowspan="2">Action</th>
						</tr>
						<tr>
							<th>By Fungi</th>
							<th>By Bacteri</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
				<div style="text-align: right;">
					<a href="<?php echo $tckaret;?>/germination-prepare" class="btn btn-primary btn-sm">Back</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 		
		//}	
	}

?>
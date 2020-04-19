<?php 	
try {
	$plantation = new Database("SELECT * FROM karet_plantation WHERE id = ?",array($page[1]));

	foreach ($plantation::$result as $key => $data) {
?>
	<!--- Modal for Block -->
	<div class="modal fade" tabindex="-1" role="dialog" id="form-block">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5><span id="mode"></span> Block for <?php echo $data['name']; ?> Plantation</h5></div>
                <div class="modal-body">
                    <form action="" autocomplete="off">
                    	<input hidden type="text" id="idblock">
                        <div class="col-sm-12">
							<h6>Blocknumber *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" id="blocknumber" required class="form-control" />
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<h6>Description</h6>
							<div class="input-group">
								<div class="form-line">
									 <textarea class="form-control" rows="2" id="blockdescription"></textarea>
								</div>
							</div>
						</div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" id="simpan-block">Save</button>
                    <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!--- Modal for Panel -->
	<div class="modal fade" tabindex="-1" role="dialog" id="form-panel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5><span id="mode-panel"></span> Panel for Block <span id="mode-block"></h5></span></div>
                <div class="modal-body">
                    <form action="" autocomplete="off">
                    	<input hidden type="text" id="idblockforpanel">
                    	<input hidden type="text" id="idpanel">
                        <div class="col-sm-12">
							<h6>Panel Name *</h6>
							<div class="input-group">
								<div class="form-line">
									<input type="text" id="panelname" required class="form-control" placeholder="Panel Name" />
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<h6>Description</h6>
							<div class="input-group">
								<div class="form-line">
									 <textarea class="form-control" rows="2" id="paneldescription"></textarea>
								</div>
							</div>
						</div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" id="simpan-panel">Save</button>
                    <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>	



	<!--- Body -->	
<div class="row clearfix">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					<?php echo $data['name']; ?> Plantation Block List
				</h5>
				<ul class="header-dropdown" style="margin-top: -2%;">
					<li>
						<button class="btn btn-success pull-right" data-toggle="modal" id="add-block">
				           <i class="material-icons">add</i>
				        </button>
						<!-- <a href="">
							
						</a> -->
					</li>
				</ul>
			</div>
			<div class="body">
				<div style="padding-bottom: 3%;">
					<a href="<?php echo $tckaret?>/plantation" class="btn btn-sm btn-warning pull-right">Back To Plantation List</a>
				</div>
				<hr />
				<table class="table table-bordered table-striped dataTable" id="list-block">
					<thead>
						<tr>
							<th width="25%" class="text-center">Block Number</th>
							<th class="text-center">Description</th>
							<th width="auto" class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<div class="card">
			<div class="header bg-cyan">
				<h5 >
					Block <span id="paneltitle"></span> Panel List
				</h5>
				<ul class="header-dropdown" style="padding-top: 5px">
				</ul>
			</div>
			<div class="body">
				<table class="table table-bordered table-striped dataTable" id="list-panel">
					<thead>
						<tr>
							<th class="text-center">Panel Name</th>
							<th class="text-center">Description</th>
							<th width="auto" class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
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
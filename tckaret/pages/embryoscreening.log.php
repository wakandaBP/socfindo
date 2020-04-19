<?php 
	if ($page[1] != ""){
		$data = new Database("SELECT * FROM karet_initiation_trans WHERE id = ?",array($page[1]));

		foreach ($data::$result as $key => $value) {
?>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h5>
							Screening Embryo Log for ID Treatment : <?= $value['id_treatment']. " / ". DateToIndo($value['transferdate']);?>
						</h5>
						<ul class="header-dropdown m-r--4" style="margin-top: -1%;">
							<li>
								<a href="<?= $tckaret;?>/embryoscreening.add/<?= $page[1];?>" class="btnTambah">
									<i class="material-icons">add</i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="body">
				<table class="table table-bordered table-striped dataTable" id="list-screeninglog" style="text-align: center;">
					<thead>
						<tr>
							<th width="20px" class="text-center">No</th>
							<th width="100px" class="text-center">Screening Date</th>
							<th width="100px" class="text-center">Screening Worker</th>
							<th width="50px" class="text-center">Screening Checkpoint</th>
							<th width="100px" class="text-center">Growing Embryo</th>
							<th width="80px" class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
				<div style="text-align: right;">
					<a href="<?php echo $tckaret;?>/embryoscreening" class="btn btn-primary btn-sm">Back</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 		
		}	
	}

?>
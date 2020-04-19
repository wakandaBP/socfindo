	<!-- Widgets -->
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header bg-cyan">
					<h1 style="font-size: 12pt; padding-bottom: 5px">
						Screening Embryo
					</h1>
					<ul class="header-dropdown m-r--5" style="padding-top: 5px">
						<li>
							<a href="maturation1-add" class="btnTambah">
								<button class="btn btn-info btn-sm">Observation Maturation I Add</button>
							</a>
						</li>
					</ul>
				</div>
				<div class="body">
					<div class="modal-body" id="form-data">
						<div class="row">
							<h3>Search By Screening Date</h3>
						</div>	
						<div class="row clearfix">
							<div class="col-md-3">
								<h5 style="padding-left: 30px">From:</h5>
									<div class="form-line">
										<input type="date" class="form-control" name="nama" required="required">
									</div>
							</div>
							<div class="col-md-3">
								<h5 style="padding-left: 30px">To:</h5>
									<div class="form-line">
										<input type="date" class="form-control" name="nama" required="required">
									</div>	
							</div>
						</div>
							<div class="form-line">
								<a href="#" class="btn btn-info btn-sm">SHOW</a>
							</div>
							<br>
							<div class="row clearfix">
								<div class="col-md-3">
									<h5> Check/Uncheck All</h5>
									<div class="form-line" style="padding-right: 100%" class="padding-bottom">
										<input type="checkbox" name="nama" class="form-control" required="required">
									</div>
								</div>
							</div>
					</div>




					<table class="table table-bordered table-striped dataTable" id="example3">
						<thead>
							<tr>
								<th width="30px" class="text-center">#</th>
								<th class="text-center">ID_Embryo</th>
								<th class="text-center">ID_Treatment</th>
								<th class="text-center">Iteration</th>
								<th class="text-center">ObservationDate</th>
								<th class="text-center">Worker</th>
								<th class="text-center">Condition</th>
								<th class="text-center">Status</th>
								<th class="text-center">Comment</th>
								<th width="100px" class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
								<tr>
									<td class="text-center">1</td>
									<td class="text-center">2</td>
									<td class="text-center">3</td>
									<td class="text-center">4</td>
									<td class="text-center">5</td>
									<td class="text-center">6</td>
									<td class="text-center">7</td>
									<td class="text-center">8</td>
									<td class="text-center">9</td>	
									<td class="text-center">
										<a 	href="" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
										<button type="button" rel="tooltip" class="btn bg-red btn-circle waves-effect waves-circle waves-float" data-original-title="Hapus" title="Hapus">
											<i class="material-icons">close</i>
										</button>
										</a>
									</td>
								</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
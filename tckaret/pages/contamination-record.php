<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<h5>
					Contamination Record List
				</h5>
				<ul class="header-dropdown">
				</ul>
			</div>
			<div class="body">
				<div style="padding: 1% 2%;">
					<div class="row clearfix">
						<div class="col-sm-2">
							<div class="input-group">
								<div class="form-line">
									<select id="showBy" class="form-control">
										<option selected disable value="">--Select-Step--</option>
										<option value="1">Embryoscreening</option>
										<option value="2">Maturation I</option>
										<option value="3">Maturation II</option>
										<option value="4">Germination</option>
										<option value="5">Show All</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="input-group">
								<button class="btn btn-primary" id="btnShow">Show</button>
							</div>
						</div>
					</div>	
					<!-- <table class="table table-bordered table-striped dataTable" id="list-contamination-initiation">
						<thead>
							<tr>
								<th rowspan="2" width="20px" class="text-center">No</th>
								<th rowspan="2" class="text-center">ID Treatment</th>
								<th rowspan="2" class="text-center">ID Embryo</th>
								<th rowspan="2" class="text-center">Rejuvination Step</th>
								<th colspan="3" class="text-center">Contamination</th>
								<th rowspan="2" width="auto" class="text-center">Dead</th>
								<th rowspan="2" width="auto" class="text-center">Action</th>
							</tr>
							<tr>
								<th class="text-center">Fungi</th>
								<th class="text-center">Bacteri</th>
								<th class="text-center">Pink</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table> -->
					<br />
					<div class="row clearfix">
						<div id="table-embryoscreen" hidden>
							<fieldset>
								<legend>Contamination in Embryoscreening</legend>
								<table class="table table-bordered table-striped dataTable" id="list-contamination-embryoscreen" style="text-align:center; width:100%;">
									<thead>
										<tr>
											<th rowspan="2" width="20px" class="text-center">No</th>
											<th rowspan="2" class="text-center">ID Treatment</th>
											<th colspan="3" class="text-center">Contamination</th>
											<th rowspan="2" width="auto" class="text-center">Dead</th>
											<th rowspan="2" width="auto" class="text-center">Date Recorded</th>
											<th rowspan="2" width="auto" class="text-center">Action</th>
										</tr>
										<tr>
											<th class="text-center">Fungi</th>
											<th class="text-center">Bacteri</th>
											<th class="text-center">Pink</th>
										</tr>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</fieldset>
							<hr />
						</div>
						<div id="table-mat1" hidden>
							<fieldset>
								<legend>Contamination in Maturation I</legend>
								<table class="table table-bordered table-striped dataTable" id="list-contamination-mat1" style="text-align:center; width:100%;">
									<thead>
										<tr>
											<th rowspan="2" width="20px" class="text-center">No</th>
											<th rowspan="2" class="text-center">ID Embryo</th>
											<th colspan="3" class="text-center">Contamination</th>
											<th rowspan="2" width="auto" class="text-center">Dead</th>
											<th rowspan="2" width="auto" class="text-center">Date Recorded</th>
											<th rowspan="2" width="auto" class="text-center">Action</th>
										</tr>
										<tr>
											<th class="text-center">Fungi</th>
											<th class="text-center">Bacteri</th>
											<th class="text-center">Pink</th>
										</tr>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</fieldset>
							<hr />
						</div>
						<div id="table-mat2" hidden>
							<fieldset>
								<legend>Contamination in Maturation II</legend>
								<table class="table table-bordered table-striped dataTable" id="list-contamination-mat2" style="text-align:center; width:100%;">
									<thead>
										<tr>
											<th rowspan="2" width="20px" class="text-center">No</th>
											<th rowspan="2" class="text-center">ID Embryo</th>
											<th colspan="3" class="text-center">Contamination</th>
											<th rowspan="2" width="auto" class="text-center">Dead</th>
											<th rowspan="2" width="auto" class="text-center">Date Recorded</th>
											<th rowspan="2" width="auto" class="text-center">Action</th>
										</tr>
										<tr>
											<th class="text-center">Fungi</th>
											<th class="text-center">Bacteri</th>
											<th class="text-center">Pink</th>
										</tr>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</fieldset>
							<hr />
						</div>
						<div id="table-germ" hidden>
							<fieldset>
								<legend>Contamination in Germination</legend>
								<table class="table table-bordered table-striped dataTable" id="list-contamination-germ" style="text-align:center; width:100%;">
									<thead>
										<tr>
											<th rowspan="2" width="20px" class="text-center">No</th>
											<th rowspan="2" class="text-center">ID Embryo</th>
											<th colspan="3" class="text-center">Contamination</th>
											<th rowspan="2" width="auto" class="text-center">Dead</th>
											<th rowspan="2" width="auto" class="text-center">Date Recorded</th>
											<th rowspan="2" width="auto" class="text-center">Action</th>
										</tr>
										<tr>
											<th class="text-center">Fungi</th>
											<th class="text-center">Bacteri</th>
											<th class="text-center">Pink</th>
										</tr>
									</thead>
									<tbody>
										
									</tbody>
								</table>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

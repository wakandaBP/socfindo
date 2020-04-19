<?php 
try {
	$reception = new Database("SELECT * FROM karet_reception WHERE id = ?",array($page[1]));

	foreach ($reception::$result as $key => $data) {
?>

	<!--- Body -->
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header bg-cyan">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<h5>
							Flower Seeds and Fruit Seeds For ID Reception : <?php echo $data['id'];?>
						</h5>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
<br />
<div class="row clearfix">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<form>
			<div class="card">
				<div class="header bg-cyan">
					<h5>
						Flower Seeds
					</h5>
				</div>
				<div class="body" id="form-data">
					<?php 
						$flower = "";
						if ($data['flowersharvested'] > 0 AND $data['flowersharvested'] != ""){
							$flower = $data['flowersharvested'];

							$flowerdata = new Database("SELECT * FROM karet_reception_flowers WHERE idreception = ? AND isactive = ?",array($page[1],"1"));

							foreach ($flowerdata::$result as $key => $values) {}

					?>
					<div class="row">
						<div class="col-sm-12">
							<b>Flowers Used </b>
							<div class="input-group">
								<div class="form-line">
									<input type="text" hidden id="idflowers" value="<?php echo $values['id']?>">

									<input type="number" class="form-control numberonly" id="flowersused" required="required" placeholder="0" value="<?php echo $values['flowersused']?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<b>Rotten Flowers</b>
							<div class="input-group">
								<div class="form-line">

									<input type="number" class="form-control numberonly" id="rottenflowers" required="required" placeholder="0" value="<?php echo $values['rottenflowers']?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<b>Total Flowers Used </b>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="totalflowersused" required="required" placeholder="0" value="<?php echo $values['totalflowersused']?>">
								</div>
							</div>
						</div>
					</div>
					<?php
						} else {
					?>
						<span style="text-align: center;">This Reception doesn't have any Flower Seeds.</span>
					<?php
						}
					?>
				</div>
			</div>
		</form>
	</div>
		
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="">
		<form >
			<div class="card">
				<div class="header bg-cyan">
					<h5>
						Fruit Seeds
					</h5>
				</div>
				<div class="body" id="form-data">
					<?php 
						$fruit = "";
						if ($data['fruitsharvested'] > 0 AND $data['fruitsharvested'] != ""){
							$fruit = $data['fruitsharvested'];

							$fruitdata = new Database("SELECT * FROM karet_reception_fruits WHERE idreception = ? AND isactive = ?",array($page[1],"1"));

							foreach ($fruitdata::$result as $key => $items) {}
					?>
					<div class="row">
						<div class="col-sm-6">
							<b>Fruits Used</b>
							<div class="input-group">
								<div class="form-line">
									<input type="text" hidden id="idfruits" value="<?php echo $items['id']?>">

									<input type="number" class="form-control numberonly" id="fruitsused" required="required" placeholder="0" value="<?php echo $items['fruitsused'];?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<b>Woody Used</b>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="fruitswoody" required="required" placeholder="0" value="<?php echo $items['woodyfruits'];?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<b>Too Small Fruits</b>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="fruitstoosmall" required="required" placeholder="0" value="<?php echo $items['toosmallfruits'];?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<b>Loose Seeds</b>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="looseseeds" required="required" placeholder="0" value="<?php echo $items['looseseeds'];?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<b>Rotten Fruits</b>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="rottenfruits" required="required" placeholder="0" value="<?php echo $items['rottenfruits'];?>">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<b>Total Seeds Used</b>
							<div class="input-group">
								<div class="form-line">
									<input type="number" class="form-control numberonly" id="totalseedsused" required="required" placeholder="0" value="<?php echo $items['totalseeds'];?>">
								</div>
							</div>
						</div>
					</div>
					<?php
						} else {
					?>
						<span style="text-align: center;">This Reception doesn't have any Fruit Seeds.</span>
					<?php
						}
					?>
				</div>
			</div>
		</form>
	</div>
	<br />
	<div style="margin-top: 2%;" class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3" style="text-align: right;">
		<!-- <h1 style="font-size: 12pt; text-align: right;" >A</h1> -->
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<button type="submit" class="btn btn-primary btn-sm btn-block" id="btnSimpan">Save All</button>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<a href="<?php echo $tckaret;?>/reception" type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Back To Reception List</a>
		</div>
	</div>
	<br/>

	
</div>

<?php 

	}
} 
catch (PDOException $e){
    echo $e->getMessage();
}

?>
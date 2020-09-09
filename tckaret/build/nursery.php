<script type="text/javascript">
	
	$(function(){
		id = '<?php echo ($_GET['last']!='')?$_GET['last']:''; ?>';

		var nurseryList = $("#list-nursery").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.nursery.php",
				"data":{
					id:id
				},
				"type":"POST"
			},
			dom: 'lBfrtip',
			buttons: [
				'excel', 'csv', 'pdf', 'copy'
			],
			"columnDefs":[
				{"targets":0, "className":"dt-body-left"}
			],
			"columns" : [
				{ 
					"data": null,"sortable": false, 
			    	render: function (data, type, row, meta) {
			            return meta.row + meta.settings._iDisplayStart + 1;
                	}  
    			},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["unique_code"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["mother_embryo"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						//return row["deactivated"];
						var checked = (row["deactivated"] == "FALSE") ? "<i class=\"glyphicon glyphicon-unchecked\"></i>":"<i class=\"glyphicon glyphicon-check\"></i>";

						return checked;
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["qty_at_start"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["start_date"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["qty_remaining"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return (row['qty_at_end'] != null && row['qty_at_end'] != '') ? row["qty_at_end"] : '-';
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						//return "";
						return "<div style='text-align:center;' class='"+ row['last_updated'] +"'>" +
								" <button class=\"btn btn-warning btn-circle waves-effect waves-circle waves-float btn-detail\" data-id=\"" + row["id"] + "\" data-toggle='tooltip' title='View Parent and Child'><i class=\"material-icons\">list</i></button>" + 
								" <a href=\"" + hostname + "/nursery.edit/" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\" data-toggle='tooltip' title='Edit'><i class=\"material-icons\">edit</i></a>" + 
								" <button class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete\" id=\"delete_" + row["id"] + "\" data-name=\"" + row["unique_code"] + "\" data-toggle='tooltip' title='Delete'><i class=\"material-icons\">delete_outline</i></button></div>";
					}
				}
			],
			rowCallback: function (row, data) {
				if (data['last_updated'] == "last_updated"){
					$(row).css({"background-color":"#0779e4","color":"#ffffff"});
				}
			}
		});
	
		$("body").on("click", ".btn-delete", function(){
			var id = $(this).attr("id").split("_");
			var nama = $(this).data("name");
			id = id[id.length - 1];

			var conf = confirm("Delete Nursery : " + nama + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-nursery",
						id:id
					},
					success:function(resp){
						nurseryList.ajax.reload();
						//RefreshData("#list-clone", hostname + "/api/loader.acclimatization.php");
					}
				});
			}
			return false;
		});

		$("#list-nursery tbody").on('click', '.btn-detail', function(){
			let selectID = $(this).data("id");

			loadParent(selectID);
			loadChildrenPlantationField(selectID);
			loadChildrenBudwoodGarden(selectID);
			loadChildrenStockCutting(selectID);

			$("#view-tracing").modal("show");
		});
	});

	function loadParent(id){
		let data;
		$("#table_parent tbody").empty();

		$.ajax ({
			url:hostname + "/api/exvitro_nursery/get.nursery.parent.php?id=" + id,
			type:"GET",
			success:function(resp){
				//console.log(resp);
				data = JSON.parse(resp);

				$.each(data, function(key, item){
					let html = "<tr>\
							<td>"+ item.unique_code +"</td>\
							<td>"+ item.qty_at_start +"</td>\
							<td>"+ item.hardening_start +"</td>\
							<td>"+ item.hardening_end +"</td>\
						</tr>";

					$("#table_parent tbody").append(html);
				});
			}
		});
	}

	function loadChildrenPlantationField(id){
		let data;
		$("#table_child_plantation tbody").empty();

		$.ajax ({
			url:hostname + "/api/exvitro_nursery/get.nursery.plantation.field.child.php?id=" + id,
			type:"GET",
			success:function(resp){
				//console.log(data);
				data = JSON.parse(resp);

				$.each(data, function(key, item){
					let html = "<tr>\
							<td>"+ item.unique_code +"</td>\
							<td>"+ item.qty_planted +"</td>\
							<td>"+ item.qty_stands_at_planting +"</td>\
							<td>"+ item.qty_stands_after_1_cencus +"</td>\
							<td>"+ item.panel +"</td>\
							<td>"+ item.block +"</td>\
							<td>"+ item.plantation +"</td>\
							<td>"+ item.region +"</td>\
							<td>"+ item.scan_date +"</td>\
						</tr>";

					$("#table_child_plantation tbody").append(html);
				});
			}
		});	
	}

	function loadChildrenBudwoodGarden(id){
		let data;
		$("#table_child_budwood tbody").empty();

		$.ajax ({
			url:hostname + "/api/exvitro_nursery/get.nursery.budwood.child.php?id=" + id,
			type:"GET",
			success:function(resp){
				//console.log(data);
				data = JSON.parse(resp);

				$.each(data, function(key, item){
					let html = "<tr>\
							<td>"+ item.unique_code +"</td>\
							<td>"+ item.qty_planted +"</td>\
							<td>"+ item.qty_stands +"</td>\
							<td>"+ item.qty_rejected +"</td>\
							<td>"+ item.block +"</td>\
							<td>"+ item.plantation +"</td>\
							<td>"+ item.region +"</td>\
						</tr>";

					$("#table_child_budwood tbody").append(html);
				});
			}
		});	
	}

	function loadChildrenStockCutting(id){
		let data;
		$("#table_child_cutting tbody").empty();

		$.ajax ({
			url:hostname + "/api/exvitro_nursery/get.nursery.stock.cutting.child.php?id=" + id,
			type:"GET",
			success:function(resp){
				//console.log(data);
				data = JSON.parse(resp);

				$.each(data, function(key, item){
					let html = "<tr>\
							<td>"+ item.unique_code +"</td>\
							<td>"+ item.qty +"</td>\
							<td>"+ item.table_number +"</td>\
							<td>"+ item.plantation +"</td>\
							<td>"+ item.region +"</td>\
							<td>"+ item.date_stock +"</td>\
						</tr>";

					$("#table_child_cutting tbody").append(html);
				});
			}
		});	
	}

</script>
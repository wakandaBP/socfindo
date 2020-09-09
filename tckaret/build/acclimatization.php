<script type="text/javascript">
	
	$(function(){
		id = '<?php echo ($_GET['last']!='')?$_GET['last']:''; ?>';

		var acclimatizationList = $("#list-acclimatization").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.acclimatization.php",
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
						return row["plantation"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["start_date"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["green_house_number"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["qty_received"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["qty_rejected"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["qty_at_end"];
					}
				},{
					"data" : null, render: function(data, type, row, meta) {
						return (row['dead_plant'] != null && row['dead_plant'] != '') ? row["dead_plant"] : '-';
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["plantation_arrival_date"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["supplier"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["country_arrival_date"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["date_of_shipment"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						//return "";
						return "<div style='text-align:center;' class='"+ row['last_updated'] +"'>" + 
								" <button class=\"btn btn-warning btn-circle waves-effect waves-circle waves-float btn-detail\" data-id=\"" + row["id"] + "\" data-toggle='tooltip' title='View Parent and Child'><i class=\"material-icons\">list</i></button>" +
								" <a href=\"" + hostname + "/acclimatization.edit/" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\" data-toggle='tooltip' title='Edit'><i class=\"material-icons\">edit</i></a>" + 
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

			var conf = confirm("Delete Acclimatization : " + nama + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-acclimatization",
						id:id
					},
					success:function(resp){
						acclimatizationList.ajax.reload();
						//RefreshData("#list-clone", hostname + "/api/loader.acclimatization.php");
					}
				});
			}
			return false;
		});

		$("#list-acclimatization tbody").on('click', '.btn-detail', function(){
			let selectID = $(this).data("id");

			loadParent(selectID);
			loadChild(selectID);

			$("#view-tracing").modal("show");
		});
	});

	function loadParent(id){
		let data;
		$("#table_parent tbody").empty();

		$.ajax ({
			url:hostname + "/api/exvitro_acclimatization/get.acc.parent.php?id=" + id,
			type:"GET",
			success:function(resp){
				//console.log(resp);
				data = JSON.parse(resp);

				$.each(data, function(key, item){
					let html = "<tr>\
							<td>"+ item.unique_code +"</td>\
							<td>"+ item.number_of_plants +"</td>\
							<td>"+ item.invitro_end +"</td>\
						</tr>";

					$("#table_parent tbody").append(html);
				});
			}
		});
	}

	function loadChild(id){
		let data;
		$("#table_child tbody").empty();

		$.ajax ({
			url:hostname + "/api/exvitro_acclimatization/get.acc.child.php?id=" + id,
			type:"GET",
			success:function(resp){
				//console.log(data);
				data = JSON.parse(resp);

				$.each(data, function(key, item){
					let html = "<tr>\
							<td>"+ item.unique_code +"</td>\
							<td>"+ item.qty_at_start +"</td>\
						</tr>";

					$("#table_child tbody").append(html);
				});
			}
		});	
	}

</script>
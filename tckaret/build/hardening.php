<script type="text/javascript">
	
	$(function(){
		id = '<?php echo ($_GET['last']!='')?$_GET['last']:''; ?>';

		var hardeningList = $("#list-hardening").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.hardening.php",
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
								"	<a href=\"" + hostname + "/hardening.edit/" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\" data-toggle='tooltip' title='Edit'><i class=\"material-icons\">edit</i></a>" + 
								"  <button class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete\" id=\"delete_" + row["id"] + "\" data-name=\"" + row["unique_code"] + "\" data-toggle='tooltip' title='Delete'><i class=\"material-icons\">delete_outline</i></button></div>";
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

			var conf = confirm("Delete Hardening : " + nama + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-hardening",
						id:id
					},
					success:function(resp){
						hardeningList.ajax.reload();
						//RefreshData("#list-clone", hostname + "/api/loader.acclimatization.php");
					}
				});
			}
			return false;
		});

		$("#list-hardening tbody").on('click', '.btn-detail', function(){
			let selectID = $(this).data("id");

			loadParentAcc(selectID);
			loadParentRooting(selectID);
			loadChildNursery(selectID);

			$("#view-tracing").modal("show");
		});
	});

	function loadParentAcc(id){
		let data;
		$("#table_parent_acc tbody").empty();

		$.ajax ({
			url:hostname + "/api/exvitro_hardening/get.hardening.parent.acc.php?id=" + id,
			type:"GET",
			success:function(resp){
				//console.log(resp);
				data = JSON.parse(resp);

				$.each(data, function(key, item){
					let html = "<tr>\
							<td>"+ item.unique_code +"</td>\
							<td>"+ item.qty_received +"</td>\
							<td>"+ item.acc_end +"</td>\
						</tr>";

					$("#table_parent_acc tbody").append(html);
				});
			}
		});
	}

	function loadParentRooting(id){
		let data;
		$("#table_parent_rooting tbody").empty();

		$.ajax ({
			url:hostname + "/api/exvitro_hardening/get.hardening.parent.rooting.php?id=" + id,
			type:"GET",
			success:function(resp){
				console.log(resp);
				data = JSON.parse(resp);

				$.each(data, function(key, item){
					let html = "<tr>\
							<td>"+ item.unique_code +"</td>\
							<td>"+ item.qty_at_start +"</td>\
							<td>"+ item.rooting_end +"</td>\
						</tr>";

					$("#table_parent_rooting tbody").append(html);
				});
			}
		});
	}

	function loadChildNursery(id){
		let data;
		$("#table_child tbody").empty();

		$.ajax ({
			url:hostname + "/api/exvitro_hardening/get.hardening.child.php?id=" + id,
			type:"GET",
			success:function(resp){
				//console.log(resp);
				data = JSON.parse(resp);

				$.each(data, function(key, item){
					let html = "<tr>\
							<td>"+ item.unique_code +"</td>\
							<td>"+ item.qty_at_start +"</td>\
							<td>"+ item.start_end +"</td>\
						</tr>";

					$("#table_child tbody").append(html);
				});
			}
		});
	}
	
</script>
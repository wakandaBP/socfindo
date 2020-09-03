<script type="text/javascript">
	$(function(){
		id = '<?php echo ($_GET['last']!='')?$_GET['last']:''; ?>';

		var plantationList = $("#list-plantation").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.plantation.php",
				"data":{
					id:id
				},
				"type":"POST"
			},
			dom: 'lBfrtip',
			buttons: [
				'excel', 'csv', 'pdf', 'copy'
			],
			aaSorting: [[0, "asc"]],
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
						return row["name"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["region"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["description"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div style='text-align:center;' class='"+ row['last_updated'] +"'>" + 
								"<a href=\"" + hostname + "/plantation.child/" + row["id"] + "\" class=\"btn btn-warning btn-circle waves-effect waves-circle waves-float\" title=\"View Plantation Child\"><i class=\"material-icons\">list</i></a>" + 
								" | <a href=\"" + hostname + "/plantation.edit/" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\"><i class=\"material-icons\">edit</i></a> | <button class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete\" id=\"delete-" + row["id"] + "\" data-name=\"" + row["name"] + "\"><i class=\"material-icons\">close</i></button></div>";
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
			var id = $(this).attr("id").split("-");
			var nama = $(this).data("name");
			id = id[id.length - 1];

			var conf = confirm("Delete Plantation : " + nama + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-plantation",
						id:id
					},
					success:function(resp){
						no = 1;
						
						plantationList.ajax.reload();
						//RefreshData("#list-plantation", hostname + "/api/loader.plantation.php");
					}
				});
			}
			return false;
		});
	});

</script>
<script type="text/javascript">
	$(function(){
		
		var workerList = $("#list-worker").DataTable({
			"ajax":{
				"url": hostname + "/api/loader.worker.php",
				"data":{
					//
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
						return row["kode"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["nama"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["initial"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["status"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<a href=\"" + hostname + "/worker.edit/" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\"><i class=\"material-icons\">edit</i></a> | <button class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete\" id=\"delete-" + row["id"] + "\" data-name=\"" + row["nama"] + "\"><i class=\"material-icons\">close</i></button> ";
					}
				}
			]
		});
	
		$("body").on("click", ".btn-delete", function(){
			var id = $(this).attr("id").split("-");
			var nama = $(this).data("name");
			id = id[id.length - 1];
			console.log(nama);

			var conf = confirm("Delete Worker : " + nama + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-worker",
						id:id
					},
					success:function(resp){
						RefreshData("#list-worker", hostname + "/api/loader.worker.php");
					}
				});
			}
			return false;
		});
	});

</script>
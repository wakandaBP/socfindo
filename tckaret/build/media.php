<script type="text/javascript">
	$(function(){
		menuActive();
		
		var no = 1;
		var mediaList = $("#list-media").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.media.php",
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
						return row["mediacode"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["media"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["description"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						if (row['stok'] == null){
							return "<div style='text-align: center;'><b> - </b></div>";
						} else {
							return "<div style='text-align: center;'><b>" + row["stok"] + "</b></div>";
						}
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div style=\"text-align:center;\"><a href=\"" + hostname + "/media.creation.add/" + row["id"] + "\" class=\"btn btn-success btn-circle waves-effect waves-circle waves-float\" title=\"Add Stock\"><i class=\"material-icons\">add</i></a>" + 
							" | <a href=\"" + hostname + "/media.creation.log/" + row["id"] + "\" class=\"btn btn-warning btn-circle waves-effect waves-circle waves-float\" title=\"View Stok Log\"><i class=\"material-icons\">list</i></a>" + 
							" | <a href=\"" + hostname + "/media.edit/" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\" title=\"Edit Media\"><i class=\"material-icons\">edit</i></a>" + 
							" | <button class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete\" id=\"delete-" + row["id"] + "\" data-name=\"" + row["mediacode"] + "\"> <i class=\"material-icons\" title=\"Delete Media\">close</i></button></div>";
					}
				}
			]
		});
	
		$("body").on("click", ".btn-delete", function(){
			var id = $(this).attr("id").split("-");
			var nama = $(this).data("name");
			id = id[id.length - 1];

			var conf = confirm("Delete Media " + nama + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-media",
						id:id
					},
					success:function(resp){
						no = 1;
						RefreshData("#list-media", hostname + "/api/loader.media.php");
					}
				});
			}
			return false;
		});
	});

</script>
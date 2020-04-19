<script type="text/javascript">
	$(function(){
		menuActive();
		
		var no = 1;
		var contaminationList = $("#list-contamination").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.contamination.php",
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
						return row["species"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						var params = "";
						if (row["deactive"] == "Y"){
							params = "Yes";
						} else {
							params = "No"
						}
						return params;
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div style='text-align:center;'><a href=\"" + hostname + "/contamination.edit/" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\"><i class=\"material-icons\">edit</i></a> | <button class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete\" id=\"delete-" + row["id"] + "\" data-name=\"" + row["species"] + "\"><i class=\"material-icons\">close</i></button></div>";
					}
				}
			]
		});
	
		$("body").on("click", ".btn-delete", function(){
			var id = $(this).attr("id").split("-");
			var nama = $(this).data("name");
			id = id[id.length - 1];

			var conf = confirm("Delete Contamination Species : " + nama + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-contamination",
						id:id
					},
					success:function(resp){
						no = 1;
						RefreshData("#list-contamination", hostname + "/api/loader.contamination.php");
					}
				});
			}
			return false;
		});
	});

</script>
<script type="text/javascript">
	
	$(function(){

		var emscreenlogList = $("#list-screeninglog").DataTable({

			"ajax":{
				"url": hostname + "/api/initiation/loader.embryoscreening.log.php",
				"data":{
					id:<?php echo $page[1];?>
				},
				"type":"POST"
			},
			dom: 'lBfrtip',
			buttons: [
				'excel', 'csv', 'pdf', 'copy'
			],
			aaSorting: [[3, "desc"]],
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
				/*{
					"data" : null, render: function(data, type, row, meta) {
						return row["id"];
					}
				},*/
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["date"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["worker"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["checkpoint"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["embryo"];
					}
				},
				/*{
					"data" : null, render: function(data, type, row, meta) {
						return row["petri"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["mediaworker"];
					}
				},*/
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<a href=\"" + hostname + "/embryoscreening.log.edit/" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\" title=\"Edit Screening Log Data\"><i class=\"material-icons\">edit</i></a>";
					}
				}
			]
		});

	});

</script>
<script type="text/javascript">
	var no;
	$(function(){
		//menuActive();

		var no = 1;
		var treepartList = $("#list-treepart").DataTable({
			
			"ajax":{
				"url": hostname + "/api/loader.treepart.php",
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
				{
					"targets":0,
				 	"className":"dt-body-left",	
				}
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
						return row["partname"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["description"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div style='text-align:center;'><a href=\"" + hostname + "/treepart.edit/" + row["id"] + "\"class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\"><i class=\"material-icons\">edit</i></a> | <button class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete\" id=\"delete-" + row["id"] + "\" data-name=\"" + row["partname"] + "\"><i class=\"material-icons\">close</i></button></div>";
					}
				}
			]
		});
	
		$("body").on("click", ".btn-delete", function(){
			var id = $(this).attr("id").split("-");
			var nama = $(this).data("name");
			id = id[id.length - 1];

			var conf = confirm("Delete Treepart : " + nama + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-treepart",
						id:id
					},
					success:function(resp){
						no = 1;
						RefreshData("#list-treepart", hostname + "/api/loader.treepart.php");
					}
				});
			}
			return false;
		});
	});

</script>
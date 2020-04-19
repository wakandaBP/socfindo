<script type="text/javascript">
	var no;
	$(function(){
		//menuActive();

		no = 1;
		var cloneList = $("#list-clone").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.clone.php",
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
					render: function() {
						return no++;
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["clonename"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["description"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div style='text-align:center;'><a href=\"" + hostname + "/clone.edit/" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\"><i class=\"material-icons\">edit</i></a> | <button class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete\" id=\"delete-" + row["id"] + "\" data-name=\"" + row["clonename"] + "\"><i class=\"material-icons\">close</i></button></div>";
					}
				}
			],
			//buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
		});
	
		$("body").on("click", ".btn-delete", function(){
			var id = $(this).attr("id").split("-");
			var nama = $(this).data("name");
			id = id[id.length - 1];

			var conf = confirm("Delete Clone : " + nama + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-clone",
						id:id
					},
					success:function(resp){
						no = 1;
						RefreshData("#list-clone", hostname + "/api/loader.clone.php");
					}
				});
			}
			return false;
		});
	});

</script>
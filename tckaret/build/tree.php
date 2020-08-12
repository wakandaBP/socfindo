<script type="text/javascript">
	$(function(){
		id = '<?php echo ($_GET['last']!='')?$_GET['last']:''; ?>';
		
		var treeList = $("#list-tree").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.tree.php",
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
						return row["treecode"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["plantation"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["block"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["year"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["clone"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["line"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["gps"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["certified"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["certificatenumber"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div class='"+ row["last_updated"] +"'><a href=\"" + hostname + "/tree.edit/" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\"><i class=\"material-icons\">edit</i></a> | <button class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete\" id=\"delete-" + row["id"] + "\" data-name=\"" + row["treecode"] + "\"><i class=\"material-icons\">close</i></button></div>";
					}
				}
			],
			rowCallback: function (row, data) {
				if (data['last_updated'] == "last_updated"){
					$(row).css({"background-color":"#0779e4","color":"#ffffff"});
				}
			}
		});

		$(document).click(function(e) {
			if ( $(e.target).closest('last_updated').length === 0 ) {
				$(".last_updated").parent().parent().removeAttr("style");
			}
		});
	
		$("body").on("click", ".btn-delete", function(){
			var id = $(this).attr("id").split("-");
			var nama = $(this).data("name");
			id = id[id.length - 1];

			var conf = confirm("Delete Tree with Tree Code : " + nama + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-tree",
						id:id
					},
					success:function(resp){
						no = 1;
						RefreshData("#list-tree", hostname + "/api/loader.tree.php");
					}
				});
			}
			return false;
		});
	});

</script>
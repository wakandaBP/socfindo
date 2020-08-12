<script type="text/javascript">
	$(function(){
		id = '<?php echo ($_GET['last']!='')?$_GET['last']:''; ?>';

		var mediatypeList = $("#list-mediatype").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.mediatype.php",
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
						return row["keterangan"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div style=\"text-align:center;\" class=\""+ row["last_updated"] +"\"><a href=\"" + hostname + "/mediatype.edit/" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\" title=\"Edit Media\"><i class=\"material-icons\">edit</i></a>" + 
							" | <button class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete\" id=\"delete-" + row["id"] + "\" data-name=\"" + row["name"] + "\"> <i class=\"material-icons\" title=\"Delete Media\">close</i></button></div>";
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

			var conf = confirm("Delete Media Type : " + nama + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-mediatype",
						id:id
					},
					success:function(resp){
						RefreshData("#list-mediatype", hostname + "/api/loader.mediatype.php");
					}
				});
			}
			return false;
		});
	});

</script>
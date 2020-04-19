<script type="text/javascript">
	$(function(){

		var listmcreationList = $("#list-media-creation").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.media.creation.php",
				"data":{
					idmedia:<?php echo $page[1];?>
				},
				"type":"POST"
			},
			dom: 'lBfrtip',
			buttons: [
				'excel', 'csv', 'pdf', 'copy'
			],
			aaSorting: [[0, "desc"]],
			"columnDefs":[
				{"targets":0, "className":"dt-body-left"}
			],
			"columns" : [
				// {
				// 	render: function() {
				// 		return no++;
				// 	}
				// },
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["tglbuatmedia"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["worker"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["volume"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["vessel"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["jumlah"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["lamakerja"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<span style='color: red;'><b>" + row["status"] + "</b></span>";
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<a href=\"" + hostname + "/media.creation.edit/" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float " + row['disabled'] + "\" title=\"Edit Media Stock Data\"><i class=\"material-icons\">edit</i></a>" + 

						" | <button " + row['disabled'] + " class=\"btn btn-danger btn-circle waves-effect waves-circle waves-float btn-delete\" " + row['disabled'] + " id='delete-" + row['id'] + "' data-tgl='" + row['tglbuatmedia'] + "' data-worker='" + row['worker'] + "'><i class=\"material-icons\" title='Remove Sample'>delete_outline</i></button> ";
					}
				}
			]
		});


		$("#list-media-creation tbody").on('click','.btn-edit',function(){
			$("#form-edit-media-out").modal("show");
		});

		$("#list-media-creation tbody").on("click", ".btn-delete", function(){
			var id = $(this).attr("id").split("-");
			var tgl = $(this).data("tgl");
			var worker = $(this).data("worker");
			id = id[id.length - 1];

			var conf = confirm("Remove stok : " + tgl + " | " + worker + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-media-stok",
						id:id
					},
					success:function(resp){
						if (JSON.parse(resp) > 0){
							RefreshData("#list-media-creation", hostname + "/api/loader.media.creation.php",{idmedia:<?php echo $page[1];?>});
						}
					}
				});
			}
			return false;
		});


		var listmoutList = $("#list-media-out").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.media.pengurangan.php",
				"data":{
					idmedia:<?php echo $page[1];?>
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
						return row["tglkeluar"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["qty"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<button class=\"btn btn-info btn-circle waves-effect waves-circle waves-float btn-edit\" data-id='" + row['id'] + "'><i class=\"material-icons\" title=\"Edit Media Stock Data\"><i class=\"material-icons\">edit</i></button> " ;
						//"<a href=\"" + hostname + "/media.creation.pengurangan.edit/" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float " + row['disabled'] + "\" title=\"Edit Stock Out Data\"><i class=\"material-icons\">edit</i></a>";
					}
				}
			]
		});
	
	});

</script>
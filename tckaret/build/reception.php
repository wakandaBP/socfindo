<script type="text/javascript">
	$(function(){
		id = '<?php echo ($_GET['last']!='')?$_GET['last']:''; ?>';

		var receptionList = $("#list-reception").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.reception.php",
				"data":{
					id:id
				},
				"type":"POST"
			},
			dom: 'lBfrtip',
			buttons: [
				'excel', 'csv', 'pdf', 'copy'
			],
			select:'single',
			aaSorting: [[1, "desc"]],
			"columnDefs":[
				{"targets":0, "className":"dt-body-left"}
			],
			"columns" : [
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["id"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["receiptdate"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["clonename"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["plantation"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["harvestdate"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["treecode"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["flowers"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["fruits"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["treepart"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["comment"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div class='"+ row['last_updated'] +"' style='text-align:center;'><a href=\"" + hostname + "/reception.seeds/" + row["id"] + "\" class=\"btn btn-warning btn-circle waves-effect waves-circle waves-float\" title=\"View Seeds Description\"><i class=\"material-icons\">list</i></a>" +

							" | <a href=\"" + hostname + "/initiation.add/" + row["id"] + "\" class=\"btn btn-success btn-circle waves-effect waves-circle waves-float\"><i class=\"material-icons\" title='Initiatiate this Reception'>trending_flat</i></a> " +
							" | <a href=\"" + hostname + "/reception.edit/" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\" title='Edit Reception'><i class=\"material-icons\">edit</i></a> " +
							" | <button class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete\" id=\"delete-" + row["id"] + "\" data-name=\"" + row["id"] + "\" title='Delete Reception'><i class=\"material-icons\">close</i></button></div> ";
					}
				}
			],
			rowCallback: function (row, data) {
				if (data['last_updated'] == "last_updated"){
					$(row).css({"background-color":"#0779e4","color":"#ffffff"});
				}
			}
		});

		$('#list-reception tbody').on( 'click', 'tr', function () {
			$(".last_updated").parent().parent().removeAttr("style");
		});
	
		$("body").on("click", ".btn-delete", function(){
			var id = $(this).attr("id").split("-");
			var nama = $(this).data("name");
			id = id[id.length - 1];

			var conf = confirm("Delete Reception with ID : " + nama + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-reception",
						id:id
					},
					success:function(resp){

						RefreshData("#list-reception", hostname + "/api/loader.reception.php");
					}
				});
			}
			return false;
		});

		$("#btnCari").click(function(){
			var awal = $("#datefrom").val();
			var akhir = $("#dateto").val();

			RefreshData("#list-reception", hostname + "/api/loader.reception.php", {awal:awal,akhir:akhir});

			return false;
		})
	});

</script>
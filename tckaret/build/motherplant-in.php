<script type="text/javascript">
	$(function(){
		
		var mplantList = $("#list-mplant").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.motherplant-in.php",
				"data":{
					//
				},
				"type":"POST"
			},
			dom: 'lBfrtip',
			buttons: [
				'excel', 'csv', 'pdf', 'copy'
			],
			aaSorting: [[1, "desc"]],
			"columnDefs":[
				{"targets":0, "className":"dt-body-left"}
			],
			"columns" : [
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["year"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["season"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["idEm"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["idTreat"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["idRecep"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["clone"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["germdate"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["codese"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["leafsample"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["resultofident"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div style='text-align:center;'><a href=\"" + hostname + "/reception.edit/" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\" title='Edit Reception'><i class=\"material-icons\">edit</i></a> " +
							" | <button class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete\" id=\"delete-" + row["id"] + "\" data-name=\"" + row["id"] + "\" title='Delete Reception'><i class=\"material-icons\">close</i></button></div> ";
					}
				}
			]
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
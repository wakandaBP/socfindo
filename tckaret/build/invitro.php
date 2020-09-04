<script type="text/javascript">
	
	$(function(){
		id = '<?php echo ($_GET['last']!='')?$_GET['last']:''; ?>';

		var invitroList = $("#list-invitro").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.invitro.php",
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
						return row["unique_code"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["mother_embryo"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						//return row["deactivated"];
						var checked = (row["deactivated"] == "FALSE") ? "<i class=\"glyphicon glyphicon-unchecked\"></i>":"<i class=\"glyphicon glyphicon-check\"></i>";

						return checked;
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["start_date"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["medium_name"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["recipient_name"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["number_of_plants"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["number_of_alive"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["number_of_dead"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["number_of_contaminated"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["new_shoots_for_r"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["new_shoots_on_m"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["laminar_flow_name"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						//return "";
						return "<div style='text-align:center;' class='"+ row['last_updated'] +"'>" + 
								"<a href=\"" + hostname + "/invitro.edit/" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\" data-toggle='tooltip' title='Edit'><i class=\"material-icons\">edit</i></a>" + 
								" | <button class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete\" id=\"delete_" + row["id"] + "\" data-name=\"" + row["unique_code"] + "\" data-toggle='tooltip' title='Delete'><i class=\"material-icons\">delete_outline</i></button></div>";
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
			var id = $(this).attr("id").split("_");
			var nama = $(this).data("name");
			id = id[id.length - 1];

			var conf = confirm("Delete Acclimatization : " + nama + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-invitro",
						id:id
					},
					success:function(resp){
						invitroList.ajax.reload();
						//RefreshData("#list-clone", hostname + "/api/loader.acclimatization.php");
					}
				});
			}
			return false;
		});
	});

</script>
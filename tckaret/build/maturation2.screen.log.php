<script type="text/javascript">
	var mode = "";
	var action = "";

	$(function(){
		$("#screenworker").on('change',function(){
			$("#idscreenworker").val($(this).val());
		});

		var mat2logList = $("#list-mat2log").DataTable({

			"ajax":{
				"url": hostname + "/api/mat2/loader.mat2-screen.log.php",
				"data":{
					id:<?php echo $page[1];?>
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
					"data": null,"sortable": false, 
			    	render: function (data, type, row, meta) {
			            return meta.row + meta.settings._iDisplayStart + 1;
                	}  
    			},
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
						return row['fungi'];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row['bact'];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["pink"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["dead"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["contcomment"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "" + //"<button data-id='" + row["idlog"] + "' class=\"btn btn-warning btn-circle waves-effect waves-circle waves-float btnView\" title=\"View Initiation Description\"><i class=\"material-icons\">list</i></button>" +
 							
 							" <button data-id='" + row["idlog"] + "' class=\"btn btn-info btn-circle waves-effect waves-circle waves-float btn-editLog\" title=\"Edit Screening Log Data\"><i class=\"material-icons\"><i class=\"material-icons\">edit</i></button>";

							//" | <a href=\"" + hostname + "/maturation2.screen.edit/" + row["idlog"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\" title=\"Edit Screening Log Data\"><i class=\"material-icons\">edit</i></a>";

						return "";
					}
				}
			]
		});

		$("#btnAddLog").click(function (){
			count = "";
			mode = "add";

			$.ajax({
				async:false,
				url: hostname + "/api/mat2/mat2.log.count.php",
				data : {id:<?= $page[1]; ?>},
				type : "POST",
				success: function(resp){
					count = JSON.parse(resp);
				}
			});

			if (count == 1){
				count = count + "st";
			} else if (count == 2){
				count = count + "nd";
			} else if (count == 3) {
				count = count + "rd";
			} else {
				count = count + "th";
			}

			$("#count").html(count);
			$("form")[0].reset();
			$("#form-addmat2").modal("show");
		});

		//var workerSelect = $('#screenworker');

		$("#list-mat2log tbody").on('click','.btn-editLog', function (){
			$("form")[0].reset();
			id = $(this).data("id");
			mode = "edit";

			$.ajax({
				//async:false,
				url: hostname + "/api/mat2/load.log.data.mat2.php",
				data : {id:id},
				type : "POST",
				success: function(resp){
					data = JSON.parse(resp);

					$("#idlog").val(data[0].idlog);
					$("#count").html("Edit Data for " + data[0].checkpoint);
					$("#screendate").val(data[0].date);

					$("#screenworker").val(data[0].worker);
					$("#screenworker").trigger('change');

					$("#idscreenworker").val(data[0].worker);
					$("#comment").val(data[0].comment);
					$("#bact").val(data[0].bact);
					$("#fungi").val(data[0].fungi);
					$("#pink").val(data[0].pink);
					$("#dead").val(data[0].dead);
					$("#contcomment").val(data[0].contcomment);

					$("#form-addmat2").modal("show");
				}
			});
		});


		$("#btnSaveLog").click(function(){
			if (mode == "add"){
				action = "add-mat2screening";
			} else if (mode == "edit") {
				action = "update-mat2screening";
			}

			var idlog = $("#idlog").val();
			var screendate = $("#screendate").val();
			var screenworker = $("#idscreenworker").val();
			var comment = $("#comment").val();

			var fungi = $("#fungi").val();
			var bact = $("#bact").val();
			var pink = $("#pink").val();
			var dead = $("#dead").val();
			var contcomment = $("#contcomment").val();

			if (screendate != "" && screenworker != ""){
				$.ajax({
					async:false,
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:action,

						screendate:screendate,
						screenworker:screenworker,	
						comment:comment,

						fungi:fungi,
						bact:bact,
						pink:pink,
						dead:dead,
						contcomment:contcomment,
						
						idlog:idlog,
						idembryo:<?php echo $page[1]?>
					},
					success:function(resp){
						
						if(parseInt(resp) > 0){
							alert("Data has been "+ mode + "ed!");
                        	$("#form-addmat2").modal("hide");
                        	RefreshData("#list-mat2log",hostname + "/api/mat2/loader.mat2-screen.log.php",({id:<?= $page[1];?>}) );
                        	showRowLastRow(mat2logList);
                        }
                        else{
                            //alert(resp);
                        }
					}
				})
			} else {
				alert("Please fill out every field with *");
			}

			mode = "";
			return false;

		});

	});

</script>
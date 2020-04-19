<script type="text/javascript">
	// var dataforaddpetri = [];
	// var datacheckbox = [];

	$(function(){
		//menuActive();
		// $('.numberonly').keypress(function(event){
		// 	if (event.which < 48 || event.which > 57) {
		//         event.preventDefault();
		//     }
		// });

		// $("#initmedium").on('change',function(){
		// 	$("#idinitmedium").val($(this).val());
		// });

		// $("#petrinumber").on('keyup',function(){
		// 	petrinum = $(this).val();

		// 	$.ajax({
		// 		async:false,
		// 		url: hostname + "/api/initiation/check.petridishnumber.php",
		// 		type: "POST",
		// 		data: {
		// 			petri:petrinum
		// 		},
		// 		success: function(resp){
		// 			if (JSON.parse(resp) > 0){
		// 				//console.log(JSON.parse(resp));
		// 				$("#media-field").attr("hidden","true");
		// 			} else {
		// 				//console.log(JSON.parse(resp));
		// 				$("#media-field").removeAttr("hidden");
		// 			}
		// 		}
		// 	})
		// });

		no = 1;
		var obscallusList = $("#list-obscallus").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.obscallus.php",
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
					"data" : null, render: function(data, type, row, meta) {
						return "<div style='text-align:center;'><input class='usecheckbox' type='checkbox' value='" + row['id_treatment'] + "'></div>";
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["id_treatment"];
					}
				},
				/*{
					"data" : null, render: function(data, type, row, meta) {
						return row["id_reception"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["nobox"];
					}
				},
				{
				 	"data" : null, render: function(data, type, row, meta) {
				 		return row["clonename"];
				 	}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["sample"];
					}
				},*/
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["obsdate"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["contfungi"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["contbact"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["notreact"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["alotof"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["littlebit"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["yellow"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["white"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["orange"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["brown"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["dead"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div style='text-align:center;'>" + 

							// "<a href=\"" + hostname + "/reception.seeds/" + row["id"] + "\" class=\"btn btn-warning btn-circle waves-effect waves-circle waves-float\" title=\"View Initiation Description\"><i class=\"material-icons\">list</i></a>"

							"<button data-id='" + row["id_treatment"] + "' class=\"btn btn-warning btn-circle waves-effect waves-circle waves-float btnView\" title=\"View Initiation Description\"><i class=\"material-icons\">list</i></button>" +

							" | <a href=\"" + hostname + "/transfercallus.add/" + row["id_treatment"] + "\" class=\"btn btn-success btn-circle waves-effect waves-circle waves-float\"><i class=\"material-icons\" title='Go To Observation Callus'>trending_flat</i></a> " +

							" | <a href=\"" + hostname + "/initiation-obs.edit/" + row["id_treatment"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\" title='Edit Initiation'><i class=\"material-icons\">edit</i></a> " +

							" | <button class=\"btn bg-yellow btn-circle waves-effect waves-circle waves-float btn-delete\" id=\"trash-" + row["id_treatment"] + "\" data-name=\"" + row["id_treatment"] + "\" title='Trashing Treatment'><i class=\"material-icons\">delete</i></button>" +

							" | <button class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete\" id=\"delete-" + row["id"] + "\" data-name=\"" + row["id_treatment"] + "\" title='Delete Initiation'><i class=\"material-icons\">close</i></button></div> ";
					}
				}
			]
		});

		$("body").on("click", ".btn-delete", function(){
			var id = $(this).attr("id").split("-");
			var nama = $(this).data("name");
			id = id[id.length - 1];

			var conf = confirm("Delete Observation Callus data with ID Treatment : " + nama + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-obscallus",
						id:id
					},
					success:function(resp){
						no = 1;
						RefreshData("#list-obscallus", hostname + "/api/loader.obscallus.php");
					}
				});
			}
			return false;
		});


		$("tbody").on("click",".btnView",function(){
			id = $(this).data("id");

			$.ajax({
				url: hostname + "/api/obscallus/view.obscallus.detail.php",
				type: "POST",
				data: {
					id:id
				},
				success: function(resp){
					console.log(resp);
					data = JSON.parse(resp);

					//console.log(data[0].id);
					$("#title").html(data[0].id);
					$("#idtreatment").html(data[0].id);
					$("#idreception").html(data[0].idreception);
					$("#nobox").html(data[0].nobox);
					$("#clone").html(data[0].clonename);
					$("#sample").html(data[0].sample);
					$("#obsdate").html(data[0].obsdate);
					$("#obsworker").html(data[0].obsworker);
					$("#contfungi").html(data[0].contfungi);
					$("#contbact").html(data[0].contbact);
					$("#notreact").html(data[0].notreact);
					$("#alotof").html(data[0].alotof);
					$("#littlebit").html(data[0].littlebit);

					$("#yellow").html(data[0].yellow);
					$("#white").html(data[0].white);
					$("#orange").html(data[0].orange);
					$("#brown").html(data[0].brown);
					$("#dead").html(data[0].dead);
					
					$("#laminar").html(data[0].laminar);
					$("#treatcomment").html(data[0].treatcomment);

					$("#petridish").empty().html(data[0].petridish);;
					$("#media").empty().html(data[0].initiationmedium);
					$("#preparedate").empty().html(data[0].mediumpreparedate);
					$("#mediaworker").empty().html(data[0].workermedia);

					$("#view-description").modal("show");
				}				
			})
		});

		// $("#updatepetri").click(function(){
		// 	datacheckbox = [];

		//     // Iterate over all selected checkboxes
		//     $.each($("input[class='usecheckbox']:checked"), function(){
		//        	datacheckbox.push($(this).val());
		//     });


		//     if (datacheckbox != null && datacheckbox != ""){
		//     	$("#form-updatepetri").modal("show");
		//     	dataforaddpetri = datacheckbox;
		//     	//console.log(dataforaddpetri);
		//     } else {
		//     	alert("Check minimal 1 from list of the table!");
		//     }
		
			//console.log(datacheckbox);
			
		//});

		// $("#btnAddPetrinum").click(function(){
		// 	//console.log(dataforaddpetri);
		// 	idvessel = $("#petrinumber").val();
		// 	idpembuatanmedia = $("#idinitmedium").val();

		// 	//console.log(idvessel + " " + idpembuatanmedia);
		// 	$.ajax({
		// 		url : hostname + "/action.php",
		// 		type: "POST",
		// 		data : {
		// 			action:"update-petri-initiation",
		// 			datacheckbox:datacheckbox,
		// 			idvessel:idvessel,
		// 			idpembuatanmedia:idpembuatanmedia
		// 		},
		// 		success : function(resp){
		// 			//alert(resp);
		// 			if (JSON.parse(resp) > 0){
		// 				location.href = hostname + "/initiation";
		// 			}
		// 		}				
		// 	})
		// });
	})


</script>

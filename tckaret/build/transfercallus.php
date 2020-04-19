<script type="text/javascript">
	var dataforaddpetri = [];
	var datacheckbox = [];
	var selectedMedium;

	$(function(){
		//menuActive();

		selectedMedium = refreshCreateDate($("#idmedium").val());

		$("#medium").on('change',function(){
			$("#idmedium").val($(this).val());
			idmedia = $("#idmedium").val();

			refreshCreateDate(idmedia);
		});

		$("#petrinumber").on('keyup',function(){
			petrinum = $(this).val();

			$.ajax({
				async:false,
				url: hostname + "/api/transcallus/check.petridishnumber.php",
				type: "POST",
				data: {
					petri:petrinum
				},
				success: function(resp){
					if (JSON.parse(resp) > 0){
						//console.log(JSON.parse(resp));
						$("#media-field").attr("hidden","true");
						$("#date-field").attr("hidden","true");
					} else {
						//console.log(JSON.parse(resp));
						$("#media-field").removeAttr("hidden");
						$("#date-field").removeAttr("hidden");
					}
				}
			})
		});

		no = 1;
		var initiationList = $("#list-transcallus").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.transfercallus.php",
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
						return "<div style='text-align:center;'><input class='usecheckbox' type='checkbox' value='" + row['id'] + "'></div>";
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["id"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["callustrans"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["transdate"];
					}
				},
				{
				 	"data" : null, render: function(data, type, row, meta) {
				 		return row["laminar"];
				 	}
				},
				{
				 	"data" : null, render: function(data, type, row, meta) {
				 		return row["cont"];
				 	}
				},				
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["petri"];
					}
				},
				/*{
					"data" : null, render: function(data, type, row, meta) {
						return row["media"];
					}
				},*/
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div style='text-align:center;'>" + 

							// "<a href=\"" + hostname + "/reception.seeds/" + row["id"] + "\" class=\"btn btn-warning btn-circle waves-effect waves-circle waves-float\" title=\"View Initiation Description\"><i class=\"material-icons\">list</i></a>"

							//"<button data-id='" + row["id"] + "' class=\"btn btn-warning btn-circle waves-effect waves-circle waves-float btnView\" title=\"View Transfer Callus Description\"><i class=\"material-icons\">list</i></button>" +

							" | <a href=\"" + hostname + "/embryoscreening.add/" + row["id"] + "\" class=\"btn btn-success btn-circle waves-effect waves-circle waves-float\"><i class=\"material-icons\" title='Go To Observation Callus'>trending_flat</i></a> " +

							" | <a href=\"" + hostname + "/transfercallus.edit/" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\" title='Edit Initiation'><i class=\"material-icons\">edit</i></a> " +

							" | <button class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete\" id=\"delete-" + row["id"] + "\" data-name=\"" + row["id"] + "\" title='Delete Transfer Callus'><i class=\"material-icons\">close</i></button></div> ";
					}
				}
			]
		});


		$("body").on("click", ".btn-delete", function(){
			var id = $(this).attr("id").split("-");
			var nama = $(this).data("name");
			id = id[id.length - 1];

			var conf = confirm("Delete Initiation with ID : " + nama + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-initiation",
						id:id
					},
					success:function(resp){
						no = 1;
						RefreshData("#list-initiation", hostname + "/api/loader.initiation.php");
					}
				});
			}
			return false;
		});


		$("tbody").on("click",".btnView",function(){
			id = $(this).data("id");

			$.ajax({
				url: hostname + "/api/transcallus/view.initiation.detail.php",
				type: "POST",
				data: {
					id:id
				},
				success: function(resp){
					//console.log(resp);
					data = JSON.parse(resp);

					//console.log(data[0].id);
					$("#title").html(data[0].id);
					$("#idtreatment").html(data[0].id);
					$("#idreception").html(data[0].idreception);
					$("#nobox").html(data[0].nobox);
					$("#clone").html(data[0].clonename);
					$("#sample").html(data[0].sample);
					$("#initdate").html(data[0].initiationdate);
					$("#widthseed").html(data[0].widthseed);
					$("#totalseeds").html(data[0].totalseeds);
					$("#seedcomment").html(data[0].seedcoments);
					$("#ze").html(data[0].ze);
					$("#se").html(data[0].se);
					$("#petridish").empty().html(data[0].petridish);
					$("#initworker").html(data[0].initworker);
					$("#laminar").html(data[0].laminar);
					$("#treatcomment").html(data[0].treatcomment);
					$("#media").empty().html(data[0].initiationmedium);
					$("#preparedate").empty().html(data[0].mediumpreparedate);
					$("#mediaworker").empty().html(data[0].workermedia);

					$("#view-description").modal("show");
				}				
			})
		});

		$("#updatepetri").click(function(){
			datacheckbox = [];

		    // Iterate over all selected checkboxes
		    $.each($("input[class='usecheckbox']:checked"), function(){
		       	datacheckbox.push($(this).val());
		    });


		    if (datacheckbox != null && datacheckbox != ""){
		    	$("#form-updatepetri").modal("show");
		    	dataforaddpetri = datacheckbox;
		    	//console.log(dataforaddpetri);
		    } else {
		    	alert("Check minimal 1 from list of the table!");
		    }
		
			//console.log(datacheckbox);
			
		});

		$("#btnAddPetrinum").click(function(){
			//console.log(dataforaddpetri);

			idvessel = $("#petrinumber").val();
			idpembuatanmedia = $("#createddate").val();
			//console.log(idvessel + " " + idpembuatanmedia);
			$.ajax({
				url : hostname + "/action.php",
				type: "POST",
				data : {
					action:"update-petri-transcallus",
					datacheckbox:datacheckbox,
					idvessel:idvessel,
					idpembuatanmedia:idpembuatanmedia
				},
				success : function(resp){
					//alert(resp);
					if (JSON.parse(resp) > 0){
						RefreshData("#list-initiation", hostname + "/api/loader.initiation.php");
						$("#form-updatepetri").modal("hide");
					}
				}				
			})
		});
	});
	

	function refreshCreateDate(medium){
		var selectedMedium;
		$("#createddate option").remove();

		$.ajax({
			url: hostname + "/api/transcallus/created.media.loader.php",
			//async:false,
			type: "POST",
			data: {
				idmedia:medium
			},
			success:function(resp){
				var MetaData = JSON.parse(resp);

				for(var key in MetaData){
					//var id = key.split("-");
					id = MetaData[key]['id'];
					var selection = document.createElement("OPTION");
					$(selection).attr("value", id).html(MetaData[key]['tglbuatmedia'] + " - " + MetaData[key]['worker']);

					$("#createddate").append(selection);
				}
			}
		});

		selectedMedium = $("#createddate").val();
		return selectedMedium;
	}

</script>
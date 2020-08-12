<script type="text/javascript">
	var dataforaddpetri = [];
	var datacheckbox = [];
	var selectedRow = "";
	var selectedMedium;
	var selectedTreat = "";
	var selectedRemain = "";
	var selectedIDPengeluaran = "";
	var selectedData = "";
	var mode = "";

	$(function(){

		$("#medium").on('change',function(){
			$("#idmedium").val($(this).val());

			if (mode == "add"){
				stats = checkAvailableMedia($("#amountmedia").val(),$("#idmedium").val(),"error-media","available-media");
			} else if (mode == "edit") {
				stats = checkAvailableMediaforEdit($("#amountmedia").val(),$("#idmedium").val(),selectedIDPengeluaran,"error-media","available-media");
			}
			disabledButton(stats);
		});

		$("#amountmedia").on('keyup',function(){
			if (mode == "add"){
				stats = checkAvailableMedia($("#amountmedia").val(),$("#idmedium").val(),"error-media");
			} else if (mode == "edit") {
				stats = checkAvailableMediaforEdit($("#amountmedia").val(),$("#idmedium").val(),selectedIDPengeluaran,"error-media");
			}
			disabledButton(stats);
		});

		var initiationList = $("#list-initiation").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.initiation.php",
				"data":{
					//
				},
				"type":"POST"
			},
			dom: 'lBfrtip',
			buttons: [
				'excel', 'csv', 'pdf', 'copy'
			],
			select:'single',
			aaSorting: [[0, "desc"]],
			"columnDefs":[
				{"targets":0, "className":"dt-body-left"}
			],
			"columns" : [
				/*{
					"data" : null, render: function(data, type, row, meta) {
						return "<div style='text-align:center;'><input class='usecheckbox' type='checkbox' value='" + row['id'] + "'></div>";
					}
				},*/
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["id"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["idreception"];
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
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["initiationdate"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["widthseed"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["totalseeds"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["ze"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["se"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["remaining"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["petriremain"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["lastmedia"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div style='text-align:center;'>" + 

							// "<a href=\"" + hostname + "/reception.seeds/" + row["id"] + "\" class=\"btn btn-warning btn-circle waves-effect waves-circle waves-float\" title=\"View Initiation Description\"><i class=\"material-icons\">list</i></a>"

							/*"<button data-id='" + row["id"] + "' class=\"btn btn-warning btn-circle waves-effect waves-circle waves-float btnView\" title=\"View Initiation Description\"><i class=\"material-icons\">list</i></button> |" +*/

							" <a href=\"" + hostname + "/initiation-obs/" + row["id"] + "\" class=\"btn btn-success btn-circle waves-effect waves-circle waves-float\"><i class=\"material-icons\" title='Go To Observation Callus'>trending_flat</i></a> " +

							" | <a href=\"" + hostname + "/initiation.edit/" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\" title='Edit Initiation'><i class=\"material-icons\">edit</i></a> " +

							" | <button " + row['disabled'] + " class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete\" id=\"delete-" + row["id"] + "\" data-name=\"" + row["id"] + "\" title='Delete Initiation'><i class=\"material-icons\">close</i></button></div> ";
					}
				}
			],
			rowId: function(a) {
			    return a.id;
			},
		});


		$('#list-initiation tbody').on( 'click', 'tr', function () {
		    var d = initiationList.row(this).data();
		     
		    d.counter++;
			
			console.log(d);

			if (selectedData != ""){
				if (selectedData['id'] == d.id){
					selectedData = [];
					selectedTreat = "";
					selectedIDPengeluaran = "";
		    		selectedRemain = 0;
				} else {
					selectedTreat = d.id;
					selectedIDPengeluaran = d.idpengeluaranmedia;
		    		selectedRemain = parseInt(d.remaining);
					selectedData = {id:d.id,idtreatment:d.idtreatment,transdate:d.transdate,idpengeluaranmedia:d.idpengeluaranmedia,remain:parseInt(d.remainembryo)};
				}
			} else {
				selectedTreat = d.id;
				selectedIDPengeluaran = d.idpengeluaranmedia;
				selectedRemain = parseInt(d.remaining);
				selectedData = {id:d.id,idtreatment:d.idtreatment,transdate:d.transdate,idpengeluaranmedia:d.idpengeluaranmedia,remain:parseInt(d.remainembryo)};
			}
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
						RefreshData("#list-initiation", hostname + "/api/loader.initiation.php");
					}
				});
			}
			return false;
		});


		$("tbody").on("click",".btnView",function(){
			id = $(this).data("id");

			$.ajax({
				url: hostname + "/api/initiation/view.initiation.detail.php",
				type: "POST",
				data: {
					id:id
				},
				success: function(resp){
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

		/*$("#updatepetri").click(function(){
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
			
		});*/

		$("#updatemedia").click(function(){
			mode = "add";

		    if (selectedTreat != ""){
		    	//console.log(dataforaddpetri);
		    	if (selectedRemain == 0){
		    		alert("This treatment has no remaining sample!");
		    	} else {
		    		$("form")[0].reset();
		    		$("#medium").trigger('change');
		    		
		    		$("#title-media").html("");
		    		$("#title-id").html(selectedTreat);
		    		$("#form-updatemedia").modal("show");
		    	}
		    } else {
		    	alert("Select 1 from list of the table!");
		    }
		});	

		$("#editupdatemedia").click(function(){
			mode = "edit";

		    if (selectedTreat != ""){
		    	//console.log(dataforaddpetri);
		    	if (selectedRemain == 0){
		    		alert("This treatment has no remaining sample!");
		    	} else {
		    		$.ajax({
						url: hostname + "/api/initiation/check.initiation.media.php",
						type: "POST",
						data: {
							idtreatment:selectedTreat
						},
						success: function(resp){
							console.log(resp);
							data = JSON.parse(resp);


							$("form")[0].reset();
							$("#idmedium").val(data['media']);
							$("#medium").val(data['media']);
							$("#medium").trigger('change');
							$("#amountmedia").val(data['jumlah']);

							$("#title-id").html(selectedTreat);
							$("#title-media").html("Edit data for");
				    		$("#form-updatemedia").modal("show");
						}				
					});
		    		
		    	}
		    } else {
		    	alert("Select 1 from list of the table!");
		    }
		});	


		$("#btnUnselect").click(function(){
			selectedTreat = "";
			initiationList.rows().deselect();
		});


		$("#btnUpdateMedia").click(function(){

			idmedia = $("#idmedium").val();
			amountmedia = $("#amountmedia").val();

			$.ajax({
				async: false,
				url : hostname + "/action.php",
				type: "POST",
				data : {
					action: mode +"-update-media-initiation",
					idtreatment:selectedTreat,
					idmedia:idmedia,
					amountmedia:amountmedia
				},
				success : function(resp){
					//alert(resp);
					if (JSON.parse(resp) > 0){
						alert("Media has been updated!");
						$("#form-updatemedia").modal("hide");
						RefreshData("#list-initiation", hostname + "/api/loader.initiation.php");
						selectedData = "";
						showRowLastRow(initiationList);
					}
				}				
			})
			return false;
		});

		$("#btnCari").click(function(){
			var awal = $("#datefrom").val();
			var akhir = $("#dateto").val();

			RefreshData("#list-initiation", hostname + "/api/loader.initiation.php", {awal:awal,akhir:akhir});

			return false;
		})
	});
	
	/*function refreshCreateDate(medium){
		var selectedMedium;
		$("#createddate option").remove();

		$.ajax({
			url: hostname + "/api/initiation/created.media.loader.php",
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
	}*/

	function disabledButton(resp){
		if (resp == ""){
			$("#btnUpdateMedia").attr("disabled",false);
		} else {
			$("#btnUpdateMedia").attr("disabled",true);
		}
	}

</script>
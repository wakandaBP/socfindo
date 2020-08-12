<script type="text/javascript">
	var dataforaddpetri = [];
	var datacheckbox = [];
	var dataformultitransfer = [];
	var selectedRow = "";
	var selectedMedium;
	var selectedTreat = "";
	var selectedRemain = "";

	$(function(){

		$("#germ-worker").on('change',function(){
			$("#germ-idworker").val($(this).val());
		});

		$("#germ-laminar").on('change',function(){
			$("#germ-idlaminar").val($(this).val());
		});

		$("#germ-amountmedia").on('keyup',function(){
			stats = checkAvailableMedia($("#germ-amountmedia").val(),$("#germ-idmedia").val(),"germ-error-media");
			disabledButton(stats,"btnMultiTrans");
		});

		$("#germ-media").on('change',function(){
			$("#germ-idmedia").val($(this).val());

			stats = checkAvailableMedia($("#germ-amountmedia").val(),$("#germ-idmedia").val(),"germ-error-media");
			disabledButton(stats,"btnMultiTrans");
		});

		$("#medium").on('change',function(){
			$("#idmedium").val($(this).val());

			stats = checkAvailableMedia($("#amountmedia").val(),$("#idmedium").val(),"error-media","available-media");
			disabledButton(stats,"btnUpdateMedia");
		});

		$("#amountmedia").on('keyup',function(){
			stats = checkAvailableMedia($("#amountmedia").val(),$("#idmedium").val(),"error-media","available-media");
			disabledButton(stats,"btnUpdateMedia");
		});

		$("#mat2worker").on('change',function(){
			$("#idmat2worker").val($(this).val());
		})

		$("#laminar").on('change',function(){
			$("#idlaminar").val($(this).val());
		})

		var mat2List = $("#list-mat2").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.mat2.php",
				"data":{
					//
				},
				"type":"POST"
			},
			dom: 'lBfrtip',
			buttons: [
				'excel', 'csv', 'pdf', 'copy'
			],
			//aaSorting: [[3, "desc"]],
			"columnDefs":[
				{"targets":0, "className":"dt-body-left"}
			],
			"columns" : [
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div style='text-align:center;'><input class='usecheckbox' type='checkbox' value='" + row['idembryo'] + "'></div>";
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["idembryo"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["idtreatment"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["transdate"];
					}
				},
				{
				 	"data" : null, render: function(data, type, row, meta) {
				 		return row["nobox"];
				 	}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["culroom"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["laminar"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["media"];
					}
				},
				/*{
					"data" : null, render: function(data, type, row, meta) {
						return "<span style='color:red;'><b>" + row["status"] + "</b></span>";
					}
				},*/
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["lastdate"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["cekpoin"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<b>" + row["cont_status"] + "</b>";
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div style='text-align:center;'>" + 
							" <a href=\"" + hostname + "/maturation2.screen.log/" + row["idembryo"] + "\" class=\"btn btn-default btn-circle waves-effect waves-circle waves-float\"><i class=\"material-icons\" title='Maturation II Screening'>check</i></a> " +

							" | <a href=\"" + hostname + "/germination.add/" + row["idembryo"] + "\" class=\"btn btn-success btn-circle waves-effect waves-circle waves-float " + row['disabled'] + "\"><i class=\"material-icons\" title='Transfer to Germination'>trending_flat</i></a>" +

							" | <button class=\"btn btn-info btn-circle waves-effect waves-circle waves-float btnEdit\" data-id='" + row['id'] + "' title='Edit Data'><i class=\"material-icons\">edit</i></button> " +

							" | <button class=\"btn btn-danger btn-circle waves-effect waves-circle waves-float btn-delete\" data-idem='" + row['idembryo'] + "' id='delete-" + row['id'] + "'><i class=\"material-icons\" title='Remove Sample'>delete_outline</i></button> " +

							"</div> ";
					}
				}
			],
			rowId: function(a) {
			    return a.idembryo;
			},
		});

		/*$('#list-mat2 tbody').on( 'click', 'tr', function () {
		    var d = mat2List.row(this).data();
		     
		    d.counter++;
		    selectedTreat = d.id;
		    selectedRemain = parseInt(d.remaining);
		});*/

		$("body").on("click", ".btn-delete", function(){
			var id = $(this).attr("id").split("-");
			id = id[id.length - 1];
			idEm = $(this).data("idem");

			var conf = confirm("Trash ID Embryo : " + idEm + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-mat2",
						id:id
					},
					success:function(resp){
						alert("Data has been deleted!");
						RefreshData("#list-mat2", hostname + "/api/loader.mat2.php");
					}
				});
			}
			return false;
		});


		$("tbody").on("click",".btnEdit",function(){
			id = $(this).data("id");
			$("form")[1].reset();

			$.ajax({
				url: hostname + "/api/mat2/load.mat2.data.php",
				type: "POST",
				data: {
					id:id
				},
				success: function(resp){
					data = JSON.parse(resp);

					$("#title-edit").html(data[0].idembryo);
					$("#iddata").val(data[0].id);
					$("#mat2transdate").val(data[0].transdate);
					$("#mat2worker").val(data[0].worker).trigger('change');
					$("#idmat2worker").val(data[0].worker);
					$("#nobox").val(data[0].nobox);
					$("#cultureroom").val(data[0].culroom);
					$("#laminar").val(data[0].laminar).trigger('change');
					$("#idlaminar").val(data[0].laminar);
					$("#comment").val(data[0].comment);

					$("#form-edit-mat2").modal("show");
				}				
			})
		});


		$("#multitrans").click(function(){
			datacheckbox = [];

		    // Iterate over all selected checkboxes
		    $.each($("input[class='usecheckbox']:checked"), function(e){
		    	idEm = $(this).val();

		    	$.ajax({
		    		async:false,
		    		url: hostname + "/api/mat2/mat2.log.count.php",
		    		type : "POST",
		    		data : {
		    			id:idEm
		    		},
		    		success:function(resp){
		    			//alert(resp);
		    			if (JSON.parse(resp) > 1){
		    				datacheckbox.push(idEm);
		    			} else {
		    				alert("Embryo with ID : " + idEm + " cannot be transferred because it never been observed! Please make sure embryo has ready for transfer.");
		    			}
		    		}
		    	});

		    	//console.log(datacheckbox);
		    });

		    //console.log(datacheckbox);
		    if (datacheckbox.length > 1){
		    	implodeIdEm  = datacheckbox.join(", ");
		    	$("#title2").html(implodeIdEm);

		    	$("form")[2].reset();
		    	$("#form-multitrans").modal("show");
		    	dataformultitransfer = datacheckbox;
				//console.log(dataforaddpetri);
		    } else {
		    	alert("Check minimal 2 from list of the table for Multiple Transfer!");
		    }
			return false;
		});

		$("#btnMultiTrans").click(function(){
			console.log(dataformultitransfer);
			var germtransdate = $("#germ-transdate").val();
			var germworker = $("#germ-idworker").val();
			var germnobox = $("#germ-nobox").val();
			var germculroom = $("#germ-cultureroom").val();
			var germlaminar = $("#germ-idlaminar").val();
			var germmedia = $("#germ-idmedia").val();
			var germamountmedia = $("#germ-amountmedia").val();

			if (germtransdate != "" && germworker != "" && germnobox != "" && germculroom != "" && germlaminar != "" && germamountmedia != "" && germmedia != ""){
			
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"multi-trans-germ",

						germtransdate:germtransdate,
						germworker:germworker,	
						germnobox:germnobox,
						germculroom:germculroom,
						germlaminar:germlaminar,

						germamountmedia:germamountmedia,
						germmedia:germmedia,
						
						dataformultitransfer:dataformultitransfer
					},
					success:function(resp){
						alert(resp);
						if(parseInt(resp) > 0){
							alert("Embryos has been transfered! Please complete the embryo and callus data on the germination page.");
                        	location.href = hostname + "/maturation2";
                        }
                        else{
                           alert("Embryos can't be transfered!");
                        }
					}
				});
			} else {
				alert("Please fill out every field with *");
			}
			return false;
		});


		/*$("tbody").on("click",".btnView",function(){
			id = $(this).data("id");

			$.ajax({
				url: hostname + "/api/initiation/view.initiation.detail.php",
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
		});*/

		$("#updatemedia").click(function(){
			datacheckbox = [];

		    // Iterate over all selected checkboxes
		    $.each($("input[class='usecheckbox']:checked"), function(){
		       	datacheckbox.push($(this).val());
		    });

		    if (datacheckbox != null && datacheckbox != ""){
		    	implodeIdEm  = datacheckbox.join(", ");
		    	$("#title-id").html(implodeIdEm);

		    	$("form")[0].reset();
		    	dataformultitransfer = datacheckbox;
		    	$("#form-updatemedia").modal("show");
		    	dataforaddmedia = datacheckbox;
		    } else {
		    	alert("Check minimal 1 from list of the table!");
		    }
			
		});

		$("#btnUnselect").click(function(){
			$.each($("input[class='usecheckbox']:checked"), function(){
		       $("input[class='usecheckbox']").attr("checked",false);
		    });

			selectedEm = "";
		});

		$("#btnUpdateMedia").click(function(){
			idmedia = $("#idmedium").val();
			amountmedia = $("#amountmedia").val();

			$.ajax({
				url : hostname + "/action.php",
				type: "POST",
				data : {
					action:"add-update-media-mat2",
					dataforaddmedia:dataforaddmedia,
					idmedia:idmedia,
					amountmedia:amountmedia
				},
				success : function(resp){
					alert(resp);
					/*if (JSON.parse(resp) > 0){
						RefreshData("#list-mat2", hostname + "/api/loader.mat2.php");
						$("#form-updatemedia").modal("hide");
					}*/
				}				
			})
			return false;
		});

		$("#btnCari").click(function(){
			var awal = $("#datefrom").val();
			var akhir = $("#dateto").val();

			RefreshData("#list-initiation", hostname + "/api/loader.initiation.php", {awal:awal,akhir:akhir});

			return false;
		});


		$("#btnUpdateData").click(function(){
			transdate = $("#mat2transdate").val();
			worker = $("#idmat2worker").val();
			nobox = $("#nobox").val();
			culroom = $("#cultureroom").val();
			laminar = $("#idlaminar").val();
			comment = $("#seedcomment").val();

			if (transdate != "" && worker != "" && nobox != "" && culroom != "" && laminar != ""){

				$.ajax({
					url : hostname + "/action.php",
					type: "POST",
					data : {
						action:"update-mat2",
						transdate:transdate,
						worker:worker,
						nobox:nobox,
						culroom:culroom,
						laminar:laminar,
						comment:comment,
						id:id
					},
					success : function(resp){
						//alert(resp);
						if (JSON.parse(resp) > 0){
							alert("Data has beed saved!");
							RefreshData("#list-mat2", hostname + "/api/loader.mat2.php");
							$("#form-edit-mat2").modal("hide");
							showLastRow(mat2List);
						} else {
							alert("Data cannot be saved!");
						}
					}				
				});
			} else {
				alert("Please fill out every field with *");
			}
			return false;
		});
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

	function disabledButton(resp, selector){
		if (resp == ""){
			$("#" + selector).attr("disabled",false);
		} else {
			$("#" + selector).attr("disabled",true);
		}
	}

</script>
<script type="text/javascript">
	var dataforaddmedia = [];
	var datacheckbox = [];
	var selectedRow = "";
	var selectedMedium;
	var selectedTreat = "";
	var selectedRemain = "";

	$(function(){
		$("#medium").on('change',function(){
			$("#idmedium").val($(this).val());

			stats = checkAvailableMedia($("#amountmedia").val(),$("#idmedium").val(),"error-media","available-media");
			disabledButton(stats);
		});

		$("#amountmedia").on('keyup',function(){
			stats = checkAvailableMedia($("#amountmedia").val(),$("#idmedium").val(),"error-media","available-media");
			disabledButton(stats);
		});

		$("#worker").on('change',function(){
			$("#idworker").val($(this).val());
		});

		$("#laminar").on('change',function(){
			$("#idlaminar").val($(this).val());
		});

		$("#shapeofembryo").on('change',function(){
			$("#select-shapeofembryo").val($(this).val());
		});


		var germList = $("#list-germ").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.germ.php",
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

							// "<a href=\"" + hostname + "/reception.seeds/" + row["id"] + "\" class=\"btn btn-warning btn-circle waves-effect waves-circle waves-float\" title=\"View Initiation Description\"><i class=\"material-icons\">list</i></a>"

							"  <a href=\"" + hostname + "/germination.screen.log/" + row["idembryo"] + "\" class=\"btn btn-default btn-circle waves-effect waves-circle waves-float \"><i class=\"material-icons\" title='Germination Screening'>check</i></a> " +

							" | <a href=\"" + hostname + "/germination-prepare.add/" + row["idembryo"] + "\" class=\"btn btn-success btn-circle waves-effect waves-circle waves-float " + row['disabled'] + "\"><i class=\"material-icons\" title='Transfer to Germination'>trending_flat</i></a>" + 

							" | <button data-id=\"" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float btnEdit\" title='Edit Data'><i class=\"material-icons\">edit</i></button> " +

							" | <button class=\"btn btn-danger btn-circle waves-effect waves-circle waves-float btn-delete\" data-idem='" + row['idembryo'] + "' id='delete-" + row['id'] + "'><i class=\"material-icons\" title='Remove Embryo'>delete_outline</i></button> " +
						"</div>";
					}
				}
			],
			rowId: function(a) {
			    return a.idembryo;
			},
		});

		/*$('#list-germ tbody').on( 'click', 'tr', function () {
		    var d = initiationList.row(this).data();
		     
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
						action:"delete-germ",
						id:id
					},
					success:function(resp){
						if (JSON.parse(resp) > 0){
							alert("Data has been deleted!");
							RefreshData("#list-germ", hostname + "/api/loader.germ.php");
						} else {
							alert("Data cant be deleted!");
						}
					}
				});
			}
			return false;
		});
		

		$("tbody").on("click",".btnEdit",function(){
			id = $(this).data("id");
			$("form")[0].reset();

			$.ajax({
				url: hostname + "/api/germ/load.germ.data.php",
				type: "POST",
				data: {
					id:id
				},
				success: function(resp){
					//console.log(resp);
					data = JSON.parse(resp);

					$("#title-edit").html(data[0].idembryo);
					$("#iddata").val(data[0].id);

					$("#transdate").val(data[0].transdate);
					$("#worker").val(data[0].worker).trigger('change');
					$("#idworker").val(data[0].worker);
					$("#nobox").val(data[0].nobox);
					$("#cultureroom").val(data[0].culroom);
					$("#laminar").val(data[0].laminar).trigger('change');
					$("#idlaminar").val(data[0].laminar);
					//$("#comment").val(data[0].comment);
					
					$("#connect-to-other").val(data[0].connect);
					$("#sizeofembryo").val(data[0].size);
					$("#shapeofembryo").val(data[0].shape).trigger('change');
					$("#select-shapeofembryo").val(data[0].shape);
					$("#comment_embryo").val(data[0].em_comment);

					$("#typeofcallus").val(data[0].typecallus);
					$("#colorofcallus").val(data[0].colorcallus);
					$("#calluscomment").val(data[0].cal_comment);

					$("#form-edit-germ").modal("show");
				}				
			})
		});

		$("#btnUpdateData").click(function(){
			//var id = $("#iddata").val();
			var transdate = $("#transdate").val();
			var idworker = $("#idworker").val();
			var nobox = $("#nobox").val();
			var culroom = $("#cultureroom").val();
			var idlaminar = $("#idlaminar").val();
			var connect = $("#connect-to-other").val();
			var size_em = $("#sizeofembryo").val();
			var shape_em = $("#select-shapeofembryo").val();
			var comment_em = $("#comment_embryo").val();
			var typecallus = $("#typeofcallus").val();
			var colorcallus = $("#colorofcallus").val();
			var calluscomment = $("#calluscomment").val();

			//alert(transdate + " " + idworker + " " + nobox + " " + culroom + " " + idlaminar + " " + connect + " " + size_em + " " + shape_em + " " + typecallus + " " + colorcallus + " " + amountmedia + " " + idmedia);


			if (transdate != "" && idworker != "" && nobox != "" && culroom != "" && idlaminar != "" && connect != "" && size_em != "" && shape_em != "" && typecallus != "" && colorcallus != ""){
			
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"update-germ",

						transdate:transdate,
						idworker:idworker,	
						nobox:nobox,
						culroom:culroom,
						idlaminar:idlaminar,

						connect:connect,
						size_em:size_em,
						shape_em:shape_em,
						comment_em:comment_em,

						typecallus:typecallus,
						colorcallus:colorcallus,
						calluscomment:calluscomment,
						
						id:id
					},
					success:function(resp){
						//alert(resp);
						if(parseInt(resp) > 0){
							alert("Data has beed updated!");
                        	RefreshData("#list-germ", hostname + "/api/loader.germ.php");
                        	$("#form-edit-germ").modal("hide");
                        }
                        else{
                           alert("Data can't be updated!");
                        }
					}
				});
			} else {
				alert("Please fill out every field with *");
			}

			return false;
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
			datacheckbox = [];

		    // Iterate over all selected checkboxes
		    $.each($("input[class='usecheckbox']:checked"), function(){
		       	datacheckbox.push($(this).val());
		    });

		    if (datacheckbox != null && datacheckbox != ""){
		    	implodeIdEm  = datacheckbox.join(", ");
		    	$("#title-id").html(implodeIdEm);

		    	$("form")[0].reset();
		    	$("#form-updatemedia").modal("show");
		    	dataforaddmedia = datacheckbox;
				//console.log(dataforaddmedia);
		    } else {
		    	alert("Check minimal 1 from list of the table!");
		    }
			
		});

		$("#btnUpdateMedia").click(function(){
			idmedia = $("#idmedium").val();
			amountmedia = $("#amountmedia").val();

			$.ajax({
				url : hostname + "/action.php",
				type: "POST",
				data : {
					action:"add-update-media-germ",
					dataforaddmedia:dataforaddmedia,
					idmedia:idmedia,
					amountmedia:amountmedia
				},
				success : function(resp){
					//alert(resp);
					if (JSON.parse(resp) > 0){
						alert("Media has updated!");
						RefreshData("#list-germ", hostname + "/api/loader.germ.php");
						$("#form-updatemedia").modal("hide");
					}
				}				
			})
			return false;
		});

		$("#btnUnselect").click(function(){
			$.each($("input[class='usecheckbox']:checked"), function(){
		       $("input[class='usecheckbox']").attr("checked",false);
		    });

			selectedEm = "";
		});

		$("#btnCari").click(function(){
			var awal = $("#datefrom").val();
			var akhir = $("#dateto").val();

			RefreshData("#list-germ", hostname + "/api/loader.germ.php", {awal:awal,akhir:akhir});

			return false;
		})
	});

	function disabledButton(resp){
		if (resp == ""){
			$("#btnUpdateMedia").attr("disabled",false);
		} else {
			$("#btnUpdateMedia").attr("disabled",true);
		}
	}

</script>
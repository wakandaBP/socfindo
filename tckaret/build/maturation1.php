<script type="text/javascript">
	var dataforaddpetri = [];
	var datacheckbox = [];
	var selectedRow = "";
	var selectedEm = "";
	var selectedData = [];

	$(function(){

		$("#medium").on('change',function(){
			$("#idmedium").val($(this).val());

			stats = checkAvailableMedia($("#amountmedia").val(),$("#idmedium").val(),"error-media");
			disabledButton(stats);
		});

		$("#amountmedia").on('keyup',function(){
			//console.log(selectedData['idpengeluaranmedia']);

			stats = checkAvailableMedia($("#amountmedia").val(),$("#idmedium").val(),"error-media");
			disabledButton(stats);
		});

		$("#mat2medium").on('change',function(){
			$("#mat2idmedium").val($(this).val());

			stats = checkAvailableMedia($("#mat2amountmedia").val(),$("#mat2idmedium").val(),"mat2-error-media");
			disabledButton(stats,"btnMultiTrans");
		});

		$("#mat2amountmedia").on('keyup',function(){
			//console.log(selectedData['idpengeluaranmedia']);

			stats = checkAvailableMedia($("#mat2amountmedia").val(),$("#mat2idmedium").val(),"mat2-error-media");
			disabledButton(stats,"btnMultiTrans");
		});

		$("#mat1worker").on('change',function(){
			$("#idmat1worker").val($(this).val());
		});

		$("#laminar").on('change',function(){
			$("#idlaminar").val($(this).val());
		});

		$("#mat2worker").on('change',function(){
			$("#idmat2worker").val($(this).val());
		});

		$("#mat2laminar").on('change',function(){
			$("#mat2idlaminar").val($(this).val());
		})

		/*$("#medium2").on('change',function(){
			$("#idmedium2").val($(this).val());

			stats = checkAvailableMedia($("#amountmedia2").val(),$("#idmedium2").val(),"error-media2");
			disabledButton(stats,"btnMultiTrans");
		});

		$("#amountmedia2").on('keyup',function(){
			stats = checkAvailableMedia($("#amountmedia2").val(),$("#idmedium2").val(),"error-media2");
			disabledButton(stats,"btnMultiTrans");
		});*/

		var mat1List = $("#list-mat1").DataTable({
			"ajax":{
				"url": hostname + "/api/loader.mat1.php",
				"data":{
					//
				},
				"type":"POST"
			},
			dom: 'lBfrtip',
			buttons: [
				'excel', 'csv', 'pdf', 'copy'
			],
			aaSorting: [[3, "desc"]],
			"columnDefs":[
				{"targets":0, "className":"dt-body-left"}
			],
			//select:'single',
			"columns" : [
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div style='text-align:center;'><input class='usecheckbox' type='checkbox' value='" + row['idembryo'] + "' /></div>";
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
						return "<div style='text-align:center;'>" + 

							// "<a href=\"" + hostname + "/reception.seeds/" + row["id"] + "\" class=\"btn btn-warning btn-circle waves-effect waves-circle waves-float\" title=\"View Initiation Description\"><i class=\"material-icons\">list</i></a>"

							"  <button class=\"btn btn-info btn-circle waves-effect waves-circle waves-float btnEdit\" data-id='" + row['id'] + "' title='Edit Data'><i class=\"material-icons\">edit</i></button> " +

							" | <button class=\"btn btn-danger btn-circle waves-effect waves-circle waves-float btn-delete\" data-idem='" + row['idembryo'] + "' id='delete-" + row['id'] + "'><i class=\"material-icons\" title='Remove Sample'>delete_outline</i></button> " +

							" | <a href=\"" + hostname + "/maturation1.screen.log/" + row["idembryo"] + "\" class=\"btn btn-default btn-circle waves-effect waves-circle waves-float\"><i class=\"material-icons\" title='Maturation I Screening'>check</i></a> " +

							" | <a href=\"" + hostname + "/maturation2.add/" + row["idembryo"] + "\" class=\"btn btn-success btn-circle waves-effect waves-circle waves-float " + row['disabled'] + "\"><i class=\"material-icons\" title='Transfer Maturation II'>trending_flat</i></a></div> ";
					}
				}
			],
			/*rowId: function(a) {
			    return a.idembryo;
			},*/
		});

		$("body").on("click", ".btn-delete", function(){
			var id = $(this).attr("id").split("-");
			id = id[id.length - 1];
			idEm = $(this).data("idem");

			var conf = confirm("Remove ID Embryo : " + idEm + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-mat1",
						id:id
					},
					success:function(resp){
						if (JSON.parse(resp) > 0){
							alert("Embryo with ID : " + idEm + " has been removed!");
							RefreshData("#list-mat1", hostname + "/api/loader.mat1.php");	
						}
						
					}
				});
			}
			return false;
		});


		/*$('#list-mat1 tbody').on( 'click', 'tr', function () {
		    var d = mat1List.row(this).data();
		     
		    d.counter++;
		    selectedData = {idembryo:d.idembryo,idtreatment:d.idtreatment,transdate:d.transdate,idpengeluaranmedia:d.idpengeluaranmedia,remain:parseInt(d.remainembryo)};
		});*/

		$("tbody").on("click",".btnEdit",function(){
			id = $(this).data("id");
			$("form")[1].reset();

			$.ajax({
				url: hostname + "/api/mat1/load.mat1.data.php",
				type: "POST",
				data: {
					id:id
				},
				success: function(resp){
					data = JSON.parse(resp);

					$("#title-edit").html(data[0].idembryo);
					$("#iddata").val(data[0].id);
					$("#mat1transdate").val(data[0].transdate);
					$("#mat1worker").val(data[0].worker).trigger('change');
					$("#idmat1worker").val(data[0].worker);
					$("#nobox").val(data[0].nobox);
					$("#cultureroom").val(data[0].culroom);
					$("#laminar").val(data[0].laminar).trigger('change');
					$("#idlaminar").val(data[0].laminar);
					$("#comment").val(data[0].comment);

					$("#form-edit-mat1").modal("show");
				}				
			})
		});

		$("#btnUpdateData").click(function(){
			transdate = $("#mat1transdate").val();
			worker = $("#idmat1worker").val();
			nobox = $("#nobox").val();
			culroom = $("#cultureroom").val();
			laminar = $("#idlaminar").val();
			comment = $("#seedcomment").val();

			if (transdate != "" && worker != "" && nobox != "" && culroom != "" && laminar != ""){
				$.ajax({
					url : hostname + "/action.php",
					type: "POST",
					data : {
						action:"update-mat1",
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
							RefreshData("#list-mat1", hostname + "/api/loader.mat1.php");
							$("#form-edit-mat1").modal("hide");
							showLastRow(mat1List);
						}
					}				
				});
			} else {
				alert("Please fill out every field with *");
			}
			return false;
		});


		$("#updatemedia").click(function(){
			datacheckbox = [];

		    // Iterate over all selected checkboxes
		    $.each($("input[class='usecheckbox']:checked"), function(){
		       	datacheckbox.push($(this).val());
		    });

		    if (datacheckbox != null && datacheckbox != ""){
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
					action:"add-update-media-mat1",
					dataforaddmedia:dataforaddmedia,
					idmedia:idmedia,
					amountmedia:amountmedia
				},
				success : function(resp){
					alert(resp);
					if (JSON.parse(resp) > 0){
						RefreshData("#list-mat1", hostname + "/api/loader.mat1.php");
						$("#form-updatemedia").modal("hide");
					}
				}				
			});
			return false;
		});


		$("#multitrans").click(function(){
			datacheckbox = [];

		    // Iterate over all selected checkboxes
		    $.each($("input[class='usecheckbox']:checked"), function(e){
		    	idEm = $(this).val();

		    	$.ajax({
		    		async:false,
		    		url: hostname + "/api/mat1/mat1.log.count.php",
		    		type : "POST",
		    		data : {
		    			id:$(this).val()
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

		    	$("form")[0].reset();
		    	$("#form-multitrans").modal("show");
		    	dataformultitransfer = datacheckbox;
				//console.log(dataforaddpetri);
		    } else {
		    	alert("Check minimal 2 from list of the table for Multiple Transfer!");
		    }
			return false;
		});

		$("#btnMultiTrans").click(function(){
			mat2transdate = $("#mat2transdate").val();
			mat2worker = $("#idmat2worker").val();
			mat2nobox = $("#mat2nobox").val();
			mat2culroom = $("#mat2cultureroom").val();
			mat2laminar = $("#mat2idlaminar").val();
			mat2media = $("#mat2idmedium").val();
			mat2amountmedia = $("#mat2amountmedia").val();
			mat2comment = $("#mat2seedcomment").val();


			//alert(mat2transdate + " " + mat2worker + " " + mat2nobox + " " + mat2culroom + " " + mat2laminar + " " + mat2media + " " + mat2amountmedia + " " + mat2comment);

			$.ajax({
				url : hostname + "/action.php",
				type : "POST",
				data : {
					action:"multi-trans-mat2",
					dataformultitransfer:dataformultitransfer,
					mat2transdate:mat2transdate,
					mat2worker:mat2worker,
					mat2nobox:mat2nobox,
					mat2culroom:mat2culroom,
					mat2laminar:mat2laminar,
					mat2media:mat2media,
					mat2amountmedia:mat2amountmedia,
					mat2comment:mat2comment
				},
				success : function(resp){
					alert(resp);
					if (JSON.parse(resp) > 0){
						alert("Embryos have been transferred!");
						RefreshData("#list-mat1", hostname + "/api/loader.mat1.php");
						$("#form-multitrans").modal("hide");
					} else {
						alert("Embryos cannot be transferred!");
					}
				}
			});

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

			RefreshData("#list-mat1", hostname + "/api/loader.mat1.php", {awal:awal,akhir:akhir});

			return false;
		})
	});

	function disabledButton(resp, selector){
		if (resp == ""){
			$("#" + selector).attr("disabled",false);
		} else {
			$("#" + selector).attr("disabled",true);
		}
	}


</script>
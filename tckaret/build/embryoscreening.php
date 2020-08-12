<script type="text/javascript">
	var dataforaddpetri = [];
	var datacheckbox = [];
	var selectedData = [];
	var selectedForEdit = "";
	var mode = "";

	$(function(){

		$("#medium").on('change',function(){
			$("#idmedium").val($(this).val());

			if (mode == "add"){
				stats = checkAvailableMedia($("#amountmedia").val(),$("#idmedium").val(),"error-media","available-media");
			} else if (mode == "edit") {
				stats = checkAvailableMediaforEdit($("#amountmedia").val(),$("#idmedium").val(),selectedData['idpengeluaranmedia'],"error-media");
			}
			disabledButton(stats);
		});

		$("#amountmedia").on('keyup',function(){
			console.log(selectedData['idpengeluaranmedia']);

			if (mode == "add"){
				stats = checkAvailableMedia($("#amountmedia").val(),$("#idmedium").val(),"error-media");
			} else if (mode == "edit") {
				stats = checkAvailableMediaforEdit($("#amountmedia").val(),$("#idmedium").val(),selectedData['idpengeluaranmedia'],"error-media");
			}
			disabledButton(stats);
		});

		$("#transworker").on('change',function(){
			$("#idtransworker").val($(this).val());
		});

		$("#laminar").on('change',function(){
			$("#idlaminar").val($(this).val());
		});

		id_treat = '<?php echo ($_GET['last']!='')?$_GET['last']:''; ?>';

		var embryoScreenList = $("#list-embryoscreen").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.embryoscreening.php",
				"data":{
					id:id_treat
				},
				"type":"POST"
			},
			dom: 'lBfrtip',
			buttons: [
				'excel', 'csv', 'pdf', 'copy'
			],
			select:'single',
			//aaSorting: [[0, "asc"]],
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
						return row["callustrans"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["laminar"];
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
						return row["growembryo"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["remainembryo"];
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

							" <a href=\"" + hostname + "/embryoscreening.log/" + row["id"] + "\" class=\"btn btn-default btn-circle waves-effect waves-circle waves-float\"><i class=\"material-icons\" title='Check Embryo Screening'>check</i></a> " +

							" | <button class=\"btn btn-success btn-circle waves-effect waves-circle waves-float btnMaturation1\" data-id=\"" + row['id'] + "\" data-sample=\"" + row['remainembryo'] + "\"><i class=\"material-icons\" title='Transfer for Maturation I'>trending_flat</i></button>"+ 

							" | <button class=\"btn btn-info btn-circle waves-effect waves-circle waves-float btn-edit\" data-id=\"" + row["id"] + "\" data-nama=\"" + row["idtreatment"] + "\" data-tgl='" + row['transdate'] + "' title='Edit Embryo Screening Data'><i class=\"material-icons\">edit</i></button>" +

							" | <button class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete\" id=\"delete-" + row["id"] + "\" data-nama=\"" + row["idtreatment"] + "\" data-tgl='" + row['transdate'] + "' title='Delete Embryo Screening'><i class=\"material-icons\">delete_outline</i></button>" +

						"</div> ";
					}
				}
			],
			rowCallback: function (row, data) {
				if (data['last_updated'] == "last_updated"){
					$(row).addClass("last_updated").css({"background-color":"#0779e4","color":"#ffffff"});
				}
			}
		});

		$("#list-embryoscreen tbody").on('click','tr',function(e) {
			if ( $(e.target).closest('last_updated').length === 0 ) {
				$(".last_updated").removeAttr("style");
			}
		});

		$('#list-embryoscreen tbody').on( 'click', 'tr', function () {
		    var d = embryoScreenList.row(this).data();
		     
		    d.counter++;
			if (selectedData != ""){
				if (selectedData['id'] == d.id){
					selectedData = [];
				} else {
					selectedData = {id:d.id,idtreatment:d.idtreatment,transdate:d.transdate,idpengeluaranmedia:d.idpengeluaranmedia,remain:parseInt(d.remainembryo)};
				}
			} else {
				selectedData = [];
				selectedData = {id:d.id,idtreatment:d.idtreatment,transdate:d.transdate,idpengeluaranmedia:d.idpengeluaranmedia,remain:parseInt(d.remainembryo)};
			}
			
		});

		$('#list-embryoscreen tbody').on( 'click', '.btnMaturation1', function () {
			var a = $(this).data("id");
			var b = $(this).data("sample");
			
			if (b > 0){
				location.href = hostname + "/maturation1.add/" + a;
			} else {
				alert("This treatment has no remaining embryo for transfer!");
			}
		});
		
		$("#updatemedia").click(function(){
		    if (selectedData.length !== 0){
		    	mode = "add";
		    	
		    	$("form")[0].reset();
		    		$("#medium").trigger('change');
		    		
		    		$("#title-media").html("");
		    		$("#title-id").html(selectedData['idtreatment'] + " / " + selectedData['transdate']);
		    		$("#form-updatemedia").modal("show");
		    } else {
		    	alert("Select 1 from list of the table!");
		    }
		});	


		$("#editupdatemedia").click(function(){
			mode = "edit";

		    if (selectedData.length !== 0){
	    		$.ajax({
					url: hostname + "/api/embryoscreen/check.emscreen.media.php",
					type: "POST",
					data: {
						id:selectedData['id']
					},
					success: function(resp){
						//console.log(resp);
						data = JSON.parse(resp);

						$("form")[0].reset();
						$("#idmedium").val(data.media);
						$("#medium").val(data.media);
						$("#medium").trigger('change');
						$("#amountmedia").val(data.jumlah);
						$("#available-media").val(data.stok);

						$("#title-id").html(selectedData['idtreatment'] + " / " + selectedData['transdate']);
						$("#title-media").html("Edit data for");
			    		$("#form-updatemedia").modal("show");
					}				
				});

		    } else {
		    	alert("Select 1 from list of the table!");
		    }
		});	


		$("#btnUnselect").click(function(){
			selectedData = [];
			embryoScreenList.rows().deselect();
		});


		$("#btnUpdateMedia").click(function(){
			idmedia = $("#idmedium").val();
			amountmedia = $("#amountmedia").val();

			if (idmedia != "" && amountmedia != ""){
				$.ajax({
					url : hostname + "/action.php",
					type: "POST",
					data : {
						action: mode +"-update-media-emscreen",
						id:selectedData['id'],
						idmedia:idmedia,
						amountmedia:amountmedia
					},
					success : function(resp){
						//alert(resp);
						if (JSON.parse(resp) > 0){
							alert("Media has been updated!");
							$("#form-updatemedia").modal("hide");
							RefreshData("#list-embryoscreen", hostname + "/api/loader.embryoscreening.php");
						} else {
							alert("Media can't be updated!");
						}
					}				
				})
			} else {
				alert("Please select Media or insert Amount Media");
			}
			
			return false;
		});

		$("body").on("click", ".btn-delete", function(){
			var id = $(this).attr("id").split("-");
			var nama = $(this).data("nama");
			id = id[id.length - 1];
			var tgl = $(this).data("tgl");

			var conf = confirm("Delete Embryoscreening with ID Treatment : " + nama + " / " + tgl + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-embryoscreen",
						id_initiation_trans:id
					},
					success:function(resp){
						if (JSON.parse(resp) > 0){
							alert("Data has been deleted!");
							RefreshData("#list-embryoscreen", hostname + "/api/loader.embryoscreening.php");
						} else {
							alert("Data can't be deleted!");
						}
					}
				});
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

		$("#btnCari").click(function(){ 
			var awal = $("#datefrom").val();
			var akhir = $("#dateto").val();

			//alert(awal + " " + akhir);
			if (awal != "" && akhir != ""){
				RefreshData("#list-embryoscreen", hostname + "/api/loader.embryoscreening.php", {awal:awal,akhir:akhir});
			} else {
				RefreshData("#list-embryoscreen", hostname + "/api/loader.embryoscreening.php");
			}

			return false;
		})


		$("#list-embryoscreen tbody").on('click','.btn-edit',function(){
			var id = $(this).data("id");
			var idTreat = $(this).data("nama");
			var tgl = $(this).data("tgl");
			selectedForEdit = "";
			selectedForEdit = id;

			$.ajax({
				url : hostname + "/api/embryoscreen/get.emscreen.data.php",
				data : {id:id},
				type : "POST",
				success : function(resp){
					getdata = JSON.parse(resp);

					$("form")[1].reset();
					$("#title-treat").html(idTreat + " / " + tgl);
					$("#transdate").val(getdata.transdate);
					$("#transworker").val(getdata.transworker).trigger('change');
					$("#idtransworker").val(getdata.transworker);
					$("#callustrans").val(getdata.callus);
					$("#laminar").val(getdata.laminar).trigger('change');
					$("#idlaminar").val(getdata.laminar);
					$("#comment").val(getdata.comment);
					$("#form-edit-embryoscreen").modal("show");
				}
			});
		});


		$("#btnUpdateEmscreen").click(function(){
			var transdate = $("#transdate").val();	
			var transworker = $("#idtransworker").val();
			var laminar = $("#idlaminar").val();
			var comment = $("#comment").val();

			if (transdate != "" && transworker != "" && laminar != ""){
				var conf = confirm("Data is valid?");
				if (conf){
					$.ajax({
						url : hostname + "/action.php",
						type : "POST",
						data : {
							action:"update-trans-callus",
							transdate:transdate,
							transworker:transworker,
							laminar:laminar,
							comment:comment,

							id:selectedForEdit,
						},
						success : function(resp){
							if (JSON.parse(resp) > 0){
								alert("Data has been updated!");
								$("#form-edit-embryoscreen").modal("hide");
								RefreshData("#list-embryoscreen", hostname + "/api/loader.embryoscreening.php");
							} else {
								alert("Data can't be updated!");
							}
						}
					});
				}
			} else {

			}

			return false;
		});

	});
	
	function disabledButton(resp){
		if (resp == ""){
			$("#btnUpdateMedia").attr("disabled",false);
		} else {
			$("#btnUpdateMedia").attr("disabled",true);
		}
	}

</script>
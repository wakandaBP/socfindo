<script type="text/javascript">
	var datafortransfer = [];
	var datacheck = [];
	var datacheckbox = [];
	var remainSample = 0;
	var numberSample = 0;

	var selectedRow = "";

	$(function() {
			
		//------------- OBSERVATION PART -----------------

		cekAmount(<?= $page[1]; ?>);

		var obsList = $("#list-obs").DataTable({
			"ajax":{
				"url": hostname + "/api/initiation/loader.initiation.obs.php",
				"data":{
					id:<?= $page[1]?>
				},
				"type":"POST"
			},
			aaSorting: [[2, "desc"]],
			"columnDefs":[
				{"targets":0, "className":"dt-body-left"}
			],
			"columns" : [
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div style='text-align:center;'><input "+ row['disabled'] +" class='usecheckbox " + row['notdisabled'] + "' type='checkbox' value='" + row['id'] + "'></div>";
					}
				},
				{ 
					"data": null,"sortable": false, 
			    	render: function (data, type, row, meta) {
			            return meta.row + meta.settings._iDisplayStart + 1;
                	}  
    			},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["obsdate"];
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
						return "<div style='text-align:center;'>" + 							
									"<button data-id='" + row["id"] + "' " + row['btndisabled'] + " class=\"btn btn-info btn-circle waves-effect waves-circle waves-float btnEditObs "+ row['notdisabled'] +"\" title=\"Edit Observation Data\"><i class=\"material-icons\">edit</i></button></div>";
					}
				}
			],
			rowId: function(a) {
			    return a.id;
			},
		});


		$("#btnTambahObs").click(function(){
			mode = "add";

			$("form")[0].reset();

			//get number of remaining sample 
			$.ajax({
				async:false,
				url : hostname + "/api/myfunction/check.remaining.sample.initiation.php",
				type : "POST",
				data :  { id:'<?= $page[1] ?>' },
				success: function(resp){
					sample = JSON.parse(resp);
					remainSample = sample;

					$("#notreact").val(sample);
				}
			});

			
			numberSample = remainSample;
			$("#obsworker").val("").trigger('change');
			$("#form-obscallus").modal("show");
		});

		/*------------------------- FUNCTION KEYUP PIECES NOT REACTED ---------------------------*/

		// On Keyup action
		$("#alotofcallus").on('keyup', function(){
			keyupNotReacted("alotofcallus", remainSample);
		});

		$("#littlebitofcallus").on('keyup', function(){
			 keyupNotReacted("littlebitofcallus", remainSample);
		});

		$("#dead").on('keyup', function(){
			keyupNotReacted("dead", remainSample);
		});

		$("#contfungi").on('keyup', function(){
			keyupNotReacted("contfungi", remainSample);
		});
		
		$("#contbact").on('keyup', function(){
			keyupNotReacted("contbact", remainSample);
		});


		//On Change action
		$("#alotofcallus").on('change', function(){
			keyupNotReacted("alotofcallus", remainSample);
		});

		$("#littlebitofcallus").on('change', function(){
			 keyupNotReacted("littlebitofcallus", remainSample);
		});

		$("#dead").on('change', function(){
			keyupNotReacted("dead", remainSample);
		});

		$("#contfungi").on('change', function(){
			keyupNotReacted("contfungi", remainSample);
		});
		
		$("#contbact").on('change', function(){
			keyupNotReacted("contbact", remainSample);
		});


		/*--------------------------------------------------------------------*/

		$("#obsworker").on('change',function(){
			$("#idobsworker").val($(this).val());
		});
		
		$("#list-obs tbody").on('click','.btnEditObs',function(){
			id = $(this).data("id");
			mode = "edit";
			$("form")[0].reset();

			$.ajax({
				url : hostname + "/api/initiation/load.initiation.obs.data.php",
				type: "POST",
				data: {
					id:id
				},
				success : function(resp){
					data = JSON.parse(resp);

					$("#id_init_obs").val(data.id);
					$("#obsdate").val(data.obsdate);
					$("#obsworker").val(data.obsworker).trigger('change');
					$("#idobsworker").val(data.obsworker);
					$("#contfungi").val(data.fungi);
					$("#contbact").val(data.bact);
					$("#notreact").val(data.notreact);
					$("#alotofcallus").val(data.alotof);
					$("#littlebitofcallus").val(data.littlebit);
					$("#dead").val(data.dead);
					$("#yellow").val(data.yellow);
					$("#white").val(data.white);
					$("#orange").val(data.orange);
					$("#brown").val(data.brown);
					$("#remainpetri").val(data.remain_media);
					$("#obs_samp").val(data.obs_sample);

					$("#form-obscallus").modal("show");
				}
			});
		});

		$("#btnSimpanObs").click(function(){
			getmode = mode;
			var obsdate = $("#obsdate").val();
			var obsworker = $("#idobsworker").val();

			var contfungi = parseInt($("#contfungi").val());
			var contbact = parseInt($("#contbact").val());
			var notreact = parseInt($("#notreact").val());
			
			var alotof = parseInt($("#alotofcallus").val());
			var littlebit = parseInt($("#littlebitofcallus").val());
			var dead = parseInt($("#dead").val());

			var yellow = parseInt($("#yellow").val());
			var white = parseInt($("#white").val());
			var orange = parseInt($("#orange").val());
			var brown = parseInt($("#brown").val());
			var pink = "";

			var remainpetri = $("#remainpetri").val();
			var id_init = $("#id_init_obs").val();

			dataseeds = cekAmount(<?= $page[1]; ?>);
			allseeds = parseInt(dataseeds[0].remainsample);
			if (mode == 'edit'){
				allseeds += parseInt($("#obs_samp").val());
			}
			
			alotlittlebit = alotof + littlebit;
			sum = alotlittlebit + dead + notreact; 

			if (obsdate != "" && obsworker != ""){
				
				if (sum == allseeds){

					if (sum <= allseeds){
						
						if (alotlittlebit == (yellow + white + orange + brown)){
							$.ajax({
								url: hostname + "/action.php",
								type: "POST",
								data: {
									action:mode+"-obs-callus",
									obsdate:obsdate,
									obsworker:obsworker,
									contfungi:contfungi,
									contbact:contbact,
									notreact:notreact,
									alotof:alotof,
									littlebit:littlebit,
									yellow:yellow,
									white:white,
									orange:orange,
									brown:brown,
									dead:dead,
									pink:pink,
									remainpetri:remainpetri,						

									id_init:id_init,
									idtreatment:<?php echo $page[1]?>
								},
								success:function(resp){
									if(parseInt(resp) > 0){
										alert("Observation has " + mode +  "ed!");
				
										RefreshData($("#list-obs"), hostname + "/api/initiation/loader.initiation.obs.php", {id:<?= $page[1] ?>});
										cekAmount(<?= $page[1] ?>);
										$("#form-obscallus").modal("hide");
									}
									else{
										alert("Observation can't  be " + mode +  "ed!");
									}
								}
							});
							return false;

						} else {
							alert("Make sure total of (A Lot of Calus + Little Bit of Callus) = (Yellow + White + Orange + Brown)");
						}
						return false;

					} else {
						alert("Total of (A Lot of Callus + Little Bit of Callus + Pieces Not React + Dead) is more than 'Amount of Pieces Initiated from Initiation'");
					}
					return false;
				
				} else {
					alert("Total of (A Lot of Callus + Little Bit of Callus + Pieces Not React + Dead) is must same ");
				}
				return false;

			} else {
				alert("Please fill out every field with *");
			}

			return false;
		});

		$("#btnAllselect").click(function(){
			$.each($("input[class='usecheckbox notdisabled']"), function(){
		       	$(this).attr("checked",true);
		    });
		});

		$("#btnUnselect").click(function(){
			$.each($("input[class='usecheckbox notdisabled']"), function(){
		       	$(this).attr("checked",false);
		    });
		});

		$("#transfer").click(function(){
			$("form")[1].reset();
			$("#transworker").trigger('change');
			$("#laminar").trigger('change');
			$("#media").trigger('change');

			datafortransfer = [];
			datacheckbox = [];

		    // Iterate over all selected checkboxes
	    	$.each($("input[class='usecheckbox notdisabled']:checked"), function(){
		       	datacheckbox.push($(this).val());
		    });

		    if (datacheckbox != null && datacheckbox != ""){
		    	$("#form-updatepetri").modal("show");
		    	datafortransfer = datacheckbox;

		    	$.each($("input[class='usecheckbox notdisabled']"), function(){
			       	$(this).attr("disabled",true);
			    });

		    	$("#btnAllselect").attr("disabled",true);
		    	$("#btnUnselect").attr("disabled",true);
		    	$("#transfer").attr("disabled",true);
		    	$("#btnCancelTrans").attr("disabled",false);
		    	$("#btnTambahObs").attr("disabled",true);
		    	$(".btnEditObs").attr("disabled",true);
		   		$(".btnDeleteObs").attr("disabled",true);

		    	var f = 0;
		    	$.each(datafortransfer, function(index, value){
			       	$.ajax({
						async:false,
						url: hostname + "/api/initiation/view.initiation.obs.detail.php",
						type: "POST",
						data: {
							id:value
						},
						success: function(resp){
						
							MetaData = JSON.parse(resp);
							//console.log(MetaData);
							for(var key in MetaData){
		                        //id = MetaData[key]['id'];
		                        
		                        a = parseInt(MetaData[key]['alotof']) + parseInt(MetaData[key]['littlebit']) 
		                        f = f + a;
		                    }
						}
					});
			    });

		    	
		    	$("#form-transfer").attr("hidden",false);
		    	$("#callustrans").val(f);

		    	return false;
		    } else {
		    	alert("Check minimal 1 from list of the table!");
		    }	
		});

		// --------------------- TRANSCALLUS PART ----------------------

		$("#btnCancelTrans").click(function(){
			$(this).attr("disabled",true);
			$("#btnTambahObs").attr("disabled",false);

			$.each($("input[class='usecheckbox notdisabled']"), function(){
		       	$(this).attr("disabled",false);
		    });

			$.each($(".btnEditObs"), function(){
		       	if ($(this).hasClass("notdisabled") == true){
				   $(this).attr("disabled",false);
				}
		    });

		    $(".btnDeleteObs").attr("disabled",false);
			$("#btnAllselect").attr("disabled",false);
	    	$("#btnUnselect").attr("disabled",false);
	    	$("#transfer").attr("disabled",false);
	    	$("#form-transfer").attr("hidden",true);
		});	

		$("#media").on('change',function(){
			$("#idmedia").val($(this).val());

			stats = checkAvailableMedia($("#amountmedia").val(),$("#idmedia").val(),"error-media","available-media");
			disabledButton(stats);
		});

		$("#amountmedia").on('keyup',function(){
			stats = checkAvailableMedia($("#amountmedia").val(),$("#idmedia").val(),"error-media","available-media");
			disabledButton(stats);
		});

		$("#transworker").on('change',function(){
			$("#idtransworker").val($(this).val());
		});

		$("#laminar").on('change',function(){
			$("#idlaminar").val($(this).val());
		});

		var allseeds;

		$("#btnSimpanTrans").click(function(){
			
			var transdate = $("#transdate").val();
			var transworker = $("#idtransworker").val(); 
			var callustrans = $("#callustrans").val();
			var laminar = $("#idlaminar").val();
			var comment = $("#comment").val();
			var amountmedia = $("#amountmedia").val();
			var idmedia = $("#idmedia").val();

			if (transdate != "" && transworker != "" && callustrans != "" && laminar != "" && amountmedia != "" && idmedia != ""){
				
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-trans-callus",
											
						transdate:transdate,
						transworker:transworker,
						callustrans:callustrans,
						laminar:laminar,
						comment:comment,
						amountmedia:amountmedia,
						idmedia:idmedia,

						datafortransfer,

						idtreatment:<?php echo $page[1]?>
					},
					success:function(resp){
						try {
							data = JSON.parse(resp);

							if(parseInt(data['rowcount']) > 0){
								alert("Callus has been transfered!");
								$("#form-transfer").attr("hidden",true);
								$("#btnCancelTrans").attr("disabled",true);
								$("#btnTambahObs").attr("disabled",false);
								
								$.each($("input[class='usecheckbox notdisabled']"), function(){
									$(this).attr("disabled",false);
								});
								
								$("#btnAllselect").attr("disabled",false);
								$("#btnUnselect").attr("disabled",false);
								$("#transfer").attr("disabled",false);
								$("#form-transfer").attr("hidden",true);
								RefreshData($("#list-obs"), hostname + "/api/initiation/loader.initiation.obs.php", {id:<?= $page[1] ?>});

								location.href = hostname + "/embryoscreening?last="+data['id'];
							}
							else {
								alert("Callus cant be transfered!");
							}
						} catch (e) {
							console.log("Error : " + e + ". Please contact the System Developer");
						}
					}
				});
				return false;
			} else {
				alert("Please fill out every field with *");
			}

			return false;
		});


		/*------------------------- FUNCTION KEYUP PIECES NOT REACTED ---------------------------*/

		$("#yellow").on('keyup', function(){
			keyupCallusColor("yellow");
		});

		$("#white").on('keyup', function(){
			keyupCallusColor("white");
		});

		$("#orange").on('keyup', function(){
			keyupCallusColor("orange");
		});

		$("#brown").on('keyup', function(){
			keyupCallusColor("brown");
		});

		/*--------------------------------------------------------------------*/

	});


	function cekAmount(idtreat){
		var dats;

		$.ajax({
			async:false,
			url: hostname + "/api/initiation/check.initiation.obs.detail.php",
			type: "POST",
			data: {
				id:idtreat
			},
			success: function(resp){
				dats = JSON.parse(resp);

				if (parseInt(dats[0].remainsample) > 0){
					$("#btnTambahObs").attr("disabled",false);
				} else {
					$("#btnTambahObs").attr("disabled",true);
				}
			}
		})

		return dats;
	} 


	function totalSeeds(){
		a = parseInt($("#alotofcallus").val());
		b = parseInt($("#littlebitofcallus").val());

		c = a + b;
		return c;
	}

	function disabledButton(resp){
		if (resp == ""){
			$("#btnSimpanTrans").attr("disabled",false);
		} else {
			$("#btnSimpanTrans").attr("disabled",true);
		}
	}

	function keyupNotReacted(selector, remainSample){
		selectorVal = $("#"+ selector).val();

		if (selectorVal != ""){
			thisVal = parseInt(selectorVal);

			pAlot = parseInt($("#alotofcallus").val());
			pLittle = parseInt($("#littlebitofcallus").val());
			pDead = parseInt($("#dead").val());
			pFungi = parseInt($("#contfungi").val());
			pBact = parseInt($("#contbact").val());

			totalS = pAlot + pLittle + pDead + pFungi + pBact;

			if (totalS <= remainSample){
				num = remainSample - totalS;				
			} else if (totalS > remainSample) {
				num = remainSample - (totalS - parseInt($("#"+selector).val()));

				$("#"+ selector).val(0);
			}

			$("#notreact").val(num);
		}
	}


	function keyupCallusColor(selector){
		selectorVal = $("#"+ selector).val();

		alot = $("#alotofcallus").val();
		little = $("#littlebitofcallus").val();

		if (selectorVal != ""){
			thisVal = parseInt(selectorVal);

			if (alot != "" || little != ""){
				totalAL = parseInt(alot) + parseInt(little);

				pYellow = parseInt($("#yellow").val());
				pWhite = parseInt($("#white").val());
				pOrange = parseInt($("#orange").val());
				pBrown = parseInt($("#brown").val());

				totalS = pYellow + pWhite + pOrange + pBrown;

				if (totalS <= totalAL){
					num = totalAL - totalS;				
				} else if (totalS > totalAL) {
					num = totalAL - (totalS - parseInt($("#"+selector).val()));

					$("#"+ selector).val(0);
				}

			}
			
		}
	}

</script>
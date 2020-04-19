<script type="text/javascript">
	$(function(){
		var stats;
		//var petricount = null;

		$("#mat1worker").on('change',function(){
			$("#idmat1worker").val($(this).val());
		});

		$("#laminar").on('change',function(){
			$("#idlaminar").val($(this).val());
		});

		$("#amountmedia").on('keyup',function(){
			stats = checkAvailableMedia($("#amountmedia").val(),$("#idmedia").val(),"error-media");
			disabledButton(stats);
		});

		$("#media").on('change',function(){
			$("#idmedia").val($(this).val());

			stats = checkAvailableMedia($("#amountmedia").val(),$("#idmedia").val(),"error-media");
			disabledButton(stats);
		});

		$("#embryo").on('keyup',function(){
			emfortrans = parseInt($(this).val());
			console.log(emfortrans);
			$.ajax({
				async:false,
				url: hostname + "/api/mat1/check.remain.embryogrow.php",
				type: "POST",
				data: {
					idinit:<?= $page[1]?>
				},
				success: function(resp){
					data = JSON.parse(resp)

					//console.log(data.remain);
					if (emfortrans == 0 || Number.isNaN(emfortrans)) {
						$("#btnSimpan").attr("disabled",true);
						$("#error-embryo").html("<span style='color:red;'>Nothing Embryo for transfer. Please insert for transfer Embryo max. " + data.remain  + ".</span>");
					} else {
						if (data.remain >= emfortrans){
							$("#btnSimpan").attr("disabled",false);
							$("#error-embryo").html("");
						} else {
							$("#btnSimpan").attr("disabled",true);
							$("#error-embryo").html("<span style='color:red;'>Not enough remaining Embryo for transfer. Max. " + data.remain  + " embryo </span>");
						}
					}
					
				} 
			})

			return false;
		});

		
		$("#btnSimpan").click(function(){
			var transdate = $("#mat1transdate").val();
			var nobox = $("#nobox").val();
			var culroom = $("#cultureroom").val();
			var mat1worker = $("#idmat1worker").val();
			var laminar = $("#idlaminar").val();
			var embryo = $("#embryo").val();

			var amount = $("#amountmedia").val();
			var idmedia = $("#idmedia").val();

			/*alert(transdate + " " + nobox + " " + culroom + " " + mat1worker + " " + laminar + " " + embryo + " " + amount  + " " + idmedia);*/
			if (nobox != "" && transdate != "" && culroom  != "" && mat1worker != "" && laminar != "" && embryo != "" && amount != "" && idmedia != ""){

				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"trans-to-mat1",
						nobox:nobox,
						transdate:transdate,
						culroom:culroom,
						mat1worker:mat1worker,
						laminar:laminar,
						embryo:embryo,
						amount:amount,
						idmedia:idmedia,

						idinit:<?= $page[1];?>
					},
					success:function(resp){
						//alert(resp);
						if(parseInt(resp) > 0){
							alert("Growing Embryos has been transfered!");
                        	location.href = hostname + "/maturation1";
                        }
                        else{
                            alert("Growing Embryos cannot be transfered!");
                        }
					}
				})
			} else {
				alert("Please fill out every field with *");
			}

			return false;
		});
	})

	function disabledButton(resp){
		if (resp == ""){
			$("#btnSimpan").attr("disabled",false);
		} else {
			$("#btnSimpan").attr("disabled",true);
		}
	}

	/*function checkAvailableMedia(){
		amount = $("#amountpetri").val();
		media = $("#idmedia").val();

		$.ajax({
				//async:false,
				url: hostname + "/api/myfunction/check.available.media2.php",
				type: "POST",
				data: {
					amount:amount,
					media:media
				},
				success: function(resp){
					console.log(resp);
					$("#error-media").html(resp);
				}
			})
	}*/

	/*function checkPetriAmount(){
		amount = $("#amountpetri").val();
		media = $("#idmedia").val();
		$("#createddate option").remove();

			$.ajax({
				//async:false,
				url: hostname + "/api/initiation/check.petridishamount.php",
				type: "POST",
				data: {
					amount:amount,
					media:media
				},
				success: function(resp){
					//console.log(resp);

					var MetaData = JSON.parse(resp);

					for(var key in MetaData){
						//var id = key.split("-");
						id = MetaData[key]['id'];
						var selection = document.createElement("OPTION");
						$(selection).attr("value", id).html(MetaData[key]['tglbuatmedia'] + " - " + MetaData[key]['worker']);

						$("#createddate").append(selection);
					}
				}
			})
	}*/

</script>
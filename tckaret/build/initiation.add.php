<script type="text/javascript">
	$(function(){
		var stats;
		//var petricount = null;

		$("#initworker").on('change',function(){
			$("#idinitworker").val($(this).val());
		});

		$("#laminar").on('change',function(){
			$("#idlaminar").val($(this).val());
		});

		$("#sample").on('change',function(){
			$("#samplefield").val($(this).val());
		});

		$("#amountpetri").on('keyup',function(){
			stats = checkAvailableMedia($("#amountpetri").val(),$("#idmedia").val(),"error-media","available-media");
			disabledButton(stats);
		});

		$("#media").on('change',function(){
			$("#idmedia").val($(this).val());

			stats = checkAvailableMedia($("#amountpetri").val(),$("#idmedia").val(),"error-media","available-media");
			disabledButton(stats);
		})

		/*$("#createddate").on('change',function(){
			$("#idcreateddate").val($(this).val());
		})*/
		
		$("#btnSimpan").click(function(){
			var nobox = $("#nobox").val();
			var sample = $("#samplefield").val();
			var initdate = $("#initdate").val();
			var widthseed = $("#widthseed").val();
			var totalseeds = $("#totalseeds").val();
			var seedcomment = $("#seedcomment").val();
			var se = $("#se").val();
			var ze = $("#ze").val();
			var initworker = $("#idinitworker").val();
			var laminar = $("#idlaminar").val();
			var treatmentcomment = $("#treatmentcomment").val();

			var amount = $("#amountpetri").val();
			var idmedia = $("#idmedia").val();
			var idpembuatanmedia = $("#idcreateddate").val();

			//var initmedium = $("#idinitmedium").val();
			
			//alert(nobox + " " + sample + " " + initdate + " " + widthseed + " " + totalseeds + " " + seedcomment + " " + se + " " + ze + " " + initworker + " " + laminar + " " + treatmentcomment + " ");

			// $.ajax({
			// 	url: hostname + "/api/initiation/check.petridishnumber.php",
			// 	async: false,
			// 	type: "POST",
			// 	data: {
			// 		petri:petridish
			// 	},
			// 	success:function(resp){
			// 		petricount = resp;
			// 	}
			// });	
			

			//if (petricount < 11){

				if (nobox != "" && sample != "" && initdate  != "" && widthseed  != "" && initworker != "" && laminar != "" && amount != "" && idmedia != ""){
					$.ajax({
						url: hostname + "/action.php",
						type: "POST",
						data: {
							action:"add-initiation",
							nobox:nobox,
							sample:sample,
							initdate:initdate,
							widthseed:widthseed,
							totalseeds:totalseeds,
							seedcomment:seedcomment,
							ze:ze,
							se:se,
							initworker:initworker,
							laminar:laminar,
							treatmentcomment:treatmentcomment,

							amount:amount,
							idmedia:idmedia,
							//idpembuatanmedia:idpembuatanmedia,

							idreception:<?php echo $page[1]?>
						},
						success:function(resp){
							//alert(resp);
							if(parseInt(resp) > 0){
								alert("Data has added!");
	                        	location.href = hostname + "/initiation";
	                        }
	                        else{
	                            //alert(resp);
	                        }
						}
					})
				} else {
					alert("Please fill out every field with *");
				}

			// } else {
			// 	alert("Petridish " + petridish + "has full!");
			// }

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
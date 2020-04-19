<script type="text/javascript">
	$(function(){

		$('.numberonly').keypress(function(event){
			if (event.which < 48 || event.which > 57) {
		        event.preventDefault();
		    }
		});

		$("#initworker").on('change',function(){
			$("#idinitworker").val($(this).val());
		});

		//$("#initworker").trigger('change');

		$("#laminar").on('change',function(){
			$("#idlaminar").val($(this).val());
		});

		$("#sample").on('change',function(){
			$("#samplefield").val($(this).val());
		});

		$("#amountpetri").on('keyup',function(){
			stats = checkAvailableMediaforEdit($("#amountpetri").val(),$("#idmedia").val(), $("#idmediakeluar").val(),"error-media");
			disabledButton(stats);
		});

		$("#media").on('change',function(){
			$("#idmedia").val($(this).val());

			stats = checkAvailableMediaforEdit($("#amountpetri").val(),$("#idmedia").val(), $("#idmediakeluar").val(),"error-media");
			disabledButton(stats);
		});

		//menuActive();
		
		$("#btnSimpan").click(function(){
			$("#btnSimpan").attr("disabled",true);

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

			var amountmedia = $("#amountpetri").val();
			var idmedia = $("#idmedia").val();
			var idpengeluaranmedia = $("#idpengeluaranmedia").val();
			

			if (nobox != "" && sample != "" && initdate  != "" && widthseed  != "" && initworker != "" && laminar != "" && idmedia != "" && amountmedia != ""){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"update-initiation",
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
														
						amountmedia:amountmedia,
						idmedia:idmedia,
						idpengeluaranmedia:idpengeluaranmedia,
						idtreatment:<?php echo $page[1]?>
					},
					success:function(resp){
						//alert(resp);
						if(parseInt(resp) > 0){
							alert("Data has been updated!");
                            location.href = hostname + "/initiation";
                        }
                        else{
                        	$("#btnSimpan").attr("disabled",false);
                            //alert(resp);
                            alert("Data can't be updated!");
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


</script>
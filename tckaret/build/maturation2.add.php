<script type="text/javascript">
	$(function(){
		var stats;
		//var petricount = null;

		$("#mat2worker").on('change',function(){
			$("#idmat2worker").val($(this).val());
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
		
		$("#btnSimpan").click(function(){
			var transdate = $("#mat2transdate").val();
			var nobox = $("#nobox").val();
			var culroom = $("#cultureroom").val();
			var mat2worker = $("#idmat2worker").val();
			var laminar = $("#idlaminar").val();

			var amount = $("#amountmedia").val();
			var idmedia = $("#idmedia").val();
			var comment = $("#comment").val();

			/*alert(transdate + " " + nobox + " " + culroom + " " + mat2worker + " " + laminar + " " + embryo + " " + amount  + " " + idmedia);*/
			if (nobox != "" && transdate != "" && culroom  != "" && mat2worker != "" && laminar != "" && amount != "" && idmedia != ""){

				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"trans-to-mat2",
						nobox:nobox,
						transdate:transdate,
						culroom:culroom,
						mat2worker:mat2worker,
						laminar:laminar,
						amount:amount,
						idmedia:idmedia,

						comment:comment,

						idembryo:<?= $page[1];?>
					},
					success:function(resp){
						//alert(resp);
						if(parseInt(resp) > 0){
							alert("Data has been saved!");
                        	location.href = hostname + "/maturation2";
                        }
                        else{
                        	alert("Data can't be saved!");
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
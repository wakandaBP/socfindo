<script type="text/javascript">
	$(function(){

		$("#worker").on('change',function(){
			$("#idworker").val($(this).val());
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
			var germdate = $("#germdate").val();
			var worker = $("#idworker").val();
			var shoot = $("#shoot").val();
			var germinated = $("#germinated").val();
			var comment = $("#comment").val();

			/*alert(transdate + " " + nobox + " " + culroom + " " + mat2worker + " " + laminar + " " + embryo + " " + amount  + " " + idmedia);*/
			if (germdate != "" && worker != "" && shoot != "" && germinated != ""){

				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-germ-prepare",
						germdate:germdate,
						worker:worker,
						shoot:shoot,
						germinated,
						comment:comment,

						idembryo:<?= $page[1];?>
					},
					success:function(resp){
						//alert(resp);
						if(parseInt(resp) > 0){
							alert("Data has beed added!");
                        	location.href = hostname + "/germination-prepare";
                        }
                        else{
                            alert("Data cannot be added!");
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
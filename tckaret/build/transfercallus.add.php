<script type="text/javascript">
	
	$(function() {
		
		$("#transworker").on('change',function(){
			$("#idtransworker").val($(this).val());
		});

		$("#laminar").on('change',function(){
			$("#idlaminar").val($(this).val());
		});

		$('.numberonly').keypress(function(event){
			if (event.which < 48 || event.which > 57) {
		        event.preventDefault();
		    }
		});

		//alert(allseeds);

		$("#btnSimpan").click(function(){
			var transdate = $("#transdate").val();
			var transworker = $("#idtransworker").val();

			var callustrans = $("#callustransfer").val();
			var laminar = $("#idlaminar").val();
			var cont = $("#contamination").val();
			var comment = $("#comment").val();

			//alert(transdate + " " + transworker + " " + callustrans + " " + laminar + " " + comment);

			if (transdate != "" && transworker != "" && callustrans != "" && laminar != "" ){

				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-transcallus",
						transdate:transdate,
						transworker:transworker,
						
						callustrans:callustrans,
						laminar:laminar,
						cont:cont,
						comment:comment,

						idtreatment:<?php echo $page[1]?>
					},
					success:function(resp){
						if(parseInt(resp) > 0){
							//alert(resp);
                            location.href = hostname + "/transfercallus";
                        }
                        else{
                            alert(resp);
                        }
					}
				});
			} else {
				alert("Please fill out every field with *");
			}
			return false;
		});

	})


</script>
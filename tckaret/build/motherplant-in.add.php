<script type="text/javascript">
	$(function(){
		
		$("#btnSimpan").click(function(){
			var resultofident = $("#resultofident").val();
			var leafsample = $("#leafsample").val();
			var transdate = $("#transdate").val();

			if (transdate != "" && leafsample != "" && resultofident != ""){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-motherplant-in",
						transdate:transdate,
						leafsample:leafsample,
						resultofident:resultofident,

						idembryo:<?php echo $page[1]?>
					},
					success:function(resp){
						alert(resp);
						if(parseInt(resp) > 0){
							alert("Embryo has transfered to Motherplant!");
                        	location.href = hostname + "/motherplant";
                        }
                        else{
                           	alert("Embryo can't be transfered to Motherplant!");
                        }
					}
				})
			} else {
				alert("Please fill out every field with *");
			}

			return false;
		});
	});

</script>
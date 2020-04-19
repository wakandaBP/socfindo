<script type="text/javascript">
	$(function(){

		$("#screenworker").on('change',function(){
			$("#idscreenworker").val($(this).val());
		});
		
		$("#btnSimpan").click(function(){
			var screendate = $("#screendate").val();
			var screenworker = $("#idscreenworker").val();
			var comment = $("#comment").val();

			var fungi = $("#fungi").val();
			var bact = $("#bact").val();
			var pink = $("#pink").val();
			var dead = $("#dead").val();
			var contcomment = $("#contcomment").val();

			var idcont = $("#idcont").val();

			if (screendate != "" && screenworker != ""){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"update-mat1screening",

						screendate:screendate,
						screenworker:screenworker,	
						comment:comment,

						fungi:fungi,
						bact:bact,
						pink:pink,
						dead:dead,
						contcomment:contcomment,
						
						idcont:idcont,
						id:<?php echo $page[1]?>
					},
					success:function(resp){
						//alert(resp);
						if(parseInt(resp) > 0){
							//alert(resp);
                        	location.href = hostname + "/maturation1.screen.log/" + $("#idembryo").val();
                        }
                        else{
                            //alert(resp);
                        }
					}
				})
			} else {
				alert("Please fill out every field with *");
			}

			return false;
		});
	})


</script>
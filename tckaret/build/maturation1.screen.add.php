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

			if (screendate != "" && screenworker != ""){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-mat1screening",

						screendate:screendate,
						screenworker:screenworker,	
						comment:comment,

						fungi:fungi,
						bact:bact,
						pink:pink,
						dead:dead,
						contcomment:contcomment,
						
						idembryo:<?php echo $page[1]?>
					},
					success:function(resp){
						
						if(parseInt(resp) > 0){
							//alert(resp);
                        	location.href = hostname + "/maturation1.screen.log/" + <?= $page[1];?>;
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
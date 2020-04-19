<script type="text/javascript">
	$(function(){

		$("#screenworker").on('change',function(){
			$("#idscreenworker").val($(this).val());
		});
		
		$("#btnSimpan").click(function(){
			var screendate = $("#screendate").val();
			var screenworker = $("#idscreenworker").val();
			var embryo = $("#embryo").val();
			var comment = $("#comment").val();

			var fungi = $("#fungi").val();
			var bact = $("#bact").val();
			var pink = $("#pink").val();
			var dead = $("#dead").val();
			var contcomment = $("#contcomment").val();
			var idtreatment = $("#idtreatment").val();

			if (screendate != "" && screenworker != "" && embryo  != ""){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-emscreening",

						screendate:screendate,
						screenworker:screenworker,	
						embryo:embryo,
						comment:comment,

						fungi:fungi,
						bact:bact,
						pink:pink,
						dead:dead,
						contcomment:contcomment,
						
						idtreatment:idtreatment,
						idtrans:<?php echo $page[1]?>
					},
					success:function(resp){
						//alert(resp);
						if(parseInt(resp) > 0){
							alert("Data has been saved!");
                        	location.href = hostname + "/embryoscreening.log/" + <?= $page[1];?>;
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


</script>
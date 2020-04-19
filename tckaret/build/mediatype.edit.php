<script type="text/javascript">
	$(function(){
		//menuActive();
		
		$("#btnSimpan").click(function(){
			var type = $("#type").val();
			var keterangan = $("#keterangan").val();

			//alert(mediacode + " " + media + " " + description);

			if (type != ""){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"update-mediatype",
						type:type,
						keterangan:keterangan,
						id:<?php echo $page[1];?>
					},
					success:function(resp){
						if(parseInt(resp) > 0){
							//alert(resp);
							alert("Data has been saved!");
                            location.href = hostname + "/mediatype";
                        }
                        else{
							alert("Data can't be saved!");
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
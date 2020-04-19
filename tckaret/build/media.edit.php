<script type="text/javascript">
	$(function(){
		menuActive();

		$("#btnSimpan").click(function(){
			var mediacode = $("#mediacode").val();
			var media = $("#media").val();
			var description = $("#description").val();

			if (mediacode != "" && media != ""){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"update-media",
						mediacode:mediacode,
						media:media,
						description:description,
						id:<?php echo $page[1]?>
					},
					success:function(resp){
						if(parseInt(resp) > 0){
							//alert(resp);
							alert("Data has been saved!");
                            location.href = hostname + "/media";
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
<script type="text/javascript">
	$(function(){
		//menuActive();
		
		$("#btnSimpan").click(function(){
			var mediacode = $("#mediacode").val();
			var media = $("#media").val();
			var description = $("#description").val();

			//alert(mediacode + " " + media + " " + description);

			if (mediacode != "" && media != ""){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-media",
						mediacode:mediacode,
						media:media,
						description:description
					},
					success:function(resp){
						if(parseInt(resp) > 0){
							//alert(resp);
							alert("Data has been saved!");
                            location.href = hostname + "/media";
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
<script type="text/javascript">
	$(function(){
		//menuActive();
		
		$("#type").on('keyup',function(){
			this.value = this.value.toUpperCase();
		});

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
						data = JSON.parse(resp);

						if(parseInt(data['rowcount']) > 0){
							alert("Media Type has updated!");
                            location.href = hostname + "/mediatype?last="+data['id'];
                        }
                        else{
                            alert("Media Type cant be updated!");
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
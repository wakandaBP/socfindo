<script type="text/javascript">
	$(function(){
		$("#name").on('keyup',function(){
			this.value = this.value.toUpperCase();
		});

		$("#btnSimpan").click(function(){
			var name = $("#name").val();

			if(name != ""){
				//$("#tambah-worker").reset();
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"update-supplier",
						name:name,
						id:<?php echo $page[1];?>
					},
					success:function(resp){
						data = JSON.parse(resp);

						if(parseInt(data['rowcount']) > 0){
							alert("Region has been updated!");
                            location.href = hostname + "/supplier?last="+data['id'];
                        }
                        else{
                            alert("Region cant be updated!");
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
<script type="text/javascript">
	$(function(){
		$("#name").on('keyup',function(){
			this.value = this.value.toUpperCase();
		});

		$("#btnSimpan").click(function(){
			var name = $("#name").val();
			var description = $("#description").val();

			if(name != ""){
				//$("#tambah-worker").reset();
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"update-plantation",
						name:name,
						description:description,
						id:<?php echo $page[1];?>
					},
					success:function(resp){
						if(parseInt(resp) > 0){
                            location.href = hostname + "/plantation";
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
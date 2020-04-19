<script type="text/javascript">
	$(function(){
		//menuActive();

		$("#clonename").on('keyup',function(){
			this.value = this.value.toUpperCase();
		});
		
		$("#btnSimpan").click(function(){
			var clonename = $("#clonename").val();
			var description = $("#description").val();

			if(clonename != ""){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"update-clone",
						clonename:clonename,
						description:description,
						id:<?php echo $page[1];?>
					},
					success:function(resp){
						if(parseInt(resp) > 0){
							alert("Data has been saved!");
                            location.href = hostname + "/clone";
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
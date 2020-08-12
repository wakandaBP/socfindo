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
						data = JSON.parse(resp);

						if(parseInt(data['rowcount']) > 0){
							alert("Clone has updated!");
                            location.href = hostname + "/clone?last="+data['id'];
                        }
                        else{
                            alert("Clone cant be updated!");
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
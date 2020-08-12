<script type="text/javascript">
	$(function(){
		$("#partname").on('keyup',function(){
			this.value = this.value.toUpperCase();
		});
	
		$("#btnSimpan").click(function(){
			var partname = $("#partname").val();
			var description = $("#description").val();

			if(partname != ""){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"update-treepart",
						partname:partname,
						description:description,
						id:<?php echo $page[1];?>
					},
					success:function(resp){
						data = JSON.parse(resp);

						if(parseInt(data['rowcount']) > 0){
							alert("Treepart has updated!");
                            location.href = hostname + "/treepart?last="+data['id'];
                        }
                        else{
                            alert("Treepart cant updated!");
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
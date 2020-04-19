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
						if(parseInt(resp) > 0){
							alert("Data has been saved!");
                            location.href = hostname + "/treepart";
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
<script type="text/javascript">
	$(function(){
		$("#species").on('keyup',function(){
			this.value = this.value.toUpperCase();
		});

		$("#btnSimpan").click(function(){
			var species = $("#species").val();

			if(species != ""){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"update-contamination",
						species:species,
						id:<?php echo $page[1];?>
					},
					success:function(resp){
						if(parseInt(resp) > 0){
							alert("Data has been saved!");
                            location.href = hostname + "/contamination";
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
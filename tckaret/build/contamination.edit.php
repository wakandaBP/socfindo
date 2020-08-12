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
						redirectAfterAction(resp, "contamination", "updat", "Data");
					}
				})
			} else {
				alert("Please fill out every field with *");
			}
			return false;
		});
	})


</script>
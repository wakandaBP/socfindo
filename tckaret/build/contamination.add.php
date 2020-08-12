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
						action:"add-contamination",
						species:species
					},
					success:function(resp){
						redirectAfterAction(resp, "contamination", "add", "Data");
					}
				})
			} else {
				alert("Please fill out every field with *");
			}
			return false;
		});
	})


</script>
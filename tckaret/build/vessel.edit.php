<script type="text/javascript">
	$(function(){
		
		$("#vesselcode").on('keyup',function(){
			this.value = this.value.toUpperCase();
		});

		$("#btnSimpan").click(function(){
			var vesselcode = $("#vesselcode").val();
			var vessel = $("#vessel").val();
			var description = $("#description").val();

			if(vesselcode != "" && vessel != ""){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"update-vessel",
						vesselcode:vesselcode,
						vessel:vessel,
						description:description,
						id:<?php echo $page[1]?>
					},
					success:function(resp){
						redirectAfterAction(resp, "vessel", "updat", "Vessel");
					}
				})
			} else {
				alert("Please fill out every field with *");
			}
			return false;
		});
	})


</script>
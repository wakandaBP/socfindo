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
						if(parseInt(resp) > 0){
							alert("Data has been saved!");
                            location.href = hostname + "/vessel";
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
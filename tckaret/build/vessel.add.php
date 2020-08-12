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
						action:"add-vessel",
						vesselcode:vesselcode,
						vessel:vessel,
						description:description
					},
					success:function(resp){
						data = JSON.parse(resp);

						if(parseInt(data['rowcount']) > 0){
							alert("Vessel has added!");
                            location.href = hostname + "/vessel?last="+data['id'];
                        }
                        else{
                            alert("Vessel cant be added!");
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
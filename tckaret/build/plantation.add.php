<script type="text/javascript">
	$(function(){

		$("#name").on('keyup',function(){
			this.value = this.value.toUpperCase();
		});

		$("#btnSimpan").click(function(){
			var name = $("#name").val();
			var region = $("#region").val();
			var description = $("#description").val();

			if(name != "" && region != ""){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-plantation",
						name:name,
						region:region,
						description:description
					},
					success:function(resp){
						data = JSON.parse(resp);

						if(parseInt(data['rowcount']) > 0){
							alert("Plantation has been added!");
                            location.href = hostname + "/plantation?last="+data['id'];
                        }
                        else{
                            alert("Plantation cant be added!");
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
<script type="text/javascript">
	$(function(){

		$("#name").on('keyup',function(){
			this.value = this.value.toUpperCase();
		});

		$("#btnSimpan").click(function(){
			var name = $("#name").val();

			if(name != ""){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-region",
						name:name
					},
					success:function(resp){
						data = JSON.parse(resp);

						if(parseInt(data['rowcount']) > 0){
							alert("Region has been added!");
                            location.href = hostname + "/region?last="+data['id'];
                        }
                        else{
                            alert("Region cant be added!");
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
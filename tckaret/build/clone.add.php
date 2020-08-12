<script type="text/javascript">
	$(function(){
		//menuActive();
	
		$("#clonename").on('keyup',function(){
			this.value = this.value.toUpperCase();
		});
		
		$("#btnSimpan").click(function(){
			var clonename = $("#clonename").val();
			var description = $("#description").val();

			if(clonename != ""){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-clone",
						clonename:clonename,
						description:description
					},
					success:function(resp){
						data = JSON.parse(resp);

						if(parseInt(data['rowcount']) > 0){
							alert("Clone has added!");
                            location.href = hostname + "/clone?last="+data['id'];
                        }
                        else{
                            alert("Clone cant be added!");
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
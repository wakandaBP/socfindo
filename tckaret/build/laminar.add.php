<script type="text/javascript">
	$(function(){
		$("#nolaminar").on('keyup',function(){
			this.value = this.value.toUpperCase();
		});

		$("#btnSimpan").click(function(){
			var nolaminar = $("#nolaminar").val();
			var cleaningdate = $("#cleaningdate").val();
			var datetoclean = $("#datetoclean").val();
			var description = $("#description").val();

			if(nolaminar != "" && cleaningdate != "" && datetoclean != ""){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-laminar",
						nolaminar:nolaminar,
						cleaningdate:cleaningdate,
						datetoclean:datetoclean,
						description:description
					},
					success:function(resp){
						redirectAfterAction(resp, "laminar", "add", "Laminar");
					}
				})
			} else {
				alert("Please fill out every field with *");
			}
			return false;
		});
	})


</script>
<script type="text/javascript">
	$(function() {
		
		$("#url").click(function(){
			id = $("#idtreatment").val();

			if (id != ""){
				location.href = hostname + "/transfercallus.add/" + id;
			} else {
				alert("Please choose ID Treatment!");
			}
		})
	})

</script>
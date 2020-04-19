<script type="text/javascript">
	$(function() {
		var id;

		$("#treatment").change(function(){
			$("#idtreatment").val($(this).val());
		})

		$("#url").click(function(){
			id = $("#idtreatment").val();

			if (id != ""){
				location.href = hostname + "/embryoscreening.add/" + id;
			} else {
				alert("Please choose ID Treatment!");
			}
		})
	})

</script>
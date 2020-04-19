<script type="text/javascript">

	$(function() {
		$("#idtreatment").on('change',function(){
			$("#url").attr("href",<?php echo json_encode($tckaret); ?> + "/initiation-obs/" + $(this).val());
		})

	})

</script>
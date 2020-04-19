<script type="text/javascript">

	$(function() {
		$("#idreception").on('change',function(){
			$("#url").attr("href",<?php echo json_encode($tckaret); ?> + "/initiation.add/" + $(this).val());
		})

	})

</script>
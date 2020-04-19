<?php
	session_unset();
	session_destroy();
?>

<script type="text/javascript">
	location.href = <?php echo json_encode($tckaret); ?>;
</script>
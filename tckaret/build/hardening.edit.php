<script type="text/javascript">
	$(function(){
		var selectedID = <?= json_encode($page[1]) ?>;

		$("#edit-hardening").submit(function(){
			let quantity_at_start = $("#quantity_at_start").val();
			let start_date = $("#start_date").val();
			let quantity_at_end = $("#quantity_at_end").val();
			let deactivated = ($("#deactivated").is(":checked")) ? "TRUE" : "FALSE";
			console.log(start_date);

			$.ajax({
				url: hostname + "/action.php",
				type: "POST",
				data: {
					action:"update-hardening",
					selectedID: selectedID,
					quantity_at_start: quantity_at_start,
					start_date: start_date,
					quantity_at_end: quantity_at_end,
					deactivated: deactivated
				},
				success:function(resp){
					console.log(resp);
					data = JSON.parse(resp);

					if(parseInt(data['rowcount']) > 0){
						alert("Hardening has updated!");
                        location.href = hostname + "/hardening?last=" + data['id'];
                    }
                    else{
                        alert("Hardening cant be updated!");
                    }
				},
				error: function(response) {
					console.log("Error : ");
					console.log(response);
				}
			});

			return false;
		});


	});

</script>
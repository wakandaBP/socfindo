<script type="text/javascript">
	$(function(){
		var selectedID = <?= json_encode($page[1]) ?>;

		$("#edit-rooting").submit(function(){
			let start_date = $("#start_date").val();
			let qty_at_start = $("#quantity_at_start").val();
			let qty_at_end = $("#quantity_at_end").val();
			let deactivated = ($("#deactivated").is(":checked")) ? "TRUE" : "FALSE";

			console.log(start_date + " _ " + qty_at_start + " _ " + qty_at_end + " _ " + deactivated);

			$.ajax({
				url: hostname + "/action.php",
				type: "POST",
				data: {
					action:"update-rooting",
					selectedID: selectedID,
					start_date: start_date,
					qty_at_start: qty_at_start,
					qty_at_end: qty_at_end,
					deactivated: deactivated
				},
				success:function(resp){
					console.log(resp);
					data = JSON.parse(resp);

					if(parseInt(data['rowcount']) > 0){
						alert("Rooting for Green House has updated!");
                        location.href = hostname + "/rooting?last=" + data['id'];
                    }
                    else{
                        alert("Rooting for Green House cant be updated!");
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
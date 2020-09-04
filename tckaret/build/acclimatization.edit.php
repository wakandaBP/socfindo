<script type="text/javascript">
	$(function(){
		var selectedID = <?= json_encode($page[1]) ?>;

		$("#edit-acclimatization").submit(function(){
			let country_arrival_date = $("#country_arrival_date").val();
			let supplier = $("#supplier").val();
			let date_of_shipment = $("#date_of_shipment").val();
			let plantation_arrival_date = $("#plantation_arrival_date").val();
			let start_date = $("#start_date").val();
			let green_house_number = $("#green_house_number").val();
			let quantity_received = $("#quantity_received").val();
			let quantity_rejected = $("#quantity_rejected").val();
			let quantity_at_end = $("#quantity_at_end").val()
			let deactivated = ($("#deactivated").is(":checked")) ? "TRUE" : "FALSE";

			$.ajax({
				url: hostname + "/action.php",
				type: "POST",
				data: {
					action:"update-acclimatization",
					selectedID: selectedID,
					country_arrival_date: country_arrival_date,
					supplier: supplier,
					date_of_shipment: date_of_shipment,
					plantation_arrival_date: plantation_arrival_date,
					start_date: start_date,
					green_house_number: green_house_number,
					quantity_received: quantity_received,
					quantity_rejected: quantity_rejected,
					quantity_at_end: quantity_at_end,
					deactivated: deactivated
				},
				success:function(resp){
					console.log(resp);
					data = JSON.parse(resp);

					if(parseInt(data['rowcount']) > 0){
						alert("Acclimatization has updated!");
                        location.href = hostname + "/acclimatization?last=" + data['id'];
                    }
                    else{
                        alert("Acclimatization cant be updated!");
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
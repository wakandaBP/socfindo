<script type="text/javascript">
	$(function(){
		var selectedID = <?= json_encode($page[1]) ?>;

		$("#plantation-field-edit").submit(function(){
			let panel = $("#panel").val();
			let planting_date = $("#planting_date").val();
			let quantity_planted = $("#quantity_planted").val();
			let quantity_stands_planting = $("#quantity_stands_planting").val();
			let quantity_stands_1st_cencus = $("#quantity_stands_1st_cencus").val();
			let scan_date = $("#scan_date").val();
			//alert(quantity_stands_1st_celcius);
			$.ajax({
				url: hostname + "/action.php",
				type: "POST",
				data: {
					action:"update-plantation-field",
					selectedID: selectedID,
					panel: panel,
					planting_date: planting_date,
					quantity_planted: quantity_planted,
					quantity_stands_planting: quantity_stands_planting,
					quantity_stands_1st_cencus: quantity_stands_1st_cencus,
					scan_date: scan_date
				},
				success:function(resp){
					console.log(resp);
					data = JSON.parse(resp);

					if(parseInt(data['rowcount']) > 0){
						alert("Plantation Field has updated!");
                        location.href = hostname + "/plantation_field?last=" + data['id'];
                    }
                    else{
                        alert("Plantation Field cant be updated!");
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
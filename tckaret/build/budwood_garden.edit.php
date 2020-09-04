<script type="text/javascript">
	$(function(){
		var selectedID = <?= json_encode($page[1]) ?>;

		$("#edit-budwood").submit(function(){
			let block = $("#block").val();
			let planting_date = $("#planting_date").val();
			let quantity_planted = $("#quantity_planted").val();
			let quantity_stands = $("#quantity_stands").val();
			let quantity_rejected = $("#quantity_rejected").val();

			$.ajax({
				url: hostname + "/action.php",
				type: "POST",
				data: {
					action:"update-budwood",
					selectedID: selectedID,
					block: block,
					planting_date: planting_date,
					qty_planted: quantity_planted,
					qty_stands: quantity_stands,
					qty_rejected: quantity_rejected
				},
				success:function(resp){
					console.log(resp);
					data = JSON.parse(resp);

					if(parseInt(data['rowcount']) > 0){
						alert("Budwood Garden has updated!");
                        location.href = hostname + "/budwood_garden?last=" + data['id'];
                    }
                    else{
                        alert("Budwood Garden cant be updated!");
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
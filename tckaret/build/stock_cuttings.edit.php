<script type="text/javascript">
	$(function(){
		var selectedID = <?= json_encode($page[1]) ?>;

		$("#edit-stock-cuttings").submit(function(){
			let date_stock = $("#date_stock").val();
			let plantation = $("#plantation").val();
			let qty = $("#quantity").val();
			let table_number = $("#table_number").val();
			let deactivated = ($("#deactivated").is(":checked")) ? "TRUE" : "FALSE";

			$.ajax({
				url: hostname + "/action.php",
				type: "POST",
				data: {
					action:"update-stock-cutting",
					selectedID: selectedID,
					date_stock: date_stock,
					plantation: plantation,
					qty: qty,
					table_number: table_number,
					deactivated: deactivated
				},
				success:function(resp){
					console.log(resp);
					data = JSON.parse(resp);

					if(parseInt(data['rowcount']) > 0){
						alert("Stock for Cuttings has updated!");
                        location.href = hostname + "/stock_cuttings?last=" + data['id'];
                    }
                    else{
                        alert("Stock for Cuttings cant be updated!");
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
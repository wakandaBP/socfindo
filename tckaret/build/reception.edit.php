<script type="text/javascript">
	$(function (){
		$("#clone").trigger('change');
		$("#plantation").trigger('change');
		$("#tree").trigger('change');
		$("#treepart").trigger('change');
	
		$("#clone").on('change',function(){
			$("#idclone").val($(this).val());
		});

		$("#plantation").on('change',function(){
			$("#idplantation").val($(this).val());
		});

		$("#tree").on('change',function(){
			$("#idtree").val($(this).val());
		});

		$("#treepart").on('change',function(){
			$("#idtreepart").val($(this).val());
		});

		$('.numberonly').keypress(function(event){
			if (event.which < 48 || event.which > 57) {
		        event.preventDefault();
		    }
		});

		$("#btnSimpan").click(function(){
			var receipt = $("#receiptdate").val();
			var harvest = $("#harvestdate").val();
			var clone = $("#idclone").val();
			var plantation = $("#idplantation").val();
			var tree = $("#idtree").val();
			var treepart = $("#idtreepart").val();
			/*var block = $("#block").val();
			var line = $("#line").val();*/
			var flowers = $("#flowers").val();
			var fruits = $("#fruits").val();
			var comment = $("#comment").val();

			//alert(receipt + " " + harvest + " " + clone + " " + plantation + " " + tree + " " + treepart + " " +flowers + " " + fruits + " " + comment);

			if (receipt != "" && harvest != "" && clone != "" && plantation != "" && tree != "" && treepart != "" && flowers != "" && fruits != ""){

				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"update-reception",
						receipt:receipt,
						harvest:harvest,
						clone:clone,
						plantation:plantation,
						tree:tree,
						treepart:treepart,
						/*block:block,
						line:line,*/
						flowers:flowers,
						fruits:fruits,
						comment:comment,
						id:<?php echo $page[1]?>
					},
					success:function(resp){
						data = JSON.parse(resp);

						if(parseInt(data['rowcount']) > 0){
							alert("Data has been added!");
							location.href = hostname + "/reception?last="+data['id'];
						}
						else{
							alert("Data cant be added!");
						}
					}
				});
			} else {
				alert("Please fill out every field with *");
			}
			return false;
		});
	});

</script>


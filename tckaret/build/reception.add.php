<script type="text/javascript">
	$(function (){
		menuActive();

		//$(".ini-list").select2({});
	
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
			var clone = $("#clone").val();
			var plantation = $("#plantation").val();
			var tree = $("#tree").val();
			var treepart = $("#treepart").val();
			/*var block = $("#block").val();
			var line = $("#line").val();*/
			var flowers = $("#flowers").val();
			var fruits = $("#fruits").val();
			var comment = $("#comment").val();

			//alert(receipt + " " + harvest + " " + clone + " " + plantation + " " + tree + " " + treepart + " " + block + " " + line + " " + flowers + " " + fruits + " " + comment);

			if (receipt != "" && harvest != "" && clone != "" && plantation != "" && tree != "" && treepart != "" && flowers != "" && fruits != ""){

				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-reception",
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
						comment:comment
					},
					success:function(resp){
						if(parseInt(resp) > 0){
                            location.href = hostname + "/reception";
                        }
                        else{
                            alert(resp);
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
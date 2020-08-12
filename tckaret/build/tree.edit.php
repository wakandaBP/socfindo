<script type="text/javascript">
	var selectedPlant;

	$(function(){
		$("#treecode").on('keyup',function(){
			this.value = this.value.toUpperCase();
		});
		
		$("#No").on('click',function(){
			$("#certinumber").val("");
		});
		
		$("#NULL").on('click',function(){
			$("#certinumber").val("");
		});

		refreshBlock($("#idplantation").val());

		$("#plantation").change(function(){
			$("#idplantation").val($(this).val());
			refreshBlock($("#idplantation").val());
		});

		$("#block").change(function(){
			$("#idblock").val($(this).val());
		});

		$("#clone").change(function(){
			$("#idclone").val($(this).val());
		});

		$("#btnSimpan").click(function(){
			var treecode = $("#treecode").val();
			var plantation = $("#plantation").val();
			var block = $("#block").val();
			var yearofplant = $("#yearplanting").val();
			var clone = $("#clone").val();
			var line = $("#line").val();
			var gps = $("#gps").val();
			var certified = $('input[type="radio"][name=certified]:checked').val();
			var certinumber = $("#certinumber").val();

			//alert(treecode + " " + plantation + " " + block  + " " + yearofplant + " " + clone + " " + line + " " + gps + " " + certified + " " + certinumber);
			if (treecode != "" && plantation != "" && block != "" && yearofplant != "" && clone != "" && certified != ""){
				
				if (certified == 'No' || certified == "NULL" || certified == "null"){
					certinumber = "";
				} 

				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"update-tree",
						treecode:treecode,
						plantation:plantation,
						block:block,
						yearofplant:yearofplant,
						clone:clone,
						line:line,
						gps:gps,
						certified:certified,
						certinumber:certinumber,
						id:<?php echo $page[1];?>
					},
					success:function(resp){
						data = JSON.parse(resp);

						if(parseInt(data['rowcount']) > 0){
							alert("Tree has updated!");
                            location.href = hostname + "/tree?last="+data['id'];
                        }
                        else{
                            alert("Tree cant be updated!");
                        }
					}
				});
			}
			else {
				alert("Please fill out every field with *");
			}
			
			return false;
		});

		function refreshBlock(plantation){
		var selectedPlant;
		
		$("#block option").remove();
		$.ajax({
			url: hostname + "/api/loader.tree.select.block.php",
			async:true,
			type: "POST",
			data: {
				idplantation:plantation
			},
			success:function(resp){
				var MetaData = JSON.parse(resp);

				for(i=0;i<MetaData.length;i++){

					var selection = document.createElement("OPTION");

					$(selection).attr("value", MetaData[i].id).html(MetaData[i].blocknumber);
					$("#block").append(selection);
				}
			}
		});
		selectedPlant = $("#block").val();
		return selectedPlant;
	}
	});


</script>
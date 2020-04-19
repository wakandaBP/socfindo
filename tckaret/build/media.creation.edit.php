<script type="text/javascript">
	$(function (){
		menuActive();
		
		// $(".listworker").select2({});
		// $(".listvessel").select2({});
	
		$("#worker").on('change',function(){
			$("#idworker").val($(this).val());
		});

		$("#vessel").on('change',function(){
			$("#idvessel").val($(this).val());
		});

		$('.numberwithdot').keypress(function(event) {
		    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
		        event.preventDefault();
		    }
		});

		$('#jumlah').keypress(function(event){
			if (event.which < 48 || event.which > 57) {
		        event.preventDefault();
		    }

		});

		$("#btnSimpan").click(function(){
			var tglbuat = $("#tglbuatmedia").val();
			var worker = $("#worker").val();
			var volume = $("#volume").val();
			var vessel = $("#vessel").val();
			var jumlah = $("#jumlah").val();
			var lamakerja = $("#lamakerja").val();

			if (tglbuat != "" && worker != "" && volume != "" && vessel != "" && jumlah != "" && lamakerja  != ""){

				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"update-media-stok",
						idbuatmedia:<?php echo $page[1];?>,
						idmedia:<?php echo $idmedia;?>,
						tglbuatmedia:tglbuat,
						worker:worker,
						volume:volume,
						vessel:vessel,
						jumlah:jumlah,
						lamakerja:lamakerja
					},
					success:function(resp){
						if(parseInt(resp) > 0){
                            location.href = hostname + "/media.creation.log/<?php echo $idmedia;?>";
                        }
                        else{
                            //alert(resp);
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
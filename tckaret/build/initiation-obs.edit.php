<script type="text/javascript">
	
	$(function() {
		$(".useselect2").select2({});
		
		$("#obsworker").on('change',function(){
			$("#idobsworker").val($(this).val());
		});

		$('.numberonly').keypress(function(event){
			if (event.which < 48 || event.which > 57) {
		        event.preventDefault();
		    }
		});

		var allseeds;
		$.ajax({
			async:false,
			url: hostname + "/api/initiation/view.initiation.detail.php",
			type: "POST",
			data: {
				id:<?php echo $page[1]?>
			},
			success: function(resp){
				data = JSON.parse(resp);

				if (data[0].sample == "FRUITS"){
					allseeds = data[0].se;
				} else {
					allseeds = data[0].ze;
				}
				return allseeds;
			}
		});

		$("#btnSimpan").click(function(){
			var obsdate = $("#obsdate").val();
			var obsworker = $("#idobsworker").val();

			var contfungi = $("#contfungi").val();
			var contbact = $("#contbact").val();
			var notreact = $("#notreact").val();
			
			var alotof = parseInt($("#alotofcallus").val());
			var littlebit = parseInt($("#littlebitofcallus").val());

			var yellow = parseInt($("#yellow").val());
			var white = parseInt($("#white").val());
			var orange = parseInt($("#orange").val());
			var brown = parseInt($("#brown").val());
			var dead = parseInt($("#dead").val());

			allseeds = parseInt(allseeds);
			alotlittlebit = alotof + littlebit; 
			
			//alert(obsdate + " " + obsworker + " " + contfungi + " " + contbact + " " + notreact + " " + alotof + " " + littlebit + " " + yellow + " " + white + " " + orange + " " + brown + " " + dead);

			if (obsdate != "" && obsworker != "" && alotof  != "" && littlebit  != "" ){
				//alert((alotof + littlebit) + " " + (yellow + white + orange + brown));
				if (alotlittlebit <= allseeds){
					//alert(alotof + littlebit + " " + allseeds);
					if (alotlittlebit == (yellow + white + orange + brown)){
						$.ajax({
							url: hostname + "/action.php",
							type: "POST",
							data: {
								action:"update-obscallus",
								obsdate:obsdate,
								obsworker:obsworker,
								
								contfungi:contfungi,
								contbact:contbact,
								
								notreact:notreact,
								alotof:alotof,
								littlebit:littlebit,

								yellow:yellow,
								white:white,
								orange:orange,
								brown:brown,
								dead:dead,							
								
								idtreatment:<?php echo $page[1]?>
							},
							success:function(resp){
								if(parseInt(resp) > 0){
									//alert(resp);
		                            location.href = hostname + "/initiation-obs";
		                        }
		                        else{
		                            //alert(resp);
		                        }
							}
						});
					} else {
						alert("Make sure total of (A Lot of Calus + Little Bit of Callus) = (Yellow + White + Orange + Brown)");
					}
					return false;
				} else {
					alert("Total of (A Lot of Callus + Little Bit of Callus) is more from 'Amount of Pieces Initiated from Initiation'");
				}
				return false;
			} else {
				alert("Please fill out every field with *");
			}
			return false;
		});
	})

</script>
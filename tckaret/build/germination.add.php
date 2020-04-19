<script type="text/javascript">
	$(function(){

		$("#worker").on('change',function(){
			$("#idworker").val($(this).val());
		});

		$("#laminar").on('change',function(){
			$("#idlaminar").val($(this).val());
		});


		$("#amountmedia").on('keyup',function(){
			stats = checkAvailableMedia($("#amountmedia").val(),$("#idmedia").val(),"error-media");
			disabledButton(stats);
		});

		$("#media").on('change',function(){
			$("#idmedia").val($(this).val());

			stats = checkAvailableMedia($("#amountmedia").val(),$("#idmedia").val(),"error-media");
			disabledButton(stats);
		});

		$("#shapeofembryo").on('change',function(){
			$("#select-shapeofembryo").val($(this).val());
		});


		$("#btnSimpan").click(function(){
			var transdate = $("#transdate").val();
			var idworker = $("#idworker").val();
			var nobox = $("#nobox").val();
			var culroom = $("#cultureroom").val();
			var idlaminar = $("#idlaminar").val();
			var connect = $("#connect-to-other").val();
			var size_em = $("#sizeofembryo").val();
			var shape_em = $("#select-shapeofembryo").val();
			var comment_em = $("#comment_embryo").val();
			var typecallus = $("#typeofcallus").val();
			var colorcallus = $("#colorofcallus").val();
			var calluscomment = $("#calluscomment").val();
			var amountmedia = $("#amountmedia").val();
			var idmedia = $("#idmedia").val();

			//alert(transdate + " " + idworker + " " + nobox + " " + culroom + " " + idlaminar + " " + connect + " " + size_em + " " + shape_em + " " + typecallus + " " + colorcallus + " " + amountmedia + " " + idmedia);


			if (transdate != "" && idworker != "" && nobox != "" && culroom != "" && idlaminar != "" && connect != "" && size_em != "" && shape_em != "" && typecallus != "" && colorcallus != "" && amountmedia != "" && idmedia != ""){
			
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-germ",

						transdate:transdate,
						idworker:idworker,	
						nobox:nobox,
						culroom:culroom,
						idlaminar:idlaminar,

						connect:connect,
						size_em:size_em,
						shape_em:shape_em,
						comment_em:comment_em,

						typecallus:typecallus,
						colorcallus:colorcallus,
						calluscomment:calluscomment,
						amountmedia:amountmedia,
						idmedia:idmedia,
						
						idembryo:<?= $page[1] ?>
					},
					success:function(resp){
						//alert(resp);
						if(parseInt(resp) > 0){
							alert("Data has beed added!");
                        	location.href = hostname + "/germination";
                        }
                        else{
                           alert("Data can't be added!");
                        }
					}
				});
			} else {
				alert("Please fill out every field with *");
			}

			return false;
		});

	});

	function disabledButton(resp){
		if (resp == ""){
			$("#btnSimpan").attr("disabled",false);
		} else {
			$("#btnSimpan").attr("disabled",true);
		}
	}
</script>
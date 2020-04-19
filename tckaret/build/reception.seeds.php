<script type="text/javascript">
	$(function (){

		$('.numberonly').keypress(function(event){
			if (event.which < 48 || event.which > 57) {
		        event.preventDefault();
		    }
		});

		$("#btnSimpan").click(function(){
			var fruitsparams = 0;
			var flowersparams = 0;

			//variabel flower and fruit is logic for execute command 
			//check value from flowers harvested, if null, set 0 to variabel flower
			if ('<?php echo $flower;?>' != ''){
				flower = '<?php echo $flower;?>';
			} else {
				flower = 0;
			}

			//check value from fruits harvested, if null, set 0 to variabel fruit
			if ('<?php echo $fruit;?>' != ''){
				fruit = '<?php echo $fruit;?>';
			} else {
				fruit = 0;	
			}

			if (parseInt(flower) > 0 && parseInt(fruit) > 0){
				var idflowers = $("#idflowers").val();
				var flowersused =$("#flowersused").val();
				var rottenflowers =$("#rottenflowers").val();
				var totalflowersused =$("#totalflowersused").val();

				var idfruits =$("#idfruits").val();
				var fruitsused =$("#fruitsused").val();
				var fruitswoody =$("#fruitswoody").val();
				var fruitstoosmall =$("#fruitstoosmall").val();
				var looseseeds =$("#looseseeds").val();
				var rottenfruits =$("#rottenfruits").val();
				var totalseedsused =$("#totalseedsused").val();

				fruitsparams = 1;
				flowersparams = 1;

			} else if (parseInt(flower) == 0 && parseInt(fruit) > 0) {

				var idflowers = "";
				var flowersused = "";
				var rottenflowers = "";
				var totalflowersused = "";

				var idfruits =$("#idfruits").val();
				var fruitsused =$("#fruitsused").val();
				var fruitswoody =$("#fruitswoody").val();
				var fruitstoosmall =$("#fruitstoosmall").val();
				var looseseeds =$("#looseseeds").val();
				var rottenfruits =$("#rottenfruits").val();
				var totalseedsused =$("#totalseedsused").val();

				fruitsparams = 1;

			} else if (parseInt(flower) > 0 && parseInt(fruit) == 0) {
				var idflowers =$("#idflowers").val();
				var flowersused =$("#flowersused").val();
				var rottenflowers =$("#rottenflowers").val();
				var totalflowersused =$("#totalflowersused").val();

				var idfruits = "";
				var fruitsused = "";
				var fruitswoody = "";
				var fruitstoosmall = "";
				var looseseeds = "";
				var rottenfruits = "";
				var totalseedsused = "";

				flowersparams = 1;
			}

			checkid = <?php echo $page[1]?>;

			//alert(idflowers + " " + idfruits);
			if (checkid != ""){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"update-reception-seeds",
						flowersparams:flowersparams,
						fruitsparams:fruitsparams,

						idfruits:idfruits,
						flowersused:flowersused,
						rottenflowers:rottenflowers,
						totalflowersused:totalflowersused,

						idflowers:idflowers,
						fruitsused:fruitsused,
						woodyfruits:fruitswoody,
						fruitstoosmall:fruitstoosmall,
						looseseeds:looseseeds,
						rottenfruits:rottenfruits,
						totalseeds:totalseedsused,
						
						idreception:<?php echo $page[1]?>
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
				//alert("Please fill out every field with *");
			}
			return false;
		});
	});

</script>


<script type="text/javascript">
	$(function(){

		$("#medium").on('change', function(){
			loadNumberOfStok('stok_available', $(this).val(), $("#recipient").val());
		});

		$("#recipient").on('change', function(){
			loadNumberOfStok('stok_available', $("#medium").val(), $(this).val());
		});


		$("#invitro-from-se").submit(function(){
			let motherplant = $("#motherplant").val();
			let startdate = $("#startdate").val();
			let medium = $("#medium").val();
			let recipient = $("#recipient").val();
			let numberofplants = $("#number_of_plants").val();
			let laminarflow = $("#laminar_flow").val();
			let worker = $("#worker").val();

			//console.log(motherplant + " _ " + startdate + " _ " + medium + " _ " + recipient + " _ " + numberofplants + " _ " + laminarflow + " _ " + worker);

			$.ajax({
				url: hostname + "/action.php",
				type: "POST",
				data: {
					action:"invitro-from-se",
					motherplant: motherplant,
					startdate:startdate,
					medium: medium,
					recipient: recipient,
					numberofplants: numberofplants,
					laminarflow: laminarflow,
					worker: worker
				},
				success:function(resp){
					console.log(resp);
					data = JSON.parse(resp);

					if(parseInt(data['rowcount']) > 0){
						alert("In Vitro has added!");
                        location.href = hostname + "/invitro?last=" + data['id'];
                    }
                    else{
                        alert("In Vitro cant be added!");
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

	function loadNumberOfStok(selector, media, vessel){
		$.ajax({
			url: hostname + "/api/invitro/cek_media_available.php",
			type: "POST",
			data: {
				media: media,
				vessel:vessel
			},
			success:function(resp){
				data = JSON.parse(resp);
				$("#" + selector).val(data.qty);

				if (data.qty == 0){
					$("#btnSimpan").attr("disabled",true);
				} else {
					$("#btnSimpan").removeAttr("disabled");
				}
			}
		});
	}

</script>
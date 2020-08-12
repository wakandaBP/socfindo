<script type="text/javascript">
	$(function(){
		var selectedID = <?= json_encode($page[1]) ?>;
		loadNumberOfStok('stok_available', $("#medium").val(), $("#recipient").val());

		$("#medium").on('change', function(){
			loadNumberOfStok('stok_available', $(this).val(), $("#recipient").val());
		});

		$("#recipient").on('change', function(){
			loadNumberOfStok('stok_available', $("#medium").val(), $(this).val());
		});

		$("#invitro-edit").submit(function(){
			let startdate = $("#startdate").val();
			let enddate = ($("#end_date").val() != "") ? $("#end_date").val() : null;
			let medium = $("#medium").val();
			let recipient = $("#recipient").val();
			let num_of_plants = $("#number_of_plants").val();
			let num_of_alive = $("#number_of_alive").val();
			let num_of_dead = $("#number_of_dead").val();
			let contaminated = $("#contaminated").val();
			let new_shoots_for_r = $("#new_shoots_for_r").val();
			let new_shoots_on_m = $("#new_shoots_on_m").val();
			let deactivated = ($("#deactivated").is(":checked")) ? "TRUE" : "FALSE";
			let laminarflow = $("#laminar_flow").val();
			let worker = $("#worker").val();
			let contamination_type = $("#contamination_type").val();

			//console.log(motherplant + " _ " + startdate + " _ " + medium + " _ " + recipient + " _ " + numberofplants + " _ " + laminarflow + " _ " + worker);

			//console.log(enddate);
			$.ajax({
				url: hostname + "/action.php",
				type: "POST",
				data: {
					action:"update-invitro",
					selectedID: selectedID,
					startdate:startdate,
					enddate: enddate,
					medium: medium,
					recipient: recipient,
					numberofplants: num_of_plants,
					numberofalive: num_of_alive,
					numberofdead: num_of_dead,
					contaminated: contaminated,
					new_shoots_for_r: new_shoots_for_r,
					new_shoots_on_m: new_shoots_on_m,
					deactivated: deactivated,
					contamination_type: contamination_type,
					laminarflow: laminarflow,
					worker: worker
				},
				success:function(resp){
					console.log(resp);
					data = JSON.parse(resp);

					if(parseInt(data['rowcount']) > 0){
						alert("In Vitro has updated!");
                        location.href = hostname + "/invitro?last=" + data['id'];
                    }
                    else{
                        alert("In Vitro cant be updated!");
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
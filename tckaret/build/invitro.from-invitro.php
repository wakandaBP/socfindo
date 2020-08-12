<script type="text/javascript">
	$(function(){
		var dataInvitro = loadDataInvitro();
		var no_urut = 1;
		var dataParent = {};
		$("#end_date").val(<?= json_encode(date("Y-m-d")); ?>);
		//loadDataInvitro();
		//	console.log(dataInvitro);

		$("#parent_invitro").on('change', function(){
			let id = $(this).val();
			let index;

			for(i = 0; i < dataInvitro.length; i++){
				if (dataInvitro[i].id == id) { index = i; }
			}

			$("#quantity").val(dataInvitro[index].number_of_plants);
		});

		$("#parent-form").submit(function(){
			let invitroID = $("#parent_invitro").val();
			let invitroText = $("#parent_invitro option:selected").html();
			let endDate = $("#end_date").val();
			let qty = $("#quantity").val();
			let deactivated = ($("#deactivated").is(":checked")) ? "TRUE" : "FALSE";
			let num_of_alive = $("#number_of_alive").val();
			let num_of_dead = $("#number_of_dead").val();
			let contaminated = $("#contaminated").val();
			let new_shoots_for_r = $("#new_shoots_for_r").val();
			let new_shoots_on_m = $("#new_shoots_on_m").val();

			var index = '';

			for(i = 0; i < dataInvitro.length; i++){
				if (dataInvitro[i].id == invitroID) { index = i; }
			}

			html = "<tr>" + 
						"<td><button type='button' class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete-parent\" id=\"delete_" + no_urut + "\" title='Delete Item'><i class=\"material-icons\">delete_outline</i></button></td>" + 
						"<td>"+ invitroText +"</td>" + 
						"<td>"+ dataInvitro[index].mother_embryo + "</td>" +
						"<td>"+ endDate +"</td>" +
						"<td>"+ qty +"</td>" + 
						"<td>"+ num_of_alive +"</td>" + 
						"<td>"+ num_of_dead +"</td>" + 
						"<td>"+ contaminated +"</td>" +
						"<td>"+ new_shoots_for_r +"</td>" +
						"<td>"+ new_shoots_on_m +"</td>" + 
						"<td>"+ deactivated +"</td>" + 
					"</tr>";

			
			$("#list-parent tbody").append(html);
			//console.log(invitroText);

			dataParent[no_urut] = {['id'] : invitroID, 
									['end_date'] :endDate,
									['qty'] : qty,
									['deactivated'] : deactivated,
									['number_of_alive'] : num_of_alive,
									['number_of_dead'] :  num_of_dead,
									['contaminated'] : contaminated,
									['new_shoots_for_r'] : new_shoots_for_r,
									['new_shoots_on_m'] : new_shoots_on_m 
								};


			loadMotherByCloneID(dataInvitro, dataInvitro[index].clone);
			$("form")[0].reset();
			$("#parent_invitro").trigger('change');
			$("#end_date").val(<?= json_encode(date("Y-m-d")); ?>);
			no_urut++;

			console.log(dataParent);

			return false;
		});

		$("#list-parent tbody").on('click', '.btn-delete-parent', function(){
			let id = $(this).attr("id").split("_");
			id = id[id.length - 1];

			$(this).parent().parent().remove();
			delete dataParent[id];
			if (Object.size(dataParent) == 0) {loadDataInvitro();}
		});

		$("#invitro-from-invitro").submit(function(){
	
			if (Object.size(dataParent) > 0){
				let startdate = $("#startdate").val();
				let medium = $("#medium").val();
				let recipient = $("#recipient").val();
				let numberofplants = $("#number_of_plants").val();
				let laminarflow = $("#laminar_flow").val();
				let worker = $("#worker").val();

				//console.log(startdate + " _ " + medium + " _ " + recipient + " _ " + numberofplants + " _ " + laminarflow + " _ " + worker);

				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"invitro-from-invitro",
						startdate:startdate,
						medium: medium,
						recipient: recipient,
						numberofplants: numberofplants,
						laminarflow: laminarflow,
						worker: worker,
						dataParent: dataParent
					},
					success:function(resp){
						console.log(resp);
						data = JSON.parse(resp);

						//console.log(data);
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
			} else {
				alert("Please select min. 1 mother embryo");
			}
			
			return false;
		});

		$("#medium").on('change', function(){
			loadNumberOfStok('stok_available', $(this).val(), $("#recipient").val());
		});

		$("#recipient").on('change', function(){
			loadNumberOfStok('stok_available', $("#medium").val(), $(this).val());
		});

	/*	$(".parent_invitro").select2({
			minimumInputLength: 1,
			placeholder: 'Type Min. 1 character',
			ajax: {
			    url: hostname + '/api/invitro/search_invitro.php',
			    dataType: 'json',
			    data: function (params) {
					return {
						params: params.term
					}
		    	},
		    	processResults: function (data, page) {
	              	return {
	                	results: data
	            	}
	            }
			}
		});*/

		Object.size = function(obj) {
		    var size = 0, key;
		    for (key in obj) {
		        if (obj.hasOwnProperty(key)) size++;
		    }
		    return size;
		};
	});

	function loadDataInvitro(){
		let MetaData;
		$("#parent_invitro option").remove();
		$("#parent_invitro").append("<option value=''>Choose</option>");

		$.ajax({
			async: false,
			url: hostname + "/api/invitro/search_invitro.php",
			type: "POST",
			success:function(resp){
				MetaData = JSON.parse(resp);

				//console.log(MetaData);
				if (MetaData != ""){
                	for(i = 0; i < MetaData.length; i++){
	                    var selection = document.createElement("OPTION");

	                    $(selection).attr("value", MetaData[i].id).html(MetaData[i].unique_code);
	                    $("#parent_invitro").append(selection);
	                }
                }
			}
		});

		return MetaData;
	}

	function loadMotherByCloneID(mother_arr, clone_id){
		$("#parent_invitro option").remove();
		$("#parent_invitro").append("<option value=''>Choose</option>");

		$(mother_arr).each(function(key, item){
			if (item.clone == clone_id){
				var selection = document.createElement("OPTION");

                $(selection).attr("value", mother_arr[key].id).html(mother_arr[key].unique_code);
                $("#parent_invitro").append(selection);
			}
		});
	}

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
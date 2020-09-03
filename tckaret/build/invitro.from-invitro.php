<script type="text/javascript">
	$(function(){
		var dataInvitro;
		var selectedCloneID, selectedMother, selectedMotherID; 
		var selectedCloneID_temp = '';
		var no_urut = 1;
		var dataParent = {};
		$("#end_date").val(<?= json_encode(date("Y-m-d")); ?>);
		//loadDataInvitro();
		//	console.log(dataInvitro);

		/*$("#parent_invitro").on('change', function(){
			let id = $(this).val();
			let index;

			for(i = 0; i < dataInvitro.length; i++){
				if (dataInvitro[i].id == id) { index = i; }
			}

			$("#quantity").val(dataInvitro[index].number_of_plants);
		});*/

		$("#parent-form").submit(function(){
			let invitroID = $("#parent_invitro").val();
			let invitroText = selectedMother.text;		//unique_code
			let endDate = $("#end_date").val();
			let qty = $("#quantity").val();
			let deactivated = ($("#deactivated").is(":checked")) ? "TRUE" : "FALSE";
			let num_of_alive = $("#number_of_alive").val();
			let num_of_dead = $("#number_of_dead").val();
			let contaminated = $("#contaminated").val();
			let new_shoots_for_r = $("#new_shoots_for_r").val();
			let new_shoots_on_m = $("#new_shoots_on_m").val();

			var index = '';

			/*for(i = 0; i < dataInvitro.length; i++){
				if (dataInvitro[i].id == invitroID) { index = i; }
			}*/

			html = "<tr>" + 
						"<td><button type='button' class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete-parent\" id=\"delete_" + no_urut + "\" title='Delete Item'><i class=\"material-icons\">delete_outline</i></button></td>" + 
						"<td>"+ invitroText +"</td>" + 
						"<td>"+ selectedMother.mother_embryo + "</td>" +
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


			//loadMotherByCloneID(dataInvitro, dataInvitro[index].clone);
			$("form")[0].reset();
			$("#parent_invitro").trigger('change');
			$("#end_date").val(<?= json_encode(date("Y-m-d")); ?>);
			no_urut++;

			selectedCloneID = selectedMother.clone_id;
			selectedMotherID = selectedMother.mother_id;

			if (dataInvitro != ""){
				dataInvitro = loadMotherByCloneID(selectedCloneID, selectedMotherID);
			}

			console.log(dataInvitro);

			return false;
		});

		$("#list-parent tbody").on('click', '.btn-delete-parent', function(){
			let id = $(this).attr("id").split("_");
			id = id[id.length - 1];

			$(this).parent().parent().remove();
			delete dataParent[id];
			
			if (Object.size(dataParent) == 0) { 
				selectedCloneID = ''; 
				selectedMotherID = '';
				selectedMother = '';
			}
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

						console.log(data);
						/*if(parseInt(data['rowcount']) > 0){
							alert("In Vitro has added!");
	                        location.href = hostname + "/invitro?last=" + data['id'];
	                    }
	                    else{
	                        alert("In Vitro cant be added!");
	                    }*/
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

		/*$(".parent_invitro").select2({
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

		$(".parent_invitro").select2({
			minimumInputLength: 1,
			templateResult: function (data, page) {
	            if (data) {
	                var html = '<table class="table table-bordered" style="margin-bottom: 0px;">\
		                <tbody>\
		                <tr>\
		                    <td width="150px">' + data.text + '</td>\
		                    <td width="150px">' + data.mother_embryo + '</td>\
		                    <td width="70px">' + data.start_date + '</td>\
		                    <td width="60px">' + data.medium_name + '</td>\
		                    <td width="100px">' + data.number_of_plants + '</td>\
		                    <td width="50px">' + data.number_of_alive + '</td>\
		                    <td width="50px">' + data.number_of_dead + '</td>\
		                    <td width="100px">' + data.number_of_contaminated + '</td>\
		                    <td width="70px">' + ((data.end_date === null) ? '-' : data.end_date) + '</td>\
		                    <td width="100px">' + data.deactivated + '</td>\
		                </tr >\
		                </tbody>\
		                </table>';

	                return $(html);
	            }
	        },
			ajax: {
			    url: hostname + "/api/invitro/search_invitro.php",
			    dataType: 'json',
			    data: function (params) {
					return {
						params: params.term,
						clone_id: selectedCloneID,
						mother_id: selectedMotherID
					}
		    	},
		    	processResults: function (data, page) {
		    		let listItem = data;
		    		console.log(listItem);

		    		//filter if mother has added 
		    		for(i = 0; i < listItem.length; i++){

		    			$.each(dataParent, function(key, item){

							if (item.id == listItem[i].id) {

								listItem.splice(i, 1);
							
							}
		    			
		    			});
						
					}

	              	return {
	                	results: listItem
	            	}
	            }
			}
		});

		//action on select
		$("#parent_invitro").on('select2:select', function(e){
			selectedMother = e.params.data;
			console.log(selectedMother);

			$("#quantity").val(selectedMother.number_of_plants);
			$("#end_date").val(selectedMother.end_date);
			//$("#deactivated").is(":checked")) ? "TRUE" : "FALSE";
			$("#number_of_alive").val(selectedMother.number_of_alive);
			$("#number_of_dead").val(selectedMother.number_of_dead);
			$("#contaminated").val(selectedMother.number_of_contaminated);
			$("#new_shoots_for_r").val(selectedMother.new_shoots_for_r);
			$("#new_shoots_on_m").val(selectedMother.new_shoots_on_m);		
		});

		//for template table select2
		var headerIsAppend = false;
		$('#parent_invitro').on('select2:open', function (e) {
			if (!headerIsAppend) {
	            html = '<table class="table table-bordered" style="margin-top: 5px;margin-bottom: 0px;">\
	                <tbody>\
	                <tr>\
	                	<td width="150px"><b>Unique Code</b></td>\
	                    <td width="150px"><b>Base SE</b></td>\
	                    <td width="70px"><b>Start Date</b></td>\
	                    <td width="60px"><b>Medium</b></td>\
	                    <td width="100px"><b>Number of Plants</b></td>\
	                    <td width="50px"><b>Alive</b></td>\
	                    <td width="50px"><b>Dead</b></td>\
	                    <td width="100px"><b>Contaminated</b></td>\
	                    <td width="70px" ><b>End Date</b></td>\
	                    <td width="100px"><b>Deactivated</b></td>\
	                </tr >\
	                </tbody>\
	                </table>';
	            $('.select2-search').append(html);
	            $('.select2-results').addClass('mplant');
	            headerIsAppend = true;
	        }
		});

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
			type: "GET",
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

	/*function loadMotherByCloneID(mother_arr, clone_id){
		$("#parent_invitro option").remove();
		$("#parent_invitro").append("<option value=''>Choose</option>");

		$(mother_arr).each(function(key, item){
			if (item.clone == clone_id){
				var selection = document.createElement("OPTION");

                $(selection).attr("value", mother_arr[key].id).html(mother_arr[key].unique_code);
                $("#parent_invitro").append(selection);
			}
		});
	}*/

	function loadMotherByCloneID(clone_id, mother_id){
		let data;

		$.ajax({
			async: false,
			url: hostname + "/api/invitro/search_invitro.php?params=&clone_id=" + clone_id + "&mother_id=" + mother_id,
			type: "GET",
			success:function(resp){
				data = JSON.parse(resp);
			}
		});

		return data;
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
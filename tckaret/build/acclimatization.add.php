<script type="text/javascript">
	$(function(){
		var dataInvitro;
		var selectedCloneID, selectedMother, selectedMotherID; 
		var selectedCloneID_temp = '';
		var no_urut = 1;
		var dataParent = {};
		$("#end_date").val(<?= json_encode(date("Y-m-d")); ?>);

		$("#parent-form").submit(function(){
			let invitroID = $("#parent_invitro").val();
			let endDate = $("#end_date").val();
			let qty = $("#quantity").val();
			let deactivated = ($("#deactivated").is(":checked")) ? "TRUE" : "FALSE";

			var index = '';

			/*for(i = 0; i < dataInvitro.length; i++){
				if (dataInvitro[i].id == invitroID) { index = i; }
			}*/

			html = "<tr>" + 
						"<td><button type='button' class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete-parent\" id=\"delete_" + no_urut + "\" title='Delete Item'><i class=\"material-icons\">delete_outline</i></button></td>" + 
						"<td>"+ selectedMother.text +"</td>" + 
						"<td>"+ selectedMother.mother_embryo + "</td>" +
						"<td>"+ endDate +"</td>" +
						"<td>"+ qty +"</td>" + 
						"<td>"+ deactivated +"</td>" + 
					"</tr>";

			
			$("#list-parent tbody").append(html);

			dataParent[no_urut] = {['id'] : invitroID, 
									['end_date'] :endDate,
									['qty'] : qty,
									['deactivated'] : deactivated
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

		$("#add-acclimatization").submit(function(){
	
			if (Object.size(dataParent) > 0){
				let region = $("#region").val();
				let supplier = $("#supplier").val();
				let country_arrival_date = $("#country_arrival_date").val();
				let date_of_shipment = $("#date_of_shipment").val();
				let plantation_arrival_date = $("#plantation_arrival_date").val();
				let start_date = $("#start_date").val();
				let green_house_number = $("#green_house_number").val();
				let quantity_received = $("#quantity_received").val();
				let quantity_rejected = $("#quantity_rejected").val();
				let quantity_at_end = $("#quantity_at_end").val();

				//console.log(startdate + " _ " + medium + " _ " + recipient + " _ " + numberofplants + " _ " + laminarflow + " _ " + worker);

				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-acclimatization",
						region: region,
						supplier: supplier,
						country_arrival_date: country_arrival_date,
						date_of_shipment: date_of_shipment,
						plantation_arrival_date: plantation_arrival_date,
						start_date: start_date,
						green_house_number: green_house_number,
						quantity_received: quantity_received,
						quantity_rejected: quantity_rejected,
						quantity_at_end: quantity_at_end,
						dataParent: dataParent
					},
					success:function(resp){
						//console.log(resp);
						data = JSON.parse(resp);

						if(parseInt(data['rowcount']) > 0){
							alert("Acclimatization has added!");
	                        location.href = hostname + "/acclimatization?last=" + data['id'];
	                    }
	                    else{
	                        alert("Acclimatization cant be added!");
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
		                    <td width="120px">' + data.text + '</td>\
		                    <td width="120px">' + data.mother_embryo + '</td>\
		                    <td width="70px">' + data.medium_name + '</td>\
		                    <td width="70px">' + data.number_of_plants + '</td>\
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
		    		//console.log(listItem);

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
			//console.log(selectedMother);

			$("#quantity").val(selectedMother.number_of_plants);
			$("#end_date").val(selectedMother.end_date);
		});

		//for template table select2
		var headerIsAppend = false;
		$('#parent_invitro').on('select2:open', function (e) {
			if (!headerIsAppend) {
	            html = '<table class="table table-bordered" style="margin-top: 5px;margin-bottom: 0px;">\
	                <tbody>\
	                <tr>\
	                	<td width="120px"><b>Unique Code</b></td>\
	                    <td width="120px"><b>Base SE</b></td>\
	                    <td width="70px"><b>Medium</b></td>\
	                    <td width="70px"><b>Number of Plants</b></td>\
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
</script>
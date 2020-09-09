<script type="text/javascript">
	$(function(){
		var dataAcc;
		var selectedCloneID, selectedMother, selectedMotherID; 
		var selectedCloneID_temp = '';
		var qtyReceived = 0;
		var no_urut = 1;
		var dataParent = {};
		var dateNow = <?= json_encode(date("Y-m-d")); ?>;
		$("#end_date").val(dateNow);
		$("#deactivated").attr("disabled", true);

		$("#quantity_used").on('keyup', function(){
			let qty_remaining = parseInt($("#quantity_remaining").val());
			let qty_used = parseInt($(this).val());

			if (qty_used > qty_remaining) {
				$(this).val(0);
			}

			if ((qty_remaining - qty_used) > 0){
				$("#deactivated").attr("disabled", true);
			} else {
				$("#deactivated").attr("disabled", false);
			}
		});

		$("#parent-form").submit(function(){
			let accID = $("#parent_plantation_field").val();
			let endDate = $("#end_date").val();
			let qty_start = parseInt($("#quantity_start").val());
			let qty_remaining = parseInt($("#quantity_remaining").val());
			let qty_used = parseInt($("#quantity_used").val());
			let deactivated = ($("#deactivated").is(":checked")) ? "TRUE" : "FALSE";

			dateNow = endDate;

			var index = '';

			html = "<tr>" + 
						"<td><button type='button' class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete-parent\" id=\"delete_" + no_urut + "\" title='Delete Item'><i class=\"material-icons\">delete_outline</i></button></td>" + 
						"<td>"+ selectedMother.text +"</td>" + 
						"<td>"+ selectedMother.mother_embryo + "</td>" +
						"<td>"+ endDate +"</td>" +
						"<td>"+ qty_start +"</td>" + 
						"<td>"+ qty_remaining +"</td>" + 
						"<td>"+ qty_used +"</td>" + 
						"<td>"+ deactivated +"</td>" + 
					"</tr>";

			
			$("#list-parent tbody").append(html);

			dataParent[no_urut] = {['id'] : accID, 
									['end_date'] :endDate,
									['qty_remaining']: (qty_remaining - qty_used),
									['qty_used']: qty_used,
									['deactivated'] : deactivated
								};

			$("form")[0].reset();
			$("#parent_plantation_field").trigger('change');
			$("#end_date").val(dateNow);
			no_urut++;

			qtyReceived += qty_used;

			selectedCloneID = selectedMother.clone_id;
			selectedMotherID = selectedMother.mother_id;

			if (dataAcc != ""){
				dataAcc = loadMotherByCloneID(selectedCloneID, selectedMotherID);
			}

			return false;
		});

		$("#list-parent tbody").on('click', '.btn-delete-parent', function(){
			let id = $(this).attr("id").split("_");
			id = id[id.length - 1];

			qtyReceived -= dataParent[id].qty_used;

			$(this).parent().parent().remove();
			delete dataParent[id];
			
			if (Object.size(dataParent) == 0) { 
				selectedCloneID = ''; 
				selectedMotherID = '';
				selectedMother = '';
				dateNow = <?= json_encode(date("Y-m-d")); ?>;
				$("#end_date").val(dateNow);
			}
		});

		$("#add-plantation-field").submit(function(){
			console.log(dataParent);
			if (Object.size(dataParent) > 0){
				let start_date = $("#start_date").val();

				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-plantation-field",
						start_date: start_date,
						qty_received: qtyReceived,
						panel:$("#panel").val(),
						planting_date:$("#planting_date").val(),
						dataParent: dataParent
					},
					success:function(resp){
						console.log(JSON.stringify(resp));
						data = JSON.parse(resp);

						if(parseInt(data['rowcount']) > 0){
							alert("Plantation Field has added!");
	                        location.href = hostname + "/plantation_field?last=" + data['id'];
	                    }
	                    else{
	                        alert("Plantation Field cant be added!");
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

		$(".parent_plantation_field").select2({
			minimumInputLength: 1,
			templateResult: function (data, page) {
	            if (data) {
	                var html = '<table class="table table-bordered" style="margin-bottom: 0px;">\
		                <tbody>\
		                <tr>\
			                <td width="120px">'+ data.unique_code +'</td>\
		                    <td width="120px">'+ data.mother_embryo +'</td>\
		                    <td width="70px">'+ data.qty_at_start +'</td>\
		                    <td width="70px">'+ data.start_date +'</td>\
		                    <td width="70px">'+ data.qty_at_end +'</td>\
		                </tr >\
		                </tbody>\
		                </table>';

	                return $(html);
	            }
	        },
			ajax: {
			    url: hostname + "/api/exvitro_nursery/search_nursery.php",
			    dataType: 'json',
			    data: function (params) {
					return {
						params: params.term
					}
		    	},
		    	processResults: function (data, page) {
		    		let listItem = data;

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
		$("#parent_plantation_field").on('select2:select', function(e){
			selectedMother = e.params.data;
			//console.log(selectedMother);

			$("#quantity_start").val(selectedMother.qty_at_start);
			$("#quantity_remaining").val(selectedMother.qty_remaining);
			$("#quantity_used").attr("max", selectedMother.qty_remaining);
			//$("#end_date").val(selectedMother.end_date);
			
			if (Object.size(dataParent) != 0) {
				$.each(dataParent, function(key, item){
					$("#end_date").val(item.end_date);
				});
			} else {
				$("#end_date").val(dateNow);
			}
		});

		//for template table select2
		var headerIsAppend = false;
		$('#parent_plantation_field').on('select2:open', function (e) {
			if (!headerIsAppend) {
	            html = '<table class="table table-bordered" style="margin-top: 5px;margin-bottom: 0px;">\
	                <tbody>\
	                <tr>\
	                	<td width="120px"><b>Unique Code</b></td>\
	                    <td width="120px"><b>Base SE</b></td>\
	                    <td width="70px"><b>Quantity At Start</b></td>\
	                    <td width="70px"><b>Start Date</b></td>\
	                    <td width="70px"><b>Quantity At End</b></td>\
	                </tr >\
	                </tbody>\
	                </table>';
	            $('.select2-search').append(html);
	            $('.select2-results').addClass('hardening');
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

	function loadMotherByCloneID(clone_id, mother_id){
		let data;
		$.ajax({
			async: false,
			url: hostname + "/api/exvitro_nursery/search_nursery.php?params=&clone_id=" + clone_id + "&mother_id=" + mother_id,
			type: "GET",
			success:function(resp){
				data = JSON.parse(resp);
			}
		});

		return data;
	}
</script>
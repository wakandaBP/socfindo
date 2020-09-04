<script type="text/javascript">
	$(function(){
		var dataHardening;
		var selectedCloneID, selectedMother, selectedMotherID; 
		var selectedCloneID_temp = '';
		var qtyReceived = 0;
		var no_urut = 1;
		var dataParent = {};
		$("#end_date").val(<?= json_encode(date("Y-m-d")); ?>);

		$("#parent-form").submit(function(){
			let hardeningID = $("#parent_hardening").val();
			let endDate = $("#end_date").val();
			let qty_start = parseInt($("#quantity_start").val());
			let qty_remaining = parseInt($("#quantity_remaining").val());
			let qty_used = parseInt($("#quantity_used").val());
			let deactivated = ($("#deactivated").is(":checked")) ? "TRUE" : "FALSE";

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

			dataParent[no_urut] = {['id'] : hardeningID, 
									['end_date'] :endDate,
									['qty_remaining']: (qty_remaining - qty_used),
									['deactivated'] : deactivated
								};

			$("form")[0].reset();
			$("#parent_hardening").trigger('change');
			$("#end_date").val(<?= json_encode(date("Y-m-d")); ?>);
			no_urut++;

			qtyReceived += qty_used;

			selectedCloneID = selectedMother.clone_id;
			selectedMotherID = selectedMother.mother_id;

			if (dataHardening != ""){
				dataHardening = loadMotherByCloneID(selectedCloneID, selectedMotherID);
				console.log(dataHardening);
			}

			console.log(dataParent);
			
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

		$("#add-nursery").submit(function(){
	
			if (Object.size(dataParent) > 0){
				let start_date = $("#start_date").val();

				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-nursery",
						start_date: start_date,
						qty_received: qtyReceived,
						dataParent: dataParent
					},
					success:function(resp){
						console.log(resp);
						data = JSON.parse(resp);

						if(parseInt(data['rowcount']) > 0){
							alert("Nursery has added!");
	                        location.href = hostname + "/nursery?last=" + data['id'];
	                    }
	                    else{
	                        alert("Nursery cant be added!");
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

		$(".parent_hardening").select2({
			minimumInputLength: 1,
			templateResult: function (data, page) {
				qty_at_end = (data.qty_at_end == null) ? "-" : data.qty_at_end;

	            if (data) {
	                var html = '<table class="table table-bordered" style="margin-bottom: 0px;">\
		                <tbody>\
		                <tr>\
			                <td width="120px">'+ data.unique_code +'</td>\
		                    <td width="120px">'+ data.mother_embryo +'</td>\
		                    <td width="60px">'+ data.qty_at_start + '</td>\
		                    <td width="70px">'+ data.start_date +'</b></td>\
		                    <td width="70px">'+ qty_at_end +'</td>\
		                </tr >\
		                </tbody>\
		                </table>';

	                return $(html);
	            }
	        },
			ajax: {
			    url: hostname + "/api/exvitro_hardening/search_hardening.php",
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
		$("#parent_hardening").on('select2:select', function(e){
			selectedMother = e.params.data;
			//console.log(selectedMother);

			$("#quantity_start").val(selectedMother.qty_at_start);
			$("#quantity_remaining").val(selectedMother.qty_remaining);
			$("#quantity_used").attr("max", selectedMother.qty_remaining);
			$("#end_date").val(selectedMother.end_date);
		});

		//for template table select2
		var headerIsAppend = false;
		$('#parent_hardening').on('select2:open', function (e) {
			if (!headerIsAppend) {
	            html = '<table class="table table-bordered" style="margin-top: 5px;margin-bottom: 0px;">\
	                <tbody>\
	                <tr>\
	                	<td width="120px"><b>Unique Code</b></td>\
	                    <td width="120px"><b>Base SE</b></td>\
	                    <td width="60px"><b>Quantity at Start</b></td>\
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
			url: hostname + "/api/exvitro_hardening/search_hardening.php?params=&clone_id=" + clone_id + "&mother_id=" + mother_id,
			type: "GET",
			success:function(resp){
				data = JSON.parse(resp);
			}
		});

		return data;
	}
</script>
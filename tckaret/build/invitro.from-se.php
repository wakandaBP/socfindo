<script type="text/javascript">
	var firstEmptySelect = true;

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

		//select 2 like table
		$(".motherplant").select2({
			minimumInputLength: 1,
			templateResult: function (data, page) {
	            if (data) {
	                var html = '<table class="table table-bordered" style="margin-bottom: 0px;">\
		                <tbody>\
		                <tr>\
		                    <td width="20%">' + data.text + '</td>\
		                    <td width="10%">' + data.year + '</td>\
		                    <td width="20%">' + data.clone + '</td>\
		                    <td width="10%">' + data.deactivated + '</td>\
		                </tr >\
		                </tbody>\
		                </table>';

	                return $(html);
	            }
	        },
			ajax: {
			    url: hostname + "/api/invitro/search_motherplant.php",
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
		});

		//for template table select2
		var headerIsAppend = false;
		$('#motherplant').on('select2:open', function (e) {
			if (!headerIsAppend) {
	            html = '<table class="table table-bordered" style="margin-top: 5px;margin-bottom: 0px;">\
	                <tbody>\
	                <tr>\
	                    <td width="20%"><b>Code SE</b></td>\
	                    <td width="10%"><b>Year</b></td>\
	                    <td width="20%"><b>Clone</b></td>\
	                    <td width="10%"><b>Deactivated</b></td>\
	                </tr >\
	                </tbody>\
	                </table>';
	            $('.select2-search').append(html);
	            $('.select2-results').addClass('mplant');
	            headerIsAppend = true;
	        }
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
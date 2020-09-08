<script type="text/javascript">
	var dataforaddpetri = [];
	var datacheckbox = [];
	var selectedRow = "";
	var selectedMedium;
	var selectedTreat = "";
	var selectedRemain = "";

	$(function(){
		/*$("#medium").on('change',function(){
			$("#idmedium").val($(this).val());

			stats = checkAvailableMedia($("#amountmedia").val(),$("#idmedium").val(),"error-media");
			disabledButton(stats);
		});

		$("#amountmedia").on('keyup',function(){
			stats = checkAvailableMedia($("#amountmedia").val(),$("#idmedium").val(),"error-media");
			disabledButton(stats);
		});*/

		$("#worker").on('change',function(){
			$("#idworker").val($(this).val());
		});

		var germprepareList = $("#list-germ-prepare").DataTable({

			"ajax":{
				"async": false,
				"url": hostname + "/api/loader.germ-prepare.php",
				"data":{
					//
				},
				"type":"POST"
			},
			dom: 'lBfrtip',
			buttons: [
				'excel', 'csv', 'pdf', 'copy'
			],
			//aaSorting: [[5, "desc"]],
			"columnDefs":[
				{"targets":0, "className":"dt-body-left"}
			],
			"columns" : [
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div style='text-align:center;'><input class='usecheckbox' type='checkbox' value='" + row['id'] + "'></div>";
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["idembryo"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["idtreatment"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["germdate"];
					}
				},
				{
				 	"data" : null, render: function(data, type, row, meta) {
				 		return row["shoot"];
				 	}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["germinated"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["media"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["lastdate"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["cekpoin"];
					}
				},
				/*{
					"data" : null, render: function(data, type, row, meta) {
						return "<span style='color:red;'><b>" + row["status"] + "</b></span>";
					}
				},*/
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div style='text-align:center;'>" + 

							" <a href=\"" + hostname + "/germination-prepare.screen.log/" + row["idembryo"] + "\" class=\"btn btn-default btn-circle waves-effect waves-circle waves-float " + row['disabled'] + "\"><i class=\"material-icons\" title='Germination Screening'>check</i></a> " +

							" | <a href=\"" + hostname + "/motherplant/" + row["idembryo"] + "\" class=\"btn btn-success btn-circle waves-effect waves-circle waves-float " + row['disabled'] + "\"><i class=\"material-icons\" title='Transfer to Germination'>trending_flat</i></a>"+ 

							" | <button data-id=\""+ row["idembryo"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float btnEdit\" title='Edit Data'><i class=\"material-icons\">edit</i></button> " +

							" | <button " + row['disabled'] + " class=\"btn btn-danger btn-circle waves-effect waves-circle waves-float btn-delete\" data-idem='" + row['idembryo'] + "' id='delete-" + row['id'] + "'><i class=\"material-icons\" title='Remove Embryo'>delete_outline</i></button>" +

							"</div>";
					}
				}
			],
			/*rowId: function(a) {
			    return a.idembryo;
			},*/
		});

		$("body").on("click", ".btn-delete", function(){
			var id = $(this).attr("id").split("-");
			id = id[id.length - 1];
			idEm = $(this).data("idem");

			var conf = confirm("Trash ID Embryo : " + idEm + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-germ-prepare",
						id:id
					},
					success:function(resp){
						RefreshData("#list-germ-prepare", hostname + "/api/loader.germ-prepare.php");
					}
				});
			}
			return false;
		});


		/*$("tbody").on("click",".btnView",function(){
			id = $(this).data("id");

			$.ajax({
				url: hostname + "/api/initiation/view.initiation.detail.php",
				type: "POST",
				data: {
					id:id
				},
				success: function(resp){
					//console.log(resp);
					data = JSON.parse(resp);

					//console.log(data[0].id);
					$("#title").html(data[0].id);
					$("#idtreatment").html(data[0].id);
					$("#idreception").html(data[0].idreception);
					$("#nobox").html(data[0].nobox);
					$("#clone").html(data[0].clonename);
					$("#sample").html(data[0].sample);
					$("#initdate").html(data[0].initiationdate);
					$("#widthseed").html(data[0].widthseed);
					$("#totalseeds").html(data[0].totalseeds);
					$("#seedcomment").html(data[0].seedcoments);
					$("#ze").html(data[0].ze);
					$("#se").html(data[0].se);
					$("#petridish").empty().html(data[0].petridish);
					$("#initworker").html(data[0].initworker);
					$("#laminar").html(data[0].laminar);
					$("#treatcomment").html(data[0].treatcomment);
					$("#media").empty().html(data[0].initiationmedium);
					$("#preparedate").empty().html(data[0].mediumpreparedate);
					$("#mediaworker").empty().html(data[0].workermedia);

					$("#view-description").modal("show");
				}				
			})
		});*/



		$("#list-germ-prepare tbody").on("click",".btnEdit",function(){
			id = $(this).data("id");
			$("form")[0].reset();

			$.ajax({
				url: hostname + "/api/germ-prepare/load.germ-prepare.data.php",
				type: "POST",
				data: {
					id:id
				},
				success: function(resp){
					data = JSON.parse(resp);
					
					$("#title-edit").html(data[0].idembryo);
					$("#iddata").val(data[0].id);
					$("#germdate").val(data[0].germdate);
					$("#worker").val(data[0].worker).trigger('change');
					$("#idworker").val(data[0].worker);
					$("#shoot").val(data[0].shoot);
					$("#germinated").val(data[0].germinated);
					$("#comment").val(data[0].comment);
					
					$("#form-edit-germ-prepare").modal("show");
				}				
			})
		});

		$("#btnUpdateData").click(function(){
			var germdate = $("#germdate").val();
			var worker = $("#idworker").val();
			var shoot = $("#shoot").val();
			var germinated = $("#germinated").val();
			var comment = $("#comment").val();
			var id = $("#iddata").val();

			/*alert(transdate + " " + nobox + " " + culroom + " " + mat2worker + " " + laminar + " " + embryo + " " + amount  + " " + idmedia);*/
			if (germdate != "" && worker != "" && shoot != "" && germinated != ""){

				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"update-germ-prepare",
						germdate:germdate,
						worker:worker,
						shoot:shoot,
						germinated,
						comment:comment,

						id:id
					},
					success:function(resp){
						//alert(resp);
						if(parseInt(resp) > 0){
							alert("Data has beed updated!");
							$("#form-edit-germ-prepare").modal("hide");
                        	RefreshData("#list-germ-prepare", hostname + "/api/loader.germ-prepare.php");
                        }
                        else{
                            alert("Data cannot be updated!");
                        }
					}
				})
			} else {
				alert("Please fill out every field with *");
			}

			return false;
		});


		$("#updatepetri").click(function(){
			datacheckbox = [];

		    // Iterate over all selected checkboxes
		    $.each($("input[class='usecheckbox']:checked"), function(){
		       	datacheckbox.push($(this).val());
		    });


		    if (datacheckbox != null && datacheckbox != ""){
		    	$("#form-updatepetri").modal("show");
		    	dataforaddpetri = datacheckbox;
		    	//console.log(dataforaddpetri);
		    } else {
		    	alert("Check minimal 1 from list of the table!");
		    }
		
			//console.log(datacheckbox);
			
		});

		/*$("#updatemedia").click(function(){
		    if (selectedTreat != ""){
		    	//console.log(dataforaddpetri);
		    	if (selectedRemain == 0){
		    		alert("This treatment has no remaining sample!");
		    	} else {
		    		$("#form-updatemedia").modal("show");
		    	}
		    } else {
		    	alert("Select 1 from list of the table!");
		    }
		});	*/

		$("#btnUnselect").click(function(){
			//selectedRow = "";
			selectedTreat = "";
			initiationList.rows().deselect();
		});

		$("#btnUpdateMedia").click(function(){

			idmedia = $("#idmedium").val();
			amountmedia = $("#amountmedia").val();

			$.ajax({
				url : hostname + "/action.php",
				type: "POST",
				data : {
					action:"update-media-initiation",
					idtreatment:selectedTreat,
					idmedia:idmedia,
					amountmedia:amountmedia
				},
				success : function(resp){
					//alert(resp);
					if (JSON.parse(resp) > 0){
						RefreshData("#list-germ-prepare", hostname + "/api/loader.germ-prepare.php");
						$("#form-updatepetri").modal("hide");
					}
				}				
			})
		});

		$("#btnCari").click(function(){
			var awal = $("#datefrom").val();
			var akhir = $("#dateto").val();

			RefreshData("#list-germ-prepare", hostname + "/api/loader.germ-prepare.php", {awal:awal,akhir:akhir});

			return false;
		})
	});
	

	function disabledButton(resp){
		if (resp == ""){
			$("#btnUpdateMedia").attr("disabled",false);
		} else {
			$("#btnUpdateMedia").attr("disabled",true);
		}
	}

</script>
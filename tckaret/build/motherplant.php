<script type="text/javascript">
	$(function(){
		//menuActive(); 
		var no = 1;
		var targetMotherPlantID;
		var MODE = "NEW";
		//alert(hostname + "/api/loader.motherplant.php");
		var DataPopulate = {};
 

		$.ajax({
			url: hostname + "/api/loader.motherplant.php",
			async: false,
			success: function(data){
				//console.log(data);
				var parsed = JSON.parse(data);
				for(var a = 0; a < parsed.data.length; a++){
					DataPopulate["identifier-" + parsed.data[a]["id"] + "-" + parsed.data[a]["treecode_id"] + "-" + parsed.data[a]["treepart_id"]] = parsed.data[a];
				}
				//DataPopulate = parsed.data;
			}
		});
		function reCheckTableAuto(TargetTable){
			if($(TargetTable).find("tbody tr").length == 0){
				createNewRow("#" + $(TargetTable).attr("id"));
			}
			$(TargetTable + " tbody tr").each(function(){
				var ParentRow = $(this);
				$(this).find("td").each(function(f){
					if(f == 0){
						var deleteButton = document.createElement("BUTTON");
						$(deleteButton).addClass("btn btn-danger autoTableDeleteRow").html("Delete");
						$(this).append(deleteButton);

						var saveButton = document.createElement("BUTTON");
						$(saveButton).addClass("btn btn-success");
					}

					if(f == 1){
						if(TargetTable == "#list-detail-motherplant"){
							var commentCreate = document.createElement("INPUT");
							$(commentCreate).addClass("form-control");
							$(this).append(commentCreate);
						}
					}

					if(f == 2){
						if(TargetTable == "#list-detail-motherplant"){
							var commentDateCreate = document.createElement("INPUT");
							$(commentDateCreate).addClass("form-control setDatePicker");
							$(this).append(commentDateCreate);
						}
					}
				});
			});
		}

		reCheckTableAuto("#list-detail-motherplant");
		
			
		$("body").on("click", ".autoTableDeleteRow", function(){
			var currentCell = $(this).parent();
			var currentRow = currentCell.parent();
			var currentBody = currentRow.parent();
			var currentTable = currentBody.parent();
			currentRow.remove();
			reCheckTableAuto("#" + currentTable.attr("id"));
		});
		var motherplantCommentList, motherplantFileList;
		var motherplantList = $("#list-motherplant").DataTable({

			"ajax":{
				"url": hostname + "/api/loader.motherplant.php",
				"data":{
					//
				},
				"type":"POST"
			},
			dom: 'lBfrtip',
			buttons: [
				'excel', 'csv', 'pdf', 'copy'
			],
			aaSorting: [[0, "asc"]],
			"columnDefs":[
				{"targets":0, "className":"dt-body-left"}
			],
			"columns" : [
				/*{
					render: function() {
						return no++;
					}
				},*/
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<span class=\"identifier\" id=\"identifier-" + row["id"] + "-" + row["treecode_id"] + "-" + row["treepart_id"] + "\"></span>" + row["codese"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["se"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						var checked = (row["certified"] == "Yes")?"<i class=\"glyphicon glyphicon-ok\"></i>":"<i class=\"glyphicon glyphicon-remove\"></i>";
						return checked;
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						var checked = (row["deactive"] == "FALSE")?"<i class=\"glyphicon glyphicon-remove\"></i>":"<i class=\"glyphicon glyphicon-ok\"></i>";
						return checked;
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["initiationyear"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<span class=\"treeID\" treeID=\"" + row["treecode_id"] + "\">" + row["tree"] + ", " + row["plantation_name"] + ", " + row["yearofplanting"] + "</span>";
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["treepart_name"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["receptionug"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["usageofseeds"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["harvestdate"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["startmedium"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["germinationdate"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["germinationmedium"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						var checked = (row["leafsample"] == "")?"<i class=\"glyphicon glyphicon-remove\"></i>":"<i class=\"glyphicon glyphicon-ok\"></i>";
						return checked;
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["leafsamplelocation"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						var checked = (row["leafsamplecirad"] == "")?"<i class=\"glyphicon glyphicon-remove\"></i>":"<i class=\"glyphicon glyphicon-ok\"></i>";
						return checked;
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["germinationse"];
					}
				}
			]
		});

		$("#prosesData").submit(function(){
			var conf = confirm("Pastikan data telah benar. Proses data?");
			if(conf){
				var codese = $("#nomor").val();
				var se = $("#se").val();
				var certified = ($("#certified").is(":checked"))?"Yes":"No";
				var deactivated = ($("#deactive").is(":checked"))?"Yes":"No";
				var initiationyear = $("#initiationyear").val();
				var tree = $("#tree").attr("selectedidunique");
				var treepart = $("#treepart").attr("selectedidunique");
				var harvestdate = $("#harvestdate").val();
				var receptionug = $("#receptionug").val();
				var usageofseeds = $("#usageofseeds").val();
				var startmedium = $("#startmedium").val();
				var germinationdate = $("#germinationdate").val();
				var germinationmedium = $("#germinationmedium").val();
				var leafsample = ($("#leafsample").is(":checked"))?"Yes":"No";
				var leafsamplelocation = $("#leafsamplelocation").val();
				var leafsamplecirad = ($("#leafsamplecirad").is(":checked"))?"Yes":"No";
				var germinationse = $("#germinationse").val();

				if (
					/*codese != "" &&*/
					se != "" &&
					/*certified != "" &&
					deactivated != "" &&*/
					initiationyear != "" &&
					tree != "" &&
					treepart != "" && 
					harvestdate != "" &&
					receptionug != "" &&
					usageofseeds != "" &&
					startmedium != "" &&
					germinationdate != "" &&
					germinationmedium != "" &&
					/*leafsample != "" &&*/
					leafsamplelocation != "" &&
					/*leafsamplecirad != "" &&*/
					germinationse != ""
				){
					$.ajax({
						url: hostname + "/action.php",
						type: "POST",
						data: {
							action:(MODE == "NEW")?"add-motherplant":"update-motherplant",
							id:targetMotherPlantID,
							codese:codese,
							se:se,
							certified:certified,
							deactivated:deactivated,
							initiationyear:initiationyear,
							tree:tree,
							treepart:treepart,
							harvestdate:harvestdate,
							receptionug:receptionug,
							usageofseeds:usageofseeds,
							startmedium:startmedium,
							germinationdate:germinationdate,
							germinationmedium:germinationmedium,
							leafsample:leafsample,
							leafsamplelocation:leafsamplelocation,
							leafsamplecirad:leafsamplecirad,
							germinationse:germinationse
						},
						success:function(resp){
							$("#btnReset").click();
							motherplantList.ajax.reload();
							/*if(parseInt(resp) > 0){
	                            
	                            alert(resp);
	                            location.href = hostname + "/motherplant";
	                        }
	                        else{
	                            alert(resp);
	                        }*/
						}
					});
				}
				else {
					alert("Please fill out every field with *");
				}
			}
			return false;
		});

		$("#btnReset").click(function(){
			MODE = "NEW";
			$("#btnSimpan").removeAttr("disabled");

			$("#nomor").val("");
			$("#se").val("");
			$("#initiationyear").val("");
			$("#harvestdate").val("");
			$("#receptionug").val("");
			$("#usageofseeds").val("");
			$("#startmedium").val("");
			$("#germinationdate").val("");
			$("#germinationmedium").val("");
			$("#leafsamplelocation").val("");
			$("#germinationse").val("");
		});


		

		$("#addComment").submit(function(){
			var comment = $("#txt_comment").val();
			var comment_date = $("#txt_comment_date").val();
			if(MODE == "EDIT"){
				if(comment!="" && comment_date!=""){
					var conf = confirm("Tambah komentar?");
					if(conf){
						$.ajax({
							url: hostname + "/action.php",
							type: "POST",
							data: {
								action:"tambah_komentar",
								id:targetMotherPlantID,
								comment:comment,
								comment_date: comment_date
							},
							success: function(resp){
								if(parseInt(resp) > 0){
									motherplantCommentList.ajax.reload();
								}
								$("#txt_comment").val("");
								$("#txt_comment_date").val("");
							}
						});
					}
				}
			}
			else{
				alert("Pilih motherplan untuk komentar");
			}
			return false;
		});

		var file, fileName, fileSize;
		$("body").on("change", "#txt_comment_file", function(){
			file = this.files[0],
			fileName = file.name,
			fileSize = file.size;
		});

		$("#addFile").submit(function(){
			var comment = $("#txt_comment_file").val();
			var comment_date = $("#txt_comment_date_file").val();
			//var comment_file = $("#txt_comment_file")[0].files[0];
			var form_data = new FormData();
			form_data.append('action', 'tambah_file');
			form_data.append('file', file);
			form_data.append('id', targetMotherPlantID);
			form_data.append('comment', comment);
			form_data.append('comment_date', comment_date);
			if(MODE == "EDIT"){
				if(comment!="" && comment_date!="" ){
					var conf = confirm("Tambah file?");
					if(conf){
						$.ajax({
							url: hostname + "/action.php",
							type: "POST",
							dataType: 'text',
							cache: false,
							contentType: false,
							processData: false,
							data: form_data,
							success: function(resp){
								motherplantFileList.ajax.reload();
								$("#txt_comment").val("");
								$("#txt_comment_date_file").val("");
								$("#txt_comment_file").val("");
								file = null;
								fileName = null;
								fileSize = null;
							}
						});
					}
				}
			}
			else{
				alert("Pilih motherplan untuk komentar");
			}
			return false;
		});



		$("body").on("click", ".edit-comment", function(){
			var Parent = $(this);
			var id = Parent.attr("id").split("-");
			id = id[id.length - 1];
			var old = Parent.html();

			var editor = document.createElement("INPUT");
			$(editor).addClass("form-control comment-editor").blur(function(){
				var save = $(this).val();
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action: "edit_komen",
						comment:save,
						id:id
					},
					success: function(resp){
						if(parseInt(resp) > 0){
							Parent.html(save);
						}
						else{
							alert(resp);
						}
					}
				});
				
				return false;
			});

			Parent.html("").append(editor);
			$(editor).val(old).focus();

			return false;
		});




		$("body").on("click", ".edit-comment-file", function(){
			var Parent = $(this);
			var id = Parent.attr("id").split("-");
			id = id[id.length - 1];
			var old = Parent.html();

			var editor = document.createElement("INPUT");
			$(editor).addClass("form-control comment-editor").blur(function(){
				var save = $(this).val();
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action: "edit_komen_file",
						comment:save,
						id:id
					},
					success: function(resp){
						if(parseInt(resp) > 0){
							Parent.html(save);
						}
						else{
							alert(resp);
						}
					}
				});
				
				return false;
			});

			Parent.html("").append(editor);
			$(editor).val(old).focus();

			return false;
		});





			

		$("body").on("click", ".columnEditor tbody tr", function(){

			MODE = "EDIT";

			//console.log(DataPopulate);
			$("#btnSimpan").attr("disabled", "disabled");
			$(this).parent().find("tr").each(function(){
				$(this).find("td").removeClass("selected-row");
			});
			$(this).find("td").addClass("selected-row");
			
			var id = $(this).find("span.identifier").attr("id");
			var getTreeID = id.split("-");
			targetMotherPlantID = getTreeID[1];



			var targetAjaxComment = {
				"url": hostname + "/api/loader.motherplant.comment.php",
				"data":{
					id:function(){
						return targetMotherPlantID
					}
				},
				"type":"POST"
			};

			var targetAjaxFile = {
				"url": hostname + "/api/loader.motherplant.file.php",
				"data":{
					id:function(){
						return targetMotherPlantID
					}
				},
				"type":"POST"
			};

			if(motherplantCommentList == undefined){
				motherplantCommentList = $("#list-comment-motherplant").DataTable({
					ajax:targetAjaxComment,
					dom: 'lBfrtip',
					buttons: [
						'excel', 'csv', 'pdf', 'copy'
					],
					aaSorting: [[0, "asc"]],
					"columnDefs":[
						{"targets":0, "className":"dt-body-left"}
					],
					"columns" : [
						{
							"data" : null, render: function(data, type, row, meta) {
								return data["comment_id"];
							}
						},
						{
							"data" : null, render: function(data, type, row, meta) {
								return "<span style=\"display: block\" class=\"edit-comment\" id=\"comment-" + row["comment_id"] + "\">" + data["comment_content"] + "</span>";
							}
						},
						{
							"data" : null, render: function(data, type, row, meta) {
								return data["comment_date"];
							}
						}
					]
				});
			}




			if(motherplantFileList == undefined){
				motherplantFileList = $("#list-file-motherplant").DataTable({
					ajax:targetAjaxFile,
					dom: 'lBfrtip',
					buttons: [
						'excel', 'csv', 'pdf', 'copy'
					],
					aaSorting: [[0, "asc"]],
					"columnDefs":[
						{"targets":0, "className":"dt-body-left"}
					],
					"columns" : [
						{
							"data" : null, render: function(data, type, row, meta) {
								return data["comment_id"];
							}
						},
						{
							"data" : null, render: function(data, type, row, meta) {
								return "<span style=\"display: block\" class=\"edit-comment-file\" id=\"comment-" + row["comment_id"] + "\">" + data["comment_content"] + "</span>";
							}
						},
						{
							"data" : null, render: function(data, type, row, meta) {
								var checkFormat = row["comment_file"].split(".");
								if(
									checkFormat[checkFormat.length - 1] == "png" ||
									checkFormat[checkFormat.length - 1] == "jpg" ||
									checkFormat[checkFormat.length - 1] == "jpeg"
								){
									return "<a href=\"" + hostname + "/" + row["comment_target"] + "\"><img class=\"img-responsive\" src=\"" + row["comment_target"] + "\" /><br />" + row["comment_file"] + "</a>";
								}
								else{
									return "<a href=\"" + hostname + "/" + row["comment_target"] + "\"><i class=\"material-icons\">attach_file</i> " + row["comment_file"] + "</a>";
								}
							}
						},
						{
							"data" : null, render: function(data, type, row, meta) {
								return data["comment_date"];
							}
						}
					]
				});
			}



			motherplantCommentList.ajax.reload();
			motherplantFileList.ajax.reload();
			

			




			//console.log("id"+id)
			$("#nomor").val(DataPopulate[id]["codese"]);

			$("#se").val(DataPopulate[id]["se"]);
			if(DataPopulate[id]["certified"] == "Yes"){
				$("#certified").attr("checked", "checked");
			}
			if(DataPopulate[id]["deactive"] != "FALSE"){
				$("#deactive").attr("checked", "checked");
			}

			//var formatHarvestDate = new Date(DataPopulate[id]["harvestdate_format"].replace( /(\d{2})-(\d{2})-(\d{4})/, "$2/$1/$3"));
			var formatHarvestDateReFormat = DataPopulate[id]["harvestdate_format"].split("-").reverse().join("-");
			var usageOfSeedsDateReFormat = DataPopulate[id]["usageofseeds_format"].split("-").reverse().join("-");
			var receptionUGDateReFormat = DataPopulate[id]["receptionug_format"].split("-").reverse().join("-");
			var germinationDateReFormat = DataPopulate[id]["germinationdate_format"].split("-").reverse().join("-");
			//var formatHarvestDate = formatHarvestDateReFormat[2] + "-" + formatHarvestDateReFormat[1] + "-" + formatHarvestDateReFormat[2];
			/*var today = new Date();
			var tomorrow = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
			var dd = today.getDate();
			var mm = today.getMonth()+1; //January is 0!
			var yyyy = today.getFullYear();
			var tomday = tomorrow.getDate();
			var tommonth = tomorrow.getMonth() + 1;
			var tomyear = tomorrow.getFullYear();
			if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = mm+'/'+dd+'/'+yyyy;
			if(tomday<10){tomday='0'+tomday} if(tommonth<10){tommonth='0'+tommonth} tomorrow = tommonth+'/'+tomday+'/'+tomyear;*/

			$("#harvestdate").val(formatHarvestDateReFormat);
			$("#usageofseeds").val(usageOfSeedsDateReFormat);
			$("#receptionug").val(receptionUGDateReFormat);
			$("#germinationdate").val(germinationDateReFormat);
			//$("#harvestdate").datepicker("setDate", [id]["harvestdate_format"]);
			//$("#usageofseeds").datepicker("setDate", DataPopulate[id]["usageofseeds_format"]);
			//$("#receptionug").datepicker("setDate", DataPopulate[id]["receptionug_format"]);
			//$("#germinationdate").datepicker("setDate", DataPopulate[id]["germinationdate_format"]);

			$("#tree").val(DataPopulate[id]["tree"] + ", " + DataPopulate[id]["plantation_name"] + ", " + DataPopulate[id]["yearofplanting"])
			.attr("selectedidunique", getTreeID[2]);
			//console.log("Data "+DataPopulate[id]["tree"] + ", " + DataPopulate[id]["plantation_name"] + ", " + DataPopulate[id]["yearofplanting"]);
			$("#treepart").val(DataPopulate[id]["treepart_name"])
			.attr("selectedidunique", getTreeID[3]);

			$("#initiationyear").val(DataPopulate[id]["initiationyear"]);
			$("#startmedium").val(DataPopulate[id]["initiationmedium"]);
			$("#germinationmedium").val(DataPopulate[id]["germinationmedium"]);
			//alert(DataPopulate[id]["leafsample"]);
			if(DataPopulate[id]["leafsample"] == ""){
				$("#leafsample").removeAttr("checked");
			}
			else{
				$("#leafsample").attr("checked", "checked");
			}
			$("#leafsamplelocation").val(DataPopulate[id]["leafsamplelocation"]);
			if(DataPopulate[id]["leafsamplecirad"] == ""){
				$("#leafsample").removeAttr("checked");	
			}
			else{
				$("#leafsample").attr("checked", "checked");	
			}
			$("#germinationse").val(DataPopulate[id]["germinationse"]);
		});

		$("#nomor").val("");
		$("#se").val("");
		$("#certified").val("");
		$("#deactivated").val("");
		$("#initiationyear").val("");
		$("#tree").val("");
		$("#treepart").val("");
		$("#harvestdate").val("");
		$("#receptionug").val("");
		$("#usageofseeds").val("");
		$("#startmedium").val();
		$("#germinationdate").val("");
		$("#germinationmedium").val("");
		$("#leafsample").val("");
		$("#leafsamplelocation").val("");
		$("#leafsamplecirad").val("");
		$("#germinationse").val("");




		/*$("#btnSimpan").click(function(){
			var codese = $("#nomor").val();
			var se = $("#se").val();
			var certified = $("#certified").val();
			var deactivated = $("#deactivated").val();
			var initiationyear = $("#initiationyear").val();
			var tree = $("#tree").val();
			var treepart = $("#treepart").val();
			var harvestdate = $("#harvestdate").val();
			var receptionug = $("#receptionug").val();
			var usageofseeds = $("#usageofseeds").val();
			var startmedium = $("#startmedium").val();
			var germinationdate = $("#germinationdate").val();
			var germinationmedium = $("#germinationmedium").val();
			var leafsample = $("#leafsample").val();
			var leafsamplelocation = $("#leafsamplelocation").val();
			var leafsamplecirad = $("#leafsamplecirad").val();
			var germinationse = $("#germinationse").val();

			if (
				codese != "" &&
				se != "" &&
				certified != "" &&
				deactivated != "" &&
				initiationyear != "" &&
				tree != "" &&
				treepart != "" && 
				harvestdate != "" &&
				receptionug != "" &&
				usageofseeds != "" &&
				startmedium != "" &&
				germinationdate != "" &&
				germinationmedium != "" &&
				leafsample != "" &&
				leafsamplelocation != "" &&
				leafsamplecirad != "" &&
				germinationse != ""
			){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-motherplant",
						se:se,
						certified:certified,
						deactivated:deactivated,
						initiationyear:initiationyear,
						tree:tree,
						treepart:treepart,
						harvestdate:harvestdate,
						receptionug:receptionug,
						usageofseeds:usageofseeds,
						startmedium:startmedium,
						germinationdate:germinationdate,
						germinationmedium:germinationmedium,
						leafsample:leafsample,
						leafsamplelocation:leafsamplelocation,
						leafsamplecirad:leafsamplecirad,
						germinationse:germinationse
					},
					success:function(resp){
						alert(resp);
						if(parseInt(resp) > 0){
                            
                            alert(resp);
                            location.href = hostname + "/motherplant";
                        }
                        else{
                            alert(resp);
                        }
					}
				});
			}
			else {
				alert("Please fill out every field with *");
			}

		});*/

		/*$("#btnSimpan").click(function(){
			var codese = $("#nomor").val();
			var se = $("#se").val();
			var certified = $("#certified").val();
			var deactivated = $("#deactivated").val();
			var initiationyear = $("#initiationyear").val();
			var tree = $("#tree").val();
			var treepart = $("#treepart").val();
			var harvestdate = $("#harvestdate").val();
			var receptionug = $("#receptionug").val();
			var usageofseeds = $("#usageofseeds").val();
			var startmedium = $("#startmedium").val();
			var germinationdate = $("#germinationdate").val();
			var germinationmedium = $("#germinationmedium").val();
			var leafsample = $("#leafsample").val();
			var leafsamplelocation = $("#leafsamplelocation").val();
			var leafsamplecirad = $("#leafsamplecirad").val();
			var germinationse = $("#germinationse").val();

			if (codese != "" && se != "" && certified != "" && deactivated != "" && initiationyear != "" && tree != "" && treepart != "" && 
			harvestdate != "" && receptionug != "" && usageofseeds != "" && startmedium != "" && germinationdate != "" && germinationmedium != "" && leafsample != "" && leafsamplelocation != "" && leafsamplecirad != "" && germinationse != ""){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"update-motherplant",
						se:se,
						certified:certified,
						deactivated:deactivated,
						initiationyear:initiationyear,
						tree:tree,
						treepart:treepart,
						harvestdate:harvestdate,
						receptionug:receptionug,
						usageofseeds:usageofseeds,
						startmedium:startmedium,
						germinationdate:germinationdate,
						germinationmedium:germinationmedium,
						leafsample:leafsample,
						leafsamplelocation:leafsamplelocation,
						leafsamplecirad:leafsamplecirad,
						germinationse:germinationse
					},
					success:function(resp){
						if(parseInt(resp) > 0){
                            
                            alert(resp);
                            location.href = hostname + "/motherplant";
                        }
                        else{
                            //alert(resp);
                        }
					}
				});
			}
			else {
				alert("Please fill out every field with *");
			}

		});*/



	
		/*$("body").on("click", ".btn-delete", function(){
			var id = $(this).attr("id").split("-");
			var nama = $(this).data("name");
			id = id[id.length - 1];

			var conf = confirm("Delete Tree with ID : " + nama + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-tree",
						id:id
					},
					success:function(resp){
						RefreshData("#list-tree", hostname + "/api/loader.tree.php");
					}
				});
			}
			return false;
		});*/
	});


</script>
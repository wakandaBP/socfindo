<script type="text/javascript">
	$(function(){
		$("#btnShow").on('click',function(){
			show = $("#showBy").val();

			switch (show){
				case '1':
					$("#table-initiation").removeAttr("hidden");
					$("#table-embryoscreen").attr("hidden",true);
					$("#table-mat1").attr("hidden",true);
					$("#table-mat2").attr("hidden",true);
					$("#table-germ").attr("hidden",true);
					break;

				case '2':
					$("#table-embryoscreen").removeAttr("hidden");
					$("#table-initiation").attr("hidden",true);
					$("#table-mat1").attr("hidden",true);
					$("#table-mat2").attr("hidden",true);
					$("#table-germ").attr("hidden",true);
					break;

				case '3':
					$("#table-mat1").removeAttr("hidden");
					$("#table-initiation").attr("hidden",true);
					$("#table-embryoscreen").attr("hidden",true);
					$("#table-mat2").attr("hidden",true);
					$("#table-germ").attr("hidden",true);
					break;

				case '4':
					$("#table-mat2").removeAttr("hidden");
					$("#table-initiation").attr("hidden",true);
					$("#table-embryoscreen").attr("hidden",true);
					$("#table-mat1").attr("hidden",true);
					$("#table-germ").attr("hidden",true);
					break;

				case '5':
					$("#table-germ").removeAttr("hidden");
					$("#table-initiation").attr("hidden",true);
					$("#table-embryoscreen").attr("hidden",true);
					$("#table-mat1").attr("hidden",true);
					$("#table-mat2").attr("hidden",true);
					break;
				
				case '6':
					$("#table-initiation").removeAttr("hidden");
					$("#table-embryoscreen").removeAttr("hidden");
					$("#table-mat1").removeAttr("hidden");
					$("#table-mat2").removeAttr("hidden");
					$("#table-germ").removeAttr("hidden");
					break;
			}
		});


		var initiationList = $("#list-contamination-initiation").DataTable({

			"ajax":{
				"url": hostname + "/api/contamination_record/contamination.initiation.loader.php",
				"data":{
					//
				},
				"type":"POST"
			},
			dom: 'lBfrtip',
			buttons: [
				'excel', 'csv', 'pdf', 'copy'
			],
			aaSorting: [[6, "desc"]],
			"columnDefs":[
				{"targets":0, "className":"dt-body-left"}
			],
			"columns" : [
				{ 
					"data": null,"sortable": false, 
					render: function (data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					}  
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["idtreatment"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["fungi"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["bact"];
					}
				},
				/*{
					"data" : null, render: function(data, type, row, meta) {
						return row["pink"];
					}
				},*/
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["dead"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["date"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["worker"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "";
							
					}
				}
			]
		});


		var emscreenList = $("#list-contamination-embryoscreen").DataTable({

			"ajax":{
				"url": hostname + "/api/contamination_record/contamination.emscreen.loader.php",
				"data":{
					//
				},
				"type":"POST"
			},
			dom: 'lBfrtip',
			buttons: [
				'excel', 'csv', 'pdf', 'copy'
			],
			aaSorting: [[6, "desc"]],
			"columnDefs":[
				{"targets":0, "className":"dt-body-left"}
			],
			"columns" : [
				{ 
					"data": null,"sortable": false, 
			    	render: function (data, type, row, meta) {
			            return meta.row + meta.settings._iDisplayStart + 1;
                	}  
    			},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["idtreatment"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["fungi"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["bact"];
					}
				},
				{
				 	"data" : null, render: function(data, type, row, meta) {
				 		return row["pink"];
				 	}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["dead"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["date"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["worker"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "";
							/*"<div style='text-align:center;'>" + 

							"<a href=\"" + hostname + "/reception.seeds/" + row["id"] + "\" class=\"btn btn-warning btn-circle waves-effect waves-circle waves-float\" title=\"View Initiation Description\"><i class=\"material-icons\">list</i></a>"
							"  <button data-id=\"" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float btnEdit\" title='Edit Data'><i class=\"material-icons\">edit</i></button> " +

							" | <button class=\"btn btn-danger btn-circle waves-effect waves-circle waves-float btn-delete\" data-idem='" + row['idembryo'] + "' id='delete-" + row['id'] + "'><i class=\"material-icons\" title='Remove Embryo'>delete_outline</i></button> " +

							" | <a href=\"" + hostname + "/germination.screen.log/" + row["idembryo"] + "\" class=\"btn btn-default btn-circle waves-effect waves-circle waves-float \"><i class=\"material-icons\" title='Germination Screening'>check</i></a> " +

							" | <a href=\"" + hostname + "/germination-prepare.add/" + row["idembryo"] + "\" class=\"btn btn-success btn-circle waves-effect waves-circle waves-float " + row['disabled'] + "\"><i class=\"material-icons\" title='Transfer to Germination'>trending_flat</i></a></div> "*/;
					}
				}
			]
		});


		var mat1List = $("#list-contamination-mat1").DataTable({

			"ajax":{
				"url": hostname + "/api/contamination_record/contamination.mat1.loader.php",
				"data":{
					//
				},
				"type":"POST"
			},
			dom: 'lBfrtip',
			buttons: [
				'excel', 'csv', 'pdf', 'copy'
			],
			aaSorting: [[1, "desc"]],
			"columnDefs":[
				{"targets":6, "className":"dt-body-left"}
			],
			"columns" : [
				{ 
					"data": null,"sortable": false, 
			    	render: function (data, type, row, meta) {
			            return meta.row + meta.settings._iDisplayStart + 1;
                	}  
    			},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["idembryo"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["fungi"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["bact"];
					}
				},
				{
				 	"data" : null, render: function(data, type, row, meta) {
				 		return row["pink"];
				 	}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["dead"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["date"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["worker"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "";
					}
				}
			]
		});

		var mat2List = $("#list-contamination-mat2").DataTable({

			"ajax":{
				"url": hostname + "/api/contamination_record/contamination.mat2.loader.php",
				"data":{
					//
				},
				"type":"POST"
			},
			dom: 'lBfrtip',
			buttons: [
				'excel', 'csv', 'pdf', 'copy'
			],
			aaSorting: [[1, "desc"]],
			"columnDefs":[
				{"targets":0, "className":"dt-body-left"}
			],
			"columns" : [
				{ 
					"data": null,"sortable": false, 
			    	render: function (data, type, row, meta) {
			            return meta.row + meta.settings._iDisplayStart + 1;
                	}  
    			},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["idembryo"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["fungi"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["bact"];
					}
				},
				{
				 	"data" : null, render: function(data, type, row, meta) {
				 		return row["pink"];
				 	}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["dead"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["date"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["worker"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "";
					}
				}
			]
		});

		var germList = $("#list-contamination-germ").DataTable({

			"ajax":{
				"url": hostname + "/api/contamination_record/contamination.germ.loader.php",
				"data":{
					//
				},
				"type":"POST"
			},
			dom: 'lBfrtip',
			buttons: [
				'excel', 'csv', 'pdf', 'copy'
			],
			aaSorting: [[1, "desc"]],
			"columnDefs":[
				{"targets":0, "className":"dt-body-left"}
			],
			"columns" : [
				{ 
					"data": null,"sortable": false, 
			    	render: function (data, type, row, meta) {
			            return meta.row + meta.settings._iDisplayStart + 1;
                	}  
    			},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["idembryo"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["fungi"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["bact"];
					}
				},
				{
				 	"data" : null, render: function(data, type, row, meta) {
				 		return row["pink"];
				 	}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["dead"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["date"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["worker"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "";
					}
				}
			]
		});
	});

</script>
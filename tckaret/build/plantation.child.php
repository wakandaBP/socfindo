<script type="text/javascript">
	$(function(){
		menuActive();
		
		var mode;
		
		//---------------FOR BLOCK-------------------
		var no = 1;
		$("#add-block").click(function(){
	        mode = "add";
	        idblock = 0;
	        $("form")[0].reset();
	        $("#mode").html("Add");
	        $("#form-block").modal("show");
	    });

	    $("tbody").on("click","#edit-block",function(){
	        mode = "update";
	        var idblock = $(this).data("id");
	        getBlock(idblock);
    	});

	    $("#simpan-block").click(function(){
	    	saveBlock(mode);
	    });

		
		//data table for list of block
		var blockList = $("#list-block").DataTable({
			"ajax":{
				"url": hostname + "/api/loader.plantation.block.php",
				"data":{
					idplantation:<?php echo $page[1]?>
				},
				"type":"POST"
			},
			select:'single',
			aaSorting: [[0, "asc"]],
			"columnDefs":[
				{"targets":0, "className":"dt-body-left"}
			],
			"columns" : [
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div style='text-align:center;'>" + row["blocknumber"] + "</div>";
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return row["description"];
					}
				},
				{
					"data" : null, render: function(data, type, row, meta) {
						return "<div style='text-align:center;'><button id='add-panel' data-id='" + row['idblock'] + "' data-noblock='" + row['blocknumber'] + "' class=\"btn btn-success btn-circle waves-effect waves-circle waves-float\" title=\"Add Panel\"><i class=\"material-icons\">add</i></button>" +
							" | <button id='edit-block' data-id=\"" + row["idblock"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\"><i class=\"material-icons\">edit</i></button>" +
							" | <button class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete-block\" id=\"delete-" + row["idblock"] + "\" data-name=\"" + row["idblock"] + "\"><i class=\"material-icons\">close</i></button></div>";
					}
				}
			]
		});
	
		$("body").on("click", ".btn-delete-block", function(){
			var id = $(this).attr("id").split("-");
			var nama = $(this).data("name");
			id = id[id.length - 1];

			var conf = confirm("Delete Block Number : " + nama + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-block",
						id:id
					},
					success:function(resp){
						RefreshData("#list-block", hostname + "/api/loader.plantation.block.php", {idplantation:<?php echo $page[1]; ?>});
					}
				});
			}
			return false;
		});

		//Panel view
		$("#list-block").on('click', 'tbody tr', function() {
			dats = blockList.row(this).data();

			$("#paneltitle").html(dats['blocknumber']);
			idblock = dats['idblock'];

			var panelList = $("#list-panel").DataTable({
    			"destroy":true,
				"ajax":{
					"url": hostname + "/api/loader.plantation.panel.php",
					"data":{
						idblock:idblock
					},
					"type":"POST"
				},
				aaSorting: [[0, "asc"]],
				"columnDefs":[
					{"targets":0, "className":"dt-body-left"}
				],
				"columns" : [
					{
						"data" : null, render: function(data, type, row, meta) {
							return "<div style='text-align:center;'>" + row["panelname"] + "</div>";
						}
					},
					{
						"data" : null, render: function(data, type, row, meta) {
							return row["description"];
						}
					},
					{
						"data" : null, render: function(data, type, row, meta) {
							return "<div style='text-align:center;'><button id='edit-panel' data-id=\"" + row["id"] + "\" class=\"btn btn-info btn-circle waves-effect waves-circle waves-float\"><i class=\"material-icons\">edit</i></button> <button class=\"btn bg-red btn-circle waves-effect waves-circle waves-float btn-delete-panel\" id=\"delete-" + row["id"] + "\" data-name=\"" + row["panelname"] + "\" data-block='" + row['idblock'] + "'><i class=\"material-icons\">close</i></button></div>";
						}
					}
				]
			});
		});


		//---------------FOR PANEL-------------------

		$("#list-block tbody").on("click","#add-panel",function(){
	        mode = "add";
	        $("form")[1].reset();
	       	$('#idblockforpanel').val($(this).data('id'));
	        $("#mode-panel").html("Add");
	        $("#mode-block").html($(this).data('noblock'));
	        $("#form-panel").modal("show");
    	});

		 $("tbody").on("click","#edit-panel",function(){
	        mode = "update";
	        var idpanel = $(this).data("id");
	        getPanel(idpanel);
    	});

    	$("#simpan-panel").click(function(){
	    	savePanel(mode);
	    });


	    $("body").on("click", ".btn-delete-panel", function(){
			var id = $(this).attr("id").split("-");
			var nama = $(this).data("name");
			var idblock = $(this).data("block");
			id = id[id.length - 1];

			var conf = confirm("Delete Panel : " + nama + " ?");
			if(conf){
				$.ajax({
					url:hostname + "/action.php",
					type:"POST",
					data:{
						action:"delete-panel",
						id:id
					},
					success:function(resp){
						RefreshData("#list-panel", hostname + "/api/loader.plantation.panel.php", {idblock:idblock});
					}
				});
			}
			return false;
		});

	});
	
	//----------------------ALL FUNCTION----------------------

	//-------------------------BLOCK FUNCTION------------------------
	//get block value
	function getBlock(id){
	    $("form")[0].reset();

	    $.ajax({
	        url: hostname + "/api/loader.plantation.block.php",
	        type: "POST",
	        data: {idblock:id},
	        success: function(data){
	        	value = JSON.parse(data); 

	        	$("#idblock").val(value[0].idblock);
	            $("#blocknumber").val(value[0].blocknumber);
	            $("#blockdescription").val(value[0].description);
	            $("#mode").html("Edit");

	            $("#form-block").modal("show");
	        }
	    });
	}

	function saveBlock(mode){
		var idblock = $("#idblock").val();
		var blocknumber = $("#blocknumber").val();
		var description = $("#blockdescription").val();

		if(blocknumber != ""){
			if (mode == "add"){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-block",
						idplantation:<?php echo $page[1];?>,
						blocknumber:blocknumber,
						description:description
					},
					success:function(resp){
						if(parseInt(resp) > 0){
							no = 1;
							var idplantation = <?php echo $page[1] ?>;
		                    RefreshData("#list-block", hostname + "/api/loader.plantation.block.php", {idplantation:idplantation});
		                    $("#form-block").modal("hide");
		                }
		                else{
		                    //alert(resp);
		                }
					}
				});
			} else if (mode == "update"){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"update-block",
						idblock:idblock,
						blocknumber:blocknumber,
						description:description
					},
					success:function(resp){
						if(parseInt(resp) > 0){
							no = 1;
							var idplantation = <?php echo $page[1] ?>;
		                    RefreshData("#list-block", hostname + "/api/loader.plantation.block.php", {idplantation:idplantation});
		                    $("#form-block").modal("hide");
		                }
		                else{
		                    //alert(resp);
		                }
					}
				});
			}
			
		} else {
			alert("Please fill out every field with *");
		}
		return false;
	}


	//---------------------PANEL FUNCTION------------------------
	function getPanel(id){
	    $("form")[1].reset();

	    $.ajax({
	        url: hostname + "/api/loader.plantation.panel.php",
	        type: "POST",
	        data: {idpanel:id},
	        success: function(data){
	        	value = JSON.parse(data); 

	        	$("#idblockforpanel").val(value[0].idblock);
	        	$("#idpanel").val(value[0].id);
	            $("#panelname").val(value[0].panelname);
	            $("#paneldescription").val(value[0].description);
	            $("#mode-panel").html("Edit");

	            $("#form-panel").modal("show");
	        }
	    });
	}

	function savePanel(mode){
		var idblockforpanel = $("#idblockforpanel").val();
		var idpanel = $("#idpanel").val();
		var panelname = $("#panelname").val();
		var description = $("#paneldescription").val();

		if(panelname != ""){
			if (mode == "add"){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"add-panel",
						idblock:idblockforpanel,
						panelname:panelname,
						description:description
					},
					success:function(resp){
						if(parseInt(resp) > 0){
		                    RefreshData("#list-panel", hostname + "/api/loader.plantation.panel.php", {idblock:idblockforpanel});
		                    $("#form-panel").modal("hide");
		                }
		                else{
		                    //alert(resp);
		                }
					}
				});
			} else if (mode == "update"){
				$.ajax({
					url: hostname + "/action.php",
					type: "POST",
					data: {
						action:"update-panel",
						idpanel:idpanel,
						panelname:panelname,
						description:description
					},
					success:function(resp){
						if(parseInt(resp) > 0){
		                    RefreshData("#list-panel", hostname + "/api/loader.plantation.panel.php", {idblock:idblockforpanel});
		                    $("#form-panel").modal("hide");
		                }
		                else{
		                    //alert(resp);
		                }
					}
				});
			}
			
		} else {
			alert("Please fill out every field with *");
		}
		return false;
	}
</script>
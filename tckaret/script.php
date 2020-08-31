    <!-- Bootstrap Core Js -->
    <script src="<?php echo $web_server?>/assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo $web_server?>/assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo $web_server?>/assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    
    <!-- Select Plugin Js -->
    <script src="<?php echo $web_server?>/assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    
    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo $web_server?>/assets/plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="<?php echo $web_server?>/assets/plugins/autosize/autosize.js"></script>
    
    <!-- Moment Plugin Js -->
    <script src="<?php echo $web_server?>/assets/plugins/momentjs/moment.js"></script>
    
    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo $web_server?>/assets/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="<?php echo $web_server?>/assets/plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo $web_server?>/assets/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="<?php echo $web_server?>/assets/plugins/chartjs/Chart.bundle.js"></script>
    <script src="<?php echo $web_server?>/assets/plugins/chartjs/Chart.PieceLabel.min.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="<?php echo $web_server?>/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    
     <!-- noUISlider Plugin Js -->
    <script src="<?php echo $web_server?>/assets/plugins/nouislider/nouislider.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo $web_server?>/assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?php echo $web_server?>/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    
    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo $web_server?>/assets/plugins/datatable/jquery.dataTables.min.js"></script>
    <script src="<?php echo $web_server?>/assets/plugins/datatable/dataTables.select.min.js"></script>
    <script src="<?php echo $web_server?>/assets/plugins/datatable/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo $web_server?>/assets/plugins/datatable/dataTables.buttons.min.js"></script>
    <script src="<?php echo $web_server?>/assets/plugins/datatable/buttons.bootstrap.min.js"></script>
    <script src="<?php echo $web_server?>/assets/plugins/datatable/jszip.min.js"></script>
    <script src="<?php echo $web_server?>/assets/plugins/datatable/pdfmake.min.js"></script>
    <script src="<?php echo $web_server?>/assets/plugins/datatable/vfs_fonts.js"></script>
    <script src="<?php echo $web_server?>/assets/plugins/datatable/buttons.html5.min.js"></script>
    <script src="<?php echo $web_server?>/assets/plugins/datatable/buttons.print.min.js"></script>
    <script src="<?php echo $web_server?>/assets/plugins/datatable/buttons.colVis.min.js"></script>
    
    <!-- <script src="<?php echo $web_server?>/assets/plugins/datatable/dataTables.select.min.js"></script> -->
    <script src="<?php echo $web_server?>/assets/plugins/datatable/dataTables.checkboxes.min.js"></script>
    <!-- Custom Js -->
    <!-- <script src="../assets/js/admin.js"></script> -->
    <script src="<?php echo $web_server?>/assets/js/pages/forms/basic-form-elements.js"></script>
    
    <script src="<?php echo $web_server?>/assets/js/pages/tables/jquery-datatable.js"></script>
    <!-- Demo Js -->
    <script src="<?php echo $web_server?>/assets/js/demo.js"></script>

    <!-- Select2 -->
    <script src="<?php echo $web_server?>/assets/plugins/select2/select2.full.js"></script>

    <!-- Jquery input picker -->
    <script src="<?php echo $web_server?>/assets/plugins/jquery-inputpicker/src/jquery.inputpicker.js"></script>

    <!-- <script src="<?php echo $web_server?>/assets/plugins/jquery/jquery-3.3.1.min.js"></script> -->

    <script type="text/javascript">
        var hostname = <?php echo json_encode($tckaret);?>;
        
        $('.modal').on('shown.bs.modal', function() {
              $(this).find('[autofocus]').focus();
            });
            
        $(function () {            
            //Widgets count
            $('.count-to').countTo();

            //Sales count to
            $('.sales-count-to').countTo({
                formatter: function (value, options) {
                    return '$' + value.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, ' ').replace('.', ',');
                }
            });
            
             $('.datepicker2').bootstrapMaterialDatePicker({
                format: 'DD/MM/YYYY',
                clearButton: true,
                weekStart: 1,
                time: false
            });


            $('.numberonly').keypress(function(event){
                if (event.which < 48 || event.which > 57) {
                    event.preventDefault();
                }
            });

            $(".useselect2").select2({});


        });

        function menuActive(){

            str = '<?php echo $page[0];?>'; 
            var menudata = str.substring(str.lastIndexOf("/") + 1, str.length);
            menuvar = menudata;

            if (menudata.indexOf(".") > -1) {
                menuvar = menudata.split(".")[0];
            }

            if (window.location.href.indexOf(menuvar) > -1){
                $("a[href='" + hostname + "/"+ menuvar +"']").parent("li").attr("class","active");
            }
        }

        function readURL(input) { // Mulai membaca inputan gambar
            var val = $('#fupload').val();

            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'jpg': case 'png': case 'jpeg': case 'JPG': case 'PNG': case 'JPEG':
                    var size = parseFloat($("#fupload")[0].files[0].size / 1024).toFixed(2);
                    if(size<=500){
                        if (input.files && input.files[0]) {
                            var reader = new FileReader(); 
                            var image = new Image();
                            reader.onload = function (e) { 
                                image.src    = e.target.result;
                                image.onload = function() {
                                        $('#preview_gambar')
                                        .attr('src', e.target.result)
                                        .width('200px');
                                    }
                                }
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    else{
                        $('#fupload').val('');
                        alert("Maksimal 500 KB ");
                        return false;
                    }
                    break;
                default:
                    $('#fupload').val('');
                    alert("Invalid extension");
                    $('#preview_gambar')
                    .attr('src', 'img/default.png')
                    .width('200px');
                    return false;
                    break;
            }
        }
        
        function notif(title, content, classExtended, styleExtended = {}, timeout = 1500){
            var container = document.createElement("DIV");
            $(container).html("<h4>" + title + "</h4><p>" + content + "</p>").addClass(classExtended).css({
                "right": "-100%"
            }).css(styleExtended);
            $(".action-report").append(container);
            $(container).animate({
                "right":"10px"
            });
            setTimeout(function(){
                $(container).animate({
                    "right":"-100%"
                });
            }, timeout);
        }
    	
        function RefreshData(tableId, urlData, parameter = {}){
    		$.post(urlData, parameter, function(response){
    			var json = JSON.parse(response);
    			var table = $(tableId).dataTable();
    			var oSettings = table.fnSettings();
    			table.fnClearTable(this);
    			//console.log(response);
    			for (var i=0; i < json.data.length; i++){
    				table.oApi._fnAddData(oSettings, json.data[i]);
    			}

    			oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
    			table.fnDraw();
    		});
    	}

        /*function checkAvailabelMedia(amount,idmedia,selectbox){
            $("#" + selectbox + " option").remove();

            $.ajax({
                async:false,
                url: hostname + "/api/myfunction/check.available.media.php",
                type: "POST",
                data: {
                    amount:amount,
                    media:idmedia
                },
                success: function(resp){
                    //console.log(resp);

                    var MetaData = JSON.parse(resp);

                    for(var key in MetaData){
                        //var id = key.split("-");
                        id = MetaData[key]['id'];
                        var selection = document.createElement("OPTION");
                        $(selection).attr("value", id).html(MetaData[key]['tglbuatmedia'] + " - " + MetaData[key]['worker']);

                        $("#" + selectbox).append(selection);
                    }
                }
            })
        }*/

        function checkAvailableMedia(amount, idmedia, msg_selector, availableMedia){
            stats = "";
			msg_error = msg_selector;
            count_media = availableMedia;

            $.ajax({
                async:false,
                url: hostname + "/api/myfunction/check.available.media2.php",
                type: "POST",
                data: {
                    amount:amount,
                    idmedia:idmedia
                },
                success: function(resp){
                   if (resp != ""){
                        data = JSON.parse(resp);

                        stok = 0;
                        if (parseInt(data['stok']) > 0){
                            stok = parseInt(data['stok']);
                        }

                        $("#" + msg_error).html(data['msg']);
                        $("#" + count_media).val(stok);
                        stats = data['msg'];
                    }
                }
            });
            //console.log(stats);
            return stats;
        }

        function checkAvailableMediaforadd(amount, idmedia, selector){
            stats = "";

            $.ajax({
                async:false,
                url: hostname + "/api/myfunction/check.available.media2.php",
                type: "POST",
                data: {
                    amount:amount,
                    idmedia:idmedia
                },
                success: function(resp){
                    //console.log(resp);
                    $("#" + selector).html(resp);
                    stats = resp;
                }
            });
            //console.log(stats);
            return stats;
        }


        function checkAvailableMediaforEdit(amount, idmedia, idpengeluaran, msg_selector, availableMedia){
            stats = "";
            msg_error = msg_selector;
            count_media = availableMedia;

            $.ajax({
                async:false,
                url: hostname + "/api/myfunction/check.available.media.for.edit.php",
                type: "POST",
                data: {
                    amount:amount,
                    idmedia:idmedia,
                    idpengeluaranmedia:idpengeluaran
                },
                success: function(resp){
                    if (resp != ""){
                        data = JSON.parse(resp);

                        stok = 0;
                        if (parseInt(data['stok']) > 0){
                            stok = parseInt(data['stok']);
                        }

                        console.log(data);
                        $("#" + msg_error).html(data['msg']);
                        $("#" + count_media).val(stok);
                        stats = data['msg'];
                    }
                }
            });
            
            return stats;
        }


        function showRowLastRow(table){
            var rowsCount = table.data().length;
            var rowsPerPage = table.page.len();
            var row = table.row(rowsCount - 1);
            var selectedPage = Math.floor((rowsCount - 1) / rowsPerPage);

            if (rowsCount > rowsPerPage){
                table.page(selectedPage).draw(false);
            }

            row.node().classList.add('hightlight');
        }

        /*-------------------------- FUNGSI REDIRECT AFTER ADD -----------------------------*/
        function redirectAfterAction(resp, redirectUrl, mode, menuName){
            try {
                data = JSON.parse(resp);

                if(parseInt(data['rowcount']) > 0){
                    alert(menuName + " has "+ mode +"ed!");
                    location.href = hostname + "/"+ redirectUrl +"?last="+data['id'];
                }
                else {
                    alert(menuName + " cant be "+ mode +"ed!");
                }
            } catch (e) {
                console.log("Error : " + e + ". Please contact the System Developer");
            }
        }


    </script>
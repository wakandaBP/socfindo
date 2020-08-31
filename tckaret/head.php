    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>TCKaret ::: <?php echo $setting['namaAplikasi'];?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo $web_server . '/images/' . $setting['logo'];?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="<?php echo $web_server?>/assets/css/roboto.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $web_server?>/assets/css/material.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo $web_server?>/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo $web_server?>/assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo $web_server?>/assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?php echo $web_server?>/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    
    <!-- Wait Me Css -->
    <link href="<?php echo $web_server?>/assets/plugins/waitme/waitMe.css" rel="stylesheet" />
    
    <!-- Morris Chart Css-->
    <link href="<?php echo $web_server?>/assets/plugins/morrisjs/morris.css" rel="stylesheet" />

     <!-- Multi Select Css -->
    <link href="<?php echo $web_server?>/assets/plugins/multi-select/css/multi-select.css" rel="stylesheet">
    
    <!-- Bootstrap Select Css -->
    <link href="<?php echo $web_server?>/assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    
     <!-- noUISlider Css -->
    <link href="<?php echo $web_server?>/assets/plugins/nouislider/nouislider.min.css" rel="stylesheet" />
    
    <!-- JQuery DataTable Css -->
    <link href="<?php echo $web_server?>/assets/plugins/datatable/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $web_server?>/assets/plugins/datatable/buttons.bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo $web_server?>/assets/plugins/datatable/select.dataTables.min.css" rel="stylesheet">
    <!-- <link href="<?php echo $web_server?>/assets/plugins/datatable/dataTables.checkboxes.css" rel="stylesheet"> -->

    <!-- Custom Css -->
    <link href="<?php echo $web_server?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo $web_server?>/assets/css/style_media_master.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo $web_server?>/assets/css/themes/all-themes.css" rel="stylesheet" />

    <!-- Select2 -->
    <link rel="stylesheet" type="text/css" href="<?php echo $web_server?>/assets/plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $web_server?>/assets/plugins/select2/select2-bootstrap.css">

    <!-- Jquery input picker -->
    <link rel="stylesheet" type="text/css" href="<?php echo $web_server?>/assets/plugins/jquery-inputpicker/src/jquery.inputpicker.css">

    <!-- Jquery Core Js -->
    <!-- <script src="<?php echo $web_server?>/assets/plugins/jquery/jquery.min.js"></script> -->
    <script src="<?php echo $web_server?>/assets/plugins/jquery/jquery-2.2.4.min.js"></script>
   <!--  <script src="<?php echo $web_server?>/assets/plugins/jquery/jquery-3.3.1.min.js"></script> -->
    
    <!-- -------------  SCRIPT FOR SESSION TIMEOUT ------------- -->
    <script type="text/javascript">
        $(function(){
            if (parseInt(<?= time() - $_SESSION[md5('timeloginadminkaret')]?>) > 7200){
                location.href = hostname + "/logout";
            }
        });
    </script>
    
</head>
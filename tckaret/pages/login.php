<?php
error_reporting(0);
require "config.php";
require "database.php";
$setting = new Database("SELECT * FROM setting",array());

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Rubber Tissue Culture::: <?php echo $setting::$result[0]['namaAplikasi'];?></title>
    <!-- Favicon-->
    <link rel="icon" href="<?= $tckaret; ?>/images/<?php echo $setting::$result[0]['logo'];?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="../assets/css/roboto.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/material.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Rubber Tissue Culture <b>Site</b></a>
            <small><?php echo $setting::$result[0]['namaAplikasi'];?></small>
        </div>
        <div class="card">
            <div class="body">
                <form id="form-login">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div id="error-login" style="text-align: center; margin: 0 0 5% 0;"></div>
                    <div class="row">
                        <div class="col-xs-12">
                            <center><button class="btn bg-primary waves-effect" type="submit" id="btnLogin">MASUK</button> <a href="../index.php" class="btn btn-warning waves-effect">KEMBALI</a></center>
							<div id="error"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../assets/js/admin.js"></script>
    <script src="../assets/js/pages/examples/sign-in.js"></script>
    <script src="../vendors/scripts/script.js"></script>

    <script type="text/javascript">
        $(function(){
            $("#form-login").submit(function(){
                var username = $("#username").val();
                var password = $("#password").val();
				
				 

                if(username != ""){
                    $.ajax({
                        url:<?php echo json_encode($tckaret); ?> + "/action.php",
                        type:"POST",
                        data:{
                            action:"login",

                            username:username,
                            password:password
                        },
                        success:function(resp){
                            //alert(resp);
                            if (parseInt(resp) > 0){
                                location.reload();
                            } else {
                                $("#error-login").html("<span style='color:red;'>Wrong Username or Password!");
                            }
                            
                        }
                    });
                }
                return false;
            });
        });
    </script>
	
</body>
</html>

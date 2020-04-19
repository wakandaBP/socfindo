<?php
session_start();

if(!empty($_SESSION[md5("adminfortckaret")])){
	error_reporting(0);

	require "config.php";
	require "database.php";
	$page = explode("/", $_GET["tckaret"]);

	$setting = array();
	foreach ((new Database("SELECT * FROM setting",array()))::$result as $key => $value) {
		$setting = array("id"=>$value["id"], "namaAplikasi"=>$value["namaAplikasi"],"logo"=>$value["logo"]);
	}

	//$bulan = ["January","February","March","April","May","June","July","August","September","October","November","December"];

	$shape_embryo = ["Globular","Heart","Torpedo","Cotyledon","Abnormal","Trompet"];
	
	$now = date("Y-m-d");
	$awal = date('Y-m-d', strtotime('-2 year'));
	// $hari = ["Senin","Selasa","Rabu","Kamis","Jumat"];

	// if (empty($_SESSION[md5("token")])) {
	// 	$_SESSION[("token")] = bin2hex(random_bytes(32));
	// }

	include "all_function.php";

?>
<!DOCTYPE html>
	<html lang="en">
	<?php require "head.php"; ?>

	<style type="text/css">
		a.disabled {
			pointer-events: none;
			cursor: default;
		}

		.hightlight td {
			background-color: blue;
		}
	</style>

	<body class="theme-cyan">
		<div class="preloader2" id="loader">
			<div class="loading2">
				<span class="c-white"><b>Mohon Menunggu</b></span>
				<!--<div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>-->
			</div>
	    </div>

	    <div class="overlay"></div>
	    
		<div class="dashboard-main-wrapper">
			<?php require "navbar.php"; ?>
			<?php require "sidebar.php"; ?>
			
			<section class="content">
					<div class="container-fluid">
						<?php
							if(empty($page[0])){
								require "pages/dashboard.php";
							}
							else{
								if(file_exists("pages/" . $page[0] . ".php")){
									if(empty($page[2])){
										require "pages/" . $page[0] . ".php";
									}
									else{
										require "pages/" . $page[0] . "." . $page[1] . ".php";
									}
								}
								else{
									require "pages/404.php";
								}
							}
						?>
						<?php require "footer.php"; ?>
					</div>	
			</section>
		</div>
		<?php
			require "script.php";
			if(empty($page[0])){
				include "build/dashboard.php";
			}
			else{
				if(file_exists("pages/" . $page[0] . ".php")){
					if(empty($page[2])){
						include "build/" . $page[0] . ".php";
					}
					else{
						include "build/" . $page[0] . "." . $page[1] . ".php";
					}
				}
				else{
					include "build/404.php";
				}
			}
		?>

		<!--Admin BB-->
    	<script src="<?php echo $web_server?>/assets/js/admin.js?v1"></script>
	</body>
</html>
<?php
	$connection = null;
	
} 
/*elseif (isset($_SESSION[md5('adminfortckaret')]) && (time() - $_SESSION[md5('timeloginadminkaret')] > 15)) {
	session_unset();
	session_destroy();
	require "pages/login.php";
}*/
else {
	require "pages/login.php";
}	
// }
?>

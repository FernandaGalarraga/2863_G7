<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html><html class=''>
<head>
<script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script>
<script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script>
<script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script>
<script src='../js/login.js'></script>

<meta charset='UTF-8'><meta name="robots" content="noindex">
<link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
<link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
<link rel="canonical" href="https://codepen.io/dpinnick/pen/LjdLmo?limit=all&page=21&q=service" />
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='../css/estilolp.css'>
</head>
<?php

		require_once "../modelo/Conexion.php";
        $cn=conectar();
		include_once("../clases/Medico.php");
        $m = new Medico($cn);
       /* echo "<pre>";
        print_r($_POST);
        echo "</pre>";*/

		if(isset($_POST['Guardar']) && $_POST['op']=="new"){
			$m->guardar_medico();
                }elseif(isset($_POST['Guardar']) && $_POST['op']=="actualizar"){
			$m->updateMedico();
		}else if(isset($_GET['d'])){
			$tmp=$_GET['d'];
			$tmp = explode("/", $tmp);
			$op = $tmp[0];
			$id = $tmp[1];
			if($op=="see"){
				$m->verMedico($id);
			}else if($op=="del"){
				$m->eliminarMedico($id);
			}
                        else if($op=="act"){
				$m->actualizarMedico($id);
			}

		}
		
		else{
			echo "No netro";
		}
		
		
	?>	

<?php
		require_once "../modelo/Conexion.php";
        $cn=conectar();
		include_once("../clases/Medico.php");
        $m = new Medico($cn);
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

		if(isset($_POST['Guardar']) && $_POST['op']=="new"){
			$m->guardar_medico();
		}else{
			echo "No netro";
		}
		
		
	?>	
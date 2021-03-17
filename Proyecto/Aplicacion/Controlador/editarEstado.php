<?php
require_once("../modelo/Conexion.php");

$codigocitamedica = $_POST['CODIGOCITAMEDICA'];
$estado = $_POST['ESTADO'];
$con=conectar();
$sql = "update citamedica c set 
               c.ESTADO='$estado'
               WHERE c.CODIGOCITAMEDICA='$codigocitamedica'";

		
		if($con->query($sql)){

			echo '<script language="javascript">alert("Se agrego correctamente");</script>';
           		echo '<script language="javascript">document.location="../php/Medico.php";</script>';
		}else{
			echo '<script language="javascript">alert("No se pudo agregar");</script>';
            		echo '<script language="javascript">document.location="../php/Medico.php";</script>';
		}
     
?>
<?php
require_once("../modelo/Conexion.php");
$codigoMed=$_POST["CODIGOUSUARIO"];
$nombreMed=$_POST["NOMBREMEDICO"];
$apellidoMed=$_POST["APELLIDOMEDICO"];
$especialidadMed=$_POST["ESPECIALIDADMEDICO"];


    $con=conectar();
    $sql = "update medico m
            set m.NOMBREMEDICO='$nombreMed',
                m.APELLIDOMEDICO='$apellidoMed',
                m.ESPECIALIDADMEDICO='$especialidadMed',
            WHERE m.CODIGOUSUARIO='$codigoMed'";

	if($con->query($sql)){
		echo "<h1 align='center'>Se modifico correctamente</h1><br />";
		echo '<center>
                <tr>
                <th><a class="btn btn-primary" href="../php/Medico.php">Regresar</a></th>
            </tr></center>';
	}else{
		echo "No se pudo modificar";
		echo '<center>
                <tr>
                <th><a class="btn btn-primary" href="../php/Medico.php">Regresar</a></th>
            </tr></center>';
    }	     
?>

<?php
require_once("../modelo/Conexion.php");
$codigo=$_POST["CODIGOUSUARIO"];
$nombre=$_POST["NOMBREPACIENTE"];
$apellidoP=$_POST["APELLIDOPATERNO"];
$apellidoM=$_POST["APELLIDOMATERNO"];
$fecha=$_POST["FECHANACIMIENTO"];
$telefono=$_POST["TELEFONOPACIENTE"];
$genero=$_POST["GENEROPACIENTE"];

    $con=conectar();
    $sql = "update paciente set NOMBREPACIENTE='$nombre',
                             APELLIDOPATERNO='$apellidoP',
                             APELLIDOMATERNO='$apelliedoM',
                             FECHANACIMIENTOPACIENTE='$fecha',
                             TELEFONOPACIENTE='$telefono'
                             GENEROPACIENTE='$genero'
                       WHERE CODIGOUSUARIO='$codigo'";

	if($con->query($sql)){
		echo "<h1 align='center'>Se modifico correctamente</h1><br />";
		echo '<center>
                <tr>
                <th><a class="btn btn-primary" href="../php/Paciente.php">Regresar</a></th>
            </tr></center>';
	}else{
		echo "No se pudo modificar";
		echo '<center>
                <tr>
                <th><a class="btn btn-primary" href="../php/Paciente.php">Regresar</a></th>
            </tr></center>';
    }	     
?>
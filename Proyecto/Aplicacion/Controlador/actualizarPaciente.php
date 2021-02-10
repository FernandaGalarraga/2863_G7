<?php
require_once("../modelo/Conexion.php");
$codigo=$_POST["CODIGOUSUARIO"];
$nombre=$_POST["NOMBREPACIENTE"];
$apellidoP=$_POST["APELLIDOPATERNO"];
$apellidoM=$_POST["APELLIDOMATERNO"];
$fecha=$_POST["FECHANACIMIENTOPACIENTE"];
$telefono=$_POST["TELEFONOPACIENTE"];
$genero=$_POST["GENEROPACIENTE"];
$ciudad=$_POST['CIUDADDIRECCION'];
$calle=$_POST['CALLEDIRECCION'];
$numero=$_POST['NUMERODIRECCION'];

    $con=conectar();
    $sql = "update paciente p INNER JOIN direccion d ON d.CODIGOUSUARIO=p.CODIGOUSUARIO
            set p.NOMBREPACIENTE='$nombre',
                p.APELLIDOPATERNO='$apellidoP',
                p.APELLIDOMATERNO='$apellidoM',
                p.FECHANACIMIENTOPACIENTE='$fecha',
                p.TELEFONOPACIENTE='$telefono',
                p.GENEROPACIENTE='$genero',
                d.CIUDADDIRECCION='$ciudad',
                d.CALLEDIRECCION='$calle',
                d.NUMERODIRECCION='$numero'
            WHERE p.CODIGOUSUARIO='$codigo'";

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
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
		echo '<script language="javascript">alert("Se modificó correctamente");</script>';
		echo '<script language="javascript">document.location="../php/ActualizarPerfilPaciente.php";</script>';
	}else{
		echo '<script language="javascript">alert("No se pudo modificar");</script>';
		echo '<script language="javascript">document.location="../php/ActualizarPerfilPaciente.php";</script>';
    }	     
?>
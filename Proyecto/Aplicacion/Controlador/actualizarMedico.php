<?php
require_once("../modelo/Conexion.php");

$CODIGO_USUARIO = $_POST['CODIGOUSUARIO'];
$NOMBRE_MEDICO = $_POST['NOMBREMEDICO'];
$APELLIDO_MEDICO = $_POST['APELLIDOMEDICO'];
$ESPECIALIDAD_MEDICO = $_POST['ESPECIALIDADMEDICO'];
$HORA_INICIO= $_POST['HORAINICIOMEDICO'];
$HORA_FIN = $_POST['HORAFINMEDICO'];
$con=conectar();
session_start();
$id=$_SESSION["codigo"];
$sql = "update medico m INNER JOIN horarioatencion h ON h.CODIGOUSUARIO=m.CODIGOUSUARIO set 
				m.NOMBREMEDICO='$NOMBRE_MEDICO',
                		m.APELLIDOMEDICO='$APELLIDO_MEDICO',
                		m.ESPECIALIDADMEDICO='$ESPECIALIDAD_MEDICO',
               			h.HORAINICIO='$HORA_INICIO',
                		h.HORAFIN='$HORA_FIN'
                		WHERE m.CODIGOUSUARIO='$CODIGO_USUARIO'";

		
		if($con->query($sql)){

			echo '<script language="javascript">alert("Se actualizo correctamente");</script>';
           		echo '<script language="javascript">document.location="../php/Medico.php";</script>';
		}else{
			echo '<script language="javascript">alert("No se pudo actualizar");</script>';
            		echo '<script language="javascript">document.location="../php/Medico.php";</script>';
		}
     
?>
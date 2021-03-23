<?php
require_once "../modelo/Conexion.php";
    session_start();
    $con=conectar();
    $id=$_SESSION['codigo'];
    $idMedico=$_POST['codigousuario'];
    $date=$_POST['FECHACONSULTA'];
    $hora=$_POST['cbx_horaMedico'];
    $tipo=$_POST['TIPOCONSULTA'];
    $sql="insert into citamedica values (null, '$idMedico', '$id', '$tipo', '$date', '$hora','Ocupado',1);";
    $res=$con->query($sql) or die($con->error);
    if($res){
        echo '<script language="javascript">alert("Su cita fue agendada con éxito");</script>';
		echo '<script language="javascript">document.location="../php/Paciente.php";</script>';
    }else{
        echo '<script language="javascript">alert("No se pudo agendar");</script>';
		echo '<script language="javascript">document.location="../php/Paciente.php";</script>';
    }


?>
</html>


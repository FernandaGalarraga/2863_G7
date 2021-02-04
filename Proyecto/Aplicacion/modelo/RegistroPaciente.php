<?php
    require_once "Conexion.php";
    $nombreP=$_POST['nombrepaciente'];
    $apellidoP=$_POST['apellidopaterno'];
    $apellidoM=$_POST['apellidomaterno'];
    $birthday=$_POST['fechanacimientopaciente'];
    $telephone=$_POST['telefonopaciente'];
    $gender=$_POST['generopaciente'];
    $usuario=$_POST['nombreusuario'];
    $pass=$_POST['passwordusuario'];
    $tipo="Paciente";

    function verificarUsuario($usuario){
        $cn=conectar();
        $sql="select * from usuario where NOMBREUSUARIO='$usuario'";
        $res=$cn->query($sql);
        if($res->num_rows>0){
            return true;
        }else{
            return false;
        }
    }
    if (!verificarUsuario($usuario)){
        $cn=conectar();
        $sql="insert into usuario
              values (NULL, '$usuario', '$pass', '$tipo')";     
        $res=$cn->query($sql);   
        $sql2='SELECT * FROM `usuario` WHERE `NOMBREUSUARIO`="'.$usuario.'" ';
        $resUser=$cn->query($sql2);
        while($reg=$resUser->fetch_array()){
             $codUsuario= $reg[0];
        }
        $sql="insert into paciente
              values ('$codUsuario', '$nombreP', '$apellidoP','$apellidoM','$birthday','$telephone', '$gender')";
        $res=$cn->query($sql);
        echo '<script language="javascript">alert("Usuario registrado correctamente");</script>';
        echo "<a href='../php/PaginaInicio.php'>REGRESAR</a>";
    }else{
        echo '<script language="javascript">alert("El usuario que ingreso, ya existe");</script>';
        echo "<a href='../php/PaginaInicio.php'>REGRESAR</a>";
    }
?>
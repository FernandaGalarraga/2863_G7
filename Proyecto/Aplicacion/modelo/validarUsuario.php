<?php
//require_once "../clases/Usuario.php";
require_once "Conexion.php";
$cn=conectar();
session_start();
    $usuario=$_POST['nombre_usuario'];
    $clave=$_POST['password_usuario'];
    $sql="SELECT * FROM usuario WHERE usuario.NOMBREUSUARIO='$usuario' AND usuario.PASSWORDUSUARIO='$clave'";
        $res = $cn->query($sql) or die($cn->error);
        if($res->num_rows>0)
        {
          while($row = $res->fetch_assoc()){
                
            $_SESSION["usuario"]=$row["NOMBREUSUARIO"];
            $_SESSION["codigo"]=$row["CODIGOUSUARIO"];
            if($row["TIPOUSUARIO"]=="Paciente"){
                 header("Location: ../php/Paciente.php");
            }
            else if($row["TIPOUSUARIO"]=="Medico"){
                header("Location: ../php/Medico.php");
           }else{
                 header("Location: ../php/Administrador.php");
            }
        }    
        }
        else
        {
            echo '<script language="javascript">alert("Usuario o Clave Incorrecta");</script>';
            echo '<script language="javascript">document.location="../index.php";</script>';
            
        }
		
?>
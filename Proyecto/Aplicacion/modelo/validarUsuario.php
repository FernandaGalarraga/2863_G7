<?php
//require_once "../clases/Usuario.php";
// Nombre tester: Patricio Bazantes
//Fecha: 19 de febrero del 2021
// Prueba tecnica: caja blanca y caja negra
require_once "Conexion.php";
$cn=conectar();
session_start();
    $usuario=$_POST['nombre_usuario'];
    $clave=$_POST['password_usuario'];
    $sql="SELECT * FROM usuario WHERE usuario.NOMBREUSUARIO='$usuario'";
        $res = $cn->query($sql) or die($cn->error);
        if($res->num_rows>0)
        {
            $sql="SELECT u.CODIGOUSUARIO, u.NOMBREUSUARIO, u.PASSWORDUSUARIO, u.TIPOUSUARIO
                  FROM usuario u
                  WHERE u.NOMBREUSUARIO='$usuario' AND u.PASSWORDUSUARIO='$clave'";
            $res = $cn->query($sql) or die($cn->error);
            if($res->num_rows>0){

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
            }else{

            echo '<script language="javascript">alert("Usuario o Clave Incorrecta");</script>';
            echo '<script language="javascript">document.location="../index.php";</script>';

            }    
        }
        else
        {
            echo '<script language="javascript">alert("Usuario no existe");</script>';
            echo '<script language="javascript">document.location="../index.php";</script>';
            
        }
		
?>

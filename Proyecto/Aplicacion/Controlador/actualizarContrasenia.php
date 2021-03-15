<?php
require_once("../modelo/Conexion.php");
if(isset($_POST['re_pass'])){
    $id=$_POST["codigousuario"];
    $opass=$_POST['opassword'];
    $npass=$_POST['npassword'];
    $cpass=$_POST['cpassword'];
    $sql="select * from usuario where CODIGOUSUARIO='$id'";
    $cn=conectar();
    $res=$cn->query($sql) or die($cn->error);
    $row=$res->fetch_assoc();
    $data_pass=$row['PASSWORDUSUARIO'];
    if($data_pass==$opass){
        if($npass==$cpass){
            $sql1 = "update usuario set PASSWORDUSUARIO='$npass'
                     where CODIGOUSUARIO='$id'";
            if($cn->query($sql1)){
                echo '<script language="javascript">alert("Se modificó correctamente");</script>';
                if($row["TIPOUSUARIO"]=="Paciente"){
                    echo '<script language="javascript">document.location="../php/Paciente.php";</script>';
                }else if($row["TIPOUSUARIO"]=="Medico"){
                    echo '<script language="javascript">document.location="controllerMedico.php?d=act/'.$id.'";</script>'; 
                }
            }else{
                echo '<script language="javascript">alert("No se pudo modificar");</script>';
                if($row["TIPOUSUARIO"]=="Paciente"){
                    echo '<script language="javascript">document.location="../php/Paciente.php";</script>';
                }else if($row["TIPOUSUARIO"]=="Medico"){
                    echo '<script language="javascript">document.location="controllerMedico.php?d=act/'.$id.'";</script>'; 
                }
            }
        }
    }else{
        echo '<script language="javascript">alert("Tu antigua contraseña es incorrecta");</script>';
            if($row["TIPOUSUARIO"]=="Paciente"){
                echo '<script language="javascript">document.location="../php/Paciente.php";</script>';
            }else if($row["TIPOUSUARIO"]=="Medico"){
                echo '<script language="javascript">document.location="controllerMedico.php?d=act/'.$id.'";</script>'; 
            }
    }
}	     
?>
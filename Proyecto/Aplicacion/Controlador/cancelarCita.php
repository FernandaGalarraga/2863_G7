<?php 
require_once "../modelo/Conexion.php";
$cn=conectar();
$CODIGOCITA=$_POST['codigo_cita'];
$ESTADOCITA=$_POST['estado_cita'];

$sql="UPDATE `citamedica` 
SET `ESTADO` = '$ESTADOCITA',
`DISPONIBILIDADCITAMEDICA`='0'
WHERE `citamedica`.`CODIGOCITAMEDICA` = '$CODIGOCITA'";
if($cn->query($sql)){
    echo 'ok';
}else{
    echo 'nook';
}
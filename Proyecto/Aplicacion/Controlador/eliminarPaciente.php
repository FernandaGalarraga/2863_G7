<?php
     require_once "../modelo/Data.php";
     if(isset($_GET["id"])){
     $idUser=$_GET["id"];
     $del = new Data;
     $del->eliminarPaciente($idUser);
     }
?>
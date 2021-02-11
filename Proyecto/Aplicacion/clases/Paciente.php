<?php
include_once("Direccion.php");
class Paciente extends Direccion{
    public $CODIGO_PACIENTE;
    public $NOMBRE_PACIENTE;
    public $APELLIDO_PATERNO;
    public $APELLIDO_MATERNO;
    public $FECHANACIMIENTO_PACIENTE;
    public $TELEFONO_PACIENTE;
    public $GENERO_PACIENTE;
}
?>
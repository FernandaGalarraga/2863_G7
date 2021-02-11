<?php
    require_once "Conexion.php";
    require_once "../clases/Paciente.php";
    Class Data{
        private $cn;
        public function __construct(){
            $this->con=conectar();
        }
        public function listarPacientes(){
            $usuario=array();
            $sql="select CODIGOUSUARIO, NOMBREPACIENTE, APELLIDOPATERNO, APELLIDOMATERNO, TELEFONOPACIENTE from paciente";
            $res=$this->con->query($sql) or die($this->con->error);
            while($row=$res->fetch_assoc()){
                $paciente= new Paciente();
                $paciente->CODIGO_PACIENTE=$row['CODIGOUSUARIO'];
                $paciente->NOMBRE_PACIENTE=$row['NOMBREPACIENTE'];
                $paciente->APELLIDO_PATERNO=$row['APELLIDOPATERNO'];
                $paciente->APELLIDO_MATERNO=$row['APELLIDOMATERNO'];
                $paciente->TELEFONO_PACIENTE=$row['TELEFONOPACIENTE'];
                array_push($usuario, $paciente);
            }
            return $usuario;
        }
    }
?>
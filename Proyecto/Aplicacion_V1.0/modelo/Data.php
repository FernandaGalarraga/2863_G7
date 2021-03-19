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
            $sql="select p.CODIGOUSUARIO,p.NOMBREPACIENTE,p.APELLIDOPATERNO,p.APELLIDOMATERNO,p.TELEFONOPACIENTE,d.CODIGODIRECCION from paciente p, direccion d where p.codigousuario=d.codigousuario";
            $res=$this->con->query($sql) or die($this->con->error);
            while($row=$res->fetch_assoc()){
                $paciente= new Paciente();
                $paciente->CODIGO_PACIENTE=$row['CODIGOUSUARIO'];
                $paciente->NOMBRE_PACIENTE=$row['NOMBREPACIENTE'];
                $paciente->APELLIDO_PATERNO=$row['APELLIDOPATERNO'];
                $paciente->APELLIDO_MATERNO=$row['APELLIDOMATERNO'];
                $paciente->TELEFONO_PACIENTE=$row['TELEFONOPACIENTE'];
                $paciente->CODIGO_DIRECCION=$row['CODIGODIRECCION'];
                array_push($usuario, $paciente);
            }
            return $usuario;
        }

        public function detallePaciente($idPaciente){
            $sql = "select * from paciente p, direccion d where p.codigousuario='$idPaciente'
                    and p.codigousuario=d.codigousuario";
            $res=$this->con->query($sql) or die($this->con->error);
            $detalle=array();
            while($row=$res->fetch_assoc()){
                $det=new Paciente();
                $det->CODIGO_PACIENTE=$row['CODIGOUSUARIO'];
                $det->NOMBRE_PACIENTE=$row['NOMBREPACIENTE'];
                $det->APELLIDO_PATERNO=$row['APELLIDOPATERNO'];
                $det->APELLIDO_MATERNO=$row['APELLIDOMATERNO'];
                $det->FECHANACIMIENTO_PACIENTE=$row['FECHANACIMIENTOPACIENTE'];
                $det->TELEFONO_PACIENTE=$row['TELEFONOPACIENTE'];
                $det->GENERO_PACIENTE=$row['GENEROPACIENTE'];
                $det->CIUDAD_DIRECCION=$row['CIUDADDIRECCION'];
                $det->CALLE_DIRECCION=$row['CALLEDIRECCION'];
                $det->NUMERO_DIRECCION=$row['NUMERODIRECCION'];
                array_push($detalle, $det);
            }
            return $detalle;
        }

        public function eliminarPaciente($id){
            $sql = "delete direccion, paciente,usuario from direccion
                    inner join paciente
                    inner join usuario
                    where direccion.CODIGOUSUARIO=paciente.CODIGOUSUARIO
                    AND paciente.CODIGOUSUARIO=usuario.CODIGOUSUARIO
                    AND direccion.CODIGODIRECCION='$id'";
            if($this->con->query($sql)){
                echo '<script language="javascript">alert("Paciente eliminado exitosamente");</script>';
                echo '<script language="javascript">document.location="../php/ListarPaciente.php";</script>';
            }else{
                echo '<script language="javascript">alert("No se pudo eliminar");</script>';
                echo '<script language="javascript">document.location="../php/ListarPaciente.php";</script>';
            }	
        }
    }
?>
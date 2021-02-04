<?php
include_once("Usuario.php");
class Medico extends Usuario{
    private $NOMBRE_MEDICO;
    private $APELLIDO_MEDICO;
    private $ESPECIALIDAD_MEDICO;

    function __construct($cn){
		$this->con = $cn;
    }

    public function guardar_medico(){
			
		$this->NOMBRE_USUARIO = $_POST['nombreusuario'];
		$this->PASSWORD_USUARIO = $_POST['passwordusuario'];
		$this->TIPO_USUARIO= "Medico";		
		$this->NOMBRE_MEDICO = $_POST['nombremedico'];
        $this->APELLIDO_MEDICO = $_POST['apellidomedico'];
		$this->ESPECIALIDAD_MEDICO = $_POST['especialidad'];	

		$sql="insert into usuario
              values (NULL, '$this->NOMBRE_USUARIO', '$this->PASSWORD_USUARIO', '$this->TIPO_USUARIO')";     
        $res=$this->con->query($sql);   
        $sql2='SELECT * FROM `usuario` WHERE `NOMBREUSUARIO`="'.$this->NOMBRE_USUARIO.'" ';
        $resUser=$this->con->query($sql2);
        while($reg=$resUser->fetch_array()){
             $codUsuario= $reg[0];
        }
        $sql="insert into medico
              values ('$codUsuario', '$this->NOMBRE_MEDICO', '$this->APELLIDO_MEDICO','$this->ESPECIALIDAD_MEDICO')";
        $res=$this->con->query($sql);
        echo '<script language="javascript">alert("Usuario registrado correctamente");</script>';
        echo "<a href='../php/PaginaInicio.php'>REGRESAR</a>";					
										
	}

    

}
?>
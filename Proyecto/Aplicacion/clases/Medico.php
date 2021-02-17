<?php
include_once("Usuario.php");
class Medico extends Usuario{
    private $NOMBRE_MEDICO;
    private $APELLIDO_MEDICO;
    private $ESPECIALIDAD_MEDICO;
    private $DIAS_ATENCION;
    private $HORA_INICIO;
    private $HORA_FIN;


    

    function __construct($cn=NULL){
		$this->con = $cn;
    }

    public function getNombreMedico(){
			
      return $this->NOMBRE_MEDICO;	
      }
  
      public function getApellidoMedico(){
        
      return $this->APELLIDO_MEDICO;	
      }
      
      public function getEspecialidadMedico(){
        
      return $this->ESPECIALIDAD_MEDICO;	
      }
      
      public function getDiasAtencion(){
        
      return $this->DIAS_ATENCION;	
      }
      public function getHoraInicio(){
        
        return $this->HORA_INICIO;	
        }
      public function getHoraFin(){
        
          return $this->HORA_FIN;	
      }
	public function updateMedico(){
		$this->CODIGO_USUARIO = $_POST['CODIGOUSUARIO'];
		$this->NOMBRE_MEDICO = $_POST['NOMBREMEDICO'];
		$this->APELLIDO_MEDICO = $_POST['APELLIDOMEDICO'];
		$this->ESPECIALIDAD_MEDICO = $_POST['ESPECIALIDADMEDICO'];
		
		$sql = "UPDATE medico SET
			CODIGOUSUARIO='$this->CODIGO_USUARIO',
			NOMBREMEDICO='$this->NOMBRE_MEDICO',
			APELLIDOMEDICO='$this->APELLIDO_MEDICO',
			ESPECIALIDADMEDICO='$this->ESPECIALIDAD_MEDICO',
			WHERE CODIGOUSUARIO=$this->CODIGO_USUARIO;";
		
		if($this->con->query($sql)){
			echo '<script language="javascript">alert("Se actualizo correctamente");</script>';
		}else{
			echo '<script language="javascript">alert("No se pudo actualizar");</script>';
		}			
	}
	
    public function listarMedico(){
      $usuario=array();
      $sql="SELECT m.codigousuario,m.nombremedico,m.apellidomedico,m.especialidadmedico,h.diaatencionhorario 
      FROM medico m,horarioatencion h WHERE m.codigousuario=h.codigousuario";
      $res=$this->con->query($sql) or die($this->con->error);
      while($row=$res->fetch_assoc()){
          $medico= new Medico();
          $medico->CODIGO_USUARIO=$row['codigousuario'];
          $medico->NOMBRE_MEDICO=$row['nombremedico'];
          $medico->APELLIDO_MEDICO=$row['apellidomedico'];
          $medico->ESPECIALIDAD_MEDICO=$row['especialidadmedico'];
          $medico->DIAS_ATENCION=$row['diaatencionhorario'];
          array_push($usuario, $medico);
      }
      return $usuario;
    }
    public function verMedico($id){
      $sql="SELECT m.codigousuario,m.nombremedico,m.apellidomedico,m.especialidadmedico,h.diaatencionhorario,
      h.horainicio,h.horafin 
      FROM medico m,horarioatencion h WHERE m.codigousuario=h.codigousuario AND m.codigousuario='$id'";
      $res=$this->con->query($sql) or die($this->con->error);
      while($row=$res->fetch_assoc()){
          $this->NOMBRE_MEDICO=$row['nombremedico'];
          $this->APELLIDO_MEDICO=$row['apellidomedico'];
          $this->ESPECIALIDAD_MEDICO=$row['especialidadmedico'];
          $this->DIAS_ATENCION=$row['diaatencionhorario'];
          $this->HORA_INICIO=$row['horainicio'];
          $this->HORA_FIN=$row['horafin'];
      }

      $html='
      <!-- LOGIN MODULE -->
      <div class="login">
          <div class="wrap">
              <!-- TOGGLE -->
              <div id="toggle-wrap">
                  <div id="toggle-terms">
                      <div id="cross">
                          <span></span>
                          <span></span>
                      </div>
                  </div>
              </div>
              <!-- SLIDER -->
              <div class="content">
                  <!-- LOGO -->
                  <div class="logo">
                      <a href="#"><img class="logoim" src="../img/logo.png" alt=""></a>
                  </div>
                  <!-- SLIDESHOW -->
                  <div id="paciente">
                      <div class="one">
                      <a href="../php/ListarMedico.php"><input type="image" class="regresar" src="../img/salir.png"></a>
                      </div>
                  </div>
              </div>
              <!-- LOGIN FORM -->
              <div class="user">
              <h3 class="register-heading">ID MEDICO: '.$id.'</h3><br>
              <table class="table text-center" cellpadding="6" border="2" align="center">';
                      $html.='
                      <tr class="table-secondary">
                          <th class="bg-info">NOMBRE</th>
                          <td>'.$this->NOMBRE_MEDICO.'</td>
                      </tr>
                      <tr class="table-secondary">
                          <th class="bg-info">APELLIDOS</th>
                          <td>'.$this->APELLIDO_MEDICO.'</td>
                      </tr>
                      <tr class="table-secondary">
                          <th class="bg-info">ESPECIALIDAD</th>
                          <td>'.$this->ESPECIALIDAD_MEDICO.'</td>
                      </tr>
                      <tr class="table-secondary">
                          <th class="bg-info">DIAS ATENCION</th>
                          <td>'.$this->DIAS_ATENCION.'</td>
                      </tr>
                      <tr class="table-secondary">
                          <th class="bg-info">HORA DE ATENCION</th>
                          <td>De: '.$this->HORA_INICIO.' a '.$this->HORA_FIN.' </td>
                      </tr>
                      ';
                  
              $html.= '
              </table><br>
              </div>
          </div>
      </div>';
    echo $html;

    }

    public function guardar_medico(){
			
		$this->NOMBRE_USUARIO = $_POST['nombreusuario'];
		$this->PASSWORD_USUARIO = $_POST['passwordusuario'];
		$this->TIPO_USUARIO= "Medico";		
		$this->NOMBRE_MEDICO = $_POST['nombremedico'];
    $this->APELLIDO_MEDICO = $_POST['apellidomedico'];
		$this->ESPECIALIDAD_MEDICO = $_POST['especialidad'];
    $this->DIAS_ATENCION = $_POST['horarioatencion'];	
    $this->HORA_INICIO= $_POST['horainicio'];
    $this->HORA_FIN = $_POST['horafin'];

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
        $sql="insert into horarioatencion
              values (NULL,'$codUsuario', '$this->HORA_INICIO', '$this->HORA_FIN','$this->DIAS_ATENCION')";
        $res=$this->con->query($sql);
        echo '<script language="javascript">alert("Usuario registrado correctamente");</script>';
        echo "<a href='../php/Administrador.php'>REGRESAR</a>";					
										
	}
  public function eliminarMedico($id){
  
    $sql="DELETE FROM `horarioatencion` WHERE `horarioatencion`.`CODIGOUSUARIO` = '$id'";
    $this->con->query($sql);
    $sql="DELETE FROM `medico` WHERE `medico`.`CODIGOUSUARIO` ='$id'";
    $this->con->query($sql);
    $sql="DELETE FROM `usuario` WHERE `usuario`.`CODIGOUSUARIO` = '$id'";
    $this->con->query($sql);
    if($this->con->query($sql)){
        echo '<script language="javascript">alert("Medico eliminado exitosamente");</script>';
        echo '<center>
        <tr>
        <th><a href="../php/ListarMedico.php">Regresar</a></th>
    </tr></center>';
    }else{
        echo '<script language="javascript">alert("No se pudo eliminar");</script>';
        echo '<center>
            <tr>
            <th><a href="../php/ListarMedico.php">Regresar</a></th>
            </tr></center>';
    }	
}

    

}
?>

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
		$this->DIAS_ATENCION = $_POST['DIAATENCIONHORARIO'];
    	$this->HORA_INICIO= $_POST['HORAINICIO'];
    	$this->HORA_FIN = $_POST['HORAFIN'];
		session_start();
        $id=$_SESSION["codigo"];
	$sql = "update medico m INNER JOIN horarioatencion h ON h.CODIGOUSUARIO=m.CODIGOUSUARIO set 
				m.NOMBREMEDICO='$this->NOMBRE_MEDICO',
                		m.APELLIDOMEDICO='$this->APELLIDO_MEDICO',
                		m.ESPECIALIDADMEDICO='$this->ESPECIALIDAD_MEDICO',
               			h.HORAINICIO='$this->HORA_INICIO',
                		h.HORAFIN='$this->HORA_FIN',
                		h.DIAATENCIONHORARIO='$this->DIAS_ATENCION'
                		WHERE m.CODIGOUSUARIO='$this->CODIGO_USUARIO'";
		
		if($this->con->query($sql)){
			echo '<script language="javascript">alert("Se actualizo correctamente");</script>';
           		echo '<script language="javascript">document.location="../Controlador/controllerMedico.php?d=act/'.$id.'";</script>';
		}else{
			echo '<script language="javascript">alert("No se pudo actualizar");</script>';
            		echo '<script language="javascript">document.location="../Controlador/controllerMedico.php?d=act/'.$id.'";</script>';
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
       
        $nomUser=$this->NOMBRE_USUARIO;
        if(!$this->verificarUsuario($nomUser)) {
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
        echo '<script language="javascript">document.location="../php/Administrador.php";</script>';
    }else{
        echo '<script language="javascript">alert("El usuario que ingreso, ya existe");</script>';
        echo '<script language="javascript">document.location="../php/PaginaRegistrarMedico.php";</script>';

    }				
										
	}

	public function actualizarMedico($id){
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
       $op="actualizar";
      $html='
      <!DOCTYPE html>
        <head>
        <script type="text/javascript" src="../js/validaciones.js"></script>
        <script type="text/javascript" src="../js/validarFecha.js"></script>
        <script type="text/javascript" src="../js/validarLetras.js"></script>
        <script type="text/javascript" src="../js/validarTelefono.js"></script>
        <script type="text/javascript" src="../js/validarPass.js"></script>
        <script type="text/javascript" src="../js/validarHora.js"></script>
        <script type="text/javascript" src="../js/popup.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/estiloac.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <link rel="stylesheet" href="../css/estilos.css">
        </head>
        <body>
      <div class="container register">
                    <div class="row">
                        <div class="col-md-3 register-left">
                        <a href="../php/Medico.php"><input type="image" class="regresar" src="../img/salir.png"></a>
                            <img src="../img/user.png" alt=""/>
                            <div class="contenedor">
                                <button class="btn-abrir-popup" id="btn-abrir-popup">Cambiar contraseña</button>
                            </div>
                        </div>
                        <div class="col-md-9 register-right">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <h3 class="register-heading">Perfil</h3><br>
                                    <div class="register-form">
                                        <form name="medico" action="../Controlador/controllerMedico.php" method="post" onsubmit="return formValidationActMedico();" onclick="this.form.submit()">
                                                    </tr>
                                                    <input type="hidden" id="titulo" name="CODIGOUSUARIO" value="'.$id.'" required>
                                                    <input type="hidden" name="op"  value="' . $op  . '">
                                                    <tr>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="staticEmail">Nombre</label>
                                                            <input type="text" class="form-control" id="nombre" name="NOMBREMEDICO" value="'.$this->NOMBRE_MEDICO.'" onchange="formValidationActMedico()" tabindex="1" required/>
                                                            <p id="p1"></p>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="staticEmail">Apellido</label>
                                                            <input type="text" class="form-control" id="apellido" name="APELLIDOMEDICO" value="'.$this->APELLIDO_MEDICO.'" onchange="formValidationActMedico()" tabindex="2" required/>
                                                            <p id="p2"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="staticEmail">Especialidad</label>
                                                            <input type="text" class="form-control" id="especialidad" name="ESPECIALIDADMEDICO" value="'.$this->ESPECIALIDAD_MEDICO.'" onchange="formValidationActMedico()" tabindex="3" required/>
                                                            <p id="p3"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="staticEmail">Día Atención</label>
                                                            <select class="form-control" name="DIAATENCIONHORARIO" tabindex="4">
                                                                <option value="Lunes-Viernes">Lunes-Viernes</option>
                                                                <option value="Sabado-Domingo">Sabado-Domingo</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="staticEmail">Hora Inicio</label>
                                                            <input type="time" class="form-control" name="HORAINICIO" id="hinicio" value="'.$this->HORA_INICIO.'" onchange="formValidationActMedico()" tabindex="5" required/>
                                                            <p id="p4"></p>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="staticEmail">Hora Fin</label>
                                                            <input type="time" class="form-control" name="HORAFIN" id="hfinal" value="'.$this->HORA_FIN.'" onchange="formValidationActMedico()" tabindex="6" required/>
                                                            <p id="p5"></p>
                                                        </div>
                                                    </div>
                                                <input type="submit" class="btnRegister" link name="Guardar" value="Actualizar"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>';
    echo $html;
    ?>
    <div class="contenedor">
                <div class="overlay" id="overlay">
                    <div class="popup" id="popup">
                        <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                        <h3>Cambiar contraseña</h3>
                        <form action="../Controlador/actualizarContrasenia.php" method="post" onsubmit="return formValidationActPaciente();" onclick="this.form.submit()">
                            <div class="contenedor-inputs">
                                <?php
                                    $html='<input type="hidden" name="codigousuario" value="'.$id.'">';
                                    echo $html;
                                ?>
                                <input type="password" name="opassword" placeholder="Contraseña antigua" tabindex="9" required>
                                <input id="password" name="npassword" type="password" placeholder="Contraseña nueva" tabindex="10" required>
                                <input id="cpassword" name="cpassword" type="password" placeholder="Confirmar contraseña" onchange="formValidationPassword()" tabindex="11" required>
                                <p id="p7"></p>
                            </div>
                            <input type="submit" name="re_pass" class="btn-submit" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="../js/popup.js"></script>
            </body>
            </html>
    <?php
    }
	
  public function eliminarMedico($id){
  
    $sql="DELETE FROM `horarioatencion` WHERE `horarioatencion`.`CODIGOUSUARIO` = '$id'";
    $this->con->query($sql);
    $sql="DELETE FROM `medico` WHERE `medico`.`CODIGOUSUARIO` ='$id'";
    $this->con->query($sql);
    $sql="DELETE FROM `usuario` WHERE `usuario`.`CODIGOUSUARIO` = '$id'";
    $this->con->query($sql);
    if($this->con->query($sql)){
        echo '<script language="javascript">alert("Médico eliminado exitosamente");</script>';
        echo '<script language="javascript">document.location="../php/ListarMedico.php";</script>';
    }else{
        echo '<script language="javascript">alert("No se pudo eliminar");</script>';
        echo '<script language="javascript">document.location="../php/ListarMedico.php";</script>';
    }	
}
private function verificarUsuario($usuario){
    $sql="select * from usuario where NOMBREUSUARIO='$usuario'";
    $res=$this->con->query($sql);
    if($res->num_rows>0){
        return true;
    }else{
        return false;
    }
}



    

}
?>

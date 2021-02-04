<?php
class Usuario{

    protected $CODIGO_USUARIO;
    protected  $NOMBRE_USUARIO;
    protected $PASSWORD_USUARIO;
    protected   $TIPO_USUARIO;

    function __construct($CODIGO_USUARIO, $NOMBRE_USUARIO, $PASSWORD_USUARIO,$TIPO_USUARIO) {
        $this->CODIGO_USUARIO = $CODIGO_USUARIO;
        $this->NOMBRE_USUARIO = $NOMBRE_USUARIO;
        $this->PASSWORD_USUARIO = $PASSWORD_USUARIO;
        $this->TIPO_USUARIO = $TIPO_USUARIO;
    }

    public function getCodigoUsuario(){
			
		return $this->CODIGO_USUARIO;	
    }

    public function getNombreUsuario(){
			
		return $this->NOMBRE_USUARIO;	
    }
    
    public function getPasswordUsuario(){
			
		return $this->PASSWORD_USUARIO;	
    }
    
    public function getTipoUsuario(){
			
		return $this->TIPO_USUARIO;	
    }
    
    

}

?>
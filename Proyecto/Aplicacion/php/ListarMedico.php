<!DOCTYPE html><html class=''>
<head>
<meta charset='UTF-8'><meta name="robots">
<title>Pacientes</title>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
<link rel='stylesheet' href='../css/estiloAgenda.css'>
</head>
<body>
<?php
session_start();
require_once("../clases/Medico.php");
require_once "../modelo/Conexion.php";
$cn=conectar();
$html='
<div class="login"><br><br>
<h2 class="text-center">MÉDICOS</h2><br>
<div style="clear:both"></div><br />  
   <div id="order_table">  
      <table class="table" id="cita" align="center">  
       <tr>  
         <th width="20%" class="text-center" id="head">NOMBRE</th>  
         <th width="20%" class="text-center" id="head">ESPECIALIDAD</th>    
         <th width="20%" class="text-center" id="head" colspan="2">ACCIÓN</th>
       </tr>';
                $m = new Medico($cn);
                $medico=$m->listarMedico();
                foreach($medico as $me){
                    $html.='
                        <tr">
                            <td class="text-center" id="tabla">'.$me->getNombreMedico().' '.$me->getApellidoMedico().'</td>
                            <td class="text-center" id="tabla">'.$me->getEspecialidadMedico().'</td>';
                            $usuario=$_SESSION["usuario"];
                            if($usuario=="adm"){
                                $html.='<td  class="text-center" id="tabla">
                                <a class="btn btn-success" href="../Controlador/controllerMedico.php?d=see/'.$me->getCodigoUsuario().'">Detalle</a>
                                </td>
                                <td  class="text-center" id="tabla">
                                    <a class="btn btn-danger" href="../Controlador/controllerMedico.php?d=del/'.$me->getCodigoUsuario().'">Eliminar</a>
                                </td>';
                            }
                        $html.='</tr>';
                }
                $html.= '</table>
                </div>
            </div>
        </div>';
        echo $html;
?>
</body>
</html>
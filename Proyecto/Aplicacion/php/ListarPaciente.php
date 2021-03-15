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
require_once("../modelo/Data.php");
$html='
<div class="login"><br><br>
  <h2 class="text-center">PACIENTES</h2><br>
  <div style="clear:both"></div><br />  
     <div id="order_table">  
        <table class="table" id="cita" align="center">  
         <tr>  
           <th width="20%" class="text-center" id="head">NOMBRE</th>  
           <th width="20%" class="text-center" id="head">APELLIDO</th>  
           <th width="15%" class="text-center" id="head">TELÉFONO</th>   
           <th width="20%" class="text-center" id="head" colspan="2">ACCIÓN</th>
         </tr>';
         $p = new Data;
         $paciente=$p->listarPacientes();
         foreach($paciente as $pa){
             $html.='
                 <tr>
                     <td class="text-center" id="tabla"> '.$pa->NOMBRE_PACIENTE.'</td>
                     <td class="text-center" id="tabla">'.$pa->APELLIDO_PATERNO." ".$pa->APELLIDO_MATERNO.'</td>
                     <td class="text-center" id="tabla">'.$pa->TELEFONO_PACIENTE.'</td>';
                     //session_start();
                     $usuario=$_SESSION["usuario"];
                     if($usuario=="adm"){
                         $html.='<td class="text-center" id="tabla">
                         <a class="btn btn-success" href="../Controlador/detallePaciente.php?id='.$pa->CODIGO_PACIENTE.'">Detalle</a>
                         </td>
                         <td class="text-center" id="tabla">
                             <a class="btn btn-danger" href="../Controlador/eliminarPaciente.php?id='.$pa->CODIGO_DIRECCION.'">Eliminar</a>
                         </td>';
                     }else{
                         $html.='
                         <td id="tabla">
                            <center>
                             <a class="btn btn-success" href="../Controlador/detallePaciente.php?id='.$pa->CODIGO_PACIENTE.'">Detalle</a>
                            </center>
                        </td>';
                     }
                 $html.='</tr>';
         }
         $html.= '</table>
         </div>
         </div>';
         echo $html;
?>
     </div>  
   </div>
</div>
</body>
</html>
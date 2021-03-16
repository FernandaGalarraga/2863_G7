<!DOCTYPE html><html class=''>
<head>
<meta charset='UTF-8'><meta name="robots">
<title>Pacientes</title>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
<link rel='stylesheet' href='../css/estiloAgenda.css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
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
                                $html.='<td class="text-center" id="tabla">
                                <input type="button" name="view" value="Detalle" id='.$me->getCodigoUsuario().' class="btn btn-success view_data" />
                                </td>
                                <td class="text-center" id="tabla">
                                    <a class="btn btn-danger" href="#">Eliminar</a>
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
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">   
                     <h4 class="modal-title">Médico</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>  
                </div>  
           </div>  
      </div>  
 </div>
 <script>
 $(document).ready(function(){
  $(".view_data").click(function(){
    var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../Controlador/detalleMedico.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           } 
  });
});
 
 </script>
</body>
</html>
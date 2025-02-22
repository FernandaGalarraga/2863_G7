<!DOCTYPE html><html class=''>
<head>
<meta charset='UTF-8'><meta name="robots">
<title>Pacientes</title>    
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
<link rel='stylesheet' href='../css/estiloAgenda.css'>
<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
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
                         <input type="button" name="view" value="Detalle" id='.$pa->CODIGO_PACIENTE.' class="btn btn-success view_data" />
                         </td>
                         <td class="text-center" id="tabla">
                             <a class="btn btn-danger" href="#">Eliminar</a>
                         </td>';
                     }else{
                         $html.='
                         <td id="tabla">
                            <center>
                            <input type="button" name="view" value="Detalle" id='.$pa->CODIGO_PACIENTE.' class="btn btn-success view_data" />
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
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">   
                     <h4 class="modal-title">Paciente</h4>  
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
                     url:"../Controlador/detallePaciente.php",  
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

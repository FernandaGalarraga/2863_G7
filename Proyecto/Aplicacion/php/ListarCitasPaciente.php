<!DOCTYPE html><html class=''>
<head>
<meta charset='UTF-8'><meta name="robots">
<title>Citas medicas</title>  
 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
<link rel='stylesheet' href='../css/estiloAgenda.css'> 
<script type="text/javascript" src="../js/fechaAgenda.js"></script>
<link rel='stylesheet' href='../css/estiloag.css'>
<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<body>
<?php
require_once "../modelo/Conexion.php";
session_start();
$cn=conectar();
$id=$_SESSION['codigo'];
date_default_timezone_set("America/Guayaquil");
$date = date('Y-m-d');
$hora = date('H:i:s');
$sql="SELECT c.codigocitamedica, concat_ws(' ', m.NOMBREMEDICO, m.APELLIDOMEDICO) as 'Medico', c.tipoconsulta, c.fechaconsulta, c.horaconsulta,c.estado 
      FROM citamedica c 
      INNER JOIN medico m 
      ON c.MED_CODIGOUSUARIO=m.CODIGOUSUARIO
      INNER JOIN paciente p
      ON c.CODIGOUSUARIO=p.CODIGOUSUARIO
      WHERE p.CODIGOUSUARIO='$id'
      AND c.fechaconsulta='$date'
      AND c.horaconsulta>'$hora'
      AND c.estado!='Cancelado'
      
	order by c.fechaconsulta desc";
$res=$cn->query($sql) or die($con->error);
?>
<div class="login">
<h2 class="text-center">CITAS MÉDICAS</h2><br>
  <div class="col-md-6">  
    <h>Fecha inicio:</h>
   <input type="date" name="from_date" id="from_date" class="text-center form-control" placeholder="Fecha inicio" />  
  </div>  
  <div class="col-md-6"> 
    <h>Fecha fin:</h>
   <input type="date" name="to_date" id="to_date" class="text-center form-control" placeholder="Fecha final" />  
  </div>
  <br><br><br><br>
  <div class="col-md-8">  
   <input type="button" name="filter" id="filter" value="BUSCAR" class="btn btn-success" />  
  </div>
  <div style="clear:both"></div><br />  
     <div id="order_table">  
        <table class="table table-striped" id="cita" align="center">  
         <tr class="table-info">  
           <th width="5%" class="text-center">ID</th>  
           <th width="20%" class="text-center">Médico</th>  
           <th width="20%" class="text-center">Consulta</th>  
           <th width="15%" class="text-center">Fecha</th>  
           <th width="12%" class="text-center">Hora</th>  
           <th width="20%" class="text-center" colspan='2'>Acción</th>
         </tr>  
         <?php  
           while($row = mysqli_fetch_array($res))  
           {  
           ?>  
           <tr>  
             <td class="text-center success"><?php echo $row["codigocitamedica"]; ?></td>  
             <td class="text-center success"><?php echo $row["Medico"]; ?></td>  
             <td class="text-center success"><?php echo $row["tipoconsulta"]; ?></td>  
             <td class="text-center success"><?php echo $row["fechaconsulta"]; ?></td>  
             <td class="text-center success"><?php echo $row["horaconsulta"]; ?></td>
             <?php
          $html='';
          if( $row["estado"]!='Cancelado'){
             $html.='<td class="text-center success">
             <input type="button" name="view" value="Actualizar" id='.$row["codigocitamedica"].' class="btn btn-success view_data" />
              </td>
              <td class="text-center success">
              <button onclick="alerta(this)" class="btn btn-danger" id='.$row["codigocitamedica"].'>Cancelar Cita</button>
              </td>';
           }else{
               $html.='<td class="text-center success">      
               Estado Cita:   
               </td>
               <td class="text-center success"> 
               '. $row["estado"].'
               </td>'
               ;
           }
              echo $html; 			 
             ?>		 
           </tr>  
           <?php  
           }  
           ?>  
        </table>  
     </div>  
   </div>
</div>

<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
               <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div> 
                <div class="modal-header">   
                     <h4 class="modal-title">Cita Medica</h4>  
                </div>  
                <div class="modal-body" id="editarCitaMedica">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>  
                </div>  
           </div>  
      </div>  
 </div>
 <script src="../js/accionesAgenda.js"></script>
 
 <script>
$(document).ready(function(){
  $(".view_data").click(function(){
    var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"../Controlador/editarCita.php",  
                     method:"POST",  
                     data:{cita_id:employee_id},  
                     success:function(data){  
                          $('#editarCitaMedica').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           } 
  });
});

 </script>

</body>
</html>

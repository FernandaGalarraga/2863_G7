<head>
<link rel='stylesheet' href='../css/estilop.css'>
</head>
<?php  
require_once "../modelo/Conexion.php"; 
session_start();
date_default_timezone_set("America/Guayaquil");
$diahoraActual=date('Y-m-d H:i:s');
$id=$_SESSION['codigo'];
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $cn=conectar(); 
      $output = '';  
      $sql = "  
         SELECT c.codigocitamedica, concat_ws(' ', m.NOMBREMEDICO, m.APELLIDOMEDICO) as 'Medico', c.tipoconsulta, c.fechaconsulta, c.horaconsulta, c.estado 
         FROM citamedica c 
         INNER JOIN medico m 
         ON c.MED_CODIGOUSUARIO=m.CODIGOUSUARIO
         INNER JOIN paciente p
         ON c.CODIGOUSUARIO=p.CODIGOUSUARIO
         WHERE p.CODIGOUSUARIO='$id'  
         AND c.fechaconsulta BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
         AND c.estado!='Cancelado'
      order by c.fechaconsulta desc";  
      $res=$cn->query($sql) or die($con->error); 
      $output .= '  
        <table class="table table-striped">  
        <tr>  
            <th width="5%" class="text-center">ID</th>  
            <th width="20%" class="text-center">Médico</th>  
            <th width="20%" class="text-center">Consulta</th>  
            <th width="15%" class="text-center">Fecha</th>  
            <th width="12%" class="text-center">Hora</th> 
            <th width="20%" class="text-center" colspan="2">Acción</th> 
        </tr> 
      ';  
      if(mysqli_num_rows($res) > 0)  
      {  
           while($row = mysqli_fetch_array($res))  
           {  
                $output .= '  
                     <tr>  
                          <td class="text-center success">'. $row["codigocitamedica"] .'</td>  
                          <td class="text-center success">'. $row["Medico"] .'</td>  
                          <td class="text-center success">'. $row["tipoconsulta"] .'</td>  
                          <td class="text-center success">'. $row["fechaconsulta"] .'</td>  
                          <td class="text-center success">'. $row["horaconsulta"] .'</td>';

                    $diaHoraCita=$row["fechaconsulta"].' '.$row["horaconsulta"];
                    if($diaHoraCita<=$diahoraActual || $row["estado"]=="Cancelado"){
                         $output.='<td class="text-center success">      
                         Estado Cita:   
                         </td>
                         <td class="text-center success"> 
                         '. $row["estado"].'
                         </td>'
                         ;
                         }else{
                         $output.='<td class="text-center success">
                         <input type="button" name="view" value="Actualizar" id='.$row["codigocitamedica"].' class="btn btn-success view_data" />
                         </td>
                         <td class="text-center success">
                         <button onclick="alerta(this)" class="btn btn-danger" id='.$row["codigocitamedica"].'>Cancelar Cita</button>
                         </td>';
                         }
                     $output.='</tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
           <p id="texto1" class="text-center" colspan="5">No hay citas médicas agendadas en esta fecha</p>  
           ';  
      }  
      $output .= '</table>';  
      $output.='
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
           if(employee_id != "")  
           {  
                $.ajax({  
                     url:"../Controlador/editarCita.php",  
                     method:"POST",  
                     data:{cita_id:employee_id},  
                     success:function(data){  
                          $("#editarCitaMedica").html(data);  
                          $("#dataModal").modal("show");  
                     }  
                });  
           } 
  });
});
 </script>';


      echo $output;  
 }  
 ?>


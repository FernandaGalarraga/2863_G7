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
        SELECT c.codigocitamedica, concat_ws(' ', p.NOMBREPACIENTE, p.APELLIDOPATERNO) as 'Paciente', c.tipoconsulta, c.fechaconsulta, c.horaconsulta 
        FROM citamedica c 
        INNER JOIN paciente p 
        ON c.CODIGOUSUARIO=p.CODIGOUSUARIO
        INNER JOIN medico m
        ON c.MED_CODIGOUSUARIO=m.CODIGOUSUARIO
        WHERE m.CODIGOUSUARIO='$id' 
        AND c.fechaconsulta BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
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
                          <td class="text-center success">'. $row["Paciente"] .'</td>  
                          <td class="text-center success">'. $row["tipoconsulta"] .'</td>  
                          <td class="text-center success">'. $row["fechaconsulta"] .'</td>  
                          <td class="text-center success">'. $row["horaconsulta"] .'</td>';

                    $diaHoraCita=$row["fechaconsulta"].' '.$row["horaconsulta"];
                    if($diaHoraCita<=$diahoraActual){
                         $output.='<td class="text-center success">  
                         <button class="btn btn-success" disabled>Estado</button>                           
                         </td>';
                         }else{
                         $output.='<td class="text-center success">
                              <a class="btn btn-success" href="#">Estado</a>
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
      echo $output;  
 }  
 ?>
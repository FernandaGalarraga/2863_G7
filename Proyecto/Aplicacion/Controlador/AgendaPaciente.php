<head>
<link rel='stylesheet' href='../css/estilop.css'>
</head>
<?php  
require_once "../modelo/Conexion.php"; 
session_start();
date_default_timezone_set("America/Guayaquil");
$date = date('Y-m-d');
$hora = date('H:i:s');
$id=$_SESSION['codigo'];
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $cn=conectar(); 
      $output = '';  
      $sql = "  
         SELECT c.codigocitamedica, concat_ws(' ', m.NOMBREMEDICO, m.APELLIDOMEDICO) as 'Medico', c.tipoconsulta, c.fechaconsulta, c.horaconsulta 
         FROM citamedica c 
         INNER JOIN medico m 
         ON c.MED_CODIGOUSUARIO=m.CODIGOUSUARIO
         INNER JOIN paciente p
         ON c.CODIGOUSUARIO=p.CODIGOUSUARIO
         WHERE p.CODIGOUSUARIO='$id'  
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
                          <td class="text-center success">'. $row["Medico"] .'</td>  
                          <td class="text-center success">'. $row["tipoconsulta"] .'</td>  
                          <td class="text-center success">'. $row["fechaconsulta"] .'</td>  
                          <td class="text-center success">'. $row["horaconsulta"] .'</td>';
                          if($row['fechaconsulta']<=$date && $row['horaconsulta']<=$hora){
                         $output.='<td class="text-center success">
                              
                         </td>
                         <td class="text-center success">
                              
                         </td>';
                         }else{
                         $output.='<td class="text-center success">
                              <a class="btn btn-success" href="#">Actualizar</a>
                         </td>
                         <td class="text-center success">
                              <a class="btn btn-danger" href="#">Cancelar cita</a>
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
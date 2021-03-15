<!DOCTYPE html><html class=''>
<head>
<meta charset='UTF-8'><meta name="robots">
<title>Citas medicas</title>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
<link rel='stylesheet' href='../css/estiloAgenda.css'>
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
$sql="SELECT c.codigocitamedica, concat_ws(' ', m.NOMBREMEDICO, m.APELLIDOMEDICO) as 'Medico', c.tipoconsulta, c.fechaconsulta, c.horaconsulta 
      FROM citamedica c 
      INNER JOIN medico m 
      ON c.MED_CODIGOUSUARIO=m.CODIGOUSUARIO
      INNER JOIN paciente p
      ON c.CODIGOUSUARIO=p.CODIGOUSUARIO
      WHERE p.CODIGOUSUARIO='$id'
      AND c.fechaconsulta='$date'
      AND c.horaconsulta>'$hora'
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
			
             $html='<td class="text-center success">
                <a class="btn btn-success" href="#">Actualizar</a>
              </td>
              <td class="text-center success">
                <a class="btn btn-danger" href="#">Cancelar cita</a>
              </td>';
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
<script type="text/javascript" src="../js/fechaAgenda.js"></script>
</body>
</html>

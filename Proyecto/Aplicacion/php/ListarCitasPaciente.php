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
$date = date('Y-m-d');
$sql="SELECT c.codigocitamedica, concat_ws(' ', m.NOMBREMEDICO, m.APELLIDOMEDICO) as 'Medico', c.tipoconsulta, c.fechaconsulta, c.horaconsulta 
      FROM citamedica c 
      INNER JOIN medico m 
      ON c.MED_CODIGOUSUARIO=m.CODIGOUSUARIO
      INNER JOIN paciente p
      ON c.CODIGOUSUARIO=p.CODIGOUSUARIO
      WHERE p.CODIGOUSUARIO='$id'
      AND c.fechaconsulta='$date'";
$res=$cn->query($sql) or die($con->error);
?>
<div class="login">
  <div class="logo">
   <a href="#"><img class="logoim" src="../img/logo.png" alt=""></a>
  </div>
  <div class="salir">
   <a href="Paciente.php"><img class="logoim" src="../img/salir.png" alt=""></a>
  </div><br><br>
  <h2 class="text-center">CITAS MÉDICAS</h2><br>
  <div class="col-md-3">  
   <input type="text" name="from_date" id="from_date" class="form-control" placeholder="Fecha inicio" />  
  </div>  
  <div class="col-md-3">  
   <input type="text" name="to_date" id="to_date" class="form-control" placeholder="Fecha final" />  
  </div>  
  <div class="col-md-5">  
   <input type="button" name="filter" id="filter" value="BUSCAR" class="btn btn-success" />  
  </div>
  <div style="clear:both"></div><br />  
     <div id="order_table">  
        <table class="table table-striped" border="1" align="center">  
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
		/*
             $html='<td class="text-center success">
                <a class="btn btn-success" href="../Controlador/detallePaciente.php?id='.$pa->CODIGO_PACIENTE.'">Actualizar</a>
              </td>
              <td class="text-center success">
                <a class="btn btn-danger" href="../Controlador/eliminarPaciente.php?id='.$pa->CODIGO_DIRECCION.'">Cancelar cita</a>
              </td>';
              echo $html; 
			  */
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

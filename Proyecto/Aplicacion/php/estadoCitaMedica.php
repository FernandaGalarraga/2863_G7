<?php
if(isset($_POST["cita_id"]))  
{  
  require_once "../modelo/Conexion.php";
  $id=$_POST["cita_id"];

  $con=conectar();
  $sql="SELECT c.codigocitamedica, c.codigousuario, c.med_codigousuario, concat_ws(' ', p.NOMBREPACIENTE, p.APELLIDOPATERNO) as 'Paciente', c.tipoconsulta, c.fechaconsulta, c.horaconsulta 
        FROM citamedica c 
        INNER JOIN paciente p 
        ON c.CODIGOUSUARIO=p.CODIGOUSUARIO
        INNER JOIN medico m
        ON c.MED_CODIGOUSUARIO=m.CODIGOUSUARIO
        WHERE c.CODIGOCITAMEDICA='.$id.'";
  $res = $con->query($sql);
  while($row = $res->fetch_assoc()){
      $CODIGOCITAMEDICA=$row['codigocitamedica'];
      $CODIGOPACIENTE=$row['codigousuario'];
      $CODIGOMEDICO=$row['med_codigousuario'];
      $NOMBRE_PACIENTE=$row['Paciente'];
      $TIPOCONSULTA=$row['tipoconsulta'];
      $FECHACONSULTA=$row['fechaconsulta'];
      $HORACONSULTA=$row['horaconsulta'];
    }

$html='

<form action="../Controlador/editarEstado.php" method="post" onsubmit="return formValidationAgenda();" onclick="this.form.submit()" id="formAgendar2">
  </tr>
    <input type="hidden" id="titulo" name="CODIGOCITAMEDICA" value="'.$id.'" required>
    <input type="hidden" id="titulo" name="CODIGOUSUARIO" value="'.$CODIGOPACIENTE.'" required>
    <input type="hidden" id="titulo" name="MED_CODIGOUSUARIO" value="'.$CODIGOMEDICO.'" required>
  <tr>
  <div class="form-row">
        <div class="form-group col-md-12">
        <h5>Médico</h5>
            <input type="text" name="nombrepaciente" class="form-control" value="'.$NOMBRE_PACIENTE.'" disabled/>
        </div> 
  </div><br>
  <div class="form-row">
        <div class="form-group col-md-12">
        <h5>Tipo de consulta</h5>
            <input type="text" name="TIPOCONSULTA" class="form-control" value="'.$TIPOCONSULTA.'" disabled/>
        </div>  
  </div><br>
  <div class="form-row">
        <div class="form-group col-md-12">
          <h5>Fecha</h5>
          <input type="text" name="FECHACONSULTA" value="'.$FECHACONSULTA.'" class="form-control form-control-lg" id="fechaConsulta" disabled/>
          <p id="p1"></p>
        </div>
  </div><br>
  <div class="form-row">
      <div class="form-group col-md-12">
        <h5>Hora </h5> 
        <input type="text" name="HORACONSULTA" value="'.$HORACONSULTA.'" class="form-control form-control-lg" id="fechaConsulta" disabled/>
      </div>
  </div><br>
  <div class="form-row">
      <div class="form-group col-md-12">
        <h5>Estado cita</h5> 
        <select class="text-center form-control form-control-lg" name="ESTADO" required>
        <option value="">--Seleccionar--</option>
        <option>Puntual</option>
        <option>Atraso</option>
        <option>Inasistencia</option>
        </select>
       
      </div>
  </div><br>
  <center>
  <input type="submit" class="btn btn-success" link  value="Guardar"/>
  </center>
</form>';


echo $html;
}
?> 


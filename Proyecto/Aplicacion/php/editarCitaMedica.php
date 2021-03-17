<?php
if(isset($_POST["employee_id"]))  
{  
  require_once "../modelo/Conexion.php";
  $id=$_POST["employee_id"];

  function get_combo_db($tabla,$valor,$etiqueta, $etiqueta1, $nombre){
    $con=conectar();
    $html = '<select class="text-center form-control form-control-lg" name="' . $nombre . '" id="cbx_Medico" required>';
    $sql = "SELECT $valor,$etiqueta, $etiqueta1 FROM $tabla;";
    $res = $con->query($sql);
    while($row = $res->fetch_assoc()){
        $html .='<option value="' . $row[$valor] . '">' . $row[$etiqueta] . " " . $row[$etiqueta1] . '</option>' . "\n";
    }
    $html .= '</select>';
    return $html;
  }
  
$html='<form action="../Controlador/agendarCita.php" method="post" onsubmit="return formValidationAgenda();" onclick="this.form.submit()" id="formAgendar">
  </tr>
    <input type="hidden" id="titulo" name="CODIGOUSUARIO" value="'.$id.'" required>
  <tr>
  <div class="form-row">
  <div class="form-group col-md-9">
  <h5><strong>Médico</strong></h5>
    '.get_combo_db("medico","codigousuario","nombremedico", "apellidomedico", "codigousuario").'
  </div>
</div><br>
      <div class="form-row">
        <div class="form-group col-md-9">
          <h5>Fecha</h5>
          <input type="date" class="text-center form-control form-control-lg" id="fechaConsulta" name="FECHACONSULTA" onchange="formValidationAgenda()" tabindex="1" required/>
          <p id="p1"></p>
        </div>
        <div class="form-group col-md-9">
        <h5>Seleccione una hora</h5> 
          <select class="text-center form-control form-control-lg" name="cbx_horaMedico" id="cbx_horaMedico"></select>
        </div>
      </div><br>

      
      <div class="form-row">
        <div class="form-group col-md-9">
        <h5>Tipo de consulta</h5>
          <select class="text-center form-control form-control-lg" name="TIPOCONSULTA" required>
            <option value="">--Seleccionar--</option>
            <option value="Audiometria en cabina">Audiometría en cabina</option>
            <option value="Espirometria">Espirometría</option>
            <option value="Electrocardiograma">Electrocardiograma</option>
            <option value="Holter M.A.P.A">Holter M.A.P.A</option>
            <option value="Ergometria">Ergometría</option>
          </select>
        </div>
      </div>
      <center>
  <input type="submit" class="btnAgendamiento" link  value="Agendar"/>
  </center>
</form>';

echo $html;
}
?> 
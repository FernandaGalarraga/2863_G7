<!DOCTYPE html>
<head>
<meta charset='UTF-8'><meta name="robots" content="noindex">
<script type="text/javascript" src="../js/validaciones.js"></script>
<script type="text/javascript" src="../js/validarFechaAgenda.js"></script>
<script type="text/javascript" src="../js/validarHora.js"></script>
<link rel='stylesheet' href='../css/estiloag.css'>
<link rel="stylesheet" href="../css/bootstrap.css" type="text/css"/>
</head>
<body>
<?php
  require_once "../modelo/Conexion.php";
  session_start();
  $id=$_SESSION['codigo'];
  function get_combo_db($tabla,$valor,$etiqueta, $etiqueta1, $nombre, $defecto){
    $con=conectar();
    $html = '<select class="form-control form-control-lg" name="' . $nombre . '" required>';
    $sql = "SELECT $valor,$etiqueta, $etiqueta1 FROM $tabla;";
    $res = $con->query($sql);
    while($row = $res->fetch_assoc()){
        $html .= ($defecto == $row[$valor])?'<option value="' . $row[$valor] . '" selected>' . $row[$etiqueta] ." ".$row[$etiqueta1]. '</option>' . "\n":'<option value="' . $row[$valor] . '">' . $row[$etiqueta] . " " . $row[$etiqueta1] . '</option>' . "\n";
    }
    $html .= '</select>';
    return $html;
  }
$html.='<form action="../Controlador/agendarCita.php" method="post" onsubmit="return formValidationAgenda();" onclick="this.form.submit()">
  </tr>
    <input type="hidden" id="titulo" name="CODIGOUSUARIO" value="'.$id.'" required>
  <tr>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label class="texto-agenda" for="exampleInputEmail1">Fecha</label>
          <input type="date" class="form-control form-control-lg" id="fecha" name="FECHACONSULTA" onchange="formValidationAgenda()" tabindex="1" required/>
          <p id="p1"></p>
        </div>
        <div class="form-group col-md-6">
          <label class="texto-agenda" for="staticEmail">Hora</label>
          <input type="time" class="form-control" id="hora" name="HORACONSULTA" onchange="formValidationAgenda()" tabindex="2" required/>
          <p id="p2"></p>
        </div>
      </div><br>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label class="texto-agenda" for="staticEmail">Médico</label>
          '.get_combo_db("medico","codigousuario","nombremedico", "apellidomedico", "codigousuario", $idMedico).'
        </div>
      </div><br>
      <div class="form-row">
        <div class="form-group col-md-12">
          <label class="texto-agenda" for="staticEmail">Tipo de consulta</label>
          <select class="form-control form-control-lg" name="TIPOCONSULTA" required>
            <option value="">--Seleccionar--</option>
            <option value="Audiometria en cabina">Audiometría en cabina</option>
            <option value="Espirometria">Espirometría</option>
            <option value="Electrocardiograma">Electrocardiograma</option>
            <option value="Holter M.A.P.A">Holter M.A.P.A</option>
            <option value="Ergometria">Ergometría</option>
          </select>
        </div>
      </div>
  <input type="submit" class="btnRegister" link  value="Guardar"/>
</form>';
echo $html;
?>                               
</body>
</html>


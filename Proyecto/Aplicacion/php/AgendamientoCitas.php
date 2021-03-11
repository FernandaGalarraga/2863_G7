<!DOCTYPE html>
<head>
<meta charset='UTF-8'><meta name="robots" content="noindex">
<script type="text/javascript" src="../js/validaciones.js"></script>
<script type="text/javascript" src="../js/validarFechaAgenda.js"></script>
<script type="text/javascript" src="../js/validarHora.js"></script>
<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>

<link rel='stylesheet' href='../css/estiloag.css'>
<link rel="stylesheet" href="../css/bootstrap.css" type="text/css"/>
</head>

<script language="javascript">

			$(document).ready(function(){
				$("#cbx_Medico").change(function () {
         $("#fechaConsulta").val('');

				})
			});
      

      $(document).ready(function(){
        const $fechaConsulta=$("#fechaConsulta");

				$("#fechaConsulta").change(function () {
					$('#cbx_horaMedico').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_Medico option:selected").each(function () {
						CODIGOUSUARIO = $(this).val();
						$.post("../modelo/obtenerHoraMedico.php", { CODIGOUSUARIO: CODIGOUSUARIO,FECHACONSULTA: $fechaConsulta.val()}, function(data){
							$("#cbx_horaMedico").html(data);
						});            
					});
				})
			});
</script>

<body>
<?php
  require_once "../modelo/Conexion.php";
  session_start();
  $id=$_SESSION['codigo'];
  function get_combo_db($tabla,$valor,$etiqueta, $etiqueta1, $nombre){
    $con=conectar();
    $html = '<select class="form-control form-control-lg" name="' . $nombre . '" id="cbx_Medico" required>';
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
  <div class="form-group col-md-12">
    <label class="texto-agenda" for="staticEmail">Médico</label>
    '.get_combo_db("medico","codigousuario","nombremedico", "apellidomedico", "codigousuario").'
  </div>
</div><br>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label class="texto-agenda" for="exampleInputEmail1">Fecha</label>
          <input type="date" class="form-control form-control-lg" id="fechaConsulta" name="FECHACONSULTA" onchange="formValidationAgenda()" tabindex="1" required/>
          <p id="p1"></p>
        </div>
        <div class="form-group col-md-6">
          <label class="texto-agenda" for="staticEmail">Seleccione una hora</label>      
          <select  class="form-control form-control-lg" name="cbx_horaMedico" id="cbx_horaMedico"></select>
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
  <input type="submit" class="btnRegister" link  value="Agendar"/>
</form>';
echo $html;
?>                               
</body>
</html>


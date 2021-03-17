<?php
if(isset($_POST["cita_id"]))  
{  
  require_once "../modelo/Conexion.php";
  $id=$_POST["cita_id"];



  function get_combo_db($tabla,$valor,$etiqueta, $etiqueta1, $nombre,$codigoMedico){
    $con=conectar();
    $html = '<select class="text-center form-control form-control-lg" name="' . $nombre . '" id="cbx_Medico2" required>';
    $sql = "SELECT $valor,$etiqueta, $etiqueta1 FROM $tabla;";
    $res = $con->query($sql);
    while($row = $res->fetch_assoc()){
        if($codigoMedico==$row[$valor]){
        $html .='<option value="' . $row[$valor] . '" selected="selected">' . $row[$etiqueta] . " " . $row[$etiqueta1] . '</option>' . "\n";

        }else{
        $html .='<option value="' . $row[$valor] . '">' . $row[$etiqueta] . " " . $row[$etiqueta1] . '</option>' . "\n";
        } 
    }

    $html .= '</select>';
    return $html;
  }
  
  $con=conectar();
  $sql="SELECT * FROM `citamedica` WHERE `CODIGOCITAMEDICA`='.$id.'";
  $res = $con->query($sql);
  while($row = $res->fetch_assoc()){
      $CODIGOCITAMEDICA=$row['CODIGOCITAMEDICA'];
      $MED_CODIGOUSUARIO=$row['MED_CODIGOUSUARIO'];
      $CODIGOUSUARIO=$row['CODIGOUSUARIO'];
      $TIPOCONSULTA=$row['TIPOCONSULTA'];
      $FECHACONSULTA=$row['FECHACONSULTA'];
      $HORACONSULTA=$row['HORACONSULTA'];
    }



$html='

<script>
$(document).ready(function(){
  $("#cbx_Medico2").change(function () {
   $("#fechaConsulta").val("");

  })
});


$(document).ready(function(){
  const $fechaConsulta=$("#fechaConsulta");
  const $horaCitaActual=$("#HORACITAACTUAL");
  const $fechaCitaActual=$("#FECHACITAACTUAL");


  $("#fechaConsulta").change(function () {
    var horaActual=document.getElementById("horaActualCitaM");
    if($fechaConsulta.val()!=$fechaCitaActual.val()){   
    horaActual.innerHTML="";
    }else{
      horaActual.innerHTML=$horaCitaActual.val();
    }
    
    $("#cbx_Medico2 option:selected").each(function () {
      CODIGOUSUARIO = $(this).val();
      $.post("../modelo/obtenerHoraMedico.php", { CODIGOUSUARIO: CODIGOUSUARIO,FECHACONSULTA: $fechaConsulta.val(),HORACITAACTUAL:$horaCitaActual.val() }, function(data){
        $("#cbx_horaMedico2").html(data);
      });            
    });
  });

  $("#formAgendar2").ready(function () {
    
    $("#cbx_Medico2 option:selected").each(function () {
      CODIGOUSUARIO = $(this).val();
      $.post("../modelo/obtenerHoraMedico.php", { CODIGOUSUARIO: CODIGOUSUARIO,FECHACONSULTA: $fechaConsulta.val(),HORACITAACTUAL:$horaCitaActual.val()}, function(data){
        $("#cbx_horaMedico2").html(data);
      });            
    });
  });



});





</script>

<form action="../Controlador/agendarCita.php" method="post" onsubmit="return formValidationAgenda();" onclick="this.form.submit()" id="formAgendar2">
  </tr>
    <input type="hidden" id="titulo" name="CODIGOUSUARIO" value="'.$id.'" required>
    <input type="hidden" id="HORACITAACTUAL" name="HORACITAACTUAL" value="'.$HORACONSULTA.'" required>
    <input type="hidden" id="FECHACITAACTUAL" name="HORACITAACTUAL" value="'.$FECHACONSULTA.'" required>
  <tr>
  <div class="form-row">
        <div class="form-group col-md-6">
        <h5>Médico</h5>
          '.get_combo_db("medico","codigousuario","nombremedico", "apellidomedico", "codigousuario",$MED_CODIGOUSUARIO).'
        </div>  
        <div class="form-group col-md-6">
        <h5>Tipo de consulta</h5>
          <select class="text-center form-control form-control-lg" name="TIPOCONSULTA" required>
            <option value="">--Seleccionar--</option>
            ';
            $tipoConsulta=array("Audiometria en cabina","Espirometria","Electrocardiograma","Holter M.A.P.A","Ergometria");

            foreach($tipoConsulta as $c){
                if($c==$TIPOCONSULTA){
                    $html.='<option value="'.$c.'" selected="selected">'.$c.'</option>';
                }else{
                $html.='<option value="'.$c.'">'.$c.'</option>';
                }
            }

            $html.='
          </select>
        </div>  
      </div><br>
  <div class="form-row">
        <div class="form-group col-md-12">
          <h5>Fecha</h5>
          <input type="date" value="'.$FECHACONSULTA.'" class="text-center form-control form-control-lg" id="fechaConsulta" name="FECHACONSULTA" onchange="formValidationAgenda()" tabindex="1" required/>
          <p id="p1"></p>
        </div>
  </div><br>
  <div class="form-row">
      <div class="form-group col-md-6">
        <h5>Hora Actual: </h5> 
       <center> <h5 id="horaActualCitaM">'.$HORACONSULTA.'</h5></center>
          
      </div>
      
        <div class="form-group col-md-6">
        <h5>Nueva Hora</h5> 
          <select class="text-center form-control form-control-lg" name="cbx_horaMedico2" id="cbx_horaMedico2"></select>
        </div>
  </div><br>
    <center>
  <input type="submit" class="btnAgendamiento" link  value="Editar"/>
  </center>
</form>';


echo $html;
}
?> 


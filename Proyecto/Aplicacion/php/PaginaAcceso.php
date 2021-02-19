<html>
<head>
  <link rel='stylesheet' href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <link rel='stylesheet' href='../css/estilos.css'>
</head>
<body>
<?php
date_default_timezone_set("America/Guayaquil");
$desde = 8;
$hasta = 22;
$hora_actual = intval(date("H"));
if ($hora_actual >= $desde && $hora_actual < $hasta) {
?>
    <div class="contenedor">
      <div class="overlay" id="overlay">
        <div class="popup" id="popup">
        <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
        <h1>Nueva Cita</h1>
        <hr>
              <div class="agenda"></div>
        </div>
        </div>
    </div>
  <script type="text/javascript" src="../js/popup.js"></script>
<?php
} else {
?>
    <div class="contenedor">
      <div class="overlay" id="overlay">
        <div class="popup" id="popup">
              <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
              <div class="date">
                <span id="weekDay" class="weekDay"></span>, 
                <span id="day" class="day"></span> de
                <span id="month" class="month"></span> del
                <span id="year" class="year"></span>
              </div>
              <div class="clock">
                <span id="hours" class="hours"></span> :
                <span id="minutes" class="minutes"></span> :
                <span id="seconds" class="seconds"></span>
              </div><br><br>
          <h>El agendamiento de citas es a partir</h>
          <h>de las 8:00AM hasta 12:00PM</h>
        </div>
        </div>
    </div>
  <script src="../js/reloj.js"></script>
  <script type="text/javascript" src="../js/popup.js"></script>
<?php
}
?>
</body>
<script>
    $(document).ready(function () {
      $('.agenda').load('AgendamientoCitas.php');
    });
</script>
</html>
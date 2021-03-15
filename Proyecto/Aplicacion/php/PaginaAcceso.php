<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel='stylesheet' href='../css/estiloAcceso.css'>
</head>
<body>
<?php
date_default_timezone_set("America/Guayaquil");
$desde = 7;
$hasta = 24;
$hora_actual = intval(date("H"));
if ($hora_actual >= $desde && $hora_actual < $hasta) {
?>
    <div class="contenedor2">
      <div class="overlay" id="overlay">
        <div class="popup" id="popup">
          <div class="title">
            <br><h1>Nueva cita</h1>
          </div>
        <hr>
              <div class="agenda"></div>
        </div>
        </div>
    </div>
<?php
} else {
?>
    <div class="contenedor">
      <div class="overlay" id="overlay">
        <div class="popup" id="popup">
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
              <div class="texto">
            <h>El agendamiento de citas empieza a partir</h><br>
            <h>de las 8:00 AM hasta 12:00 PM</h>
          </div>
          <div class="img">
            <img src="../img/doctores.png"/>
          </div>
        </div>
        </div>
    </div>
  <script src="../js/reloj.js"></script>
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
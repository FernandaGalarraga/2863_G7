<!DOCTYPE html>
<head>
<meta charset='UTF-8'><meta name="robots" content="noindex">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script type="text/javascript" src="../js/validaciones.js"></script>
<script type="text/javascript" src="../js/validarLetras.js"></script>
<script type="text/javascript" src="../js/validarTelefono.js"></script>
<script type="text/javascript" src="../js/validarPass.js"></script>
<script type="text/javascript" src="../js/validarUsuario.js"></script>
<script type="text/javascript" src="../js/validarHora.js"></script>
<link rel='stylesheet' href='../css/estilorm.css'>
</head>
<body>
<div class="login">
    <div class="titulo">
        <h2 class="text-center">DATOS</h2>
    </div><br>
    <div class="formulario">
        <form action="../Controlador/controllerMedico.php" method="post" onsubmit="return formValidationMedico();" onclick="this.form.submit()">   
                <div class="form-group col-md-10"> 
                    <input type="text" class="text-center form-control" id="usuario" name="nombreusuario" autocomplete="off" placeholder="Usuario" onchange="formValidationMedico()" tabindex="1" required>
                    <p class="text-center" id="p1"></p>
                </div>
                <div class="form-group col-md-10"> 
                    <input type="password" class="text-center form-control" id="pass" name="passwordusuario" autocomplete="off" placeholder="Contraseña" onchange="formValidationMedico()" tabindex="2" required>
                    <p class="text-center" id="p2"></p>
                </div>  
                <div class="form-group col-md-10"> 
                    <input type="text" class="text-center form-control" id="nombrepaciente" name="nombremedico" autocomplete="off" placeholder="Nombre" onchange="formValidationMedico()" tabindex="3" required>
                    <p class="text-center" id="p3"></p>
                </div>
                <div class="form-group col-md-10"> 
                    <input type="text" class="text-center form-control" id="lastname" name="apellidomedico" autocomplete="off" placeholder="Apellido" onchange="formValidationMedico()" tabindex="4" required>
                    <p class="text-center" id="p4"></p>
                </div>
                <div class="form-group col-md-10"> 
                    <input type="text" class="text-center form-control" id="especialidad" name="especialidad" autocomplete="off" placeholder="Especialidad" onchange="formValidationMedico()" tabindex="5" required>
                    <p class="text-center" id="p5"></p>
                </div>
                <div class="form-group col-md-10"> 
                    <h class="text-center">Hora Inicio</h>
                    <input type="time" class="text-center form-control" id="horainicio" name="horainicio" autocomplete="off" placeholder="Hora inicio" onchange="formValidationMedico()" tabindex="7" required>
                    <p class="text-center" id="p6"></p>
                </div>
                <div class="form-group col-md-10"> 
                    <h class="text-center">Hora Fin</h>
                    <input type="time" class="text-center form-control" id="horafin" name="horafin" autocomplete="off" placeholder="Hora final" onchange="formValidationMedico()" tabindex="8" required>
                    <p class="text-center" id="p7"></p>
                </div>
                <input type="hidden" name="op" value="new">
                <center>
                <input type="submit" class="text-center btn btn-info" id="btn-reg" name="Guardar" value="Registrar">
                </center>
        </form>
    </div>
</div>
</body>
</html>
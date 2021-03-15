<!DOCTYPE html>
<head>
<meta charset='UTF-8'><meta name="robots" content="noindex">
<script type="text/javascript" src="../js/validaciones.js"></script>
        <script type="text/javascript" src="../js/validarFecha.js"></script>
        <script type="text/javascript" src="../js/validarLetras.js"></script>
        <script type="text/javascript" src="../js/validarTelefono.js"></script>
        <script type="text/javascript" src="../js/validarPass.js"></script>
        <script type="text/javascript" src="../js/validarHora.js"></script>
        <script type="text/javascript" src="../js/popup.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<link rel='stylesheet' href='../css/estiloacp.css'>
<link rel='stylesheet' href='../css/estilos.css'>
</head>
<body>
<?php
require_once("../modelo/Conexion.php");
$cn=conectar();
session_start();
$id=$_SESSION["codigo"];

$sql2="SELECT m.codigousuario,m.nombremedico,m.apellidomedico,m.especialidadmedico,
h.horainicio,h.horafin 
FROM medico m,horarioatencion h WHERE m.codigousuario=h.codigousuario AND m.codigousuario='$id'";
$res=$cn->query($sql2) or die($cn->error);
while($row=$res->fetch_assoc()){
        $html='
            <div class="register">
                    <div class="row">
                        <div class="col-md-3 register-left">
                            <img src="../img/user.png" alt=""/>
                            <div class="contenedor">
                                <button class="btn-abrir-popup" id="btn-abrir-popup">CambiarContraseña</button>
                            </div>
                        </div>
                        <div class="col-md-9 register-right">
                                    <h3 class="register-heading">Datos Personales</h3><br>
                                    <div class="register-form">
                                        <form name="medico" action="../Controlador/actualizarMedico.php" method="post" onsubmit="return formValidationActMedico();" onclick="this.form.submit()">
                                                    </tr>
                                                    <input type="hidden" id="titulo" name="CODIGOUSUARIO" value="'.$id.'" required>
                                                    <tr>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputState">Nombre</label>
                                                            <input type="text" class="text-center form-control" id="nombre" name="NOMBREMEDICO" value="'.$row['nombremedico'].'" onchange="formValidationActMedico()" tabindex="1" required/>
                                                            <p id="p1"></p>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputState">Apellido</label>
                                                            <input type="text" class="text-center form-control" id="apellido" name="APELLIDOMEDICO" value="'.$row['apellidomedico'].'" onchange="formValidationActMedico()" tabindex="2" required/>
                                                            <p id="p2"></p>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                                <label for="inputState">Especialidad</label>
                                                                <input type="text" class="text-center form-control" id="especialidad" name="ESPECIALIDADMEDICO" value="'.$row['especialidadmedico'].'" onchange="formValidationActMedico()" tabindex="3" required/>
                                                                <p id="p3"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputState">Hora Inicio</label>
                                                            <input type="time" class="text-center form-control" id="hinicio" name="HORAINICIOMEDICO" value="'.$row['horainicio'].'" onchange="formValidationActMedico()" tabindex="4" required/>
                                                            <p id="p4"></p>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputState">Hora Fin</label>
                                                            <input type="time" class="text-center form-control" id="hfinal" name="HORAFINMEDICO" value="'.$row['horafin'].'" tabindex="5" onchange="formValidationActMedico()" required/>
                                                            <p id="p5"></p>
                                                        </div>
                                                    </div>
                                                  
                                                <input type="submit" class="btnRegister" link  value="Actualizar"/>
                                        </form>
                            </div>
                        </div>
                    </div>
            </div>';
        echo $html;
    }

 // }
?>
            <div class="contenedor">
                <div class="overlay" id="overlay">
                    <div class="popup" id="popup">
                        <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                        <h3>Cambiar contraseña</h3>
                        <form action="../Controlador/actualizarContrasenia.php" method="post" onsubmit="return formValidationActPaciente();" onclick="this.form.submit()">
                            <div class="contenedor-inputs">
                                <?php
                                    $html='<input type="hidden" name="codigousuario" value="'.$id.'">';
                                    echo $html;
                                ?>
                                <input type="password" name="opassword" placeholder="Contraseña antigua" tabindex="9" required>
                                <input id="password" name="npassword" type="password" placeholder="Contraseña nueva" tabindex="10" required>
                                <input id="cpassword" name="cpassword" type="password" placeholder="Confirmar contraseña" onchange="formValidationPassword()" tabindex="11" required>
                                <p id="p7"></p>
                            </div>
                            <center>
                            <input type="submit" name="re_pass" class="btn-submit" value="Guardar">
                            </center>
                        </form>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="../js/popup.js"></script>
</body>
</html>

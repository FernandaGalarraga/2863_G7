<!DOCTYPE html>
<head>
<meta charset='UTF-8'><meta name="robots" content="noindex">
<script type="text/javascript" src="../js/validaciones.js"></script>
<script type="text/javascript" src="../js/validarFecha.js"></script>
<script type="text/javascript" src="../js/validarLetras.js"></script>
<script type="text/javascript" src="../js/validarTelefono.js"></script>
<script type="text/javascript" src="../js/validarPass.js"></script>
<script type="text/javascript" src="../js/popup.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel='stylesheet' href='../css/estiloacp.css'>
<link rel='stylesheet' href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link rel='stylesheet' href='../css/estilos.css'>
</head>
<body>
<?php
require_once("../modelo/Conexion.php");
$cn=conectar();
session_start();
$id=$_SESSION["codigo"];

$sql2="select * from paciente p, direccion d where p.codigousuario='$id'
       and p.codigousuario=d.codigousuario";
$res=$cn->query($sql2) or die($cn->error);
while($row=$res->fetch_assoc()){
        $html='
            <div class="container register">
                    <div class="row">
                        <div class="col-md-3 register-left">
                        <a href="Paciente.php"><input type="image" class="regresar" src="../img/salir.png"></a>
                            <img src="../img/user.png" alt=""/>
                            <div class="contenedor">
                                <button class="btn-abrir-popup" id="btn-abrir-popup">Cambiar contraseña</button>
                            </div>
                        </div>
                        <div class="col-md-9 register-right">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <h3 class="register-heading">Perfil</h3><br>
                                    <div class="register-form">
                                        <form action="../Controlador/actualizarPaciente.php" method="post" onsubmit="return formValidationActPaciente();" onclick="this.form.submit()">
                                                    </tr>
                                                    <input type="hidden" id="titulo" name="CODIGOUSUARIO" value="'.$id.'" required>
                                                    <tr>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="staticEmail">Nombre</label>
                                                            <input type="text" class="form-control" id="nombrepaciente" name="NOMBREPACIENTE" value="'.$row['NOMBREPACIENTE'].'" onchange="formValidationActPaciente()" tabindex="1" required/>
                                                            <p id="p1"></p>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="staticEmail">Apellido Paterno</label>
                                                            <input type="text" class="form-control" id="lastnamep" name="APELLIDOPATERNO" value="'.$row['APELLIDOPATERNO'].'" onchange="formValidationActPaciente()" tabindex="2" required/>
                                                            <p id="p2"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="staticEmail">Apellido Materno</label>
                                                            <input type="text" class="form-control" id="lastnamem" name="APELLIDOMATERNO" value="'.$row['APELLIDOMATERNO'].'" onchange="formValidationActPaciente()" tabindex="3" required/>
                                                            <p id="p3"></p>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="staticEmail">Fecha de Nacimiento</label>
                                                            <input type="date" class="form-control" id="date" name="FECHANACIMIENTOPACIENTE" value="'.$row['FECHANACIMIENTOPACIENTE'].'" onchange="formValidationActPaciente()" tabindex="4" required/>
                                                            <p id="p4"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="staticEmail">Teléfono</label>
                                                            <input type="text" name="TELEFONOPACIENTE" id="telephone" class="form-control" value="'.$row['TELEFONOPACIENTE'].'" onchange="formValidationActPaciente()" tabindex="5" required/>
                                                            <p id="p5"></p>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="staticEmail">Género</label>
                                                            <select class="form-control" name="GENEROPACIENTE">
                                                            <option value="Femenino">Femenino</option>
                                                            <option value="Masculino">Masculino</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="staticEmail">Ciudad</label>
                                                            <input type="text" class="form-control" id="ciudad" name="CIUDADDIRECCION" value="'.$row['CIUDADDIRECCION'].'" onchange="formValidationActPaciente()" tabindex="6" required/>
                                                            <p id="p6"></p>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="staticEmail">Calle</label>
                                                            <input type="text" class="form-control" name="CALLEDIRECCION" value="'.$row['CALLEDIRECCION'].'" tabindex="7" required/>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="staticEmail">Número</label>
                                                            <input type="text" class="form-control" name="NUMERODIRECCION" value="'.$row['NUMERODIRECCION'].'" tabindex="8" required/>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <input type="submit" class="btnRegister" link  value="Actualizar"/>
                                        </form>
                                    </div>
                                </div>
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
                            <input type="submit" name="re_pass" class="btn-submit" value="Guardar">
                        </form>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="../js/popup.js"></script>
</body>
</html>

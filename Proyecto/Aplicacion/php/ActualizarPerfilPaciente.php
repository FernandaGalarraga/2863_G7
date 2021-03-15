<!DOCTYPE html>
<head>
<meta charset='UTF-8'><meta name="robots" content="noindex">
<script type="text/javascript" src="../js/validaciones.js"></script>
<script type="text/javascript" src="../js/validarFecha.js"></script>
<script type="text/javascript" src="../js/validarLetras.js"></script>
<script type="text/javascript" src="../js/validarTelefono.js"></script>
<script type="text/javascript" src="../js/validarPass.js"></script>
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

$sql2="select * from paciente p, direccion d where p.codigousuario='$id'
       and p.codigousuario=d.codigousuario";
$res=$cn->query($sql2) or die($cn->error);
while($row=$res->fetch_assoc()){
        $html='
            <div class="register">
                    <div class="row">
                        <div class="col-md-3 register-left">
                            <img src="../img/user.png" alt=""/>
                            <div class="contenedor">
                                <button class="btn-abrir-popup" id="btn-abrir-popup">Cambiar contraseña</button>
                            </div>
                        </div>
                        <div class="col-md-9 register-right">
                                    <h3 class="register-heading">Datos Personales</h3><br>
                                    <div class="register-form">
                                        <form action="../Controlador/actualizarPaciente.php" method="post" onsubmit="return formValidationActPaciente();" onclick="this.form.submit()">
                                                    </tr>
                                                    <input type="hidden" id="titulo" name="CODIGOUSUARIO" value="'.$id.'" required>
                                                    <tr>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputState">Nombre</label>
                                                            <input type="text" class="text-center form-control" id="nombrepaciente" name="NOMBREPACIENTE" value="'.$row['NOMBREPACIENTE'].'" onchange="formValidationActPaciente()" tabindex="1" required/>
                                                            <h5 id="p1"></h5>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputState">Apellido Paterno</label>
                                                            <input type="text" class="text-center form-control" id="lastnamep" name="APELLIDOPATERNO" value="'.$row['APELLIDOPATERNO'].'" onchange="formValidationActPaciente()" tabindex="2" required/>
                                                            <h5 id="p2"></h5><br><br>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputState">Apellido Materno</label>
                                                            <input type="text" class="text-center form-control" id="lastnamem" name="APELLIDOMATERNO" value="'.$row['APELLIDOMATERNO'].'" onchange="formValidationActPaciente()" tabindex="3" required/>
                                                            <h5 id="p3"></h5>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputState">Fecha de nacimiento</label>
                                                            <input type="date" class="text-center form-control" id="date" name="FECHANACIMIENTOPACIENTE" value="'.$row['FECHANACIMIENTOPACIENTE'].'" onchange="formValidationActPaciente()" tabindex="4" required/>
                                                            <h5 id="p4"></h5><br><br>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputState">Ciudad</label>
                                                            <input type="text" class="text-center form-control" id="ciudad" name="CIUDADDIRECCION" value="'.$row['CIUDADDIRECCION'].'" onchange="formValidationActPaciente()" tabindex="6" required/>
                                                            <h5 id="p6"></h5>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputState">Calle</label>
                                                            <input type="text" class="text-center form-control" name="CALLEDIRECCION" value="'.$row['CALLEDIRECCION'].'" tabindex="7" required/>
                                                            </select><br><br>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputState">Número</label>
                                                            <input type="text" class="text-center form-control" name="NUMERODIRECCION" value="'.$row['NUMERODIRECCION'].'" tabindex="8" required/>
                                                            </select><br><br>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputState">Teléfono</label>
                                                            <input type="text" name="TELEFONOPACIENTE" id="telephone" class="text-center form-control" value="'.$row['TELEFONOPACIENTE'].'" onchange="formValidationActPaciente()" tabindex="5" required/>
                                                            <h5 id="p5"></h5>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputState">Género</label>
                                                            <select class="text-center form-control" name="GENEROPACIENTE">
                                                                <option value="'.$row['GENEROPACIENTE'].'">'.$row['GENEROPACIENTE'].'</option>
                                                                <option value="Masculino">'.!$row['GENEROPACIENTE'].'</option>
                                                            </select><br>
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

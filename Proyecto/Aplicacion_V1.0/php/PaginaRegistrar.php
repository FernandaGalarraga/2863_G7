<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<head>
<meta charset='UTF-8'><meta name="robots" content="noindex">
<script type="text/javascript" src="../js/validaciones.js"></script>
<script type="text/javascript" src="../js/validarFecha.js"></script>
<script type="text/javascript" src="../js/validarLetras.js"></script>
<script type="text/javascript" src="../js/validarTelefono.js"></script>
<script type="text/javascript" src="../js/validarPass.js"></script>
<script type="text/javascript" src="../js/validarUsuario.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
<link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
<link rel="canonical" href="https://codepen.io/dpinnick/pen/LjdLmo?limit=all&page=21&q=service" />
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='../css/estilo.css'>
</head>
<body>
        <!-- LOGIN MODULE -->
        <div class="login">
            <div class="wrap">
                <!-- TOGGLE -->
                <div id="toggle-wrap">
                    <div id="toggle-terms">
                        <div id="cross">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <!-- SLIDER -->
                <div class="content">
                    <!-- LOGO -->
                    <div class="logo">
                        <a href="#"><img class="logoim" src="../img/logo.png" alt=""></a>
                    </div>
                    <!-- SLIDESHOW -->
                    <div id="slideshow">
                        <div class="three">
                        
                            <h2><span>CONSULTAS</span></h2>
                            <ul>
                                <li><span>Audiometría en cabina</span></li>
                                <li><span>Espirometría</span></li>
                                <li><span>Electrocardiograma</span></li>
                                <li><span>Holter M.A.P.A</span></li>
                                <li><span>Ergometría</span></li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
                <!-- LOGIN FORM -->
                <div class="user">
                    <div class="form-wrap">
                    <a href="../index.php"><input type="image" class="regresar" src="../img/salir.png"></a>
                    	 <div class="tabs-content">
                                <h2 class="bg-light">REGISTRARSE</h2>
                                <form class="signup-form" action="../modelo/RegistroPaciente.php" method="post" onsubmit="return formValidationRegistro();" onclick="this.form.submit()">
                                    <input type="text" class="input" id="usuario" name="nombreusuario" autocomplete="off" placeholder="Usuario" onchange="formValidationRegistro()" tabindex="1" required>
                                        <p id="p1"></p>
                                    <input type="password" class="input" id="pass" name="passwordusuario" autocomplete="off" placeholder="Contraseña" onchange="formValidationRegistro()" tabindex="2" required>
                                        <p id="p2"></p>
                                    <input type="text" class="input" id="nombrepaciente" name="nombrepaciente" autocomplete="off" placeholder="Nombre" onchange="formValidationRegistro()" tabindex="3" required>
                                        <p id="p3"></p>
                                    <input type="text" class="input" id="lastnamep" name="apellidopaterno" autocomplete="off"  placeholder="Apellido Paterno" onchange="formValidationRegistro()" tabindex="4" required>
                                        <p id="p4"></p>
                                    <input type="text" class="input" id="lastnamem" name="apellidomaterno" autocomplete="off" placeholder="Apellido Materno" onchange="formValidationRegistro()" tabindex="5" required>
                                        <p id="p5"></p>
                                    <h>Fecha de nacimiento</h>
                                    <input type="date" class="input" id="date" name="fechanacimientopaciente" autocomplete="off" onchange="formValidationRegistro()" tabindex="6" required>
                                        <p id="p6"></p>
                                    <input type="text" class="input" id="telephone" name="telefonopaciente"autocomplete="off" placeholder="Teléfono" onchange="formValidationRegistro()" tabindex="7" required>
                                        <p id="p7"></p>
                                    <h>Género</h>&nbsp; &nbsp;
                                    <select class="gender" name="generopaciente" required>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Masculino">Masculino</option>
                                    </select><br>
                                    <h>Dirección</h>
                                    <input type="text" class="input" id="ciudad" name="ciudaddireccion" autocomplete="off" placeholder="Ciudad" onchange="formValidationRegistro()" tabindex="8" required>
                                        <p id="p8"></p>
                                    <input type="text" class="input" id="calle" name="calledireccion" autocomplete="off" placeholder="Calle" tabindex="9" required>
                                    <input type="text" class="input" id="numero" name="numerodireccion" autocomplete="off" placeholder="Número" tabindex="10" required>
                                    <input type="submit" class="button" value="Registrarse">
                                </form>
                        </div>
                	</div>
                </div>
            </div>
        </div>

<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</body>
</html>
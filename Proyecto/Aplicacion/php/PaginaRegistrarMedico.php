<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html><html class=''>
<head>

<meta charset='UTF-8'><meta name="robots" content="noindex">
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
                    	 <div class="tabs-content">
                                <h2 class="bg-light">REGISTRAR MEDICO</h2>
                                <form class="signup-form" action="../Controlador/controllerMedico.php" method="post">
                                <input type="text" class="input" id="user_pass" name="nombreusuario" autocomplete="off" placeholder="Usuario">
                                 <input type="password" class="input" id="user_passconfirm" name="passwordusuario" autocomplete="off" placeholder="Contraseña">
                                 <input type="text" class="input" id="nombrepaciente" name="nombremedico" autocomplete="off" placeholder="Nombre">
                                <input type="text" class="input" id="lastnamep" name="apellidomedico" autocomplete="off" placeholder="Apellido ">
                                <input type="text" class="input" id="lastnamem" name="especialidad" autocomplete="off" placeholder="Especialidad">
                                <input type="hidden" name="op" value="new">
                        
                                        
                                    <input type="submit" class="button" name="Guardar" value="Registrar">
                                </form>
                        </div>
                	</div>
                </div>
            </div>
        </div>

<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</body>
</html>
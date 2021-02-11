<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html><html class=''>
<head>
<script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script>
<script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script>
<script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script>
<script src='../js/login.js'></script>

<meta charset='UTF-8'><meta name="robots" content="noindex">
<link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
<link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
<link rel="canonical" href="https://codepen.io/dpinnick/pen/LjdLmo?limit=all&page=21&q=service" />
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='../css/estilolp.css'>
</head>
<body>
<?php
require_once("../modelo/Data.php");
$html='
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
                    <div id="paciente">
                        <div class="one">
                        ';
                        session_start();
                        $usuario=$_SESSION["usuario"];
                        if($usuario=="adm"){
                            $html.='<a href="Administrador.php"><input type="image" class="regresar" src="../img/salir.png"></a>';
                        }else{
                            $html.='<a href="Medico.php"><input type="image" class="regresar" src="../img/salir.png"></a>';
                        }
                        $html.='
                        </div>
                    </div>
                </div>
                <!-- LOGIN FORM -->
                <div class="user">
                <h3 class="register-heading">Pacientes</h3><br>
                <table class="table text-center" cellpadding="6" border="1" align="center">
                <thead class="thead-secondary">
                <tr class="table-secondary">
                    <th class="bg-info"><p class="text-center">NOMBRE</p></th>
                    <th class="bg-info"><p class="text-center">APELLIDOS</p></th>
                    <th class="bg-info"><p class="text-center">TELÉFONO</p></th>
                    <th class="bg-info" colspan="2"><p class="text-center">ACCIÓN</p></th>
                </tr>
                </thead>';
                $p = new Data;
                $paciente=$p->listarPacientes();
                foreach($paciente as $pa){
                    $html.='
                        <tr class="table-secondary">
                            <td class="text-center table-secondary">'.$pa->NOMBRE_PACIENTE.'</td>
                            <td class="text-center table-secondary">'.$pa->APELLIDO_PATERNO." ".$pa->APELLIDO_MATERNO.'</td>
                            <td class="text-center table-secondary">'.$pa->TELEFONO_PACIENTE.'</td>';
                            session_start();
                            $usuario=$_SESSION["usuario"];
                            if($usuario=="adm"){
                                $html.='<td class="table-secondary">
                                <a class="btn btn-success" href="../Controlador/detallePaciente.php?id='.$pa->CODIGO_PACIENTE.'">Detalle</a>
                                </td>
                                <td class="table-secondary">
                                    <a class="btn btn-danger" href="../Controlador/eliminarPaciente.php?id='.$pa->CODIGO_DIRECCION.'">Eliminar</a>
                                </td>';
                            }else{
                                $html.='
                                <td class="table-secondary">
                                    <a class="btn btn-success" href="../Controlador/detallePaciente.php?id='.$pa->CODIGO_PACIENTE.'">Detalle</a>
                                </td>';
                            }
                        $html.='</tr>';
                }
                $html.= '</table>
                </div>
            </div>
        </div>';
        echo $html;
?>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</body>
</html>
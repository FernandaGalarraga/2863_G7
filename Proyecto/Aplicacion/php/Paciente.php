<!DOCTYPE html><html class=''>
<head>
<meta charset='UTF-8'><meta name="robots">
<link rel='stylesheet' href='../css/estilop.css'>
<link rel='stylesheet' href='../css/estilos.css'>
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
                    <div id="paciente">
                        <div class="one">
                        </div>
                    </div>
                </div>
                <!-- LOGIN FORM -->
                <div class="user">
                    <div class="salir">
                        <a href="../modelo/cerrarSesion.php"><img class="logoim" src="../img/salir.png" alt=""></a>
                    </div><br><br>
                    <?php
                        require_once "../modelo/Conexion.php"; 
                        session_start();
                        $id=$_SESSION['codigo'];
                        $cn=conectar();
                        $sql="select * from paciente where codigousuario='$id'";
                        $res = $cn->query($sql) or die($cn->error);
                        if($res->num_rows>0){
                            while($row = $res->fetch_assoc()){
                            $_SESSION["nombreP"]=$row["NOMBREPACIENTE"];
                            }
                        }
                        $nombreP=$_SESSION["nombreP"];
                        $html='<h2 class="texto1">BIENVENIDO/A '.$nombreP.'</h2>';
                        echo $html;
                    ?>
                    <div class="opciones">
                        <button class="btnPerfil" onclick="window.location.href='ActualizarPerfilPaciente.php'">PERFIL</button>
                        <button class="btnAgendar" id="btn-abrir-popup">AGENDAR CITA</button>
                        <button class="btnCita" onclick="window.location.href='ListarCitasPaciente.php'">VER CITAS</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="menuContainer"></div>
        <script type="text/javascript" src="../js/popup.js"></script>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
</body>
<script>
    $(document).ready(function () {
      $('.menuContainer').load('PaginaAcceso.php');
    });
</script>
</html>
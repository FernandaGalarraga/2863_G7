<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
    <link rel="stylesheet" href="../css/style.css" class="">
    <script type="text/javascript" src="../js/function.js"></script>
    <script>
        $(document).ready(function(){
            $(".right_menu li .fas").click(function(){
                $(".profile_dd").toggleClass("active");
            });
            $(".hamburger").click(function(){
                $(".wrapper").toggleClass("active");
            });
        })
    </script>
</head>
<body>
<div class="wrapper">
    <div class="top_navbar">
        <div class="hamburger">
            <div class="hamburger__inner">
                <div class="one"></div>
                <div class="two"></div>
                <div class="three"></div>
            </div>
        </div>
        <div class="menu">
            <div class="logo">
            <span class="icon"><i class="fas fa-hospital w3-xxxlarge"></i></span>
                    Consultorio Medico
            </div>
            <div class="right_menu">
                <ul>
                    <li><i class="fas fa-user"></i>
                        <div class="profile_dd">
                            <div class="dd_item">
                            <a href="../modelo/cerrarSesion.php">Cerrar Sesion</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main_container">
        <div class="sidebar">
            <div class="sidebar__inner">
                <div class="profile">
                    <div class="img">
                        <img src="../img/admin.png" alt="profile_pic">
                    </div>
                    <div class="profile_info">
                        <p>BIENVENIDO</p>
                    </div>
                </div>
                <ul>
                    <li>
                        <a href="#container" onclick="includeHTMLPHPFile('PaginaRegistrarMedico.php','container');">
                            <span class="icon"><i class="fas fa-address-card"></i></span>
                            <span class="title">Registrar médico</span>
                        </a>
                    </li>
                    <li>
                        <a href="#container" onclick="includeHTMLPHPFile('ListarPaciente.php','container');">
                            <span class="icon"><i class="fas fa-hospital-user"></i></span>
                            <span class="title">Listar pacientes</span>
                        </a>
                    </li>
                    <li>
                        <a href="#container" onclick="includeHTMLPHPFile('ListarMedico.php','container');">
                            <span class="icon"><i class="fas fa-user-md"></i></span>
                            <span class="title">Listar médicos</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container" id="container"></div>
    </div>
</div>
</body>
</html>

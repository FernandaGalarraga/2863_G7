<!DOCTYPE html><html class=''>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel='stylesheet' href='../css/estiloac.css'>
</head>
<body>
<?php
require_once("../modelo/Conexion.php");
$cn=conectar();
session_start();
//echo '<h2>'.$_SESSION["codigo"].'</h2>';

$id=$_SESSION["codigo"];
$sql2="select * from paciente where CODIGOUSUARIO='$id'";
$res=$cn->query($sql2) or die($cn->error);
$row=$res->fetch_assoc();
$num=$res->num_rows;
if($num>0){
        $html='
            <div class="container register">
                    <div class="row">
                        <div class="col-md-3 register-left">
                        <a href="Paciente.php"><input type="image" class="regresar" src="../img/salir.png"></a>
                            <img src="../img/user.png" alt=""/>
                            <input class="btnPass" type="submit" name="" value="Cambiar contraseña"/><br/>
                        </div>
                        <div class="col-md-9 register-right">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <h3 class="register-heading">Perfil</h3><br>
                                    <div class="register-form">
                                        <form action="../Controlador/actualizarPaciente.php" method="post">
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                                                    <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="'.$row['NOMBREPACIENTE'].'" required/>
                                                    </div>
                                                </div><br>
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-2 col-form-label">Apellido Paterno</label>
                                                    <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="'.$row['APELLIDOPATERNO'].'" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-2 col-form-label">Apellido Materno</label>
                                                    <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="'.$row['APELLIDOMATERNO'].'" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-2 col-form-label">Fecha Nacimiento</label>
                                                    <div class="col-sm-10">
                                                    <input type="date" class="form-control" value="'.$row['FECHANACIMIENTOPACIENTE'].'" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-2 col-form-label">Teléfono</label>
                                                    <div class="col-sm-10">
                                                    <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" value="'.$row['TELEFONOPACIENTE'].'" required/>
                                                    </div>
                                                </div><br>
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-2 col-form-label">Género</label>
                                                    <div class="col-sm-10">
                                                    <select class="form-control" name="genero">
                                                    <option value="femenino">Femenino</option>
                                                    <option value="masculino">Masculino</option>
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
</body>
</html>

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
                            <input class="btnPass" type="submit" name="" value="Cambiar contraseña"/><br/>
                        </div>
                        <div class="col-md-9 register-right">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <h3 class="register-heading">Perfil</h3><br>
                                    <div class="register-form">
                                        <form action="../Controlador/actualizarPaciente.php" method="post">
                                                    </tr>
                                                    <input type="hidden" id="titulo" name="CODIGOUSUARIO" value="'.$id.'" required>
                                                    <tr>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="staticEmail">Nombre</label>
                                                            <input type="text" class="form-control" name="NOMBREPACIENTE" value="'.$row['NOMBREPACIENTE'].'" required/>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="staticEmail">Apellido Paterno</label>
                                                            <input type="text" class="form-control" name="APELLIDOPATERNO" value="'.$row['APELLIDOPATERNO'].'" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="staticEmail">Apellido Materno</label>
                                                            <input type="text" class="form-control" name="APELLIDOMATERNO" value="'.$row['APELLIDOMATERNO'].'" required/>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="staticEmail">Fecha de Nacimiento</label>
                                                            <input type="date" class="form-control" name="FECHANACIMIENTOPACIENTE" value="'.$row['FECHANACIMIENTOPACIENTE'].'" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="staticEmail">Teléfono</label>
                                                            <input type="text" minlength="10" maxlength="10" name="TELEFONOPACIENTE" class="form-control" value="'.$row['TELEFONOPACIENTE'].'" required/>
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
                                                            <input type="text" class="form-control" name="CIUDADDIRECCION" value="'.$row['CIUDADDIRECCION'].'" required/>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="staticEmail">Calle</label>
                                                            <input type="text" class="form-control" name="CALLEDIRECCION" value="'.$row['CALLEDIRECCION'].'" required/>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="staticEmail">Número</label>
                                                            <input type="text" class="form-control" name="NUMERODIRECCION" value="'.$row['NUMERODIRECCION'].'" required/>
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

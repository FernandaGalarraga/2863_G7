<!DOCTYPE html><html class=''>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel='stylesheet' href='../css/estiloac.css'>
</head>
<body>
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <input type="image" class="regresar" src="../img/salir.png" onclick="window.location.href='Paciente.php'"></button>
                        <img src="../img/user.png" alt=""/>
                        <input class="btnPass" type="submit" name="" value="Cambiar contraseña"/><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Perfil</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            Nombre
                                            <input type="text" class="form-control" value="" />
                                        </div>
                                        <div class="form-group">
                                            Apellido Paterno
                                            <input type="text" class="form-control" value="" />
                                        </div>
                                        <div class="form-group">
                                            Apellido Materno
                                            <input type="text" class="form-control" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            Fecha de nacimiento
                                            <input type="date" class="form-control" value="" />
                                        </div>
                                        <div class="form-group">
                                            Telefono
                                            <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" value="" />
                                        </div>
                                            Genero<br>
                                        <select class="form-control" name="genero">
                                        <option value="femenino">Femenino</option>
                                        <option value="masculino">Masculino</option>
                                        </select>
                                        
                                        <input type="submit" class="btnRegister" link  value="Actualizar"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
</body>
</html>

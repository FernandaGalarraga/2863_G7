function formValidationRegistro() {
    var usuario=document.getElementById('usuario').value;
    var pass=document.getElementById('pass').value;
    var fecha = document.getElementById('date').value;
    var nombre=document.getElementById('nombrepaciente').value;
    var apellidop=document.getElementById('lastnamep').value;
    var apellidom=document.getElementById('lastnamem').value;
    var telefono=document.getElementById('telephone').value;
    var ciudad=document.getElementById('ciudad').value;
    if(validarDate("p6",fecha)){ 
    if(validarUsuario("p1",usuario)){
    if(validarPassword("p2",pass)){
    if(soloLetras("p3",nombre)){
    if(soloLetras("p4",apellidop)){
    if(soloLetras("p5",apellidom)){
    if(validarTel("p7",telefono)){
    if(soloLetras("p8",ciudad)){
    return true;
    }
    }
    }
    }
    }
    }
    }
    }
    return false;
}
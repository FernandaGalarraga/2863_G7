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
function formValidationMedico(){
    var usuario=document.getElementById('usuario').value;
    var pass=document.getElementById('pass').value;
    var nombre=document.getElementById('nombrepaciente').value;
    var apellido=document.getElementById('lastname').value;
    var especialidad=document.getElementById('especialidad').value;
    if(validarUsuario("p1",usuario)){
    if(validarPassword("p2",pass)){
    if(soloLetras("p3",nombre)){
    if(soloLetras("p4",apellido)){
    if(soloLetras("p5",especialidad)){
    return true;
    }
    }
    }
    }
    }
    return false;
}
function formValidationActPaciente(){
    var fecha = document.getElementById('date').value;
    var nombre=document.getElementById('nombrepaciente').value;
    var apellidop=document.getElementById('lastnamep').value;
    var apellidom=document.getElementById('lastnamem').value;
    var telefono=document.getElementById('telephone').value;
    var ciudad=document.getElementById('ciudad').value;
    if(validarDate("p4",fecha)){
    if(soloLetras("p1",nombre)){
    if(soloLetras("p2",apellidop)){
    if(soloLetras("p3",apellidom)){
    if(validarTel("p5",telefono)){
    if(soloLetras("p6",ciudad)){
    return true;
    }
    }
    }
    }
    }
    }
    return false;
}
function formValidationActMedico(){
    var nombre=document.getElementById('nombre').value;
    var apellido=document.getElementById('apellido').value;
    var especialidad=document.getElementById('especialidad').value;
    if(soloLetras("p1",nombre)){
    if(soloLetras("p2",apellido)){
    if(soloLetras("p3",especialidad)){
    return true;
    }
    }
    }
    return false;
}
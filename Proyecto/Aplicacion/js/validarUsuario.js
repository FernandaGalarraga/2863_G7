function validarUsuario(p,inputtext){
  if((inputtext.length<4)) {
    document.getElementById(p).innerHTML ="El usuario debe tener mas de 4 caracteres";
    return false;	
  }
  else{
    document.getElementById(p).innerHTML ="";
      return true;
  }
}
function validarPassword(p,inputtext){
  if((inputtext.length >20 ||inputtext.length <4)) {
    document.getElementById(p).innerHTML ="La contrasena debe tener entre 4 y 32 digitos";
    return false;	
  }
  else{
    document.getElementById(p).innerHTML ="";
      return true;
  }
}

function valicpassword(p,pw,cpw){
if((pw != cpw)) {
  document.getElementById(p).innerHTML ="Las contrasenas no coinciden";
  return false;	
}
else{
  document.getElementById(p).innerHTML ="";
    return true;
}
}
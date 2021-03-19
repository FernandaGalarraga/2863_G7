function validarTel(p,inputtext){
    var number = /^[0-9a]+$/;;
    if(inputtext.match(number))
    {
      if((inputtext.length !=7)) {
        document.getElementById(p).innerHTML ="El numero de telefono debe tener 7 digitos";
        return false;	
      }
      else{
      document.getElementById(p).innerHTML ="";
      return true;
      }
      } 
      else{
      document.getElementById(p).innerText = "Solo se puede ingresar numeros";
      return false;
      }
}
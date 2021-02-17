function soloLetras(p,inputtext){
    var letters = /^[A-Za-z- ]+$/;  
    if(inputtext.match(letters))
    {
      document.getElementById(p).innerHTML ="";
      return true;
      }
     else{
      document.getElementById(p).innerText = "Solo se puede ingresar letras";
      return false;
      }
  }
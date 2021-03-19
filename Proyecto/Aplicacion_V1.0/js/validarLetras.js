function soloLetras(p,inputtext){
    let letters = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g; 
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
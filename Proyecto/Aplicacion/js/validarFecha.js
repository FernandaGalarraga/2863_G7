function validarDate(p, date2){
    date2=new Date(date2);
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    date=new Date(date);
    var befDate= new Date("1920-01-01");
    if(date2>date){
        document.getElementById(p).innerHTML ="La fecha no puede ser mayor a la actual";
      return false;
    }
    else if(date2<=befDate){
        document.getElementById(p).innerHTML ="La fecha no puede ser menor o igual a 1920-01-01";
      return false;
    }else{
        document.getElementById(p).innerHTML ="";
        return true;
    }
}
function validarFecha(p, date2){
    date2=new Date(date2);
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    date=new Date(date);
    if(date2<date){
        document.getElementById(p).innerHTML ="La fecha no puede ser menor a la actual";
      return false;
    }else{
        document.getElementById(p).innerHTML ="";
        return true;
    }
}
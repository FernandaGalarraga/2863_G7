function validarFecha(p, date2){
    date2=new Date(date2);
    var dateSelected=date2.getFullYear()+'-'+(date2.getMonth()+1)+'-'+(date2.getDate()+1);
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    date=new Date(date);
    dateSelected=new Date(dateSelected)
    console.log(dateSelected);
    console.log(date);
    if(dateSelected<date){
        document.getElementById(p).innerHTML ="La fecha no puede ser menor a la actual";
      return false;
    }else{
        document.getElementById(p).innerHTML ="";
        return true;
    }
}
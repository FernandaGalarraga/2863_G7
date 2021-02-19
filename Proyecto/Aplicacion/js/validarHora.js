function validarHora(p, hora){
    var time1 = "10:00";
    var time2 = "21:20";    
    if(hora>time2 || hora<time1){
        document.getElementById(p).innerHTML = "Disponibilidad de 10:00am a 15:30pm";
        return false;
    }else{
        document.getElementById(p).innerHTML = "";
        return true;
    }
}
function validarHoraInicio(p, hora){
    var time1 = "10:00";
    var time2 = "14:30";
    if(hora>time2 || hora<time1){
        document.getElementById(p).innerHTML = "Disponibilidad entre 10:00 am a 14:30 pm";
        return false;
    }else{
        document.getElementById(p).innerHTML = "";
        return true;
    }
}
function validarHoraFinal(p, hora){
    var time1 = "11:00";
    var time2 = "15:30";
    if(hora>time2 || hora<time1){
        document.getElementById(p).innerHTML = "Disponibilidad entre 11:00 am a 15:30 pm";
        return false;
    }else{
        document.getElementById(p).innerHTML = "";
        return true;
    }
}
function alerta(x)
    {
    var mensaje;
    var opcion = confirm("¿Estas Seguro que quieres cancelar la cita?");
    var cita_id = $(x).attr("id"); 
    if (opcion == true) {
                $.ajax({  
                     url:"../Controlador/cancelarCita.php",  
                     method:"POST",  
                     data:{estado_cita:'Cancelado',
                         codigo_cita: cita_id,
                    },
                     success:function(respuesta){  
                         if(respuesta=='ok'){
                              alert('Cita cancelada');
                              location.reload();
                         }else{
                              alert(respuesta);

                         }
                     }  
                });       
	} else {
	    
	}
}
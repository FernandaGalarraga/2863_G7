$(document).ready(function(){  
    $('#filter').click(function(){  
         var from_date = $('#from_date').val();  
         var to_date = $('#to_date').val();  
         if(from_date != '' && to_date != '')  
         {  
              $.ajax({  
                   url:"../Controlador/AgendaPaciente.php",  
                   method:"POST",  
                   data:{from_date:from_date, to_date:to_date},  
                   success:function(data)  
                   {  
                        $('#order_table').html(data);  
                   }  
              });  
         }  
         else  
         {  
              alert("Seleccionar fecha");  
         }  
    });  
});  

<?php
date_default_timezone_set('America/Bogota');

require_once "Conexion.php";

	$id_medico = $_POST['CODIGOUSUARIO'];
    $fecha=$_POST['FECHACONSULTA'];
    $cn=conectar();  
    $horasDisponibles=array();
    $sql="SELECT * FROM `horarioatencion` WHERE CODIGOUSUARIO= '$id_medico'";
    $resUser=$cn->query($sql);
    $horaActual=date('H:i:s');
	$fechaActual=date('Y-m-d');

    while($reg=$resUser->fetch_array())
	{
        $horaInicio=$reg['HORAINICIO'];
        $horaFin=$reg['HORAFIN']; 
	}
    $horaInicio=date($horaInicio);
    $horaFin=date($horaFin);

    array_push($horasDisponibles,$horaInicio);
    while($horaInicio<$horaFin){
        $horaInicio= date("H:i:s",strtotime($horaInicio."+ 30 minute")); 
        array_push($horasDisponibles,$horaInicio);
    }
    $horasMed=array();
    $sqlCitaMedica="SELECT * FROM `citamedica` WHERE MED_CODIGOUSUARIO='$id_medico' AND FECHACONSULTA='$fecha'";
    $resUser=$cn->query($sqlCitaMedica);
    $horasNoDisponibles=array();
    if($resUser->num_rows<=0){

        foreach($horasDisponibles as $hora){
            array_push($horasMed,$hora);            
        }
    }else{
    
    while($reg=$resUser->fetch_array())
	{
        $disponibilidad=$reg['HORACONSULTA'];
        foreach($horasDisponibles as $hora){
            if($hora==$disponibilidad){
                array_push($horasNoDisponibles,$hora);
            }
        }
        $horasMed=array_unique($horasNoDisponibles);
	}


    }

	foreach ($horasNoDisponibles as $valor) {
		foreach ($horasDisponibles as $valor2) {
			if($valor == $valor2){
            $borrar=array_search($valor,$horasDisponibles);
            unset($horasDisponibles[$borrar]);            
			}		
		}
	}
	foreach ($horasDisponibles as $valor) {		
        if($valor <= $horaActual && $fechaActual==$fecha){
            $borrar=array_search($valor,$horasDisponibles);
            unset($horasDisponibles[$borrar]);            
       }		
	}
    $html= "<option value=''>Horas disponibles</option>";

    foreach($horasDisponibles as $hora){
        $html.= "<option value='".$hora."'>".$hora."</option>";
    }   
    echo $html;

?>

<script type="text/javascript">

/*
alert( "<?php 
//echo $resUser;
/*
foreach($horasDisponibles as $hora){
    echo $hora ."<br>";
}

*/
 ?>" );
 */
 
</script>

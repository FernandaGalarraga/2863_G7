<?php
require_once("../modelo/Data.php");
if(isset($_POST["employee_id"]))  
{  
$idPaciente=$_POST["employee_id"];
$det = new Data;
$detalle=$det->detallePaciente($idPaciente);
$html='
        <!-- LOGIN MODULE -->
        <div class="login">
            <div class="wrap">
                <!-- TOGGLE -->
                <div id="toggle-wrap">
                    <div id="toggle-terms">
                        <div id="cross">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <!-- LOGIN FORM -->
                <div class="user">
                <h3 class="register-heading">ID PACIENTE: '.$idPaciente.'</h3><br>
                <table class="table text-center" cellpadding="6" border="2" align="center">';
                    foreach($detalle as $d){
                        $html.='
                        <tr class="table-secondary">
                            <th class="bg-info">NOMBRE</th>
                            <td>'.$d->NOMBRE_PACIENTE.'</td>
                        </tr>
                        <tr class="table-secondary">
                            <th class="bg-info">APELLIDOS</th>
                            <td>'.$d->APELLIDO_PATERNO." ".$d->APELLIDO_MATERNO.'</td>
                        </tr>
                        <tr class="table-secondary">
                            <th class="bg-info">FECHA NACIMIENTO</th>
                            <td>'.$d->FECHANACIMIENTO_PACIENTE.'</td>
                        </tr>
                        <tr class="table-secondary">
                            <th class="bg-info">TELÉFONO</th>
                            <td>'.$d->TELEFONO_PACIENTE.'</td>
                        </tr>
                        <tr class="table-secondary">
                            <th class="bg-info">GÉNERO</th>
                            <td>'.$d->GENERO_PACIENTE.'</td>
                        </tr>
                        <tr class="table-secondary">
                            <th class="bg-info">DIRECCIÓN</th>
                            <td>'.$d->CIUDAD_DIRECCION.", ".$d->CALLE_DIRECCION.", ".$d->NUMERO_DIRECCION.'</td>
                        </tr>';
                    }
                $html.= '
                </table><br>
                </div>
            </div>
        </div>';
        echo $html;
}
?>

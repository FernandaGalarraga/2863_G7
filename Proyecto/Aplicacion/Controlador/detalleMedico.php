<?php
require_once("../clases/Medico.php");
require_once "../modelo/Conexion.php";
$cn=conectar();
if(isset($_POST["employee_id"]))  
{  
$idMedico=$_POST["employee_id"];
$d = new Medico($cn);
$detalle=$d->detalleMedico($idMedico);
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
                <h3 class="register-heading">ID MÉDICO: '.$idMedico.'</h3><br>
                <table class="table text-center" cellpadding="6" border="2" align="center">';
                    foreach($detalle as $de){
                        $html.='
                        <tr class="table-secondary">
                            <th class="bg-info">NOMBRE</th>
                            <td>'.$de->getNombreMedico().'</td>
                        </tr>
                        <tr class="table-secondary">
                            <th class="bg-info">APELLIDO</th>
                            <td>'.$de->getApellidoMedico().'</td>
                        </tr>
                        <tr class="table-secondary">
                            <th class="bg-info">ESPECIALIDAD</th>
                            <td>'.$de->getEspecialidadMedico().'</td>
                        </tr>
                        <tr class="table-secondary">
                          <th class="bg-info">HORARIO DE ATENCIÓN</th>
                          <td>De: '.$de->getHoraInicio().' a '.$de->getHoraFin().' </td>
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
